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
                    @foreach ($ScientificEditingOnes as $ScientificEditingOne)
                        <div class="col-sm-7 px-sm-2 px-0">
                            <h4 class="primary-heading">{{ $ScientificEditingOne->title }}</h4>
                            <p class="mb-0 mt-4">
                                {!! nl2br(e($ScientificEditingOne->description)) !!}
                            </p>
                        </div>
                        <div class="d-none d-sm-block col-5">
                            <img src="{{ $ScientificEditingOne->image }}" class="w-100">
                        </div>
                    @endforeach
                </div>
                <div class="mt-3 section-devision">
                    @foreach ($ScientificEditingTwos as $ScientificEditingTwo)
                        <h4 class="primary-heading">{{ $ScientificEditingTwo->feature_title }}</h4>
                        <ul class="mt-4 listing-margin">
                            @foreach (explode("\n", $ScientificEditingTwo->feature) as $feature)
                                <li>{{ $feature }}</li>
                            @endforeach
                            <h6 class="my-3 heading">{{ $ScientificEditingTwo->service_title }}</h6>
                            @foreach (explode("\n", $ScientificEditingTwo->service) as $service)
                                <li>{{ $service }}</li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-5 grey-bg">
        @foreach ($ScientificEditingThrees as $ScientificEditingThree)
            <h4 class="mb-lg-4 mb-3 text-center primary-heading">{{ $ScientificEditingThree->title }}</h4>
        @endforeach
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="row mt-4 gy-5 feature-benifits">
                        @foreach ($ScientificEditingThrees as $ScientificEditingThree)
                            @if (empty($ScientificEditingThree->title))
                                 <div class="col-md-6 col-12">
                                    <div class="d-flex align-items-start gap-3">
                                        <img src="{{ $ScientificEditingThree->image }}" alt="">
                                        <p class="mb-0">{{ $ScientificEditingThree->description }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
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
                            <!-- Table for big screen -->
                            <table class="d-none d-sm-block">
                                <thead>
                                    <tr>
                                        <th colspan="4" class="header header-set">
                                            <div class="d-flex align-items-center justify-content-between px-3 py-2">
                                                <label for="wordCount" class="font-600">Enter Word
                                                    Count</label>
                                                <div class="d-flex align-items-center gap-3">
                                                    <input type="text" id="wordCount" class="py-1">
                                                    <button class="px-3 py-1 theme-btn-green" id="showPrice">Calculate
                                                        Price</button>
                                                </div>
                                            </div>

                                        </th>
                                    </tr>
                                    <tr class="category-header header-set">
                                        <th class="px-3 py-2 head-one font-600">Price Category</th>
                                        <th class="px-3 py-2 text-white font-600 text-center basic-column">Price</th>
                                        <th class="px-3 py-2 text-white font-600 text-center advanced-column">Delivery Time
                                        </th>
                                        <th class="text-white font-600 text-center premium-column">Select Service</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="t-line">
                                            Regular Price
                                        </td>
                                        <td>USD XXX</td>
                                        <td>XX days</td>
                                        <td><a href="{{ url('/scientific-editing-service-form') }}"
                                                class="px-3 py-1 theme-btn-green" style="text-decoration: none;">Get a
                                                Quote</a></td>
                                    </tr>
                                    <tr>
                                        <td class="t-line">
                                            Discounted Price for Researchers & Students in MENA Region
                                        </td>
                                        <td>USD XXX</td>
                                        <td>XX days</td>
                                        <td><a href="{{ url('/scientific-editing-service-form') }}"
                                                class="px-3 py-1 theme-btn-green" style="text-decoration: none;">Get a
                                                Quote</a></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Table for mobile screen -->
                            <table class="d-block d-sm-none">
                                <thead>
                                    <tr>
                                        <th colspan="4" class="header header-set">
                                            <div class="d-flex flex-column align-items-center justify-content-between px-3 py-2">
                                                <label for="wordCount" class="font-600">Enter Word
                                                    Count</label>
                                                <div class="d-flex align-items-center gap-3">
                                                    <input type="text" id="wordCount" class="py-0 w-50">
                                                    <button style="font-size: 0.9rem;" class="px-2 py-1 theme-btn-green" id="showPrice">Calculate
                                                        Price</button>
                                                </div>
                                            </div>

                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="3" class="px-3 py-2 head-one font-600">Price Category</th>
                                    </tr>
                                    <tr class="category-header header-set">
                                        <th style="font-size: 0.9rem;" class="py-2 text-white font-600 text-center basic-column">Price</th>
                                        <th style="font-size: 0.9rem;" class="py-2 text-white font-600 text-center advanced-column">Delivery Time
                                        </th>
                                        <th style="font-size: 0.9rem;" class="text-white font-600 text-center premium-column">Select Service</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3" class="text-center">
                                        Regular Price
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 20%;">USD XXX</td>
                                        <td>XX days</td>
                                        <td class="px-1"><a href="{{ url('/scientific-editing-service-form') }}"
                                                class="text-nowrap px-3 py-1 theme-btn-green" style="text-decoration: none; font-size: 0.7rem;">Get a
                                                Quote</a></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            Discounted Price for Researchers & Students in MENA Region
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 20%;">USD XXX</td>
                                        <td>XX days</td>
                                        <td class="px-1"><a href="{{ url('/scientific-editing-service-form') }}"
                                                class="text-nowrap px-3 py-1 theme-btn-green" style="text-decoration: none; font-size: 0.7rem;">Get a
                                                Quote</a></td>
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
    @include('common.components.faqs')
    @include('common.components.trusted_by')
@endsection

@section('script')
    <script>
        $(document).on('click', '#showPrice', function() {
            let words =  $("#wordCount").val();
            if(!words){
                toastr.error('Please Add Words Count');
                return;
            }
            var formData = new FormData();
            formData.append('service_name', 'Scientific Editing');
            formData.append('words',words);
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
                                        <a href="{{ url('/scientific-editing-service-form') }}" class="px-3 py-1 theme-btn-green" style="text-decoration: none;">
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
                                        <a href="{{ url('/scientific-editing-service-form') }}" class="px-3 py-1 theme-btn-green" style="text-decoration: none;">
                                            Get a Quote
                                        </a>
                                    </td>
                                </tr>`;
                            }
                        });

                        // Update the table body dynamically
                        $('table tbody').html(tableBody);
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
