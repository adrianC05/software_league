<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;
use Livewire\WithPagination;

class Teams extends Component
{
    public $team_id, $name, $goodmother, $enrollment, $status, $description;
    public $isOpen = 0;
    use WithPagination;

    public function create()
    {
        $this->openModal();
    }

    public function render()
    {
        $teams = Team::paginate(5);
        //compact teams and isOpen to pass to the view
        return view('livewire.teams.index', ['teams' => $teams], ['isOpen' => $this->isOpen]);
    }


    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }
}
