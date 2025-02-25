@extends('layout.master')

@section('title', 'Poster / PowerPoint Presentation Service')
<style>
    input[type="number"] {
        -moz-appearance: textfield;
        -webkit-appearance: none;
        appearance: none;
    }

    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    .error-message {
        font-size: 0.9em;
        color: #dc3545;
        /* Bootstrap danger color */
        margin-top: 5px;
    }
</style>
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="container-fluid section-devision">
                <h4 class="primary-heading">{{$service}} Service</h4>
                <div class="row mt-4">
                    <div class="col-md-8">
                        <form action="" id="createQuotationForm" enctype="multipart/form-data" class="mena-form">
                            <div>
                                <input type="text" name="service" id="service" value="{{$service}}" hidden>
                                <div class="d-flex align-items-center gap-2 px-3 py-3 heading-band">
                                    <img src="{{ asset('public/assets/images/Path 328.png') }}" class="arrow">
                                    <p class="text-white m-0 font-500">STEP 1: Select Price Category

                                    </p>
                                </div>
                                {{-- <p class="m-0 mt-2 mb-3 info-heading">Please enter the word count of your manuscript /
                                    document. The
                                    word count will help us in displaying a price estimate</p> --}}
                                <div class="overflow-auto">
                                    <div class="advance-table-container">
                                        <table>
                                            <thead>
                                                {{-- <tr>
                                                    <th colspan="3" class="header">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between px-3 py-2">
                                                            <label for="wordCount" class="font-600">Enter Word
                                                                Count</label>
                                                            <div class="d-flex align-items-center gap-3">

                                                                <input type="number" id="wordCount" class="py-1" name="words">
                                                                <button class="px-3 py-1 theme-btn-green"
                                                                    id="calculatePrice" type="button" >Calculate
                                                                    Price</button>
                                                            </div>
                                                        </div>

                                                    </th>
                                                </tr> --}}
                                                <tr class="category-header">
                                                    <th class="px-3 py-2 head-one font-600">Select Price Category
                                                    </th>
                                                    <th class="text-white font-600 text-center price-column">Price</th>
                                                    <th class="text-white font-600 text-center delivery-column">Delivery
                                                        Time
                                                    </th>
                                                </tr>
                                            </thead>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <label>
                                                            <input type="radio" name="price_cat" value="Regular Price">
                                                            Regular Price
                                                        </label>
                                                    </td>
                                                    <td>USD <span id="regular_price">{{ $regularPrice->less_equal_price ?? 'XXX' }}</span></td>
                                                    <td><span id="regular_price_days">{{ $regularPrice->delivery_days ?? 'X' }}</span> days</td>
                                                </tr>
                                                <tr class="head-one">
                                                    <td>
                                                        <label>
                                                            <input type="radio" name="price_cat" value="Discounted Price">
                                                            Discounted Price for students and researchers in MENA Region
                                                        </label>
                                                    </td>
                                                    <td>USD <span id="discounted_price">{{ $discountedPrice->less_equal_price ?? 'xx'}}</span></td>
                                                    <td><span id="discounted_price_days">{{ $discountedPrice->delivery_days ?? 'X' }}</span> days</td>
                                                </tr>
                                            </table>
                                    </div>
                                </div>
                                <p class="m-0 mt-1 font-500 small">*Days shown above are working days</p>
                            </div>
                            {{-- <div class="section-devision">
                                <div class="d-flex align-items-center gap-2 px-3 py-3 heading-band">
                                    <img src="{{ asset('public/assets/images/Path 328.png') }}" class="arrow">
                                    <p class="text-white m-0 font-500">STEP 2 – Upload Document</p>
                                </div>
                                <input type="file" name="file" id="uploadFile" class="d-none">
                                <div class="d-flex align-items-center gap-3">
                                    <label for="uploadFile"
                                        class="d-flex align-items-center gap-2 my-4 px-3 py-2 border-0 btn rounded-0 upload-btn theme-btn-green">
                                        <img src="{{ asset('public/assets/images/upload-file-icon.png') }}" class="arrow">
                                        <p class="text-white m-0 btn-small-text font-500">UPLOAD YOUR DOCUMENT FILE</p>
                                    </label>
                                    <div class="delete-icon">
                                        <button class="btn border-0 p-0 delete-image-btn"><img class="delete-img"
                                                src="{{ asset('public/assets/images/delete.png') }}"
                                                alt=""></button>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p class="font-600">Select language style</p>
                                    <div class="overflow-auto">
                                        <div class="advance-table-container remove-border">
                                            <table class="set-width">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                <input type="radio" name="language" class="language"
                                                                    value="British English">
                                                                British English
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                <input type="radio" name="language" class="language"
                                                                    value="American English">
                                                                American English
                                                            </label>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p class="font-600">Add any additional instructions for the editor</p>
                                    <textarea name="additional_instruction" id="additional-instructions" cols="30" rows="4"
                                        class="container-width light-border"></textarea>
                                </div>
                            </div> --}}
                            <div class="section-devision">
                                <div class="d-flex align-items-center gap-2 px-3 py-3 heading-band">
                                    <img src="{{ asset('public/assets/images/Path 328.png') }}" class="arrow">
                                    <p class="text-white m-0 font-500">STEP 2 – Upload Document</p>
                                </div>
                                <p class="mt-4 font-600 primary-heading">Upload the article / document that you would like our experts to use for developing your poster/ presentation</p>
                                <input type="file" name="file[]" id="uploadFile" class="d-none">
                                <div class="d-flex">
                                    <label for="uploadFile" class="d-flex align-items-center gap-2 mb-3 px-3 py-2 border-0 btn rounded-0 upload-btn theme-btn-green">
                                        <img src="{{ asset('public/assets/images/upload-file-icon.png') }}" class="arrow">
                                        <p class="text-white m-0 btn-small-text font-500">UPLOAD YOUR DOCUMENT FILE</p>
                                    </label>
                                    <div class="delete-icon">
                                        <button class="btn border-0 p-0 delete-image-btn"><img class="delete-img"
                                                src="{{ asset('public/assets/images/delete.png') }}"
                                                alt=""></button>
                                    </div>
                                </div>
                                <p class="mt-2 mb-1 font-600 primary-heading">Upload documents for reference (if any)</p>
                                <p>Share figures, tables, posters, slide decks, or other reference files that can be used by our experts. (Maximum size = 10MB)</p>
                                <input type="file" name="file[]" id="additionalFile" class="d-none" multiple>
                                <div class="d-flex">
                                    <label for="additionalFile" class="d-flex align-items-center gap-2 px-3 py-2 border-0 btn rounded-0 upload-btn theme-btn-green">
                                        <img src="{{ asset('public/assets/images/plus.png') }}" class="p-1 arrow">
                                        <p class="text-white m-0 btn-small-text font-500">UPLOAD ADDITIONAL DOCUMENTS</p>
                                    </label>
                                    <div class="delete-icon-2">
                                        <button class="btn border-0 p-0 delete-image-btn-2"><img class="delete-img"
                                                src="{{ asset('public/assets/images/delete.png') }}"
                                                alt=""></button>
                                    </div>
                                </div>
                            </div>

                            <div class="section-devision">
                                <div class="d-flex align-items-center gap-2 px-3 py-3 heading-band">
                                    <img src="{{ asset('public/assets/images/Path 328.png') }}" class="arrow">
                                    <p class="text-white m-0 font-500">STEP 3 – Additional Information</p>
                                </div>
                                <p class="mt-3">Please provide as much additional information and context as possibe. This will help our experts in understanding your requirements better and coming up with the best product.</p>
                                <div class="mt-4">
                                    <p class="font-600">Who would you consider to be your target audience? *</p>
                                    <input hidden type="text" value="Who would you consider to be your target audience?" name="question[]">
                                    <textarea name="answer[]" id="" cols="30" rows="4" class="w-100 light-border"></textarea>
                                </div>
                                <div class="mt-4">
                                    <p class="font-600">
                                        Are there any specific points, key takeaways, or concepts from your research article that you would like us to highlight? *</p>
                                    <input hidden type="text" value="Are there any specific points, key takeaways, or concepts from your research article that you would like us to highlight?" name="question[]">
                                    <textarea name="answer[]" id="" cols="30" rows="4" class="w-100 light-border"></textarea>
                                </div>
                                <div class="mt-4">
                                    <p class="font-600">Select language style</p>
                                    <div class="overflow-auto">
                                        <div class="advance-table-container remove-border">
                                            <table class="set-width">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                <input type="radio" name="language" value = "British English">
                                                                British English
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                <input type="radio" name="language" value = "American English">
                                                                American English
                                                            </label>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="section-devision">
                                <div class="d-flex align-items-center gap-2 px-3 py-3 heading-band">
                                    <img src="{{ asset('public/assets/images/Path 328.png') }}" class="arrow">
                                    <p class="text-white m-0 font-500">STEP 4 – Contact Details</p>
                                </div>
                                <div class="container-width">
                                    <div class="row mt-5">
                                        <div class="col-3">
                                            <div class="w-100 shadow-none dropdown">
                                                <button class="w-100 btn shadow-none bg-white dropdown-toggle border-make"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <p class="mb-0 text-center small-text-btn">Salutation</p>
                                                    <span class="salutation">Dr.</span>
                                                    <input type="hidden" value="" name="salutation" />
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item sal-role">Dr.</a></li>
                                                    <li><a class="dropdown-item sal-role">Mr.</a></li>
                                                    <li><a class="dropdown-item sal-role">Ms.</a></li>
                                                    <li><a class="dropdown-item sal-role">Mrs.</a></li>
                                                    <li><a class="dropdown-item sal-role">Prof.</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="h-100 shadow-none form-control border-make"
                                                placeholder="First name *" name="first_name">
                                        </div>
                                    </div>
                                    <div class="my-4">
                                        <input type="text"
                                            class="shadow-none form-control border-make input-field-info"
                                            placeholder="Last name *" name="last_name">
                                    </div>
                                    <div class="my-4">
                                        <input type="text"
                                            class="shadow-none form-control border-make input-field-info"
                                            placeholder="Primary email *" name="email">
                                    </div>
                                    <div class="my-4">
                                        <h6>Which category describes you the best*</h6>
                                        <select name="program_category" id="contactCategory"
                                            class="shadow-none rounded w-100 select-control border-make input-field-info">
                                            <option value="" selected disabled>Select</option>
                                            <option value="Undergraduate Student (in Bachelor Program)">Undergraduate Student (in Bachelor Program)
                                            </option>
                                            <option value="Postgraduate Student (in Master Program)">Postgraduate Student (in Master Program)</option>
                                            <option value="PhD student">PhD student</option>
                                            <option value="Researcher by profession">Researcher by profession</option>
                                            <option value="other">Other</option>
                                        </select>
                                        <input type="text" id="otherInput" name="other_category"
                                            class="mt-3 shadow-none form-control border-make input-field-info"
                                            placeholder="Specify other category" style="display: none;">
                                    </div>
                                    <div class="my-4">
                                        <input type="text"
                                            class="shadow-none form-control border-make input-field-info"
                                            placeholder="Your University / Company Name" name="institute_name">
                                    </div>
                                    <div class="my-4">
                                        <select
                                        name="location"
                                        id="countries"
                                        class="shadow-none rounded w-100 select-control border-make input-field-info"
                                        onchange="handleOtherOption(this)"
                                      >
                                        <option value="" selected disabled>I am located in *</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Palestinian Territories">Palestinian Territories</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Other">Other</option>
                                      </select>

                                      <!-- Hidden Input Field -->
                                      <div id="otherLocationContainer" style="display: none; margin-top: 10px;">
                                        <input
                                          type="text"
                                          id="otherLocationInput"
                                          name="other_location"
                                          class="shadow-none rounded w-100 select-control border-make input-field-info"
                                          placeholder="Please specify your location"
                                        />
                                      </div>

                                    </div>
                                    <div class="my-4">
                                        <input type="text"
                                            class="shadow-none form-control border-make input-field-info"
                                            placeholder="How did you hear about us? *" name="question">
                                    </div>
                                </div>
                                <div class="ms-md-4 my-4">
                                    <label class="d-flex gap-2 align-items-center">
                                        <input type="radio" name="news_check" checked>
                                        <p class="mb-0">I would like to receive latest news and announcements from MENA
                                            Medical Research</p>
                                    </label>
                                    <label class="mt-3 d-flex gap-2 align-items-center">
                                        <input type="radio" name="agree_check" required value="yes">
 <p class="mb-0">I have read and agree to MENA Medical Research’s <a
                                                href="{{route('privacy-policy')}}" class="text-decoration-none text-blue">Privacy Policy</a>
                                            and <a href="{{route('term-condition')}}" class="text-decoration-none text-blue">Terms of Use</a>
                                        </p>
                                    </label>
                                </div>
                            </div>
                            <div id="agreeCheck" class="alert alert-danger alert-dismissible fade show"
                                role="alert" style="display: none;">
