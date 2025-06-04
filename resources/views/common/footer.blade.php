<footer>
    <p class="p-3 mb-0 text-center main-desc">MENA MEDICAL RESEARCH – Supporting Biosciences Research from the MENA Region</p>
    <div class="py-4 container-fluid center-content">
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        @foreach($FooterContentOnes as $FooterContentOne)
                        <h6 class="heading">{{ $FooterContentOne->heading }}</h6>
                        <p class="mb-lg-0">{{ $FooterContentOne->content }}</p>
                        @endforeach
                        <ul class="mb-0 list">
                            <li class="d-inline-block me-1">
                                <a href="{{url('/privacy-policy')}}" class="info-link">Privacy Policy</a>
                            </li>
                            <li class="d-inline-block me-1">
                                <a href="{{url('/term-condition')}}" class="info-link">Term & Conditions</a>
                            </li>
                            <li class="d-inline-block">
                                <a href="{{url('/contact-us')}}" class="info-link">Contact Us</a>
                            </li>
                        </ul>
                        {{-- <br> --}}
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-3">

                                <div class="list-holder">
                                    <h6 class="heading">Services <span class="fa fa-angle-down pull-right d-md-none down-arrow"></span></h6>
                                    @foreach($Services as $Service)
                                    <ul class="mb-0 list">
                                        <li><a href="{{ $Service->url }}">{{ $Service->text }}</a></li>
                                    </ul>
                                    @endforeach
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="list-holder">
                                    <h6 class="heading">Journals <span class="fa fa-angle-down pull-right d-md-none down-arrow"></span></h6>
                                    @foreach($Journals as $Journal)
                                    <ul class="mb-0 list">
                                        <li><a href="{{ $Journal->url }}">{{ $Journal->text }}</a></li>
                                    </ul>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="list-holder">
                                    <h6 class="heading">News <span class="fa fa-angle-down pull-right d-md-none down-arrow"></span></h6>
                                    @foreach ($News as $New)
                                    <ul class="mb-0 list">
                                        <li><a href="{{ $New->url }}">{{ $New->text }}</a></li>
                                    </ul>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="list-holder prof-holder">
                                    <h6 class="heading">Profiles <span class="fa fa-angle-down pull-right d-md-none down-arrow"></span></h6>
                                    @foreach($Profiles as $Profile)
                                    <ul class="mb-0 list">
                                        <li><a href="{{ $Profile->url }}">{{ $Profile->text }}</a></li>
                                    </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-3 container-fluid bottom-content">
      <div class="container-fluid">
    <div class="row mx-0">
        @foreach($SocialLinks as $SocialLink)
            @if(empty($SocialLink->icon && $SocialLink->url && $SocialLink->class))
                <div class="col-sm-8">
                    <p class="mb-0 text-sm-start text-center">{{ $SocialLink->text }}</p>
                </div>
            @endif
        @endforeach

        <div class="mt-sm-0 mt-2 col-sm-4">
            <div class="d-flex justify-content-sm-start justify-content-center social-media">
                @foreach($SocialLinks as $SocialLink)
                    @if(!empty($SocialLink->icon && $SocialLink->url && $SocialLink->class))
                        <a href="{{ $SocialLink->url }}" class="{{ $SocialLink->class}}" target="_blank">
                            <span class="{{ $SocialLink->icon }}"></span>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
    <div id="goUp" class="position-fixed arrow-up-div">
        <span class="p-2 bg-blue">
            <img src="{{ asset('public/assets/images/Path7.png') }}" class="arrow-up" />
        </span>
    </div>
</footer>
