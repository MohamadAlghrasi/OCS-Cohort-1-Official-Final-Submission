<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tutor;
use Livewire\WithPagination;

class TutorSearch extends Component
{
    use WithPagination;

    public $search = '';
    
    protected $paginationTheme = 'bootstrap'; 

    public function updated($propertyName)
    {
        if ($propertyName === 'search') {
            $this->resetPage();
        }
    }

  public function render()
{
    $tutors = Tutor::query()
        ->whereHas('user', function ($q) {
            $q->whereNull('deleted_at'); 
        })
        ->when($this->search, function ($query) {
            $query->whereHas('user', function ($q) {
                $q->where('name', 'like', '%'.$this->search.'%');
            })
            ->orWhereHas('subjects', function ($q) {
                $q->where('name', 'like', '%'.$this->search.'%');
            });
        })
        ->with(['user', 'subjects'])
        ->paginate(6);

    return view('livewire.tutor-search', [
        'tutors' => $tutors
    ]);
}

}