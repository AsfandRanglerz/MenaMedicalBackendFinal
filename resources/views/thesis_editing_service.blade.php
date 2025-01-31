@extends('layout.master')

@section('title', 'Thesis Editing Service')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row section-devision">
                @foreach($ThesisEditingServiceOnes as $ThesisEditingServiceOne)
                <div class="col-sm-7 px-sm-2 px-0">
                    <h4 class="primary-heading">{{ $ThesisEditingServiceOne->title }}</h4>
                    <p class="mb-0 mt-4">
                        {!! nl2br(e($ThesisEditingServiceOne->description)) !!}
                    </p>
                    <ul class="mt-4 primary-heading listing-margin">
                        @foreach(explode("\n", $ThesisEditingServiceOne->link_text) as $link_text)
                        <li>{{ $link_text }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="d-none d-sm-block col-5">
                    <img src="{{ $ThesisEditingServiceOne->image }}" class="w-100 px-4 py-2 thesis-hero-image-section">
                </div>
                @endforeach
            </div>
            <div class="section-devision">
                @foreach($ThesisEditingServiceTwos as $ThesisEditingServiceTwo)
                <h4 class="primary-heading">{{ $ThesisEditingServiceTwo->feature_title }}</h4>
                <ul class="mt-4 listing-margin">
                    @foreach(explode("\n", $ThesisEditingServiceTwo->feature) as $feature)
                    <li>{{ $feature }}</li>
                    @endforeach
                    <h6 class="my-3 heading">{{ $ThesisEditingServiceTwo->service_title }}</h6>
                    @foreach(explode("\n", $ThesisEditingServiceTwo->service) as $service)
                    <li>{{ $service }}</li>
                    @endforeach
                </ul>
                @endforeach
            </div>
            <div class="section-devision">
                @foreach($ThesisEditingServiceThrees as $ThesisEditingServiceThree)
                <h4 class="primary-heading">{{ $ThesisEditingServiceThree->feature_title }}</h4>
                <ul class="mt-4 listing-margin">
                    @foreach(explode("\n", $ThesisEditingServiceThree->feature) as $feature)
                    <li>{{ $feature }}</li>
                    @endforeach
                    <h6 class="my-3 heading">{{ $ThesisEditingServiceThree->service_title }}</h6>
                    @foreach(explode("\n", $ThesisEditingServiceThree->service) as $service)
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
                                <th class="py-2 px-3 large-column">Editing Components</th>
                                <th class="heading-two">Advanced Editing</th>
                                <th class="heading-three">Premium Editing</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-2 px-3 large-column">Spelling, Punctuation, and Grammar check</td>
                                <td class="text-center">
                                    <img src="{{ asset('public/assets/images/Path 21.png') }}" class="tick-cross">
                                </td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                        class="tick-cross"></td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 large-column">Sentence Structure, Flow, and Clarity of text</td>
                                <td class="text-center">
                                    <img src="{{ asset('public/assets/images/Path 21.png') }}" class="tick-cross">
                                </td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                        class="tick-cross"></td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 large-column">Plagiarism check by iThenticate</td>
                                <td class="text-center">
                                    <img src="{{ asset('public/assets/images/Path 21.png') }}" class="tick-cross">
                                </td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                        class="tick-cross"></td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 large-column">Formatting - Page layout, Table of Content, heading, numbering, etc*</td>
                                <td class="text-center">
                                    <img src="{{ asset('public/assets/images/Path 23.png') }}" class="tick-cross">
                                </td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                        class="tick-cross"></td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 large-column">References Formatting *</td>
                                <td class="text-center">
                                    <img src="{{ asset('public/assets/images/Path 23.png') }}" class="tick-cross">
                                </td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                        class="tick-cross"></td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 large-column">Expert comments on thesis/assignment improvement</td>
                                <td class="text-center">
                                    <img src="{{ asset('public/assets/images/Path 23.png') }}" class="tick-cross">
                                </td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                        class="tick-cross"></td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 large-column">Revision and Re-edits ( one round only)</td>
                                <td class="text-center">
                                    <img src="{{ asset('public/assets/images/Path 23.png') }}" class="tick-cross">
                                </td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                        class="tick-cross"></td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="m-0 mt-1 font-500 small">*You can also request Plagarism Check and/or Manuscript Formating in the Advanced Editing package at an additional charge.</p>
                </div>
            </div>
            {{-- <div class="section-devision">
                <div class="mt-4 lang-table-section overflow-auto">
                    <div class="table-container">
                        <table class="table-size">
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
                                        USD {{ $regularPrice->less_equal_price ?? 'XXX' }}
                                    </td>
                                    <td>
                                        {{ $regularPrice->delivery_days ?? 'X' }} days
                                    </td>
                                    <td>
                                        <a href="{{url('/thesis-editing-service-form')}}" style="text-decoration: none" class="px-3 py-1 theme-btn-green">Get a Quote</a>
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
                                        <a href="{{url('/thesis-editing-service-form')}}" style="text-decoration: none" class="px-3 py-1 theme-btn-green">Get a Quote</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="m-0 mt-1 font-500 small">*Days shown above are working days</p>
                    </div>
                </div>
            </div> --}}
            <div class="section-devision">
                <h4 class="mb-lg-4 mb-3 text-center primary-heading">Pricing and Delivery Time</h4>
                <div class="mt-2 lang-table-section overflow-auto">
                    <div class="table-container">
                        <table class="table-size">
                            <thead>
                                <tr>
                                    <th colspan="4" class="header">
                                        <div class="d-flex align-items-center justify-content-between px-3 py-2">
                                            <label for="wordCount" class="font-600">Enter Word
                                                Count</label>
                                            <div class="d-flex align-items-center gap-3">
                                                <input type="text" id="wordCount" class="py-1" name="words">
                                                <button class="px-3 py-1 theme-btn-green" id="showPrice">Calculate
                                                    Price</button>
                                            </div>
                                        </div>

                                    </th>
                                </tr>
                                <tr class="category-header">
                                    <th class="px-3 py-2 head-one font-600">Price</th>
                                    {{-- <th class="text-white font-600 text-center basic-column">Basic Editing</th> --}}
                                    <th class="text-white font-600 text-center advanced-column">Advanced Editing
                                    </th>
                                    <th class="text-white font-600 text-center premium-column">Premium Editing
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="t-line">
                                        Reference Check
                                    </td>
                                    {{-- <td id="regular-basic">USD xxx in XX days</td> --}}
                                    <td id="regular-advance">USD xxx in XX days</td>
                                    <td id="regular-premium">USD xxx in XX days</td>
                                </tr>
                                <tr>
                                    <td class="t-line">
                                        Discounted Price for Researchers & Students in MENA Region
                                    </td>
                                    {{-- <td id="discounted-basic">USD xxx in XX days</td> --}}
                                    <td id="discounted-advance">USD xxx in XX days</td>
                                    <td id="discounted-premium">USD xxx in XX days</td>
                                </tr>
                                <tr class="bg-white">
                                    <td>

                                    </td>
                                    {{-- <td><a href="{{ url('/language-editing-service-form/Basic') }}"
                                            class="px-3 py-1 theme-btn-green" style="text-decoration: none;">Get a
                                            Quote</a></td> --}}
                                    <td><a href="{{ url('/thesis-editing-service-form/Advance') }}"
                                            class="px-3 py-1 theme-btn-green" style="text-decoration: none;">Get a
                                            Quote</a></td>
                                    <td><a href="{{ url('/thesis-editing-service-form/Premium') }}"
                                            class="px-3 py-1 theme-btn-green" style="text-decoration: none;">Get a
                                            Quote</a></td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="m-0 mt-1 font-500 small">*Days shown above are working days</p>
                    </div>
                </div>
            </div>
            <div class="section-devision">
                <h4 class="mb-lg-4 mb-3 text-center primary-heading">Additional Services for Advanced Editing (if required)</h4>
                <div class="mt-4 lang-table-section overflow-auto">
                    <div class="table-container">
                        <table class="table-size">
                            <thead>
                                <tr class="category-header header-set">
                                    <th class="px-3 py-2 head-one font-600">Price</th>
                                    <th class="px-3 py-2 text-white font-600 text-center basic-column">Advanced Editing</th>
                                    <th class="px-3 py-2 text-white font-600 text-center advanced-column">Delivery Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($additionalsServices as $additionalService)
                                <tr>
                                    <td class="t-line">
                                        {{$additionalService->additional_services}}
                                    </td>
                                    <td>USD {{$additionalService->basic_package_price}}</td>
                                    <td><a href="{{url('/thesis-editing-service-form/Advance')}}" style="text-decoration: none" class="px-3 py-1 theme-btn-green">Get a Quote</a></td>
                                </tr>
                                @endforeach
                                {{-- <tr>
                                    <td class="t-line">
                                        Manuscript Formatting of thesis- Discounted price for MENA students
                                    </td>
                                    <td>USD 120</td>
                                    <td><button class="px-3 py-1 theme-btn-green">Get a Quote</button></td>
                                </tr> --}}
                            </tbody>
                        </table>
                        <p class="m-0 mt-1 font-500 small">*Price for Manuscript Formatting displayed above is for up to 10,000 words. There will be a customized charge for longer documents. Price for Manuscript Formatting is already included in Premium Editing service</p>
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
<script>
    $(document).on('click', '#showPrice', function() {
        let words = $("#wordCount").val();
        if (!words) {
            toastr.error("Please Enter Words Count");
            return;
        }
        var formData = new FormData();
        formData.append('service_name', 'Thesis Editing Service');
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
            success: function(response) {
                    // Separate data by price category
                    var regularPackages = response.filter(function(item) {
                        return item.price_category === "Regular";
                    });
                    var discountedPackages = response.filter(function(item) {
                        return item.price_category === "Discounted";
                    });

                    // Update regular prices
                    $('#regular-advance').text('USD ' + regularPackages.find(function(p) {
                            return p.package_name === 'Advance';
                        }).calculated_price +
                        ' in ' + regularPackages.find(function(p) {
                            return p.package_name === 'Advance';
                        }).delivery_days + ' days');
                    $('#regular-premium').text('USD ' + regularPackages.find(function(p) {
                            return p.package_name === 'Premium';
                        }).calculated_price +
                        ' in ' + regularPackages.find(function(p) {
                            return p.package_name === 'Premium';
                        }).delivery_days + ' days');

                    // Update discounted prices

                    $('#discounted-advance').text('USD ' + discountedPackages.find(function(p) {
                            return p.package_name === 'Advance';
                        }).calculated_price +
                        ' in ' + discountedPackages.find(function(p) {
                            return p.package_name === 'Advance';
                        }).delivery_days + ' days');
                    $('#discounted-premium').text('USD ' + discountedPackages.find(function(p) {
                            return p.package_name === 'Premium';
                        }).calculated_price +
                        ' in ' + discountedPackages.find(function(p) {
                            return p.package_name === 'Premium';
                        }).delivery_days + ' days');
                },

            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    });
</script>
@endsection
