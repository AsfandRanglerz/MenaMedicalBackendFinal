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
            <div class="row mb-0 section-devision">
                @foreach($PostandPresentationOnes as $PostandPresentationOne)
                <div class="col-sm-7 px-sm-2 px-0">
                    <h4 class="primary-heading">{{ $PostandPresentationOne->title }}</h4>
                    <p class="mb-0 mt-4">
                        {!! nl2br(e($PostandPresentationOne->description)) !!}
                    </p>
                </div>
                <div class="d-none d-sm-block col-5">
                    <img src="{{ $PostandPresentationOne->image }}" class="w-100">
                </div>
                @endforeach
            </div>
            <div class="mt-3 section-devision">
                @foreach($PostandPresentationTwos as $PostandPresentationTwo)
                <h4 class="primary-heading">{{ $PostandPresentationTwo->feature_title }}</h4>
                <ul class="mt-4 listing-margin">
                    @foreach(explode("\n", $PostandPresentationTwo->feature) as $feature)
                    <li>{{ $feature }}</li>
                    @endforeach
                    <h6 class="my-3 heading">{{ $PostandPresentationTwo->service_title }}</h6>
                    @foreach(explode("\n", $PostandPresentationTwo->service) as $service)
                    <li>{{ $service }}</li>
                    @endforeach
                </ul>
                @endforeach
            </div>
            <div class="section-devision">
                @foreach($PostandPresentationThrees as $PostandPresentationThree)
                <h4 class="primary-heading">{{ $PostandPresentationThree->title }}</h4>
                <ul class="mt-4 listing-margin">
                    @foreach(explode("\n", $PostandPresentationThree->description) as $description)
                    <li>{{ $description }}</li>
                    @endforeach
                </ul>
                @endforeach
            </div>
            @foreach($PostandPresentationFours as $PostandPresentationFour)
            <p>{{ $PostandPresentationFour->description }}</p>
        @endforeach
        </div>
    </div>
