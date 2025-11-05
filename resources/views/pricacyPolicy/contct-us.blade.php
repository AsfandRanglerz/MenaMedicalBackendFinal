@extends('layout.master')

@section('title', 'Contact Us')

@section('style')
    <style></style>
@endsection

@section('content')
    <div>
        <div class="position-relative banner page-banner">
            <img src="{{ asset('public/assets/images/banner-img.png') }}" class="w-100 h-100" />
            <div class="content">
                <h1 class="heading">Contact Us</h1>
            </div>
        </div>
        <div class="my-3 my-md-5 px-3 px-md-0">
            <div class="container shadow-lg rounded p-3 px-md-3 py-md-4">
                <div class="section-devision">
                    <div class="d-flex align-items-center gap-2 px-3 py-3 heading-band">
                        <h4>Contact Us</h4>
                    </div>
                    <div class="container-width">
                        <form action="#" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-12 col-md-6 mb-3 mb-md-0">
                                    <input type="text" class="shadow-none form-control border-make input-field-info"
                                        id="contactName" name="contact_name" placeholder="Your Name *" required>
                                    <div class="invalid-feedback text-danger" id="nameError" style="display:none;"></div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="email" class="shadow-none form-control border-make input-field-info"
                                        id="contactEmail" name="contact_email" placeholder="Your Email *" required>
                                    <div class="invalid-feedback text-danger" id="emailError" style="display:none;"></div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <textarea class="shadow-none form-control border-make input-field-info" id="contactMessage" name="contact_message"
                                    rows="4" placeholder="Your Message *" required></textarea>
                                <div class="invalid-feedback text-danger" id="messageError" style="display:none;"></div>
                            </div>
                            <div
                                style="position: absolute; left: -10000px; top: -10000px; height: 1px; width: 1px; overflow: hidden;">
                                <label for="contact_time">Best time to contact you</label>
                                <input type="text" name="bot" id="contact_time" autocomplete="off">
                            </div>
                            <!-- reCAPTCHA widget -->
                            <div class="g-recaptcha mb-3" data-sitekey="{{ config('services.recaptcha.site_key') }}">
                            </div>
                            <input type="button" id="submit-quotationn"
                                class="d-flex align-items-center gap-2 text-white btn-small-text font-500 px-3 py-3 border-0 upload-btn theme-btn-green"
                                value="SUBMIT" />

                        </form>
                        <!-- Mailing Address Section -->
                        <div class="mt-5">

                            <p class="mb-0">Helixor Scientific Limited</p>
                            <p class="mb-0">Flat 5, 4/F, Won Hing Building,</p>
                            <p class="mb-0">74-78 Stanley Street, Central,</p>
                            <p class="mb-0">Hong Kong</p>
                        </div>
                    </div>
                </div>
                <div class="my-4">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#submit-quotationn').on('click', function(e) {
                e.preventDefault();
                var $btn = $(this);
                var originalText = $btn.val();
                var hasError = false;
                // Clear previous errors
                $('#nameError').hide().text('');
                $('#emailError').hide().text('');
                $('#messageError').hide().text('');
                // Validate fields
                var name = $('#contactName').val().trim();
                var email = $('#contactEmail').val().trim();
                var message = $('#contactMessage').val().trim();
                if (!name) {
                    $('#nameError').text('Name is required.').show();
                    hasError = true;
                }
                if (!email) {
                    $('#emailError').text('Email is required.').show();
                    hasError = true;
                } else if (!/^\S+@\S+\.\S+$/.test(email)) {
                    $('#emailError').text('Please enter a valid email address.').show();
                    hasError = true;
                }
                if (!message) {
                    $('#messageError').text('Message is required.').show();
                    hasError = true;
                }
                if (hasError) {
                    return;
                }
                // Show loading
                $btn.prop('disabled', true).val('Submitting...');
                $.ajax({
                    url: '{{ route('contact.submit') }}',
                    type: 'POST',
                    data: {
                        contact_name: name,
                        bot: $('#contact_time').val(),
                        contact_email: email,
                        contact_message: message,
                        _token: $('input[name="_token"]').val(),
                        'g-recaptcha-response': grecaptcha.getResponse()
                    },
                    success: function(response) {
                        $btn.prop('disabled', false).val(originalText);
                        toastr.success('Message sent successfully!');
                        // Optionally clear the form
                        $('#contactName').val('');
                        $('#contactEmail').val('');
                        $('#contactMessage').val('');
                        grecaptcha.reset();
                    },
                    error: function(xhr) {
                        $btn.prop('disabled', false).val(originalText);

                        if (xhr.responseJSON) {
                            const res = xhr.responseJSON;

                            // Show only one toastr error
                            if (res.message) {
                                toastr.error(res.message); // Only once
                            }

                            // Field errors (for form validation)
                            if (res.errors) {
                                if (res.errors.contact_name) {
                                    $('#nameError').text(res.errors.contact_name[0]).show();
                                }
                                if (res.errors.contact_email) {
                                    $('#emailError').text(res.errors.contact_email[0]).show();
                                }
                                if (res.errors.contact_message) {
                                    $('#messageError').text(res.errors.contact_message[0])
                                        .show();
                                }
                            }
                        } else {
                            toastr.error('An unknown error occurred.');
                        }

                        grecaptcha.reset();
                    }

                });
            });
        });
    </script>
@endsection
