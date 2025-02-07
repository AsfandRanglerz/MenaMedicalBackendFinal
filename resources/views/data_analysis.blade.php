@extends('layout.master')

@section('title', $seo_data['title'])
@section('og_title', $seo_data['og_title'])
@section('description', $seo_data['description'])
@section('og_description', $seo_data['og_description'])
@section('keywords', $seo_data)
<style>
    .trusted-by .heading, .trusted-by small {
        display: none;
    }
    .trusted-by small + .slick-slider {
        margin-top: 0!important;
    }
</style>

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row section-devision">
                @foreach($DataAnalysisServiceOnes as $DataAnalysisServiceOne)
                <div class="col-sm-7 px-sm-2 px-0">
                    <h4 class="primary-heading">{{ $DataAnalysisServiceOne->title }}</h4>
                    <p class="mb-0 mt-4">
                        {!! nl2br (e($DataAnalysisServiceOne->description)) !!}
                    </p>
                    <ul class="mt-4 primary-heading listing-margin">
                        @foreach(explode("\n", $DataAnalysisServiceOne->link_text) as $link_text)
                        <li>{{ $link_text }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="d-none d-sm-block col-5">
                    <img src="{{ $DataAnalysisServiceOne->image }}" class="w-100">
                </div>
                @endforeach
            </div>
            <div class="section-devision">
                @foreach ($DataAnalysisServiceTwos as $DataAnalysisServiceTwo)
                <h4 class="primary-heading">{{ $DataAnalysisServiceTwo->feature_title }}</h4>
                <ul class="mt-4 listing-margin">
                    @foreach(explode("\n", $DataAnalysisServiceTwo->feature) as $feature)
                    <li>{{ $feature }}</li>
                    @endforeach
                </ul>
                @endforeach
            </div>
            <div class="section-devision">
                @foreach($DataAnalysisServiceThrees as $DataAnalysisServiceThree)
                <h4 class="primary-heading">{{ $DataAnalysisServiceThree->feature_title }}</h4>
                <ul class="mt-4 listing-margin">
                    @foreach(explode("\n", $DataAnalysisServiceThree->feature) as $feature)
                    <li>{{ $feature }}</li>
                  @endforeach
                    <h6 class="my-3 heading">{{ $DataAnalysisServiceThree->service_title }}</h6>
                    @foreach(explode("\n", $DataAnalysisServiceThree->service) as $service)
                    <li>{{ $service }}</li>
                    @endforeach
                </ul>
                @endforeach
            </div>
            <div class="section-devision">
                <div class="overflow-auto lang-table-section">
                    <table class="edit-table">
                        <thead>
                            <tr class="table-heading">
                                <th class="py-2 px-3 large-column">Data Analysis Components</th>
                                <th class="heading-two">Advanced Data Analysis</th>
                                <th class="heading-three">Premium Data Analysis</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-2 px-3 large-column">Research study design</td>
                                <td class="text-center">
                                    <img src="{{ asset('public/assets/images/Path 21.png') }}" class="tick-cross">
                                </td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                        class="tick-cross"></td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 large-column">Defining appropriate statistical tests</td>
                                <td class="text-center">
                                    <img src="{{ asset('public/assets/images/Path 21.png') }}" class="tick-cross">
                                </td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                        class="tick-cross"></td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 large-column">Data cleanup</td>
                                <td class="text-center">
                                    <img src="{{ asset('public/assets/images/Path 23.png') }}" class="tick-cross">
                                </td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                        class="tick-cross"></td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 large-column">Data analysis</td>
                                <td class="text-center">
                                    <img src="{{ asset('public/assets/images/Path 23.png') }}" class="tick-cross">
                                </td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                        class="tick-cross"></td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 large-column">Result interpretation</td>
                                <td class="text-center">
                                    <img src="{{ asset('public/assets/images/Path 23.png') }}" class="tick-cross">
                                </td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                        class="tick-cross"></td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 large-column">Statistical methodology write-up</td>
                                <td class="text-center">
                                    <img src="{{ asset('public/assets/images/Path 23.png') }}" class="tick-cross">
                                </td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                        class="tick-cross"></td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 large-column">Result write-up</td>
                                <td class="text-center">
                                    <img src="{{ asset('public/assets/images/Path 23.png') }}" class="tick-cross">
                                </td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                        class="tick-cross"></td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 large-column">Well designed tables and figures</td>
                                <td class="text-center">
                                    <img src="{{ asset('public/assets/images/Path 23.png') }}" class="tick-cross">
                                </td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                        class="tick-cross"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="section-devision">
                <div class="overflow-auto lang-table-section">
                    <div class="table-container">
                        <table class="table-size">
                            <thead>
                                <tr class="category-header">
                                    <th class="px-3 py-2 head-one font-600">Price</th>
                                    <th class="px-3 py-2 text-white font-600 text-center basic-column">Advanced Data Analysis</th>
                                    <th class="px-3 py-2 text-white font-600 text-center advanced-column">Premium Data Analysis
                                    </th>
                                    {{-- <th class="text-white font-600 text-center premium-column">Select Service
                                    </th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="t-line">
                                        Regular Price
                                    </td>
                                    <td>
                                        USD {{ $regularPriceAdvanceData->less_equal_price ?? 'XXX' }} in {{ $regularPriceAdvanceData->delivery_days ?? 'X' }} days
                                    </td>
                                    <td>
                                        USD {{ $regularPricePremiumData->less_equal_price ?? 'XXX' }} in {{ $regularPricePremiumData->delivery_days ?? 'X' }} days
                                    </td>
                                    {{-- <td>
                                        <a href="{{url('/data-analysis-service-form')}}" style="text-decoration: none;" class="px-3 py-1 theme-btn-green">Get a Quote</a>
                                    </td> --}}
                                </tr>
                                <tr>
                                    <td class="t-line">
                                        Discounted Price for Researchers & Students in MENA Region
                                    </td>
                                    <td>
                                        USD {{ $discountedPriceAdvanceData->less_equal_price ?? 'XXX' }} in {{ $discountedPriceAdvanceData->delivery_days ?? 'X' }} days
                                    </td>
                                    <td>
                                        USD {{ $discountedPricePremiumData->less_equal_price ?? 'XXX' }} in {{ $discountedPricePremiumData->delivery_days ?? 'X' }} days
                                    </td>
                                    {{-- <td>
                                        <a href="{{url('/data-analysis-service-form')}}" style="text-decoration: none;" class="px-3 py-1 theme-btn-green">Get a Quote</a>
                                    </td> --}}
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        <a href="{{url('/data-analysis-service-form/Advance')}}" style="text-decoration: none;" class="px-3 py-1 theme-btn-green">Get a Quote</a>
                                    </td>
                                    <td>
                                        <a href="{{url('/data-analysis-service-form/Premium')}}" style="text-decoration: none;" class="px-3 py-1 theme-btn-green">Get a Quote</a>
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
@include('common.components.commitments')
@include('common.components.faqs')
@include('common.components.trusted_by')

@endsection

@section('script')
<script></script>
@endsection
