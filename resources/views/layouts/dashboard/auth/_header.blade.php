<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item">
                    <a class="navbar-brand" href="index.html">
{{--
                        {!! Flasher::render() !!}
--}}
                        <img class="brand-logo" alt="modern admin logo" src="{{asset("assets")}}/images/logo/logo.png">

                        <h3 class="brand-text">E-commerce</h3>

                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container">
            <div class="collapse navbar-collapse justify-content-end" id="navbar-mobile">
                <ul class="nav navbar-nav">

                    <li class="dropdown dropdown-language nav-item">
                        <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                            <i class="flag-icon @if(LaravelLocalization::getCurrentLocale() == 'en') flag-icon-gb @else  flag-icon-eg @endif"></i>
                            <span class="selected-language"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a rel="alternate" class="dropdown-item" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    <i class="flag-icon @if($localeCode == 'en') flag-icon-gb @else  flag-icon-eg @endif"></i> {{ $properties['native'] }}
                                </a>
                            @endforeach
                        </div>
                    </li>

                    <li class="nav-item"><a class="nav-link mr-2 nav-link-label" href="index.html"><i class="ficon ft-arrow-left"></i></a></li>

                    <li class="dropdown nav-item">
                        <a class="nav-link mr-2 nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-settings"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
