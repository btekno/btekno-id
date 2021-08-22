<?php

namespace App\Http\Livewire\Member\Settings;

use Livewire\Component;

use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Illuminate\Support\Str;
use Illuminate\View\View;

use App\Models\User;

class Api extends Component
{
    use WithRateLimiting;

    public User $user;

    public $listeners = [
        'refreshApiToken' => 'render',
    ];

    public function mount()
    {
        $this->user = me();
    }

    public function regenerateToken()
    {
        try {
            $this->rateLimit(50);
        } catch (TooManyRequestsException $exception) {
            return toast($this, 'error', config('taskord.error.rate-limit'));
        }

        me()->api_token = Str::random(60);
        me()->save();
        $this->emit('refreshApiToken');
        
        logify(request(), 'User', me(), 'Created a new API key');

        return toast($this, 'success', 'New API key been generated successfully');
    }

    public function render(): View
    {
        return view('livewire.member.settings.api');
    }
}
