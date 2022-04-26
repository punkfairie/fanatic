<?php

namespace App\Http\Livewire\Admin;

use App\Models\Joined;
use Illuminate\Pagination\LengthAwarePaginator;
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
        } else if ($this->class == 'owned') {
            //
        }

        return view('livewire.admin.list-fanlistings', [
            'fanlistings' => $fanlistings,
        ]);
    }
}
