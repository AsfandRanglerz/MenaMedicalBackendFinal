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
                @foreach($AssignmentEditingServiceOnes as $AssignmentEditingServiceOne)
                <div class="col-sm-7 px-sm-2 px-0">
                    <h4 class="primary-heading">{{ $AssignmentEditingServiceOne->title }}</h4>
                    <p class="mb-0 mt-4">
                        {!! nl2br(e($AssignmentEditingServiceOne->description)) !!}
                    </p>
                    <div class="section-devision">
                        <h4 class="primary-heading">{{ $AssignmentEditingServiceOne->feature_title }}</h4>
                        <ul class="mt-4 listing-margin">
                             @foreach(explode("\n", $AssignmentEditingServiceOne->feature) as $feature)
                        <li>{{ $feature }}</li>
                    @endforeach
                            <h6 class="my-3 heading">{{ $AssignmentEditingServiceOne->service_title }}</h6>
                            @foreach(explode("\n", $AssignmentEditingServiceOne->service) as $service)
                            <li>{{ $service }}</li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                <div class="d-none d-sm-block col-5">
                    <img src="{{ $AssignmentEditingServiceOne->image }}" class="w-100">
                </div>
                @endforeach
            </div>
            <div class="section-devision">
                <h4 class="mb-lg-4 mb-3 text-center primary-heading">Pricing and Delivery Time</h4>
                <div class="mt-4 lang-table-section overflow-auto">
                    <div class="table-container">
                        <div class="p-3">
                            <p class="mb-2">
                                MENA Medical Research has a transparent pricing policy. We ensure that you are aware of our service charges and make a fully informed decision before placing an order.
                            </p>
                            <p class="mb-0">
                                Price and Delivery Time depend on the word count of your document. You can find the estimated price before submitting your request for work.
                            </p>
                            <form action="{{ url('/assignment-editing-service-form') }}" method="get" class="mt-3">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn theme-btn-green px-4 py-2" style="text-decoration: none;">
                                        Get Price Estimate
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- Table for big screen -->
                        {{-- <table class="d-none d-sm-block table-size">
                            <thead>
                                <tr>
                                    <th colspan="4" class="header">
                                        <div class="d-flex align-items-center justify-content-between px-3 py-2">
                                            <label for="wordCount" class="font-600">Enter Word
                                                Count</label>
                                            <div class="d-flex align-items-center gap-3">
                                                <input type="text" id="wordCount" class="py-1">
                                                <button class="px-3 py-1 theme-btn-green" id="showPrice">Calculate Price</button>
                                            </div>
                                        </div>

                                    </th>
                                </tr>
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
                                    <td>USD xxx</td>
                                    <td>XX days</td>
                                    <td><a href="{{url('/assignment-editing-service-form')}}" style="text-decoration:none;" class="px-3 py-1 theme-btn-green">Get a Quote</a></td>
                                </tr>
                                <tr>
                                    <td class="t-line">
                                        Discounted Price for Researchers & Students in MENA Region
                                    </td>
                                    <td>USD xxx</td>
                                    <td>XX days</td>
                                    <td><a href="{{url('/assignment-editing-service-form')}}" style="text-decoration:none;" class="px-3 py-1 theme-btn-green">Get a Quote</a></td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Table for mobile screen -->
                        <table class="d-block d-sm-none table-size">
                            <thead>
                                <tr>
                                    <th colspan="4" class="header">
                                        <div class="d-flex flex-column align-items-center justify-content-between px-3 py-2">
                                            <label for="wordCount2" class="font-600">Enter Word
                                                Count</label>
                                            <div class="d-flex align-items-center gap-3">
                                                <input type="text" id="wordCount2" class="py-0 w-50">
                                                <button style="font-size: 0.9rem;" class="px-2 py-1 theme-btn-green"
                                                        id="showPrice2">Calculate
                                                        Price</button>
                                            </div>
                                        </div>

                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="3" class="px-3 py-2 head-one font-600">Price Category</th>
                                </tr>
                                <tr class="category-header">
                                    <th class="py-2 text-white font-600 text-center ts-small basic-column">Price</th>
                                    <th class="text-white font-600 text-center ts-small text-nowrap advanced-column">Delivery Time
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
                                    <td id="regular-price2">USD xxx</td>
                                    <td id="regular-delivery2">XX days</td>
                                    <td><a href="{{url('/assignment-editing-service-form')}}" style="text-decoration:none;" class="px-2 text-nowrap py-1 theme-btn-green">Get a Quote</a></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-center">
                                        Discounted Price for Researchers & Students in MENA Region
                                    </td>
                                </tr>
                                <tr>
                                    <td id="discounted-price2">USD xxx</td>
                                    <td id="discounted-delivery2">XX days</td>
                                    <td><a href="{{url('/assignment-editing-service-form')}}" style="text-decoration:none;" class="px-2 text-nowrap py-1 theme-btn-green">Get a Quote</a></td>
                                </tr>
                            </tbody>
                        </table> --}}
                        {{-- <p class="m-0 mt-1 font-500 small">*Days shown above are working days</p> --}}
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
<script>
    $(document).on('click', '#showPrice', function() {
        let words = $('#wordCount').val();
        if(!words){
            toastr.error('Enter Words Count');
            return;
        }
        var formData = new FormData();
        formData.append('service_name', 'Assignment Editing Service');
        formData.append('words', words);
        console.log(JSON.stringify(Object.fromEntries(formData.entries())));
        $.ajax({
            url: '{{ route('showPackagePrices') }}', // Replace with your server endpoint
            method: 'POST',
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                    // Ensure the response is parsed as JSON and is an array
                    if (response && Array.isArray(response)) {
                        let tableBody = ''; // Initialize table body

                        // Loop through the response to build table rows
                        response.forEach(item => {
                            if (item.price_category === "Regular") {
                                tableBody += `
                                <tr>
                                    <td class="t-line">Regular Price</td>
                                    <td>USD ${item.calculated_price}</td> <!-- Use calculated price -->
                                    <td>${item.delivery_days} days</td>
                                    <td>
                                        <a href="{{ url('/assignment-editing-service-form') }}" class="px-3 py-1 theme-btn-green" style="text-decoration: none;">
                                            Get a Quote
                                        </a>
                                    </td>
                                </tr>`;
                            } else if (item.price_category === "Discounted") {
                                tableBody += `
                                <tr>
                                    <td class="t-line">Discounted Price for Researchers & Students in MENA Region</td>
                                    <td>USD ${item.calculated_price}</td> <!-- Use calculated price -->
                                    <td>${item.delivery_days} days</td>
                                    <td>
                                        <a href="{{ url('/assignment-editing-service-form') }}" class="px-3 py-1 theme-btn-green" style="text-decoration: none;">
                                            Get a Quote
                                        </a>
                                    </td>
                                </tr>`;
                            }
                        });

                        // Update the table body dynamically
                        $('table.d-none.d-sm-block tbody').html(tableBody);
                    } else {
                        // Handle invalid response
                        console.error('Invalid response:', response);
                        toastr.error('Failed to retrieve price details. Please try again.');
                    }
                },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });

    });

    $(document).on('click', '#showPrice2', function() {
        let words = $('#wordCount2').val();
        if(!words){
            toastr.error('Enter Words Count');
            return;
        }
        var formData = new FormData();
        formData.append('service_name', 'Assignment Editing Service');
        formData.append('words', words);
        console.log(JSON.stringify(Object.fromEntries(formData.entries())));
        $.ajax({
            url: '{{ route('showPackagePrices') }}', // Replace with your server endpoint
            method: 'POST',
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                // Ensure the response is parsed as JSON and is an array
                if (response && Array.isArray(response)) {
                    // Update regular prices
                    $('#regular-price2').text('USD ' + response.find(function (p) {
                        return p.price_category === 'Regular';
                    }).calculated_price);
                    $('#regular-delivery2').text(response.find(function (p) {
                        return p.price_category === 'Regular';
                    }).delivery_days + ' days');

                    // Update discounted prices
                    $('#discounted-price2').text('USD ' + response.find(function (p) {
                        return p.price_category === 'Discounted';
                    }).calculated_price);
                    $('#discounted-delivery2').text(response.find(function (p) {
                        return p.price_category === 'Discounted';
                    }).delivery_days + ' days');
                } else {
                    // Handle invalid response
                    console.error('Invalid response:', response);
                    toastr.error('Failed to retrieve price details. Please try again.');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });

    });
</script>
@endsection
