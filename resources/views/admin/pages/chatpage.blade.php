@extends('admin.layouts.dashboard')
@section('content')
    
<link href="{{url('/asset/chat/css/style.css')}}" rel="stylesheet" id="bootstrap-css">    
@if (Session::has('message'))
  <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="wrapper">

  @include('admin.layouts.sidebar')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body" style="padding:1.25rem">
                <div class="container" style="min-height:500px;">
         <div class=''></div>
         <div class="container" style="padding-left: 160px;">
            <div class="chat">
               <div id="frame">
                  <div id="sidepanel">
                     <div id="profile">
                        <?php
                           echo '<div class="wrap">';
                           $currentSession = '';
                           foreach ($loggedUser as $user) {
                           
                              $image = '';
                              $image = url('/asset/chat/userpics').'/'.$user['avatar'];
                              
                              $currentSession = $user['current_session'];
                              echo '<img id="profile-img" src="'.$image.'" class="online" alt="" />';
                              echo  '<p>'.$user['username'].'</p>';
                                
                                 echo '<div id="status-options">';
                                 echo '<ul>';
                                    echo '<li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>';
                                    echo '<li id="status-away"><span class="status-circle"></span> <p>Away</p></li>';
                                    echo '<li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>';
                                    echo '<li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>';
                                 echo '</ul>';
                                 echo '</div>';
                           }
                           echo '</div>';
                           ?>
                     </div>
                     <div id="search">
                        <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
                        <input type="text" id="search_fld" name="search_fld" placeholder="Search contacts by name, email..." />               
                     </div>
                     <div id="contacts">  
                        <?php
                           echo '<ul class="list">';               
                           foreach ($chatUsers as $user) {
                              //echo $user->id; die();
                              $image = '';
                              $image = url('/asset/chat/userpics').'/'.$user['avatar'];   
                           
                              $status = 'offline';                
                              if($user['online']) {
                                 $status = 'online';
                              }
                              $activeUser = '';
                              if($user->id == $currentSession) {
                                 $activeUser = "active";
                              }
                              echo '<li id="'.$user->id.'" class="contact '.$activeUser.'" data-touserid="'.$user->id.'" data-tousername="'.$user['username'].'">';
                              echo '<div class="wrap">';
                              echo '<span id="status_'.$user->id.'" class="contact-status '.$status.'"></span>';
                              echo '<img src="'.$image.'" alt="" />';
                              echo '<div class="meta">';
                              echo '<p class="name">'.$user['name'].'<span style="display:none">'.$user['email'].'</span><span id="unread_'.$user['userid'].'" class="unread">'.\App\Http\Controllers\ChatController::getUnreadMessageCount($user['userid'], auth()->user()->id).'</span></p>';
                              echo '<p class="preview"><span id="isTyping_'.$user->id.'" class="isTyping"></span></p>';
                              echo '</div>';
                              echo '</div>';
                              echo '</li>'; 
                           }
                           echo '</ul>';
                           ?>
                     </div>
                     <div id="bottom-bar" style="display:none;">   
                        <button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add contact</span></button>
                        <button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>              
                     </div>
                  </div>
                  <div class="content" id="content">
                     <div class="contact-profile" id="userSection">  
                        <?php
                           $userDetails = \App\Http\Controllers\ChatController::getUserDetails($currentSession);
                           foreach ($userDetails as $user) {   
                              $image = '';
                              $image = url('/asset/chat/userpics').'/'.$user['avatar'];                           
                              echo '<img src="'.$image.'" alt="" />';
                                 echo '<p>'.$user['username'].'</p>';
                                 echo '<div class="social-media">';
                                    echo '<i class="fa fa-facebook" aria-hidden="true"></i>';
                                    echo '<i class="fa fa-twitter" aria-hidden="true"></i>';
                                     echo '<i class="fa fa-instagram" aria-hidden="true"></i>';
                                 echo '</div>';
                           }  
                           ?>                
                     </div>
                     <div class="messages" id="conversation">     
                        <?php
                           echo \App\Http\Controllers\ChatController::getUserChat(auth()->user()->id, $currentSession);                
                           ?>
                     </div>
                     <div class="message-input" id="replySection">
                        <div class="message-input" id="replyContainer">
                           <div class="wrap">
                              <input type="text" class="chatMessage" id="chatMessage<?php echo $currentSession; ?>" placeholder="Write your message..." />
                              <button class="submit chatButton" id="chatButton<?php echo $currentSession; ?>"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>   
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <input type="hidden" name="main_url" id="main_url" value="{{url('/')}}">
      <input type="hidden" name="token" id="token" value="{{ csrf_token() }}">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>  
</div>



@stop
