<?php

namespace App\Policies;

use App\Models\Admin\Event;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    public function author(User $user, Event $event)
    {
        if($user->id == $event->user_id){
            return true;
        }
        else{
            return true; 
        }
    }

    public function published(?User $user, Event $event)
    {
        if($event->estado == 2){
            return true;
        }
        else{
            return false; 
        }
    }
}
