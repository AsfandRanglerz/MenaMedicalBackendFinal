@extends('layout.master')

@section('title', 'Assignment Editing Service')
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
</style>
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="container-fluid section-devision">
                <h4 class="primary-heading">Assignment Editing Service</h4>
                <div class="row mt-4">
                    <div class="col-md-8">
                        <form action="" id="createQuotationForm" enctype="multipart/form-data" class="mena-form">
                            <div>
                                <div class="d-flex align-items-center gap-2 px-3 py-3 heading-band">
                                    <img src="{{ asset('public/assets/images/Path 328.png') }}" class="arrow">
                                    <p class="text-white m-0 font-500">STEP 1: Enter the Word Count for Price Estimate and
                                        Delivery
                                        Time</p>
                                </div>
                                <p class="m-0 mt-2 mb-3 info-heading">Please enter the word count of your manuscript /
                                    document. The
                                    word count will help us in displaying a price estimate</p>
                                <div class="overflow-auto">
                                    <div class="advance-table-container">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th colspan="3" class="header">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between px-3 py-2">
                                                            <label for="wordCount" class="font-600">Enter Word
                                                                Count</label>
                                                            <div class="d-flex align-items-center gap-3">

                                                                <input type="number" id="wordCount" class="py-1"
                                                                    name="words">
                                                                <button class="px-3 py-1 theme-btn-green"
                                                                    id="calculatePrice" type="button">Calculate
                                                                    Price</button>
                                                            </div>
                                                        </div>

                                                    </th>
                                                </tr>
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
                                                    <td>USD <span id="regular_price">XXX</span></td>
                                                    <td><span id="regular_price_days">XX</span> days</td>
                                                </tr>
                                                <tr class="head-one">
                                                    <td>
                                                        <label>
                                                            <input type="radio" name="price_cat" value="Discounted Price">
                                                            Discounted Price for students and researchers in MENA Region
                                                        </label>
                                                    </td>
                                                    <td>USD <span id="discounted_price">XXX</span></td>
                                                    <td><span id="discounted_price_days">XX</span> days</td>
                                                </tr>
                                            </table>
                                    </div>
                                </div>
                                <p class="m-0 mt-1 font-500 small">*Days shown above are working days</p>
                            </div>
                            <div class="section-devision">
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
                            </div>
                            <div class="section-devision">
                                <div class="d-flex align-items-center gap-2 px-3 py-3 heading-band">
                                    <img src="{{ asset('public/assets/images/Path 328.png') }}" class="arrow">
                                    <p class="text-white m-0 font-500">STEP 3 – Contact Details</p>
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
                                            <option value="Undergraduate Student (in Bachelor Program)">Undergraduate
                                                Student (in Bachelor Program)
                                            </option>
                                            <option value="Postgraduate Student (in Master Program)">Postgraduate Student
                                                (in Master Program)</option>
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
                            <div id="successMessage" class="alert alert-success alert-dismissible fade show"
                                role="alert" style="display: none;">
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
                    toastr.error('Please calculate price and days first.');
                    $("input[name='price_cat']").prop('checked', false);
                    return;
                    // Uncheck all radio buttons
                } else {
                    console.log(`Price: ${price}, Days: ${days}`);
                }
                $('#service_name').text('Assignment Editing Service - ' +
                selectedPriceCategory); // Concatenate package name and text
                $('#service_price').text(price); // Set the price
                // $('#estimate-price').text(price);
                $('#estimate-price').text(parseFloat($('#additional_service_price').text() || 0) + price);
                // Set the price
                return;
            });
        });
        //calculate price base of words
        $(document).on('click', '#calculatePrice', function() {
            let priceCat = $('input[name="price_cat"]:checked').val();
            let words = $('#wordCount').val();
            if (!words) {
                toastr.error("Please Enter Words Count");
                return;
            }
            var formData = new FormData();
            // formData.append('price_cat', priceCat);
            formData.append('words', words);
            formData.append('service_name', 'Assignment Editing Service');
            console.log(JSON.stringify(Object.fromEntries(formData.entries())));
            // Send AJAX request
            $.ajax({
                url: '{{ route('calculatePrice') }}', // Replace with your server endpoint
                method: 'POST',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);

                    // Check if results are present in the response
                    if (response.status === "success" && response.results) {
                        response.results.forEach(function(item) {
                            // Update Regular Price fields
                            if (item.price_category === "Regular Price") {
                                document.getElementById('regular_price').textContent =
                                    parseFloat(item.price);
                                document.getElementById('regular_price_days').textContent = item
                                    .days;
                            }
                            // Update Discounted Price fields
                            else if (item.price_category === "Discounted Price") {
                                document.getElementById('discounted_price').textContent =
                                    parseFloat(item.price);
                                document.getElementById('discounted_price_days').textContent =
                                    item.days;
                            }
                        });
                    } else {
                        console.error("Unexpected response structure:", response);
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
        $('#submit-quotation').on('click', function() {
            var button = $(this); // Reference to the button
            var originalText = button.val(); // Store the original button text

            // Show loading text and disable the button
            button.val('Submitting...').prop('disabled', true);
            var formData = new FormData();
            // formData.append('words', ($('#wordCount').val()));
            formData.append('words', ($('#createQuotationForm input[name="words"]').val()).trim());
            formData.append('price_category', ($('input[name="price_cat"]:checked').val()).trim());
            formData.append('service_name', 'Assignment Editing Service');
            formData.append('language', ($('#createQuotationForm input[name="language"]:checked').val() || '')
                .trim());
            formData.append('additional_instruction', ($(
                '#createQuotationForm textarea[name="additional_instruction"]').val() || '').trim());
            formData.append('salutation', ($('#createQuotationForm input[name="salutation"]').val() || '').trim());
            formData.append('first_name', ($('#createQuotationForm input[name="first_name"]').val() || '').trim());
            formData.append('last_name', ($('#createQuotationForm input[name="last_name"]').val() || '').trim());
            formData.append('email', ($('#createQuotationForm input[name="email"]').val() || '').trim());
            formData.append('institute_name', ($('#createQuotationForm input[name="institute_name"]').val() || '')
                .trim());
            formData.append('program_category', ($('#createQuotationForm select[name="program_category"]').val() ||
                '').trim());
            formData.append('other_category', ($('#createQuotationForm input[name="other_category"]').val() || '')
                .trim());
            formData.append('location', ($('#createQuotationForm select[name="location"]').val() || '').trim());
            formData.append('other_location', ($('#createQuotationForm select[name="other_location"]').val() || '').trim());
            formData.append('question', ($('#createQuotationForm input[name="question"]').val() || '').trim());
            formData.append('news_check', ($('#createQuotationForm input[name="news_check"]').val() || '').trim());
            formData.append('agree_check', ($('#createQuotationForm input[name="agree_check"]').val()).trim());
            var priceText = $('#estimate-price').text();
            var priceValue = parseFloat(priceText.replace('$', '').trim());
               formData.append('total_price', priceValue);
            formData.append('service_price', $('#service_price').text());
            formData.append('advance_editing', ($('#advance-editing').val() || '').trim());
            formData.append('plagirism_value', ($('#plagirism-value').val() || '').trim());
            const agreeCheck = document.querySelector('input[name="agree_check"]:checked');
            if (!agreeCheck) {
                event.preventDefault();
                toastr.error('You must agree to the terms and privacy policy.');
                return;
            }
            let fileInput = $('input[name="file"]');
            const imageFile = fileInput[0].files[0];
            if (imageFile) {
                formData.append('file', imageFile);
            } else {
                formData.append('file', '');
            }
            console.log(JSON.stringify(Object.fromEntries(formData.entries())));
            // return;
            // Send AJAX request
            $.ajax({
                url: '{{ route('assignmentEditingService.submit.request') }}', // Replace with your server endpoint
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
                    // return;
                    $('#createQuotationForm')[0].reset();
                    $('#createQuotationForm input[type="text"], #createQuotationForm textarea').val('');
                    $('#createQuotationForm select').prop('selectedIndex', 0);
                    $('#createQuotationForm input[type="radio"]').prop('checked', false);
                    $('#createQuotationForm input[type="checkbox"]').prop('checked', false);
                    $('#service_name').text('');
                    $('#service_price').text('');
                    $('#plagirism-value').text('');
                    $('#estimate-price').text('0'); // Reset to default value
                    $('#additional_service_name').text('');
                    $('#additional_service_price').text('');
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                },
                error: function(xhr) {
                    if (xhr.status === 422) { // Laravel validation error
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            toastr.error(messages[0]);
                        });
                    } else {
                        console.error('Error Adding Driver:', xhr);
                        toastr.error('Something went wrong. Please try again.');
                    }
                },
                complete: function() {
                    // Restore the button text and re-enable it
                    button.val(originalText).prop('disabled', false);
                }
            });
        });
    </script>
@endsection
