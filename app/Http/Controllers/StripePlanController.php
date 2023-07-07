<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Appointment;
use App\Models\Contactus;
use Illuminate\Http\Request;
use Auth;

class StripePlanController extends Controller
{
    public function plan_list()
    {
        return view('stripe.plan');
    }
}