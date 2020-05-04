<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Blog\Repositories\PostRepository;

class PostList extends Component
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
     * Suppression d'un article.
     *
     * @param  int  $id
     * @throws \Exception
     */
    public function delete(int $id)
    {
        $post = (new PostRepository())->getById($id);

        if ($post) {
            $post->delete();
        }
    }

    public function render()
    {
        $posts = (new PostRepository())
            ->orderBy('title', $this->direction)
            ->where('title', '%'. $this->search .'%', 'like')
            ->paginate(10);

        return view('livewire.post-list', compact('posts'));
    }
}
