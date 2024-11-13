<?php

namespace App\Livewire\Blog;

use App\Models\Category;
use App\Models\Post;
use App\Settings\GeneralSettings;
use Livewire\Component;

class DetailPost extends Component
{
    public $settings;

    public $post;
    public $posts;
    public $categories;

    public function mount(Post $post)
    {
        $this->post = $post
            ->load('category', 'user');

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
        return view('livewire.blog.detail-post')
            ->title($this->settings['site_name'] . ' - ' . $this->post->title);
    }
}
