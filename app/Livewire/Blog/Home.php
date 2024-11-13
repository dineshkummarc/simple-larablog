<?php

namespace App\Livewire\Blog;

use App\Models\Category;
use App\Models\Post;
use App\Settings\GeneralSettings;
use Livewire\Component;

class Home extends Component
{
    public $settings;
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

        $this->settings = [
            'site_name' => (new GeneralSettings())->site_name,
            'socials' => (new GeneralSettings())->socials,
        ];
    }

    public function render()
    {
        return view('livewire.blog.home')
            ->title($this->settings['site_name']);
    }

    public function search()
    {
        $this->redirect('/blogs?search=' . $this->query);
    }
}
