<?php

namespace App\Livewire;

use App\Models\Team;
use Livewire\Component;
use Livewire\WithPagination;

class Teams extends Component
{
    public $team_id, $goodmother, $enrollment, $status, $description;
    public $teams;
    public $modalForm = false;

    use WithPagination;

    public function render()
    {
        $this->teams = Team::paginate(5);
        return view('livewire.teams.index', ['teams' => $this->teams, 'modalForm' => $this->modalForm]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->modalForm = true;
    }

    public function closeModal()
    {
        $this->modalForm = false;
    }

    private function resetInputFields()
    {
        $this->goodmother = '';
        $this->enrollment = '';
        $this->status = '';
        $this->description = '';
    }
}
