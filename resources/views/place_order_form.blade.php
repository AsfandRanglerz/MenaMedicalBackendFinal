@extends('layout.master')

@section('title', $title)
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
                <h4 class="primary-heading">
                    @if ($title == 'Poster / PowerPoint Presentation Service')
                        {{ $form_head }}
                    @elseif ($title == 'Thesis Editing Service')
                        {{ $package . $title }}
                    @else
                        {{ $title }}
                    @endif
                </h4>

                @if ($title == 'Poster / PowerPoint Presentation Service')
                    <input type="text" id="package_name" value="{{ $form_head }}" hidden>
                @elseif ($title == 'Thesis Editing Service')
                    <input type="text" id="package_name" value="{{ $package . $title }}" hidden>
                @else
                    <input type="text" id="package_name" value="{{ $title }}" hidden>
                @endif
                <div class="row mt-4">
                    <div class="col-md-8">
                        <form action="" id="createQuotationForm" enctype="multipart/form-data" class="mena-form">
                            <div>
                                <div class="d-flex align-items-center gap-2 px-3 py-3 heading-band">
                                    <img src="{{ asset('public/assets/images/Path 328.png') }}" class="arrow">
                                    <p class="text-white m-0 font-500">STEP 1: Select the Word Count of your Document</p>
                                </div>
                                <p class="m-0 mt-2 mb-3 info-heading">Please select the appropriate word count category.</p>
                                <div class="overflow-auto">
                                    <!-- Table for big screen -->
                                    <div class="d-none d-sm-block advance-table-container">
                                        <table>
                                            <thead>
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
                                                @foreach ($newPrices as $data)
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                <input type="radio" name="price_cat"
                                                                    value="{{ $data->range }}"
                                                                    data-price="{{ $data->price }}"
                                                                    data-days="{{ $data->delivery_time }}"
                                                                    data-limit="{{ $data->limit }}">

                                                                {{ $data->range }}
                                                            </label>
                                                            <input type="hidden" name="limit" class="limit"
                                                                value="{{ $data->limit }}">
                                                        </td>
                                                        <td>USD <span class="price_display">{{ $data->price }}</span></td>
                                                        <td><span class="days_display">{{ $data->delivery_time }}</span>
                                                            days</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                    </div>

                                    <!-- Table for big screen -->
                                    <div class="d-sm-none advance-table-container">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th colspan="2" class="px-3 py-2 head-one font-600">Select Price
                                                        Category
                                                    </th>
                                                </tr>
                                                <tr class="category-header">
                                                    <th class="text-white font-600 text-center price-column py-2">Price</th>
                                                    <th class="text-white font-600 text-center delivery-column">Delivery
                                                        Time
                                                    </th>
                                                </tr>
                                            </thead>
                                            <table>
                                                @foreach ($newPrices as $data)
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                <input type="radio" name="price_cat"
                                                                    value="{{ $data->range }}"
                                                                    data-price="{{ $data->price }}"
                                                                    data-days="{{ $data->delivery_time }}"
                                                                    data-limit="{{ $data->limit }}">

                                                                {{ $data->range }}
                                                            </label>
                                                            <input type="hidden" name="limit" class="limit"
                                                                value="{{ $data->limit }}">
                                                        </td>
                                                        <td>USD <span class="price_display">{{ $data->price }}</span></td>
                                                        <td><span class="days_display">{{ $data->delivery_time }}</span>
                                                            days</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                    </div>
                                </div>
                                <p class="m-0 mt-1 font-500 small">*Days shown above are working days</p>
                                @if (!empty($additionalsServices) && count($additionalsServices) > 0)
                                    <div class="section-devision">
                                        <div class="d-flex align-items-center gap-2 px-3 py-3 heading-band">
                                            <img src="{{ asset('public/assets/images/Path 328.png') }}" class="arrow">
                                            <p class="text-white m-0 font-500">STEP 2 - Select Additional Services that you
                                                would
                                                like for this document</p>
                                        </div>
                                        <div class="overflow-auto mt-4">
                                            <div class="advance-table-container">
                                                <table id="additional_services_table">
                                                    <thead>
                                                        <tr class="category-header">
                                                            <th class="px-3 py-2 head-one font-600">Select Price Category
                                                            </th>
                                                            <th class="text-white font-600 text-center price-column">Price
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($additionalsServices as $data)
                                                            <tr>
                                                                <td>
                                                                    <label>
                                                                        <input type="checkbox" name="additional_price_cat"
                                                                            value="{{ $data->additional_services }}"
                                                                            class='m-2 additional_price_check'>
                                                                        {{ $data->additional_services }}
                                                                    </label>
                                                                </td>
                                                                <td>USD <span
                                                                        class="additional_price_cat_value">{{ $data->basic_package_price }}</span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>


                                                </table>
                                            </div>
                                        </div>
                                        <p class="m-0 mt-1 font-500 small">*Plagiarism Check and Manuscript Formatting are
                                            already included in Premium Editing service Price for Plagiarism Check and
                                            Manuscript Formatting displayed above is for up to 6,000 words. There will be a
                                            customized charge for longer documents.</p>
                                    </div>
                                @endif
                                <div class="section-devision">
                                    <div class="d-flex align-items-center gap-2 px-3 py-3 heading-band">
                                        <img src="{{ asset('public/assets/images/Path 328.png') }}" class="arrow">
                                        <p class="text-white m-0 font-500">STEP
                                            {{ !empty($additionalsServices) && count($additionalsServices) > 0 ? '3' : '2' }}
                                            - Enter Invoice Number</p>
                                    </div>
                                    <div class="overflow-auto mt-4">
                                        <div class="d-flex align-items-center gap-3">
                                            <small class="mb-0 fw-bolder">
                                                Enter the invoice number of invoice received by you
                                            </small>
                                             <div style="position: relative;">
                                            <input type="text" name="invoice_number" class="form-control"
                                                style="width: 200px;" placeholder="Enter Invoice Number" id="invoice_number"/>

                                            <!-- Error message -->
                                            <div id="invoice-error" style="color: red; font-size: 0.8rem; display: none; margin-top: 3px;"></div>
                                        </div>
                                                <!-- The link -->
                                                <small class="mb-0">
                                                    <a href="javascript:void(0);" id="showInvoiceHelp"
                                                    class="text-decoration-none text-blue">
                                                    Don’t have an invoice number?
                                                </a>
                                            </small>

                                        </div>
                                        <div id="invoice-error" style="color: red; font-size: 0.9rem; display: none; margin-top: 5px;"></div>
                                        <label class="mt-3 d-flex gap-2 align-items-center">
                                            <input type="radio" name="agree_check" required value="yes">
                                            <p class="mb-0">I have read the <a href="{{ route('term-condition') }}"
                                                    class="text-decoration-none text-blue">Terms of Use</a>
                                                and agree with the terms
                                            </p>
                                        </label>
                                    </div>

                                </div>
                            </div>
                                <!-- Custom success message box with close button -->
                                <div id="toggleInvoiceHelp" class="alert alert-success alert-dismissible fade show mt-2"
                                    role="alert" style="display: none;">
                                    <strong>Note:</strong> The invoice number is mentioned on the payment invoice sent to you by
                                    <strong>MENA Medical Research</strong> after reviewing your submitted documents.
                                    If you have not received a payment invoice, please go back to the required Services page to
                                    submit your document for preliminary review.

                                    <button type="button" class="btn-close" aria-label="Close" id="closeInvoiceHelp"></button>
                                </div>


                            <div
                                style="position: absolute; left: -10000px; top: -10000px; height: 1px; width: 1px; overflow: hidden;">
                                <label for="contact_time">Best time to contact you</label>
                                <input type="text" name="contact_time" id="contact_time" autocomplete="off">
                            </div>
                            <div class="d-flex flex-column align-items-center">
                                <!-- reCAPTCHA widget -->
                                <div class="g-recaptcha mb-3" data-sitekey="{{ config('services.recaptcha.site_key') }}">
                                </div>

                                <!-- Button -->
                                <input type="button" id="submit-quotationn"
                                    class="d-flex align-items-center gap-2 text-white btn-small-text font-500 px-3 py-3 border-0 upload-btn theme-btn-green"
                                    value="MAKE PAYMENT" />
                            </div>

                        </form>
                    </div>
                    <div class="col-md-4 mt-md-0 mt-4">
                        @include('common.components.order_summary1')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

