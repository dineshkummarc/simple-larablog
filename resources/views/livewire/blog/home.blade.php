<div>

    <!-- Header -->
    <x-header :settings="$settings" />

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
        <section class="page-heading" style="background-image: none">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content text-center">
                            <h4>Recent Posts</h4>
                            <h2 class="text-dark">Our Recent Blog Entries</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="blog-posts">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        <div class="row">
                            @forelse ($posts as $post)
                                <div class="col-lg-12" wire:key="{{ $post->slug }}">
                                    <div class="blog-post">
                                        <div class="blog-thumb">
                                            <img src="{{ asset('storage/' . $post->image) }}" alt=""
                                                style="height:350px;width:100%;object-fit:cover">
                                        </div>
                                        <div class="down-content">
                                            <span>{{ $post->category->name }}</span>
                                            <a href="{{ route('blogs.detail', $post) }}" wire:navigate>
                                                <h4>{{ $post->title }}</h4>
                                            </a>
                                            <ul class="post-info">
                                                <li><a href="javascript:void(0)">{{ $post->user->name }}</a></li>
                                                <li><a
                                                        href="javascript:void(0)">{{ $post->created_at->format('M d. Y') }}</a>
                                                </li>
                                            </ul>
                                            {!! $post->excerpt !!}
                                            <div class="post-options">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <ul class="post-share text-left">
                                                            <li><i class="fa fa-share-alt"></i></li>
                                                            <li><a href="#">Facebook</a>,</li>
                                                            <li><a href="#"> Twitter</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-lg-12">
                                    <h2>Sorry no post at the moment</h2>
                                </div>
                            @endforelse
                            <div class="col-lg-12">
                                <div class="main-button">
                                    <a href="{{ route('blogs') }}" wire:navigate>View All Posts</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sidebar-item search">
                                    <form id="search_form" wire:submit="search" class="d-flex">
                                        <input type="text" class="form-control" placeholder="type to search..."
                                            autocomplete="on" wire:model="query">
                                        <button type="submit" form="search_form" class="btn btn-primary ml-2"
                                            style="background: linear-gradient(to right, #007bff, #00c6ff); border: none; border-radius: 25px; padding: 10px 20px; box-shadow: 0 4px 15px rgba(0, 123, 255, 0.2);">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item categories">
                                    <div class="sidebar-heading">
                                        <h2>Categories</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            @forelse ($categories as $category)
                                                <li>
                                                    <a href="/blogs?category={{ $category->slug }}" wire:navigate>-
                                                        {{ $category->name }}</a>
                                                </li>
                                            @empty
                                                <li>No Categories</li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer Starts Here -->
    <x-footer :settings="$settings" />
</div>
