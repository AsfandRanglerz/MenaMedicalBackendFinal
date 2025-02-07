@extends('layout.master')

@section('title', $seo_data['title'])
@section('og_title', $seo_data['og_title'])
@section('description', $seo_data['description'])
@section('og_description', $seo_data['og_description'])
@section('keywords', $seo_data)

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row section-devision">
                @foreach ($HomeSectionOnes as $HomeSectionOne )
                <div class="col-sm-7 px-sm-2 px-0">
                    <h4 class="primary-heading">{{ $HomeSectionOne->title }}</h4>
                    <p class="mb-0 mt-4">{!! nl2br(e($HomeSectionOne->description)) !!}</p>
                </div>
                <div class="d-none d-sm-block col-5">
                    <img src="{{ $HomeSectionOne->image }}" class="w-100">
                    <div class="p-3 text-white font-500 bg-blue">
                        <p class="mb-0">{{ $HomeSectionOne->image_description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="section-devision">
                @foreach ($HomeSections as $HomeSection )
                @if(empty($HomeSection->image && $HomeSection->title && $HomeSection->description && $HomeSection->link && $HomeSection->link_text ))
                <h4 class="text-center mb-lg-5 mb-3 primary-heading">{{ $HomeSection->main_title }}</h4>
                @endif
                @endforeach
                <div>
                    <div class="overflow-auto">
                        <div class="row mx-0 gy-4 services-section">
                            @foreach ($HomeSections as $HomeSection )
                            @if(!empty($HomeSection->title ))
                            <div class="col-md-6 col">
                                <div class="d-flex flex-md-row flex-column gap-3 align-items-md-start align-items-center service-item">
                                    <div>
                                        <div class="rounded-circle d-flex justify-content-center align-items-center bg-blue image-blue-background">
                                            <img src="{{ asset($HomeSection->image) }}" alt="Icon" class="image">
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="heading">{{ $HomeSection->title }}</h6>
                                        <p class="mb-1">{{ $HomeSection->description }}</p>
                                        <a href="{{ $HomeSection->link }}" class="">{{ $HomeSection->link_text }}</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('common.components.trusted_by')

<div class="container-fluid">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="section-devision">
                @foreach ($HomeSectionFours as $HomeSectionFour)
                    <h4 class="text-center mb-lg-5 mb-3 primary-heading">{{ $HomeSectionFour->main_title }}</h4>
                @endforeach
                <div class="container-fluid">
                    <div class="d-flex justify-content-lg-between justify-content-start overflow-auto work-section">
                        @php
                            // Filter only valid items (with title, image, and description)
                            $filteredItems = $HomeSectionFours->filter(function ($item) {
                                return !empty($item->title) && !empty($item->image) && !empty($item->description);
                            });
                            $filteredItems = $filteredItems->values(); // Reindex array for accurate loop indexing
                        @endphp

                        @foreach ($filteredItems as $index => $item)
                            <div class="d-flex flex-column align-items-center gap-3 work-section-item">
                                <img src="{{ $item->image }}" alt="">
                                <div class="text-center content">
                                    <h6>{{ $item->title }}</h6>
                                    <p class="m-0 mt-3">{{ $item->description }}</p>
                                </div>
                            </div>
                            <!-- Only show the arrow if it's not the last item -->
                            @if ($index < $filteredItems->count() - 1)
                                <div>
                                    <img src="{{ asset('public/assets/images/arrow.png') }}" alt="" class="arrow">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-4 grey-bg comitment-section">
    <div class="container-fluid">
        <div class="text-center">
            @foreach ($HomeSectionFives as $HomeSectionFive)
            @if(empty($HomeSectionFive->colour && $HomeSectionFive->title && $HomeSectionFive->image && $HomeSectionFive->description ))
            <img src="{{ $HomeSectionFive->main_image }}" class="comit-image">

            <h4 class="text-center mt-lg-4 mt-3 mb-0 primary-heading">{{ $HomeSectionFive->main_title }}</h4>
            @endif
            @endforeach
            <div class="mt-lg-4 mt-3 row gap-3 gap-sm-0 justify-content-between">
                @foreach ($HomeSectionFives as $HomeSectionFive)
                @if(!empty($HomeSectionFive->colour && $HomeSectionFive->title && $HomeSectionFive->image && $HomeSectionFive->description))
                <div class="col-sm-4 col-lg-3">
                    <div class="p-0 bg-white h-100">
                        <div class="p-0 py-2 commit-box-heading {{ $HomeSectionFive->colour }}">
                            <p class="mb-0">{{ $HomeSectionFive->title }}</p>
                        </div>
                        <div class="text-center p-4">
                            <img src="{{ $HomeSectionFive->image }}" class="commit-card-image">
                            <p class="mb-0 mt-4">
                                @php
                                $descriptionLines = explode("\n", $HomeSectionFive->description);
                                @endphp
                                @foreach ($descriptionLines as $line)
                                {{ $line }}<br>
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script></script>
@endsection
