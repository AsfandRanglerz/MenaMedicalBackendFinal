<header>
    <div class="container-fluid">
        <div class="px-lg-4 pt-3 pb-2 row">
            @php
                $logo = App\Models\Logo::first();
            @endphp
            <div class="col-lg-6 d-flex align-items-center justify-content-lg-start justify-content-between">
                    <a class="py-0 d-inline-block navbar-brand" href="{{ url('/') }}"><img src="{{ asset($logo->logo) }}" class="web-logo" /></a>
                    <div>
                        <div class="d-sm-block d-none minor-links">
                            @php
                                $data = App\Models\HeaderContentOne::whereNotNull('icon')
                                  ->whereNotNull('url')
                                  ->get();
                                $editingService = App\Models\HeaderContentOne::where('icon',null)
                                // ->where('url',null)
                                ->first();
                            @endphp
                            @foreach($data as $content)
                                <a href="{{$content->url}}" @if(Str::contains($content->url, 'journal')) target="_blank" @endif><img src="{{ asset($content->icon) }}" class="me-1" /><span>{{$content->text}}</span></a>
                            @endforeach
                                {{-- <a href="#"><img src="{{ asset('public/assets/images/envelope-icon.png') }}" class="me-1" /><span>Contact Us</span></a> --}}
                            {{-- <a href="#"><img src="{{ asset('public/assets/images/basket-icon.png') }}" class="me-1" /><span>Order a Service</span></a>
                            <a href="#"><img src="{{ asset('public/assets/images/cloud-upload-icon.png') }}" class="me-1" /><span>Submit an Article</span></a> --}}
                        </div>
                        @php
                            use Illuminate\Support\Str;
                        @endphp
                        @if (!(request()->url() == url('/') || request()->url() == url('/journal')))
                            <h3 class="mt-sm-1 mt-0 mb-0 heading">
                                EDITING SERVICES
                            </h3>
                        @else
                            <h3 class="mt-sm-1 mt-0 mb-0 heading">
                                {{ Str::contains(request()->url(), 'journal') ? 'JOURNALS' : $editingService->text }}
                            </h3>
                        @endif
                    </div>
                <button class="d-lg-none d-block navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>
            </div>
            <div class="col-lg-6">
                <div class="d-sm-none d-block text-lg-start text-center minor-links">
                    <a href="#"><img src="{{ asset('public/assets/images/envelope-icon.png') }}" class="me-1" /><span>Contact Us</span></a>
                    <a href="#"><img src="{{ asset('public/assets/images/unlock-icon.png') }}" class="me-1" /><span>Order a Service</span></a>
                    <a href="#"><img src="{{ asset('public/assets/images/upload-square-black-icon.png') }}" class="me-1" /><span>Submit an Article</span></a>
                </div>
                <div class="mb-lg-2 mt-lg-0 my-2 text-lg-end text-center module-links">
                    @php
                        $headerTwo = App\Models\HeaderContentTwo::where('status',0)->whereNotNull('text')
                        ->whereNotNull('url')
                        ->where('id','!=',7)
                        ->get();
                    @endphp
                    @foreach($headerTwo as $content)
                    <a href="{{ asset($content->url) }}"
                        @if(Str::contains($content->url, 'journal')) target="_blank" @endif>
                        {{ $content->text }}
                        </a>

                    @endforeach
                    {{-- <a href="{{ url('journals') }}">Journals</a>
                    <a href="#">News</a>
                    <a href="#">Profiles</a> --}}
                </div>
                @php
                    // $text = App\Models\HeaderContentTwo::where('status',0)->whereNull('url')->first();
                    $text = App\Models\HeaderContentTwo::find(7);
                @endphp
                <p class="text-lg-end text-center mb-0">{{$text->text}}</p>
            </div>
        </div>
    </div>
    <nav class="container-fluid navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="justify-content-between w-100 navbar-nav mb-0">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('scientific-editing') ? 'active' : '' }}" aria-current="page" href="{{ url('scientific-editing') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('language-editing*') ? 'active' : '' }}" href="{{ url('language-editing') }}">Language Editing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('scientific-editing-service*') ? 'active' : '' }}" href="{{ url('scientific-editing-service') }}">Scientific Editing</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ Request::is('accidental-plagiarism*') ||  Request::is('manuscript-formatting-service*') ? 'active' : '' }}" id="PublicationDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Publication Support
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="publicationDropdown">
                                <li><a class="dropdown-item {{ Request::is('accidental-plagiarism*') ? 'active' : '' }}" href="{{ url('accidental-plagiarism') }}">Accidental Plagiarism</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item {{ Request::is('manuscript-formatting-service*') ? 'active' : '' }}" href="{{ url('manuscript-formatting-service') }}">Manuscript Formatting Service</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('poster-creation-service*') ? 'active' : '' }}" href="{{ url('poster-creation-service') }}">Posters & Presentations</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ Request::is('thesis-editing-service*') ||  Request::is('assignment-editing-service*') ? 'active' : '' }}" id="thesisDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Thesis Support
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="thesisDropdown">
                                <li><a class="dropdown-item {{ Request::is('assignment-editing-service*') ? 'active' : '' }}" href="{{ url('assignment-editing-service') }}">Assignment Editing Service</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item {{ Request::is('thesis-editing-service*') ? 'active' : '' }}" href="{{ url('thesis-editing-service') }}">Thesis Editing Service</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('data-analysis*') ? 'active' : '' }}" href="{{ url('data-analysis') }}">Data Analysis</a>
                        </li>
                        <li class="nav-item text-sm-start text-center">
                            <a href="{{ url('place-order') }}" class="btn theme-btn">Place Order</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    {{-- @php
    $navbarItems = App\Models\NavBar::with('navItems')->get();
  @endphp

  @if ($navbarItems->isNotEmpty())
  <nav class="container-fluid navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="justify-content-between w-100 navbar-nav mb-0">
                    @foreach ($navbarItems as $item)
                        @if ($item->is_dropdown)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ Route::currentRouteName() == $item->route_name ? 'active' : '' }}" id="dropdownMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ $item->text }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                                    @foreach ($item->navItems as $dropdownItem)
                                        <li><a class="dropdown-item {{ Route::currentRouteName() == $dropdownItem->route_name ? 'active' : '' }}" href="{{ route($dropdownItem->route_name) }}">{{ $dropdownItem->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == $item->route_name ? 'active' : '' }}" href="{{ route($item->route_name) }}">{{ $item->text }}</a>
                            </li>
                        @endif
                    @endforeach
                    <li class="nav-item text-sm-start text-center">
                        <a href="" class="btn theme-btn">Place Order</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav> --}}

  {{-- @endif --}}


</header>
