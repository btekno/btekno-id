<?php

namespace App\Http\Livewire\Member\Settings;

use App\Models\User;
use Livewire\Component;

class Notification extends Component
{
    public User $user;

    public function mount()
    {
        $this->user = me();
    }

    public function notificationsEmail()
    {
        $this->user->notifications_email = ! $this->user->notifications_email;
        $this->user->save();
        $this->emit('toggledNotificationsEmail');
        
        logify(request(), 'User', me(), 'Toggled the email notification settings');
        return toast($this, 'success', 'Notification settings has been updated');
    }

    public function notificationsWeb()
    {
        $this->user->notifications_web = ! $this->user->notifications_web;
        $this->user->save();
        $this->emit('toggledNotificationsWeb');
        
        logify(request(), 'User', me(), 'Toggled the web notification settings');
        return toast($this, 'success', 'Notification settings has been updated');
    }
}
