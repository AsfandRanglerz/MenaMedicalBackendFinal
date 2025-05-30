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
                    <div class="row  gap-3 gap-sm-0 editing-portion">
                        @foreach ($LanguageEditingTwos as $LanguageEditingTwo)
                            <div class="col-sm-4 p-0 border">
                                <div class="py-2 {{ $LanguageEditingTwo->colour }}">
                                    <p class="m-0 text-center heading">{{ $LanguageEditingTwo->title }}</p>
                                </div>
                                <div class="p-3">
                                    <p class="m-0 text-center line-height paragraph">
                                        {{ $LanguageEditingTwo->description }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="section-devision">
                    @foreach ($LanguageEditingThrees as $LanguageEditingThree)
                        <p class="mb-0">
                            {!! str_replace('<a ', ' <a style="text-decoration: none;" ', $LanguageEditingThree->description) !!}
                        </p>
                    @endforeach

                    <!-- Table for big screen -->
                    <div class="d-none d-sm-block overflow-auto lang-table-section">
                        <table class="edit-table">
                            <thead>
                                <tr class="table-heading">
                                    <th class="py-2 px-3 large-column">Editing Components</th>
                                    <th class="heading-two py-2">Basic Editing</th>
                                    <th class="heading-three py-2">Advanced Editing</th>
                                    <th class="heading-four py-2">Premium Editing</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-2 px-3 large-column">Spelling, Punctuation, and Grammar Check</td>
                                    <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                            class="tick-cross">
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
                                    <td class="py-2 px-3 large-column">Reviewer Response Letter Editing - helps you respond
                                        to
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
                                    <td class="py-2 px-3 large-column">Re-editing support for 180 days (up to 20% of
                                        original
                                        word count)</td>
                                    <td class="text-center small">
                                        50% discount
                                    </td>
                                    <td class="text-center small">50% discount</td>
                                    <td class="text-center small">Free</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-3 large-column"></td>
                                  <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ url('/language-editing-service-form/Basic') }}"
                                            class="px-3 py-1 theme-btn-green m-2"
                                            style="text-decoration: none;">Select</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ url('/language-editing-service-form/Advance') }}"
                                            class="px-3 py-1 theme-btn-green m-2"
                                            style="text-decoration: none;">Select</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ url('/language-editing-service-form/Premium') }}"
                                            class="px-3 py-1 theme-btn-green m-2"
                                            style="text-decoration: none;">Select</a>
                                    </div>
                                </td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="m-0 mt-1 font-500 small">*You can also request Plagarism Check and/or Manuscript
                            Formating
                            in the Basic Editing or Advanced Editing package at an additional charge.</p>
                    </div>

                    <!-- Table for mobile -->
                    <div class="d-block d-sm-none overflow-auto lang-table-section">
                        <table>
                            <thead>
                                <tr class="table-heading">
                                    <th colspan="4" class="py-2 px-3">Editing Components</th>
                                </tr>
                                <tr class="table-heading">
                                    <th style="font-size: 0.9rem;" class="heading-two py-2">Basic Editing</th>
                                    <th style="font-size: 0.9rem;" class="heading-three py-2">Advanced Editing</th>
                                    <th style="font-size: 0.9rem;" class="heading-four py-2">Premium Editing</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4" class="py-2 px-3 text-center large-column">Spelling, Punctuation,
                                        and
                                        Grammar Check</td>
                                </tr>
                                <tr>
                                    <td class="text-center py-2">
                                        <img src="{{ asset('public/assets/images/Path 21.png') }}" class="tick-cross">
                                    </td>
                                    <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                            class="tick-cross"></td>
                                    <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                            class="tick-cross"></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="py-2 px-3 text-center large-column">Sentence Structure and
                                        Terminology Check</td>
                                </tr>
                                <tr>
                                    <td class="text-center py-2">
                                        <img src="{{ asset('public/assets/images/Path 21.png') }}" class="tick-cross">
                                    </td>
                                    <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                            class="tick-cross"></td>
                                    <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                            class="tick-cross"></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="py-2 px-3 text-center large-column">Reference Check</td>
                                </tr>
                                <tr>
                                    <td class="text-center small py-2">For consistency and accuracy</td>
                                    <td class="text-center small">For consistency and accuracy</td>
                                    <td class="text-center small">For consistency and accuracy</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="py-2 px-3 text-center large-column">Word Count Reduction
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center small py-2">10% reduction*</td>
                                    <td class="text-center small">20% reduction*</td>
                                    <td class="text-center small">20% reduction*</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="py-2 px-3 text-center large-column">Flow, Logic, and Clarity
                                        Check
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center py-2">
                                        <img src="{{ asset('public/assets/images/Path 23.png') }}" class="tick-cross">
                                    </td>
                                    <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                            class="tick-cross"></td>
                                    <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                            class="tick-cross"></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="py-2 px-3 text-center large-column">Plagiarism check by
                                        iThenticate*
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center py-2">
                                        <img src="{{ asset('public/assets/images/Path 23.png') }}" class="tick-cross">
                                    </td>
                                    <td class="text-center"><img src="{{ asset('public/assets/images/Path 23.png') }}"
                                            class="tick-cross"></td>
                                    <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                            class="tick-cross"></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="py-2 px-3 text-center large-column">Manuscript Formatting*
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center py-2">
                                        <img src="{{ asset('public/assets/images/Path 23.png') }}" class="tick-cross">
                                    </td>
                                    <td class="text-center"><img src="{{ asset('public/assets/images/Path 23.png') }}"
                                            class="tick-cross"></td>
                                    <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                            class="tick-cross"></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="py-2 px-3 text-center large-column">Editing of References
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center py-2">
                                        <img src="{{ asset('public/assets/images/Path 23.png') }}" class="tick-cross">
                                    </td>
                                    <td class="text-center"><img src="{{ asset('public/assets/images/Path 23.png') }}"
                                            class="tick-cross"></td>
                                    <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                            class="tick-cross"></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="py-2 px-3 text-center large-column">Cover letter customized
                                        for
                                        journal submission</td>
                                </tr>
                                <tr>
                                    <td class="text-center py-2">
                                        <img src="{{ asset('public/assets/images/Path 23.png') }}" class="tick-cross">
                                    </td>
                                    <td class="text-center"><img src="{{ asset('public/assets/images/Path 23.png') }}"
                                            class="tick-cross"></td>
                                    <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                            class="tick-cross"></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="py-2 px-3 text-center large-column">Reviewer Response Letter
                                        Editing
                                        - helps you respond to the journal editors</td>
                                </tr>
                                <tr>
                                    <td class="text-center py-2">
                                        <img src="{{ asset('public/assets/images/Path 23.png') }}" class="tick-cross">
                                    </td>
                                    <td class="text-center"><img src="{{ asset('public/assets/images/Path 23.png') }}"
                                            class="tick-cross"></td>
                                    <td class="text-center"><img src="{{ asset('public/assets/images/Path 21.png') }}"
                                            class="tick-cross"></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="py-2 px-3 text-center large-column">Re-editing support for
                                        180 days
                                        (up to 20% of original word count)</td>
                                </tr>
                                <tr>
                                    <td class="text-center small py-2">50% discount</td>
                                    <td class="text-center small">50% discount</td>
                                    <td class="text-center small">Free</td>
                                </tr>
                                <tr>
                                    {{-- <td class="text-center small py-2"></td> --}}
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ url('/language-editing-service-form/Basic') }}"
                                                class="btn theme-btn-green w-100 m-1"
                                                style="text-decoration: none; max-width: 180px;">Select</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ url('/language-editing-service-form/Advance') }}"
                                                class="btn theme-btn-green w-100 m-1"
                                                style="text-decoration: none; max-width: 180px;">Select</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ url('/language-editing-service-form/Premium') }}"
                                                class="btn theme-btn-green w-100 m-1"
                                                style="text-decoration: none; max-width: 180px;">Select</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="m-0 mt-1 font-500 small">*You can also request Plagarism Check and/or Manuscript
                            Formating
                            in the Basic Editing or Advanced Editing package at an additional charge.</p>
                    </div>

                    <!-- Pricing and Delivery Time -->
                    {{--  Previous --}}
                    {{-- <div class="section-devision">
                        <h4 class="mb-lg-4 mb-3 text-center primary-heading">Pricing and Delivery Time</h4>
                        <div class="mt-2 lang-table-section overflow-auto">
                            <div class="table-container">
                                <!-- Table for big screen -->
                                <table class="d-none d-sm-block table-size">
                                    <thead>
                                        <tr>
                                            <th colspan="4" class="header">
                                                <div class="d-flex align-items-center justify-content-between px-3 py-2">
                                                    <label for="wordCount" class="font-600">Enter Word
                                                        Count</label>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <input type="text" id="wordCount" class="py-1"
                                                            name="words">
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
                                <!-- Table for mobile screen -->
                                <table class="d-sm-none d-block table-size">
                                    <thead>
                                        <tr>
                                            <th colspan="3" class="header">
                                                <div
                                                    class="d-flex flex-column align-items-center justify-content-between px-3 py-2">
                                                    <label for="wordCount" class="font-600">Enter Word
                                                        Count</label>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <input type="text" id="wordCount2" class="py-0 w-50"
                                                            name="words">
                                                        <button style="font-size: 0.9rem;"
                                                            class="px-2 py-1 theme-btn-green" id="showPrice2">Calculate
                                                            Price</button>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="px-3 py-2 head-one font-600">Price</th>
                                        </tr>
                                        <tr class="category-header">
                                            <th style="font-size: 0.9rem;"
                                                class="text-white font-600 py-2 text-center basic-column">
                                                Basic Editing</th>
                                            <th style="font-size: 0.9rem;"
                                                class="text-white font-600 px-2 text-center advanced-column">Advanced
                                                Editing
                                            </th>
                                            <th style="font-size: 0.9rem;"
                                                class="text-white font-600 px-2 text-center premium-column">Premium Editing
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="3" class="text-center">
                                                Reference Check
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%;" colspan="1" id="regular-basic2">USD xxx in XX days
                                            </td>
                                            <td colspan="1" id="regular-advance2">USD xxx in XX days</td>
                                            <td colspan="1" id="regular-premium2">USD xxx in XX days</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-center">
                                                Discounted Price for Researchers & Students in MENA Region
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%;" id="discounted-basic2">USD xxx in XX days</td>
                                            <td id="discounted-advance2">USD xxx in XX days</td>
                                            <td id="discounted-premium2">USD xxx in XX days</td>
                                        </tr>
                                        <tr class="bg-white">
                                            <td style="width: 25%;" class="px-1"><a
                                                    href="{{ url('/language-editing-service-form/Basic') }}"
                                                    class="px-1 py-1 theme-btn-green" style="text-decoration: none;">Get a
                                                    Quote</a></td>
                                            <td class="px-1"><a
                                                    href="{{ url('/language-editing-service-form/Advance') }}"
                                                    class="px-1 py-1 theme-btn-green" style="text-decoration: none;">Get a
                                                    Quote</a></td>
                                            <td class="px-1"><a
                                                    href="{{ url('/language-editing-service-form/Premium') }}"
                                                    class="px-1 py-1 theme-btn-green" style="text-decoration: none;">Get a
                                                    Quote</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p class="m-0 mt-1 font-500 small">*Days shown above are working days</p>
                            </div>
                        </div>
                    </div> --}}

                    {{--  New --}}
                    <div class="section-devision">
                        <h4 class="mb-lg-4 mb-3 text-center primary-heading">Pricing and Delivery Time</h4>
                        <div class="mt-2 lang-table-section overflow-auto">
                            <div class="table-container">
                                <div class="p-3">
                                    <p class="mb-2">
                                        MENA Medical Research has a transparent pricing policy. We ensure that you are aware of our service charges and make a fully informed decision before placing an order.
                                    </p>
                                    <p class="mb-0">
                                        Price and Delivery Time for language editing service depend on the level of service required (Basic, Advanced, Premium) and the word count of your document. You can select the required service to find the estimated price, before submitting your request for work.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="section-devision">
                        <h4 class="mb-lg-4 mb-3 text-center primary-heading">Additional Services (if required)</h4>
                        <div class="mt-2 lang-table-section overflow-auto">
                            <!-- Table for big screen -->
                            <div class="d-none d-sm-block table-container">
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
                                    </tbody>
                                </table>
                                <p class="m-0 mt-1 font-500 small">*Price for Plagiarism Check and Manuscript Formatting
                                    displayed above is for up to 6,000 words. There will be a customized charge for longer
                                    documents. Plagiarism Check and Manuscript Formatting are already included in Premium
                                    Editing service</p>
                            </div>

                            <!-- Table for mobile screen -->
                            <div class="d-block d-sm-none table-container">
                                <table>
                                    <thead>
                                        <tr class="category-header">
                                            <th colspan="3" class="px-3 py-2 head-one font-600 text-center">Price</th>
                                        </tr>
                                        <tr class="category-header">
                                            <th colspan="1.5" style="font-size: 1rem;"
                                                class="text-white font-600 py-2 text-center w-50 basic-column">
                                                Basic Editing</th>
                                            <th colspan="1.5" style="font-size: 1rem;"
                                                class="text-white font-600 text-center py-2 w-50 advanced-column">Advanced
                                                Editing
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($additionalsServices as $additionalService)
                                            <tr>
                                                <td colspan="3" class="text-center">
                                                    {{ $additionalService->additional_services }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>USD {{ $additionalService->basic_package_price }} </td>
                                                <td>USD {{ $additionalService->advance_package_price }} </td>
                                            </tr>
                                        @endforeach
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

            $(document).on('click', '#showPrice2', function() {
                let words = $("#wordCount2").val();
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
                        $('#regular-basic2').text('USD ' + regularPackages.find(function(p) {
                                return p.package_name === 'Basic';
                            }).calculated_price +
                            ' in ' + regularPackages.find(function(p) {
                                return p.package_name === 'Basic';
                            }).delivery_days + ' days');
                        $('#regular-advance2').text('USD ' + regularPackages.find(function(p) {
                                return p.package_name === 'Advance';
                            }).calculated_price +
                            ' in ' + regularPackages.find(function(p) {
                                return p.package_name === 'Advance';
                            }).delivery_days + ' days');
                        $('#regular-premium2').text('USD ' + regularPackages.find(function(p) {
                                return p.package_name === 'Premium';
                            }).calculated_price +
                            ' in ' + regularPackages.find(function(p) {
                                return p.package_name === 'Premium';
                            }).delivery_days + ' days');

                        // Update discounted prices
                        $('#discounted-basic2').text('USD ' + discountedPackages.find(function(p) {
                                return p.package_name === 'Basic';
                            }).calculated_price +
                            ' in ' + discountedPackages.find(function(p) {
                                return p.package_name === 'Basic';
                            }).delivery_days + ' days');
                        $('#discounted-advance2').text('USD ' + discountedPackages.find(function(p) {
                                return p.package_name === 'Advance';
                            }).calculated_price +
                            ' in ' + discountedPackages.find(function(p) {
                                return p.package_name === 'Advance';
                            }).delivery_days + ' days');
                        $('#discounted-premium2').text('USD ' + discountedPackages.find(function(p) {
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
