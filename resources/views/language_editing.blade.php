@extends('layout.master')

@section('title', $seo_data['title'])
@section('og_title', $seo_data['og_title'])
@section('description', $seo_data['description'])
@section('og_description', $seo_data['og_description'])
@section('keywords', $seo_data)

<style>
    .trusted-by .heading,
    .trusted-by small {
        display: none;
    }

    .trusted-by small+.slick-slider {
        margin-top: 0 !important;
    }
</style>

@section('content')
<!-- Hi -->
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="container-fluid">
                @foreach ($LanguageEditings as $LanguageEditing)
                    <div class="row mb-0 section-devision">
                        <div class="col-sm-7 px-sm-2 px-0">
                            <h4 class="primary-heading">{{ $LanguageEditing->title }}</h4>
                            <p class="mb-0 mt-4">
                                {!! nl2br(e($LanguageEditing->description)) !!}
                            </p>
                        </div>
                        <div class="d-none d-sm-block col-5">
                            <img src="{{ $LanguageEditing->image }}" class="w-100">
                        </div>
                    </div>
                @endforeach
                <div class="overflow-auto lang-table-section">
                    <div class="row border editing-portion">
                        @foreach ($LanguageEditingTwos as $LanguageEditingTwo)
                            <div class="col-4 p-0" style="border-right: 1px solid #dee2e6">
                                <div class="py-2 {{ $LanguageEditingTwo->colour }}">
                                    <p class="m-0 text-center heading">{{ $LanguageEditingTwo->title }}</p>
                                </div>
                                <div class="p-3">
                                    <p class="m-0 text-center line-height paragraph">
                                        {{ $LanguageEditingTwo->description }}
                                    </p>
                                </div>
                            </div>
                            {{-- <div class="col-4 p-0" style="border-right: 1px solid #dee2e6">
                            <div class="py-2 head-two">
                                <p class="m-0 text-center heading">Advanced Editing</p>
                            </div>
                            <div class="p-3">
                                <p class="m-0 pb-0 text-center line-height paragraph">
                                    In addition to the checks included in Basic Editing, Advanced Editing reviews your
                                    manuscript for improving logic, clarity, and flow. The manuscript is rephrased and
                                    reorganized to enhance its structure according to publication standards.
                                </p>
                            </div>
                        </div>
                        <div class="col-4 p-0">
                            <div class="py-2 head-three">
                                <p class="m-0 text-center heading">Premium Editing</p>
                            </div>
                            <div class="p-3">
                                <p class="m-0 pb-0 text-center line-height paragraph">
                                    In addition to Advanced Editing, Premium editing also includes accidental plagiarism
                                    check and additional services such as manuscript formatting, journal cover letter,
                                    reviewer response letter editing, and free re-editing of revised manuscript.
                                </p>
                            </div>
                        </div> --}}
                        @endforeach
                    </div>
                </div>

                <div class="section-devision">
                    @foreach ($LanguageEditingThrees as $LanguageEditingThree)
                        <p class="mb-0">
                            {!! str_replace('<a ', '<a style="text-decoration: none;" ', $LanguageEditingThree->description) !!}
                        </p>
                    @endforeach
                </div>


                <div class="overflow-auto lang-table-section">
                    <table class="edit-table">
                        <thead>
                            <tr class="table-heading">
                                <th class="py-2 px-3 large-column">Editing Components</th>
                                <th class="heading-two">Basic Editing</th>
                                <th class="heading-three">Advanced Editing</th>
                                <th class="heading-four">Premium Editing</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-2 px-3 large-column">Spelling, Punctuation, and Grammar Check</td>
                                <td class="text-center">
                                    <img src="{{ asset('public/assets/images/Path 21.png') }}" class="tick-cross">
                                </td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                        class="tick-cross"></td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                        class="tick-cross"></td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 large-column">Sentence Structure and Terminology Check</td>
                                <td class="text-center">
                                    <img src="{{ asset('public/assets/images/Path 21.png') }}" class="tick-cross">
                                </td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                        class="tick-cross"></td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                        class="tick-cross"></td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 large-column">Reference Check</td>
                                <td class="text-center small">
                                    For consistency and accuracy
                                </td>
                                <td class="text-center small">For consistency and accuracy</td>
                                <td class="text-center small">For consistency and accuracy</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 large-column">Word Count Reduction</td>
                                <td class="text-center small">
                                    10% reduction*
                                </td>
                                <td class="text-center small">20% reduction*</td>
                                <td class="text-center small">20% reduction*</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 large-column">Flow, Logic, and Clarity Check</td>
                                <td class="text-center">
                                    <img src="{{ asset('public/assets/images/Path 23.png') }}" class="tick-cross">
                                </td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                        class="tick-cross"></td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                        class="tick-cross"></td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 large-column">Plagiarism check by iThenticate*</td>
                                <td class="text-center">
                                    <img src="{{ asset('public/assets/images/Path 23.png') }}" class="tick-cross">
                                </td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 23.png') }}"
                                        class="tick-cross"></td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                        class="tick-cross"></td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 large-column">Manuscript Formatting*</td>
                                <td class="text-center">
                                    <img src="{{ asset('public/assets/images/Path 23.png') }}" class="tick-cross">
                                </td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 23.png') }}"
                                        class="tick-cross"></td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                        class="tick-cross"></td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 large-column">Editing of References</td>
                                <td class="text-center">
                                    <img src="{{ asset('public/assets/images/Path 23.png') }}" class="tick-cross">
                                </td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 23.png') }}"
                                        class="tick-cross"></td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                        class="tick-cross"></td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 large-column">Cover letter customized for journal submission</td>
                                <td class="text-center">
                                    <img src="{{ asset('public/assets/images/Path 23.png') }}" class="tick-cross">
                                </td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 23.png') }}"
                                        class="tick-cross"></td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                        class="tick-cross"></td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 large-column">Reviewer Response Letter Editing - helps you respond to
                                    the journal editors</td>
                                <td class="text-center">
                                    <img src="{{ asset('public/assets/images/Path 23.png') }}" class="tick-cross">
                                </td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 23.png') }}"
                                        class="tick-cross"></td>
                                <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                        class="tick-cross"></td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 large-column">Re-editing support for 180 days (up to 20% of original
                                    word count)</td>
                                <td class="text-center small">
                                    50% discount
                                </td>
                                <td class="text-center small">50% discount</td>
                                <td class="text-center small">Free</td>
                            </tr>

                        </tbody>
                    </table>
                    <p class="m-0 mt-1 font-500 small">*You can also request Plagarism Check and/or Manuscript Formating
                        in the Basic Editing or Advanced Editing package at an additional charge.</p>
                </div>
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
                                        <th class="text-white font-600 text-center basic-column">Basic Editing</th>
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
                                        <td id="regular-basic">USD xxx in XX days</td>
                                        <td id="regular-advance">USD xxx in XX days</td>
                                        <td id="regular-premium">USD xxx in XX days</td>
                                    </tr>
                                    <tr>
                                        <td class="t-line">
                                            Discounted Price for Researchers & Students in MENA Region
                                        </td>
                                        <td id="discounted-basic">USD xxx in XX days</td>
                                        <td id="discounted-advance">USD xxx in XX days</td>
                                        <td id="discounted-premium">USD xxx in XX days</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <td>

                                        </td>
                                        <td><a href="{{ url('/language-editing-service-form/Basic') }}"
                                                class="px-3 py-1 theme-btn-green" style="text-decoration: none;">Get a
                                                Quote</a></td>
                                        <td><a href="{{ url('/language-editing-service-form/Advance') }}"
                                                class="px-3 py-1 theme-btn-green" style="text-decoration: none;">Get a
                                                Quote</a></td>
                                        <td><a href="{{ url('/language-editing-service-form/Premium') }}"
                                                class="px-3 py-1 theme-btn-green" style="text-decoration: none;">Get a
                                                Quote</a></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="m-0 mt-1 font-500 small">*Days shown above are working days</p>
                        </div>
                    </div>
                </div>
                <div>
                    <h4 class="mb-lg-4 mb-3 text-center primary-heading">Additional Services (if required)</h4>
                    <div class="mt-2 lang-table-section overflow-auto">
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr class="category-header">
                                        <th class="px-3 py-2 head-one font-600">Price</th>
                                        <th class="text-white font-600 text-center basic-column">Basic Editing</th>
                                        <th class="text-white font-600 text-center advanced-column">Advanced Editing
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($additionalsServices as $additionalService)
                                        <tr>
                                            <td class="t-line">
                                                {{ $additionalService->additional_services }}
                                            </td>
                                            <td>USD {{ $additionalService->basic_package_price }} </td>
                                            <td>USD {{ $additionalService->advance_package_price }} </td>
                                        </tr>
                                    @endforeach
                                    {{-- <tr>
                                        <td class="t-line">
                                            Plagiarism check by iThenticate* - Discounted price for MENA
                                        </td>
                                        <td>USD 50</td>
                                        <td>USD 50</td>

                                    </tr>
                                    <tr>
                                        <td class="t-line">
                                            Manuscript Formatting* - Regular Price
                                        </td>
                                        <td>USD 110</td>
                                        <td>USD 110</td>
                                    </tr>
                                    <tr>
                                        <td class="t-line">
                                            Manuscript Formatting* - Discounted price for MENA
                                        </td>
                                        <td>USD 75</td>
                                        <td>USD 75</td>
                                    </tr> --}}
                                </tbody>
                            </table>
                            <p class="m-0 mt-1 font-500 small">*Price for Plagiarism Check and Manuscript Formatting
                                displayed above is for up to 6,000 words. There will be a customized charge for longer
                                documents. Plagiarism Check and Manuscript Formatting are already included in Premium
                                Editing service</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('common.components.commitments')
    @include('common.components.faqs', ['Faqs' => $Faqs])
    @include('common.components.trusted_by')
@endsection

@section('script')
    <script>
        $(document).on('click', '#showPrice', function() {
            let words = $("#wordCount").val();
            if (!words) {
                toastr.error("Please Enter Approximate Word Count to Calculate Price");
                return;
            }
            var formData = new FormData();
            formData.append('service_name', 'Language Editing');
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
                    $('#regular-basic').text('USD ' + regularPackages.find(function(p) {
                            return p.package_name === 'Basic';
                        }).calculated_price +
                        ' in ' + regularPackages.find(function(p) {
                            return p.package_name === 'Basic';
                        }).delivery_days + ' days');
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
                    $('#discounted-basic').text('USD ' + discountedPackages.find(function(p) {
                            return p.package_name === 'Basic';
                        }).calculated_price +
                        ' in ' + discountedPackages.find(function(p) {
                            return p.package_name === 'Basic';
                        }).delivery_days + ' days');
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
