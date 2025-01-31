@extends('layout.master')

@section('title', 'Assignment Editing Service')

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
                        <table class="table-size">
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
<script>
    $(document).on('click', '#showPrice', function() {
        let words = $('#wordCount').val();
        if(!words){
            toastr.error('Enter Words Count');
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
