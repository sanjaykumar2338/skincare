<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Appointment;
use App\Models\Contactus;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use DB;

class ChatController extends Controller
{   
    private $chatTable = 'chat';
	private $chatUsersTable = 'users';
	private $chatLoginDetailsTable = 'chat_login_details';

    public function __construct(){
        
    }

    public function index(){
    	$loggedUser = User::where('id',auth()->user()->id)->get();
    	$chatUsers = User::where('id','!=',auth()->user()->id)->get();
    	//echo "<pre>"; print_r($chatUsers); die;
    	$senderUserid = '';
    	$recieverUserid = '';
		$output = '';
		
    	return view('chat.layouts.chat')->with('loggedUser',$loggedUser)->with('chatUsers',$chatUsers)->with('output',$output);
    }

	private function getData($sqlQuery) {
		$result = \DB::select($sqlQuery);
		$data= array();
		while ($row = $result) {
			$data[]=$row;            
		}
		return $data;
	}

	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}

	public function loginUsers($username, $password){
		$sqlQuery = "
			SELECT userid, username 
			FROM ".$this->chatUsersTable." 
			WHERE username='".$username."' AND password='".$password."'";		
        return  $this->getData($sqlQuery);
	}	

	public function chatUsers($userid){
		$sqlQuery = "
			SELECT * FROM ".$this->chatUsersTable." 
			WHERE userid != '$userid'";
		return  $this->getData($sqlQuery);
	}

	public static function getUserDetails($userid){
		$sqlQuery = User::where('id',$userid)->get();
		return  $sqlQuery;
	}

	public function getUserAvatar($userid){
		$sqlQuery = "
			SELECT avatar 
			FROM ".$this->chatUsersTable." 
			WHERE userid = '$userid'";
		$userResult = \DB::select($sqlQuery);
		$userAvatar = '';
		foreach ($userResult as $user) {
			$userAvatar = $user['avatar'];
		}	
		return $userAvatar;
	}	

	public function updateUserOnline($userId, $online) {		
		$sqlUserUpdate = "
			UPDATE ".$this->chatUsersTable." 
			SET online = '".$online."' 
			WHERE userid = '".$userId."'";			
		mysqli_query($this->dbConnect, $sqlUserUpdate);		
	}

	public function insertChat($reciever_userid, $user_id, $chat_message) {		
		$sqlInsert = "
			INSERT INTO ".$this->chatTable." 
			(reciever_userid, sender_userid, message, status) 
			VALUES ('".$reciever_userid."', '".$user_id."', '".$chat_message."', '1')";
		$result = \DB::insert($sqlInsert);

		if(!$result){
			return ('Error in query: '. mysqli_error());
		} else {
			$conversation = $this->getUserChat($user_id, $reciever_userid);
			$data = array(
				"conversation" => $conversation			
			);
			echo json_encode($data);	
		}
	}

	public static function getUserChat($from_user_id, $to_user_id) {
		//echo "test"; die;
		$sqlQuery = "
			SELECT avatar 
			FROM users
			WHERE id = '$from_user_id'";
		$userResult = \DB::select($sqlQuery);
		$userAvatar = '';
		foreach ($userResult as $user) {
			//echo "<pre>"; print_r($user); die;
			$userAvatar = $user->avatar;
		}	
		
		$fromUserAvatar = $userAvatar;

		$sqlQuery = "
			SELECT avatar 
			FROM users
			WHERE id = '$to_user_id'";
		$userResult = \DB::select($sqlQuery);
		$userAvatar = '';
		foreach ($userResult as $user) {
			$userAvatar = $user->avatar;
		}	

		//echo $to_user_id; die;
		$toUserAvatar = $userAvatar;
		$sqlQuery = "
			SELECT * FROM chat
			WHERE (sender_userid = '".$from_user_id."' 
			AND reciever_userid = '".$to_user_id."') 
			OR (sender_userid = '".$to_user_id."' 
			AND reciever_userid = '".$from_user_id."') 
			ORDER BY timestamp ASC";
		$userChat = \DB::select($sqlQuery);	
		//echo "<pre>"; print_r($userChat); die;
		$conversation = '<ul>';
		foreach($userChat as $chat){
			$user_name = '';
			$fromUserAvatar1 = '';
			$toUserAvatar1 = '';

			$fromUserAvatar1 = url('/asset/chat/userpics').'/'.$fromUserAvatar;
			$toUserAvatar1 = url('/asset/chat/userpics').'/'.$toUserAvatar;

			if($chat->sender_userid == $from_user_id) {
				$conversation .= '<li class="sent">';
				$conversation .= '<img width="22px" height="22px" src="'.$fromUserAvatar1.'" alt="" />';
			} else {
				$conversation .= '<li class="replies">';
				$conversation .= '<img width="22px" height="22px" src="'.$toUserAvatar1.'" alt="" />';
			}			
			$conversation .= '<p>'.$chat->message.'</p>';			
			$conversation .= '</li>';
		}		
		$conversation .= '</ul>';
		return $conversation;
	}

	public function showUserChat($from_user_id, $to_user_id) {		
		$userDetails = $this->getUserDetails($to_user_id);
		//echo "<pre>"; print_r($userDetails); die;

		$toUserAvatar = '';
		foreach ($userDetails as $user) {
			$toUserAvatar = $user['avatar'];
			$image = '';

			$image = url('/asset/chat/userpics').'/'.$user['avatar'];
			$userSection = '<img src="'.$image.'" alt="" />
				<p>'.$user['name'].' <em style="font-weight: 600;
    font-size: 12px;">('.$user['email'].')</em>'.'</p>
				<div class="social-media">
					<i class="fa fa-facebook" aria-hidden="true"></i>
					<i class="fa fa-twitter" aria-hidden="true"></i>
					 <i class="fa fa-instagram" aria-hidden="true"></i>
				</div>';
		}		
		// get user conversation
		$conversation = $this->getUserChat($from_user_id, $to_user_id);	
		//echo "<pre>"; print_r($conversation); die;

		// update chat user read status		
		$sqlUpdate = "
			UPDATE ".$this->chatTable." 
			SET status = '0' 
			WHERE sender_userid = '".$to_user_id."' AND reciever_userid = '".$from_user_id."' AND status = '1'";
		
		DB::statement($sqlUpdate);
		//echo "<pre>"; print_r($conversation); die;
		//mysqli_query($this->dbConnect, $sqlUpdate);		
		// update users current chat session
		

		$sqlUserUpdate = "
			UPDATE ".$this->chatUsersTable." 
			SET current_session = '".$to_user_id."' 
			WHERE id = '".$from_user_id."'";
		DB::statement($sqlUserUpdate);	
		$data = array(
			"userSection" => $userSection,
			"conversation" => $conversation			
		 );
		 echo json_encode($data);		
	}	

	public static function getUnreadMessageCount($senderUserid, $recieverUserid) {
		$numRows = \DB::table('chat')->where('sender_userid',$senderUserid)->where('reciever_userid',$recieverUserid)->where('status',1)->count();
		$output = '';
		if($numRows > 0){
			$output = $numRows;
		}
		return $output;
	}

	public function updateTypingStatus($is_type, $loginDetailsId) {		
		$sqlUpdate = "
			UPDATE ".$this->chatLoginDetailsTable." 
			SET is_typing = '".$is_type."' 
			WHERE id = '".$loginDetailsId."'";
		mysqli_query($this->dbConnect, $sqlUpdate);
	}	

	public function fetchIsTypeStatus($userId){
		$sqlQuery = "
		SELECT is_typing FROM ".$this->chatLoginDetailsTable." 
		WHERE userid = '".$userId."' ORDER BY last_activity DESC LIMIT 1"; 
		$result =  $this->getData($sqlQuery);
		$output = '';
		foreach($result as $row) {
			if($row["is_typing"] == 'yes'){
				$output = ' - <small><em>Typing...</em></small>';
			}
		}
		return $output;
	}	

	public function insertUserLoginDetails($userId) {		
		$sqlInsert = "
			INSERT INTO ".$this->chatLoginDetailsTable."(userid) 
			VALUES ('".$userId."')";
		mysqli_query($this->dbConnect, $sqlInsert);
		$lastInsertId = mysqli_insert_id($this->dbConnect);
        return $lastInsertId;		
	}	

	public function updateLastActivity($loginDetailsId) {		
		$sqlUpdate = "
			UPDATE ".$this->chatLoginDetailsTable." 
			SET last_activity = now() 
			WHERE id = '".$loginDetailsId."'";
		mysqli_query($this->dbConnect, $sqlUpdate);
	}	

	public function getUserLastActivity($userId) {
		$sqlQuery = "
			SELECT last_activity FROM ".$this->chatLoginDetailsTable." 
			WHERE userid = '$userId' ORDER BY last_activity DESC LIMIT 1";
		$result =  $this->getData($sqlQuery);
		foreach($result as $row) {
			return $row['last_activity'];
		}
	}	

	public function chat_action(Request $request){

		if($request->action == 'update_user_list') {
			$chatUsers = User::find(auth()->user()->id)->get();
			$data = array(
				"profileHTML" => $chatUsers,	
			);
			echo json_encode($data);	
		}

		if($request->action == 'insert_chat') {
			$this->insertChat($request->to_user_id, auth()->user()->id, $request->chat_message);
		}

		if($request->action == 'show_chat') {
			$this->showUserChat(auth()->user()->id, $request->to_user_id);
		}

		if($request->action == 'update_user_chat') {
			$conversation = $this->getUserChat(auth()->user()->id, $request->to_user_id);
			$data = array(
				"conversation" => $conversation			
			);
			echo json_encode($data);
		}

		if($request->action == 'update_unread_message') {
			$count = $this->getUnreadMessageCount($request->to_user_id, auth()->user()->id);
			$data = array(
				"count" => $count			
			);
			echo json_encode($data);
		}

		if($request->action == 'update_typing_status') {
			$sqlUpdate = "
			UPDATE ".$this->chatLoginDetailsTable." 
			SET is_typing = '".$request->is_type."' 
			WHERE id = '".auth()->user()->id."'";

			\DB::query($sqlUpdate);
			//$chat->updateTypingStatus($_POST["is_type"], $_SESSION["login_details_id"]);
		}

		if($request->action == 'show_typing_status') {
			$message = $this->fetchIsTypeStatus($request->to_user_id);
			$data = array(
				"message" => $message			
			);
			echo json_encode($data);
		}
	}
}
