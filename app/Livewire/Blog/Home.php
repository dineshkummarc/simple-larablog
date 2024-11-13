<?php

namespace App\Livewire\Blog;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class Home extends Component
{
    public $posts;
    public $categories;

    public $query;

    public function mount()
    {
        $this->posts = Post::query()
            ->published()
            ->with('category', 'user')
            ->limit(3)
            ->latest()
            ->get();

        $this->categories = Category::query()
            ->latest()
            ->get();
    }

    public function render()
    {
        return view('livewire.blog.home');
    }

    public function search()
    {
        $this->redirect('/blogs?search=' . $this->query);
    }
}