</div>
<div class="section-devision">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="container-fluid">
                <h4 class="mb-lg-4 mb-3 text-center primary-heading">Pricing and Delivery Time</h4>
                <div class="mt-4 lang-table-section overflow-auto">
                    <div class="table-container">
                          <div class="p-3">
                            <p class="mb-2">
                                MENA Medical Research ensures price transparency for all its services. We ensure that you are aware of our service charges and make a fully informed decision before placing an order.
                            </p>
                        </div>
                        <!-- Table for big screen -->
                        {{-- <table class="d-none d-sm-block table-size">
                            <thead>
                                <tr class="category-header header-set">
                                    <th class="px-3 py-2 head-one font-600">Price Category</th>
                                    <th class="px-3 py-2 text-white font-600 text-center basic-column">Price</th>
                                    <th class="px-3 py-2 text-white font-600 text-center advanced-column">Delivery Time</th>
                                    <th class="text-white font-600 text-center premium-column">Select Service</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="t-line">
                                        Regular Price
                                    </td>
                                    <td>
                                        USD {{ $regularPowerPointPrice->less_equal_price ?? 'XXX' }}
                                    </td>
                                    <td>
                                        {{ $regularPowerPointPrice->delivery_days ?? 'X' }} days
                                    </td>
                                    <td>
                                        <a href="{{url('/poster-creation-service-form/Power-Point-Presentations')}}" style="text-decoration: none;" class="px-3 py-1 theme-btn-green">Get a Quote</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="t-line">
                                        Discounted Price for Researchers & Students in MENA Region
                                    </td>
                                    <td>
                                        USD {{ $discountedPowerPointPrice->less_equal_price ?? 'XXX' }}
                                    </td>
                                    <td>
                                        {{ $discountedPowerPointPrice->delivery_days ?? 'X' }} days
                                    </td>
                                    <td>
                                        <a href="{{url('/poster-creation-service-form/Power-Point-Presentations')}}" style="text-decoration: none;" class="px-3 py-1 theme-btn-green">Get a Quote</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table> --}}

                        <!-- Table for mobile screen -->
                        {{-- <table class="d-block d-sm-none table-size">
                            <thead>
                                <tr>
                                    <th colspan="3" class="px-3 py-2 head-one font-600">Price Category</th>
                                </tr>
                                <tr class="category-header header-set">
                                    <th class="py-2 text-white font-600 text-center ts-small basic-column">Price</th>
                                    <th class="px-3 py-2 text-white font-600 text-center text-nowrap ts-small advanced-column">Delivery Time</th>
                                    <th class="text-white font-600 text-center ts-small premium-column">Select Service</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3" class="text-center">
                                        Regular Price
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap">
                                        USD {{ $regularPowerPointPrice->less_equal_price ?? 'XXX' }}
                                    </td>
                                    <td>
                                        {{ $regularPowerPointPrice->delivery_days ?? 'X' }} days
                                    </td>
                                    <td>
                                        <a href="{{url('/poster-creation-service-form/Power-Point-Presentations')}}" style="text-decoration: none;" class="px-2 py-1 text-nowrap theme-btn-green">Get a Quote</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="t-line">
                                        Discounted Price for Researchers & Students in MENA Region
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        USD {{ $discountedPowerPointPrice->less_equal_price ?? 'XXX' }}
                                    </td>
                                    <td>
                                        {{ $discountedPowerPointPrice->delivery_days ?? 'X' }} days
                                    </td>
                                    <td>
                                        <a href="{{url('/poster-creation-service-form/Power-Point-Presentations')}}" style="text-decoration: none;" class="px-2 py-1 text-nowrap theme-btn-green">Get a Quote</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <p class="m-0 mt-1 font-500 small">*Days shown above are working days</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-devision">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="container-fluid">
                <h4 class="mb-lg-4 mb-3 text-center primary-heading">Pricing and Delivery Time for Posters</h4>
                <div class="mt-4 lang-table-section overflow-auto">
                    <div class="table-container">
                        <!-- Table for big screen -->
                        <table class="d-none d-sm-table table-size w-100">
    <thead>
        <tr class="category-header header-set">
            <th class="px-3 py-2 head-one font-600">Price Category</th>
            <th class="px-3 py-2 text-white font-600 text-center basic-column">Price</th>
            <th class="px-3 py-2 text-white font-600 text-center advanced-column">Delivery Time</th>
            <th class="px-3 py-2 text-white font-600 text-center premium-column">Select Service</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="t-line">
                Power Point Presentation Service
            </td>
            <td class="text-center">
                USD {{ $regularPosterPrice->less_equal_price ?? 'XXX' }}
            </td>
            <td class="text-center">
                {{ $regularPosterPrice->delivery_days ?? 'X' }} days
            </td>
            <td class="text-center">
                <a href="{{ url('/poster-creation-service-form/Power-Point-Presentations') }}"
                   class="px-3 py-1 theme-btn-green text-decoration-none">
                    Select
                </a>
            </td>
        </tr>
        <tr>
            <td class="t-line">
                Poster Creation Service
            </td>
            <td class="text-center">
                USD {{ $discountedposterPrice->less_equal_price ?? 'XXX' }}
            </td>
            <td class="text-center">
                {{ $discountedposterPrice->delivery_days ?? 'X' }} days
            </td>
            <td class="text-center">
                <a href="{{ url('/poster-creation-service-form/Posters') }}"
                   class="px-3 py-1 theme-btn-green text-decoration-none">
                    Select
                </a>
            </td>
        </tr>
    </tbody>
</table>


                        <!-- Table for small screen -->
                        <table class="d-block d-sm-none table-size">
                            <thead>
                                <tr>
                                    <th colspan="3" class="px-3 py-2 head-one font-600">Price Category</th>
                                </tr>
                                <tr class="category-header header-set">
                                    <th class="py-2 text-white font-600 text-center ts-small basic-column">Price</th>
                                    <th class="px-3 py-2 text-white font-600 text-center ts-small text-nowrap advanced-column">Delivery Time</th>
                                    <th class="text-white font-600 text-center ts-small premium-column">Select Service</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3" class="text-center">
                                        Power Point Presentation Service
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap">
                                        USD {{ $regularPosterPrice->less_equal_price ?? 'XXX' }}
                                    </td>
                                    <td>
                                        {{ $regularPosterPrice->delivery_days ?? 'X' }} days
                                    </td>
                                    <td>
                                        <a href="{{url('/poster-creation-service-form/Posters')}}" style="text-decoration: none;" class="text-nowrap px-2 py-1 theme-btn-green">Select</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-center">
                                        Poster Creation Service
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        USD {{ $discountedposterPrice->less_equal_price ?? 'XXX' }}
                                    </td>
                                    <td>
                                        {{ $discountedposterPrice->delivery_days ?? 'X' }} days
                                    </td>
                                    <td>
                                        <a href="{{url('/poster-creation-service-form/Posters')}}" style="text-decoration: none;" class="text-nowrap px-2 py-1 theme-btn-green">Select</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="m-0 mt-1 font-500 small">*Days shown above are working days</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="section-devision">
                @foreach ($HomeSectionFours as $HomeSectionFour)
                    <h4 class="text-center mb-lg-5 mb-3 primary-heading">{{ $HomeSectionFour->main_title }}</h4>
                @endforeach
                <div class="container-fluid">
                    <div class="d-flex justify-content-lg-center justify-content-center gap-3 gap-md-0 flex-wrap work-section">
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
                                <div class="d-sm-block d-none">
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
@include('common.components.commitments')
@include('common.components.faqs')
@include('common.components.trusted_by')
@endsection

@section('script')
<script></script>
@endsection