<div id="successMessage" class="alert alert-success alert-dismissible fade show"
                                role="alert" style="display: none;">
                                <strong>Warning!</strong> You must agree to the terms and privacy policy.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                                <strong>Success!</strong> Your order has been successfully submitted, and a confirmation
                                email has been sent to your email address.
                                The order will be reviewed by MENA Medical Research, and a final quotation will be emailed
                                to you within 24 hours.
                                In case you do not hear from us within 24 hours, please send an email to
                                <span class="text-info">info@menamedicalresearch.com</span>.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>


                            <input type="button" id="submit-quotation"
                            class="d-flex align-items-center gap-2 mt-4 text-white m-0 btn-small-text font-500 px-3 py-3 border-0 upload-btn theme-btn-green"
                            value="SUBMIT QUOTATION REQUEST" />
                        </form>
                    </div>
                    <div class="col-md-4 mt-md-0 mt-4">
                        @include('common.components.order_summary')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function handleOtherOption(selectElement) {
            const otherLocationContainer = document.getElementById('otherLocationContainer');
            if (selectElement.value === 'Other') {
            // Show input field when "Other" is selected
            otherLocationContainer.style.display = 'block';
            } else {
            // Hide input field for other selections
            otherLocationContainer.style.display = 'none';
            }
        }
        $(document).ready(function() {
            // Trigger AJAX request when radio button is changed
            $("input[name='price_cat']").change(function() {
                var selectedPriceCategory = $("input[name='price_cat']:checked")
                .val(); // Get the value of the selected radio button
                console.log("Selected Price Category:", selectedPriceCategory); // Optional: For debugging
                // alert(selectedPriceCategory);
                let price = 0;
                let days = 0;

                // Check which price category is selected
                if (selectedPriceCategory === "Regular Price") {
                price = parseFloat($('#regular_price').text()) || 0;
                days = parseInt($('#regular_price_days').text()) || 0;
                } else if (selectedPriceCategory === "Discounted Price") {
                price = parseFloat($('#discounted_price').text()) || 0;
                days = parseInt($('#discounted_price_days').text()) || 0;
                }
                if (price === 0 || days === 0) {
                    toastr.error('Please Enter Approximate Word Count to Calculate Price first.');
                    $("input[name='price_cat']").prop('checked', false);
                    return;
                    // Uncheck all radio buttons
                } else {
                    console.log(`Price: ${price}, Days: ${days}`);
                }
                $('#service_name').text($("#service").val() + ' - ' + selectedPriceCategory); // Concatenate package name and text
                $('#service_price').text(price); // Set the price
                // $('#estimate-price').text(price);
                $('#estimate-price').text(parseFloat($('#additional_service_price').text() || 0) + price);
                 // Set the price
                return;
            });
        });

        $(document).ready(function() {
            // Trigger AJAX request when the additional services radio button is changed
            $("input[name='additional_price_cat']").change(function() {
                var selectedPriceCategory = $("input[name='price_cat']:checked").val();
                if(!selectedPriceCategory){
                    toastr.error('Please Enter Approximate Word Count to Calculate Price first');
                    $("input[name='additional_price_cat']").prop('checked', false);
                    return;
                }
                // Get the value of the selected radio button
                var selectedAdditionalService = $("input[name='additional_price_cat']:checked").val();
                console.log("Selected Additional Service:", selectedAdditionalService); // Optional: For debugging
                // alert(selectedAdditionalService);
                let price = 0;

                // Determine the price of the selected additional service
                var selectedElement = $("input[name='additional_price_cat']:checked").closest('tr');
                var priceElement = selectedElement.find('.additional_price_cat_value');

                if (priceElement.length > 0) {
                    price = parseFloat(priceElement.text()) || 0; // Get the price value
                }

                // Validate price
                if (price === 0) {
                    toastr.error('Please select a valid additional service.');
                    $("input[name='additional_price_cat']").prop('checked', false);
                    return;
                } else {
                    console.log(`Price: ${price}`);
                }

                // Update UI elements based on the selected additional service
                $('#additional_service_name').text(selectedAdditionalService + ' Service'); // Update service name
                $('#additional_service_price').text(price); // Set the price
                $('#estimate-price').text(parseFloat($('#service_price').text() || 0) + price);
                return;
            });
        });

        $(document).ready(function() {
            let debounceTimer;
            $('#wordCount').on('input', function() {
                clearTimeout(debounceTimer);
                let value = $(this).val();
                var formData = new FormData();
                formData.append('service_name', $('#service').val());
                let words = $('#wordCount').val();
                debounceTimer = setTimeout(function() {
                    if (value !== '') {
                        $.ajax({
                            url: '{{ route('postersAndPresentationServicePrices') }}', // Replace with your server endpoint
                            method: 'POST',
                            headers: {
                                'X-CSRF-Token': '{{ csrf_token() }}',
                            },
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                console.log('Response:', response);
                                let regularPrice = null,
                                    regularDays = null;
                                let discountedPrice = null,
                                    discountedDays = null;

                            // Loop through the data array to extract regular and discounted prices and days
                            response.data.forEach(item => {
                                const wordsLimit = Number(item.words_limit); // Convert to number
                                const wordsCount = Number(words); // Convert to number

                                if (item.price_category === "Regular") {
                                    if (wordsCount <= wordsLimit) {
                                        regularPrice = item.less_equal_price;
                                    } else {
                                        regularPrice = item.above_equal_price;
                                    }
                                    regularDays = item.delivery_days;
                                }

                                if (item.price_category === "Discounted") {
                                    if (wordsCount <= wordsLimit) {
                                        discountedPrice = item.less_equal_price;
                                    } else {
                                        discountedPrice = item.above_equal_price;
                                    }
                                    discountedDays = item.delivery_days;
                                }
                            });
                                // Update the HTML with the extracted values
                                $('#regular_price').text(regularPrice);
                                $('#regular_price_days').text(regularDays);
                                $('#discounted_price').text(discountedPrice);
                                $('#discounted_price_days').text(discountedDays);
                            },
                            error: function(xhr, status, error) {
                                console.error('Error:', error);
                            }
                        });
                    }
                    if (value == '') {
                        $('#regular_price').text('XXX');
                        $('#regular_price_days').text('XX');
                        $('#discounted_price').text('XXX');
                        $('#discounted_price_days').text('XX');
                    }
                }, 500);
            });
        });

        //calculate price base of words
        $(document).on('click', '#calculatePrice', function() {
            let priceCat = $('input[name="price_cat"]:checked').val();

            let words = $('#wordCount').val();
            if (!words) {
                toastr.error("Please Enter Approximate Word Count to Calculate Price");
                return;
            }
            if (!priceCat) {
                toastr.error("Please Select Price Category");
                return;
            }
            var formData = new FormData();
            // formData.append('price_cat', priceCat);
            formData.append('words', words);
            formData.append('service_name', $('#service').val());
            formData.append('price_category', priceCat);
            // console.log(JSON.stringify(Object.fromEntries(formData.entries())));
            // Send AJAX request
            $.ajax({
                url: '{{ route('postersAndPresentation.calculatePrice') }}', // Replace with your server endpoint
                method: 'POST',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Handle success response
                    var estimatedPrice = response.data; // Modify based on actual response structure
                    // Update the estimated price in the DOM
                    $('#estimate-price').text('$' + estimatedPrice);
                    $('#service_price').text('$' + estimatedPrice);
                    $('#service_name').text($('#service').val() + ' - ' + response.price_category);
                    if (priceCat == 'Regular Price') {
                        $('#regular_price').text(response.genral_price);
                        $('#regular_price_days').text(response.days);
                    } else if (priceCat == 'Discounted Price') {
                        $('#discounted_price').text(response.genral_price);
                        $('#discounted_price_days').text(response.days);
                    }

                },
                error: function(error) {
                    // Handle error response
                    console.error('Error:', error);
                    // alert('An error occurred. Please try again.');
                }
            });
        });
        //store quotation request
        $('#submit-quotation, .submit-quotation').on('click', function() {
            let priceCat = $('input[name="price_cat"]:checked').val();
            if (!priceCat) {
                toastr.error("Please Select Price Category");
                return;
            }
            var button = $(this); // Reference to the button
            var originalText = button.val(); // Store the original button text

            // Show loading text and disable the button
            button.val('Submitting...').prop('disabled', true);
            var formData = new FormData();
            // formData.append('words', ($('#wordCount').val()));
            // formData.append('words', ($('#createQuotationForm input[name="words"]').val()).trim());
            formData.append('price_category', ($('input[name="price_cat"]:checked').val()).trim());
            formData.append('service_name',$('#service').val());
            formData.append('language', ($('#createQuotationForm input[name="language"]:checked').val() || '')
                .trim());
            formData.append('additional_instruction', ($(
                '#createQuotationForm textarea[name="additional_instruction"]').val() || '').trim());
            formData.append('salutaion', ($('#createQuotationForm input[name="salutation"]').val() || '').trim());
            formData.append('first_name', ($('#createQuotationForm input[name="first_name"]').val() || '').trim());
            formData.append('last_name', ($('#createQuotationForm input[name="last_name"]').val() || '').trim());
            formData.append('email', ($('#createQuotationForm input[name="email"]').val() || '').trim());
            formData.append('institute_name', ($('#createQuotationForm input[name="institute_name"]').val() || '').trim());
            formData.append('program_category', ($('#createQuotationForm select[name="program_category"]').val() ||
                '').trim());
            formData.append('other_category', ($('#createQuotationForm input[name="other_category"]').val() || '')
                .trim());
            formData.append('location', ($('#createQuotationForm select[name="location"]').val() || '').trim());
            formData.append('other_location', ($('#otherLocationInput').val() || '').trim());
            formData.append('question', ($('#createQuotationForm input[name="question"]').val() || '').trim());
formData.append('news_check', $('#createQuotationForm input[name="news_check"]').is(':checked') ? '1' : '0');            formData.append('agree_check', ($('#createQuotationForm input[name="agree_check"]').val()).trim());
                // Loop through all question inputs
            $('#createQuotationForm input[name="question[]"]').each(function () {
                formData.append('questions[]', $(this).val().trim());
            });

            // Loop through all answer inputs
            let isValid = true;

                        $('#createQuotationForm textarea[name="answer[]"]').each(function (index) {
                        let answerValue = $(this).val().trim();

                        if (!answerValue) {
                            toastr.error("Please complete the step three by adding answer " + (index + 1));
                            button.val(originalText).prop('disabled', false);
                            isValid = false;
                            return false; // Break the loop if validation fails

                        }

                        // If valid, append the value to formData
                        formData.append('answer[]', answerValue);
                        });

                        // Stop the form submission if validation fails
                        if (!isValid) {
                        return;
                        }

            var priceText = $('#estimate-price').text();
            var priceValue = parseFloat(priceText.replace('$', '').trim());
               formData.append('total_price', priceValue);
            formData.append('service_price', $('#service_price').text());
            formData.append('advance_editing', ($('#advance-editing').val() || '').trim());
            formData.append('plagirism_value', ($('#plagirism-value').val() || '').trim());
            const agreeCheck = document.querySelector('input[name="agree_check"]:checked');
             if (!agreeCheck) {
                event.preventDefault();
                $('#agreeCheck').fadeIn();
                button.val(originalText).prop('disabled', false);
                return;
            }
            $('input[name="file[]"]').each(function () {
                let files = this.files;
                for (let i = 0; i < files.length; i++) {
                    formData.append('file[]', files[i]);
                }
            });
            console.log(JSON.stringify(Object.fromEntries(formData.entries())));
            // return;
            // Send AJAX request
            $.ajax({
                url: '{{ route('postersAndPresentation.submit.request') }}', // Replace with your server endpoint
                method: 'POST',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                $('#successMessage').fadeIn();
                toastr.success('Your Order has been Submitted Successfully');
                $('#createQuotationForm')[0].reset();
                $('#createQuotationForm input[type="text"], #createQuotationForm textarea').val('');
                $('#createQuotationForm select').prop('selectedIndex', 0);
                $('#createQuotationForm input[type="radio"]').prop('checked', false);
                $('#createQuotationForm input[type="checkbox"]').prop('checked', false);
                $('#createQuotationForm input[type="file"]').val('');
                $('#service_name').text('');
                $('#service_price').text('');
                $('#plagirism-value').text('');
                $('#estimate-price').text('0'); // Reset to default value
                $('#additional_service_name').text('');
                $('#additional_service_price').text('');
                // setTimeout(function() {
                //         location.reload();
                //     }, 2000);

                },
                error: function(xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    // Clear any existing error messages
                    $('.error-message').remove();

                    // Check for file-specific errors
                    if (errors.file) {
                        // Show file errors in a toaster notification
                        toastr.error(errors.file[0]);
                    }

                    // Loop through the errors and display them under the respective input fields
                    $.each(errors, function(field, messages) {
                        if (field !== 'file') { // Exclude file errors from being shown under input fields
                            var inputField = $('[name="' + field + '"]');
                            if (inputField.length) {
                                inputField.after(
                                    '<span class="error-message text-danger small">' +
                                    messages[0] + '</span>'
                                );
                            }
                        }
                    });
                } else {
        console.error('Error Adding Driver:', xhr);
        toastr.error('Something went wrong. Please try again.');
    }
},

                complete: function() {
                    button.val(originalText).prop('disabled', false);
                }
            });
        });
        $('input, select').on('input change', function() {
            $(this).next('.error-message').remove();
        });
        function jumpToError() {
            // Find the first error message
            var firstError = $('.error-message').filter(':visible').first()

            if (firstError.length) {
                // Scroll to the first error message
                $('html, body').animate({
                    scrollTop: firstError.offset().top - 150 // Adjust offset as needed
                }, 1000); // Animation duration in milliseconds
            }
        }

        // Call the function with a delay of 1000ms (1 second) on button click
        $('#submit-quotation, .submit-quotation').on('click', function() {
            jumpToError();
            setTimeout(function() {
            }, 100); // Delay of 1000 milliseconds
        });
    </script>
@endsection
