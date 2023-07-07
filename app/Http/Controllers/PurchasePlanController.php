<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Appointment;
use App\Models\Contactus;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe\Exception\InvalidRequestException;
use Auth;
use Stripe;
use Session;
use Exception;
use Illuminate\Support\Facades\Mail;
use App\Mail\PlanPurchased;
use App\Models\Subscription;

class PurchasePlanController extends Controller
{

    public function __construct()
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    public function purchase_plan(Request $request)
    {  
        $user_id = Auth::id();
        $active_plan = \DB::table('subscriptions')->where('user_id',$user_id)->where('stripe_status','active')->count();
        if($active_plan > 0){
            $active_plan = \DB::table('subscriptions')->where('user_id',$user_id)->where('stripe_status','active')->first();
            return redirect()->back()->with('message', 'You already have a plan '.$active_plan->name.' You can manage your plan from customer dashboard.');  
        }

        $plan = Plan::find($request->id);
        if($plan){                        
            return view('stripe.checkout')->with('plan',$plan);   
        }

        return abort(404);
    }

    public function order_post(Request $request)
    {
        $user = auth()->user();
        $input = $request->all();
        $token =  $request->stripeToken;
        $paymentMethod = $request->paymentMethod;
        if(env('STRIPE_LIVE')==1){
            $plan = Plan::where('live_stripe_id',$input['plane'])->first();
        }else{
            $plan = Plan::where('test_stripe_id',$input['plane'])->first();
        }
        
        try {            
            if (is_null($user->stripe_id)) {
                $stripeCustomer = $user->createAsStripeCustomer();
            }

            \Stripe\Customer::createSource(
                $user->stripe_id,
                ['source' => $token]
            );

            if($request->coupon_code!=""){                
                $user->newSubscription($plan->name,$input['plane'])
                    ->withCoupon($request->coupon_code)
                    ->create($paymentMethod, [
                    'email' => $user->email,
                ]);
            }else{                
                $user->newSubscription($plan->name,$input['plane'])                    
                    ->create($paymentMethod, [
                    'email' => $user->email,
                ]);   
            }

            
            $subscription = Subscription::where('user_id',$user->id)->orderBy('created_at','DESC')->first();
            //echo "<pre>"; print_r($subscription); die;


            if ($subscription) {
                $new_user = User::find($user->id);
                $new_user->current_subscription_id = $subscription->stripe_id;
                $new_user->save();

                $today = date("Y-m-d H:i:s");
                $date = date('Y-m-d H:i:s', strtotime('+1 month', strtotime($today)));  

                $subscription->stripe_status = 'active';
                $subscription->sub_start_at = date('Y-m-d H:i:s');
                $subscription->sub_end_at = $date;
                $subscription->save();
            }

            Mail::to($user)->send(new PlanPurchased($plan,$user));
            //return back()->with('success','Subscription is completed.');
            return redirect('home')->with('message','Subscription is completed.');
        } catch (Exception $e) {
            return back()->with('message',$e->getMessage());
        }   
    }

    public function cancel_subscription(Request $request)
    {
        try {
            $subscription = \Stripe\Subscription::retrieve($request->stripe_id);
            $subscription->cancel();

            \DB::table('subscriptions')->where('stripe_id',$request->stripe_id)->update(['stripe_status'=>'inactive']);
            return back()->with('message','Subscription cancelled successfully.');
        } catch (InvalidRequestException $e) {
            return back()->with('message',$e->getMessage());
        }
    }
}