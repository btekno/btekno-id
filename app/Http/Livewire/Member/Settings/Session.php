<?php

namespace App\Http\Livewire\Member\Settings;

use Livewire\Component;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use App\Models\User;

class Session extends Component
{
    public User $user;

    public function mount()
    {
        $this->user = me();
    }

    public function render(): View
    {
        $sessions = DB::table('sessions')
            ->whereUserId($this->user->id)
            ->latest('last_activity')
            ->limit(30)
            ->get();

        return view('livewire.member.settings.session', [
            'sessions' => $sessions,
        ]);
    }
}
