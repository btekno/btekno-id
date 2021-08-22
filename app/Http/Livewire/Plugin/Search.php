<?php

namespace App\Http\Livewire\Plugin;

use App\Models\User;
use Livewire\Component;

class Search extends Component
{
    public $query;
    public $users;

    public function mount()
    {
        $this->query = '';
    }
    
    public function updatedQuery()
    {
        $this->users = User::where('is_spam', 'false')
            ->search($this->query)
            ->take(3)
            ->get();
    }
}
