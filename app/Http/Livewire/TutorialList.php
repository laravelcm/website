<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Tutorial\Repositories\TutorialRepository;

class TutorialList extends Component
{
    use WithPagination;

    /**
     * @var string
     */
    public $search = '';

    /**
     * @var string
     */
    public $direction = 'asc';

    public $category_id = null;

    /**
     * Pagination Livewire.
     *
     * @return string
     */
    public function paginationView()
    {
        return 'components.wire-pagination-links';
    }

    /**
     * Reorganisation par ordre alphabetique.
     *
     * @param  string  $direction
     */
    public function toggleDirection($direction)
    {
        $this->direction = $direction === 'asc' ?  'desc': 'asc';
    }

    /**
     * Suppression d'un tutoriel.
     *
     * @param  int  $id
     * @throws \Exception
     */
    public function delete(int $id)
    {
        $tutorial = (new TutorialRepository())->getById($id);

        if ($tutorial) {
            $tutorial->delete();
        }
    }

    public function render()
    {
        $tutorials = (new TutorialRepository())
            ->orderBy('title', $this->direction)
            ->where('title', '%'. $this->search .'%', 'like')
            ->paginate(10);

        return view('livewire.tutorial-list', compact('tutorials'));
    }
}
