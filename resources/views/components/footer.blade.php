@props(['settings'])

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="social-icons">
                    @foreach ($settings['socials'] as $social)
                        <li><a href="{{ $social['url'] }}">{{ $social['website'] }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="copyright-text">
                    <p>Copyright 2024 {{ $settings['site_name'] }}.

                        | Design: <a rel="nofollow" href="https://templatemo.com" target="_parent">TemplateMo</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
