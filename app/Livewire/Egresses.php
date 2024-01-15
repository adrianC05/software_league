<?php

namespace App\Livewire;

use App\Models\Egress;
use Livewire\Component;

class Egresses extends Component
{

    public $egress_id, $description, $value, $date;
    public $egresses, $modalForm = false;

    public function render()
    {
        $egresses = Egress::paginate(5);
        return view('livewire.egress.index', ['egresses' => $egresses]);
    }
}
