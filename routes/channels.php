<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});



//private channel with condition 
Broadcast::channel('new_event_channel', function ($user) {
    return $user->user_type == 'user'; 
});

//private channel with condition 
Broadcast::channel('new_course_channel', function ($user) {
    return $user->user_type == 'user'; 
});
