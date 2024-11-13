<?php

namespace App\Livewire\Blog;

use App\Models\Category;
use App\Models\Post;
use App\Settings\GeneralSettings;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class AllPost extends Component
{
    use WithPagination;

    public $settings;

    #[Url(except: '')]
    public string $search = '';

    #[Url(except: '')]
    public string $category = '';


    public $categories;


    public function mount()
    {
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
        return view('livewire.blog.all-post', [
            'posts' => Post::query()
                ->when($this->search, function (Builder $query) {
                    $query->where('title', 'like', '%' . $this->search . '%');
                    $query->orWhere('content', 'like', '%' . $this->search . '%');
                    return $query;
                })
                ->when($this->category, function (Builder $query) {
                    $categoryId = $this->categories->where('slug', $this->category)->pluck('id')->first();
                    $query->where('category_id', $categoryId);
                    return $query;
                })
                ->published()
                ->with('category', 'user')
                ->paginate(1)
        ])
            ->title($this->settings['site_name'] . ' - Blogs');
    }
}
