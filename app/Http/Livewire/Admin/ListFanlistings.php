<?php

namespace App\Http\Livewire\Admin;

use App\Models\Joined;
use Livewire\Component;
use Livewire\WithPagination;

class ListFanlistings extends Component
{
    use WithPagination;

    public string $class;

    public function render()
    {
        if ($this->class == 'joined') {
            $fanlistings = auth_collective()->joined()->paginate(8);
        } elseif ($this->class == 'owned') {
            // TODO: add owned class
        }

        return view('livewire.admin.list-fanlistings', [
            'fanlistings' => $fanlistings,
        ]);
    }

    public function approve(Joined $fl)
    {
        if ($fl->approved == false) {
            $fl->approved = true;
            $fl->save();
        }
    }
}
