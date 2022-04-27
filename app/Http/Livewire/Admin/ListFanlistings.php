<?php

namespace App\Http\Livewire\Admin;

use App\Models\Joined;
use Livewire\Component;
use Livewire\WithPagination;

class ListFanlistings extends Component
{
    use WithPagination;

    public string $class;
    public string $searchTerm = '';

    public function mount($class)
    {
        $this->class = strtolower($class);
    }

    public function render()
    {
        $search      = '%' . $this->searchTerm . '%';
        $fanlistings = auth_collective()->{$this->class}()
                                        ->where('subject', 'like', $search)
                                        ->paginate(PER_PAGE);
        $fanlistings->load(['categories']);

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
