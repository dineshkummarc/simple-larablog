@props(['settings'])

<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}" wire:navigate>
                <h2>{{ $settings['site_name'] }}<em>.</em></h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('home') }}" wire:navigate>Home
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('blogs') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('blogs') }}" wire:navigate>Blog Entries</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
