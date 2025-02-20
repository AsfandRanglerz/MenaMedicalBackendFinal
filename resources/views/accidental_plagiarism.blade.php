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
                    @foreach ($AccidentalPlagiarisms as $AccidentalPlagiarism)
                    <div class="col-sm-7 px-sm-2 px-0">
                        <h4 class="primary-heading">{{ $AccidentalPlagiarism->title }}</h4>
                        <p class="mb-0 mt-4">
                            {!! nl2br(e($AccidentalPlagiarism->description)) !!}</p>
                    </div>
                    <div class="d-none d-sm-block col-5">
                        <img src="{{ $AccidentalPlagiarism->image }}" class="w-100">
                    </div>
                    @endforeach
                </div>
                <div class="section-devision">
                    <h4 class="mb-lg-4 mb-3 text-center primary-heading">Pricing and Delivery Time</h4>
                    <div class="mt-2 lang-table-section overflow-auto">
                        <div class="table-container">
                            <!-- Table for big screen -->
                            <table class="d-none d-sm-block table-size">
                                <thead>
                                    <tr class="category-header">
                                        <th class="px-3 py-2 head-one font-600">Price Category</th>
                                        <th class="text-white font-600 text-center basic-column">Price</th>
                                        <th class="text-white font-600 text-center advanced-column">Delivery Time
                                        </th>
                                        <th class="text-white font-600 text-center premium-column">Select Service
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="t-line">
                                            Regular Price
                                        </td>
                                        <td>
                                            USD {{ $regularPrice->less_equal_price ?? 'XXX' }}
                                        </td>
                                        <td>
                                            {{ $regularPrice->delivery_days ?? 'X' }} days
                                        </td>
                                        <td>
                                            <a href="{{url('/accidental-plagiarism-form')}}" class="px-3 py-1 theme-btn-green" style="text-decoration: none;">Get a Quote</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="t-line">
                                            Discounted Price for Researchers & Students in MENA Region
                                        </td>
                                        <td>
                                            USD {{ $discountedPrice->less_equal_price ?? 'XXX' }}
                                        </td>
                                        <td>
                                            {{ $discountedPrice->delivery_days ?? 'X' }} days
                                        </td>
                                        <td>
                                            <a href="{{url('/accidental-plagiarism-form')}}" class="px-3 py-1 theme-btn-green" style="text-decoration: none;">Get a Quote</a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>

                            <!-- Table for mobile screen -->
                            <table class="d-block d-sm-none table-size">
                                <thead>
                                    <tr>
                                        <th colspan="3" class="px-3 py-2 head-one font-600">Price Category</th>
                                    </tr>
                                    <tr class="category-header">
                                        <th class="py-2 text-white font-600 text-center ts-small basic-column">Price</th>
                                        <th class="text-white font-600 text-center ts-small advanced-column">Delivery Time
                                        </th>
                                        <th class="text-white font-600 text-center ts-small premium-column">Select Service
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            Regular Price
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            USD {{ $regularPrice->less_equal_price ?? 'XXX' }}
                                        </td>
                                        <td style="width: 35%;">
                                            {{ $regularPrice->delivery_days ?? 'X' }} days
                                        </td>
                                        <td>
                                            <a href="{{url('/accidental-plagiarism-form')}}" class="text-nowrap px-1 py-1 theme-btn-green" style="text-decoration: none;">Get a Quote</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            Discounted Price for Researchers & Students in MENA Region
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            USD {{ $discountedPrice->less_equal_price ?? 'XXX' }}
                                        </td>
                                        <td style="width: 35%;">
                                            {{ $discountedPrice->delivery_days ?? 'X' }} days
                                        </td>
                                        <td>
                                            <a href="{{url('/accidental-plagiarism-form')}}" class="text-nowrap px-1 py-1 theme-btn-green" style="text-decoration: none;">Get a Quote</a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <p class="m-0 mt-1 font-500 small">*Price for Plagiarism Check displayed above is for up to 6,000 words. There will be a customized charge for longer documents.</p>
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
