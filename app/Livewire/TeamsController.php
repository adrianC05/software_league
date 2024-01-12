<?php

namespace App\Livewire;

use App\Models\Team;
use Livewire\Component;

class TeamsController extends Component
{
    public function render()
    {
        $teams = Team::all();
        return view('livewire.teams', ['teams' => $teams]);
    }
}