<script>
document.getElementById('submit-quotationn').addEventListener('click', function () {
    const invoiceInput = document.getElementById('invoice_number');
    const invoice = invoiceInput.value.trim();
    const errorDiv = document.getElementById('invoice-error');

    if (invoice === '') {
        errorDiv.innerText = 'Invoice Number field is required.';
        errorDiv.style.display = 'block';
    } else {
        errorDiv.style.display = 'none';
        // Perform success logic here, like sending data
        alert('Invoice Number has been submitted successfully');
        invoiceInput.value = '';
    }
});

// Hide error as user types
document.getElementById('invoice_number').addEventListener('input', function () {
    const errorDiv = document.getElementById('invoice-error');
    if (this.value.trim() !== '') {
        errorDiv.style.display = 'none';
    }
});
</script>


    <script>
        $(document).ready(function() {
            $('#showInvoiceHelp').on('click', function() {
                $('#toggleInvoiceHelp').fadeIn();
            });

            $('#closeInvoiceHelp').on('click', function() {
                $('#toggleInvoiceHelp').fadeOut(); // Hide help message
            });
        });

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
            $("input[name='price_cat']").change(function() {
                var selectedPriceCategory = $("input[name='price_cat']:checked")
                    .val(); // Get the value of the selected radio button
                console.log("Selected Price Category:", selectedPriceCategory); // Optional: For debugging
                // let price = 0;
                // let days = 0;
                // if (selectedPriceCategory === "Regular Price") {
                //     price = parseFloat($('#regular_price').text()) || 0;
                //     days = parseInt($('#regular_price_days').text()) || 0;
                // } else if (selectedPriceCategory === "Discounted Price") {
                //     price = parseFloat($('#discounted_price').text()) || 0;
                //     days = parseInt($('#discounted_price_days').text()) || 0;
                // }
                // if (price === 0 || days === 0) {
                //     toastr.error('Please Enter Approximate Word Count to Calculate Price');
                //     $("input[name='price_cat']").prop('checked', false);
                //     return;
                // } else {
                //     console.log(`Price: ${price}, Days: ${days}`);
                // }
                // const price = parseFloat($(this).data('price')) || 0;
                // const days = parseInt($(this).data('days')) || 0;
                // $('#service_name').text('Scientific Editing - ' +
                //     selectedPriceCategory); // Concatenate package name and text
                // $('#service_price').text(price); // Set the price
                // $('#estimate-price').text(parseFloat($('#additional_service_price').text() || 0) + price);
                const price = parseFloat($(this).data('price')) || 0;
                const days = parseInt($(this).data('days')) || 0;

                $('#service_name').text($("#package_name").val() + ' - ' + selectedPriceCategory);
                $('#service_price').text(price);

                // 🔽 Correctly calculate total additional service price
                let additionalTotal = 0;
                $("#additional_service_price div").each(function() {
                    const val = parseFloat($(this).text()) || 0;
                    additionalTotal += val;
                });

                // 🔽 Proper addition
                $('#estimate-price').text(price + additionalTotal);
                return;
            });
        });

        $(document).ready(function() {
            $("input[name='additional_price_cat']").change(function() {
                let selected = $("input[name='additional_price_cat']:checked");

                // Get base price
                let basePrice = parseFloat($('#service_price').text()) || 0;

                // Initialize totals
                let totalAdditionalPrice = 0;
                let serviceNamesHtml = "";
                let servicePricesHtml = "";

                // Loop through all checked checkboxes
                selected.each(function() {
                    let row = $(this).closest('tr');
                    let serviceName = $(this).val();
                    let price = parseFloat(row.find('.additional_price_cat_value').text()) || 0;

                    serviceNamesHtml += `<div>${serviceName}</div>`;
                    servicePricesHtml += `<div>${price}</div>`;

                    totalAdditionalPrice += price;
                });

                // Update summary boxes
                $('#additional_service_name').html(serviceNamesHtml);
                $('#additional_service_price').html(servicePricesHtml);
                $('#estimate-price').text(`${basePrice + totalAdditionalPrice}`);
            });
        });


        //calculate price base of words
        $(document).on('click', '#calculatePrice, #calculatePrice2', function() {
            let priceCat = $('input[name="price_cat"]:checked').val();
            let words = $('#wordCount').val() || $('#wordCount2').val();
            if (!words) {
                toastr.error("Please Enter Approximate Word Count to Calculate Price");
                return;
            }
            var formData = new FormData();
            formData.append('words', words);
            formData.append('service_name', 'Scientific Editing');
            console.log(JSON.stringify(Object.fromEntries(formData.entries())));
            // Send AJAX request
            $.ajax({
                url: '{{ route('calculatePrice') }}',
                method: 'POST',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    if (response.status === "success" && response.results) {
                        response.results.forEach(function(item) {
                            if (item.price_category === "Regular Price") {
                                document.getElementById('regular_price').textContent =
                                    parseFloat(item.price);
                                document.getElementById('regular_price_days').textContent = item
                                    .days;
                                document.getElementById('regular_price2').textContent =
                                    parseFloat(item.price);
                                document.getElementById('regular_price_days2').textContent =
                                    item
                                    .days;
                            } else if (item.price_category === "Discounted Price") {
                                document.getElementById('discounted_price').textContent =
                                    parseFloat(item.price);
                                document.getElementById('discounted_price_days').textContent =
                                    item.days;
                                document.getElementById('discounted_price2').textContent =
                                    parseFloat(item.price);
                                document.getElementById('discounted_price_days2').textContent =
                                    item.days;
                            }
                        });
                    } else {
                        console.error("Unexpected response structure:", response);
                    }
                },
                error: function(error) {

                    console.error('Error:', error);

                }
            });
        });
        //store quotation request
        $('#submit-quotation, .submit-quotation').on('click', function() {
            let recaptchaResponse = grecaptcha.getResponse();
            if (!recaptchaResponse) {
                toastr.error("Please complete the reCAPTCHA");
                return;
            }
            let priceCat = $('input[name="price_cat"]:checked').val();
            if (!priceCat) {
                toastr.error("Please Select Price Category");
                return;
            }
            var button = $(this);
            var originalText = button.val();
            button.val('Submitting...').prop('disabled', true);
            var formData = new FormData();
            formData.append('g-recaptcha-response', recaptchaResponse);
            // formData.append('words', ($('#createQuotationForm input[name="words"]').val()).trim());
            formData.append('price_category', ($('input[name="price_cat"]:checked').val()).trim());
            formData.append('limit', $('input[name="price_cat"]:checked').data('limit'));
            formData.append('service_name', 'Scientific Editing');
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
            formData.append('other_location', ($('#otherLocationInput').val() || '').trim());
            formData.append('question', ($('#createQuotationForm input[name="question"]').val() || '').trim());
            formData.append('news_check', $('#createQuotationForm input[name="news_check"]').is(':checked') ? '1' :
                '0');
            formData.append('agree_check', ($('#createQuotationForm input[name="agree_check"]').val()).trim());
            var priceText = $('#estimate-price').text();
            var priceValue = parseFloat(priceText.replace('$', '').trim());
            formData.append('total_price', priceValue);
            formData.append('advance_editing', ($('#advance-editing').val() || '').trim());
            formData.append('plagirism_value', ($('#plagirism-value').val() || '').trim());
            const agreeCheck = document.querySelector('input[name="agree_check"]:checked');
            if (!agreeCheck) {
                event.preventDefault();
                $('#agreeCheck').fadeIn();
                button.val(originalText).prop('disabled', false);
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
                url: '{{ route('submitQuotationRequest') }}', // Replace with your server endpoint
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
                    $('#estimate-price').text('0');
                    $('.additional_service').text('');
                    $('.additional_service_price').text('');
                    $('#regular_price').text('xxx');
                    $('#regular_price_days').text('XX');
                    $('#discounted_price').text('xxx');
                    $('#discounted_price_days').text('XX');
                    $('#regular_price2').text('xxx');
                    $('#regular_price_days2').text('XX');
                    $('#discounted_price2').text('xxx');
                    $('#discounted_price_days2').text('XX');
                    // setTimeout(function() {
                    //     location.reload();
                    // }, 2000);
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        // Clear any existing error messages
                        $('.error-message').remove();

                        // Loop through the errors and display them under the respective input fields
                        $.each(errors, function(field, messages) {
                            var inputField = $('[name="' + field + '"]');
                            if (inputField.length) {
                                inputField.after(
                                    '<span class="error-message text-danger small">' +
                                    messages[0] + '</span>');
                            }
                        });
                    } else {
                        console.error('Error Adding Driver:', xhr);
                        toastr.error('Something went wrong. Please try again.');
                    }
                },
                complete: function() {
                    button.val(originalText).prop('disabled', false);
                    grecaptcha.reset();
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
            setTimeout(function() {}, 100); // Delay of 1000 milliseconds
        });
    </script>
@endsection
