<header class="masthead" style="background-image: url({{ $background ?? '' }})">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                {{ $slot }}
            </div>
        </div>
    </div>
</header>
