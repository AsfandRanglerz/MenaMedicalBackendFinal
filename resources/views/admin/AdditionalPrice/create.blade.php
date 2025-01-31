@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ route('AdditionalPrice') }}">Back</a>
                <form id="add_header_content_two" action="{{ route('AdditionalPrice.Store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Add Additional Prices</h4>
                                <div class="row mx-0 px-4">
                                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Service Name</label>
                                            <select name="services" id="is_dropdown" class="form-control">
                                                <option disabled selected>Select value</option>
                                                <option value="Language Editing" {{ old('services') == 'Language Editing' ? 'selected' : '' }}>Language Editing</option>
                                                <option value="Thesis Editing Service" {{ old('services') == 'Thesis Editing Service' ? 'selected' : '' }}>Thesis Editing Service</option>
                                                <option value="Accidental Plagirisam" {{ old('services') == 'Accidental Plagirisam' ? 'selected' : '' }}>Accidental Plagirisam</option>
                                                <option value="Manuscript Formatting Service" {{ old('services') == 'Manuscript Formatting Service' ? 'selected' : '' }}>Manuscript Formatting Service</option>
                                            </select>
                                            @error('services')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                        <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                            <div class="form-group mb-2">
                                                <label>Add Basic Price</label>
                                                <input type="number" name="basic_package_price" class="form-control" placeholder="Enter price" step="0.001">
                                                @error('basic_package_price')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Add Advance Price</label>
                                            <input type="number" name="advance_package_price" class="form-control" placeholder="Enter price" step="0.001">
                                            @error('advance_package_price')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label> Additional Service</label>
                                            <input type="text" name="additional_services" class="form-control" placeholder="enter additional service">
                                            @error('additional_services')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                            </div>
                            <div class="card-footer text-center">
                                <div class="col">
                                    <button type="submit" class="btn btn-success mr-1 btn-bg"
                                        id="submit">Save</button>
                                </div>

                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
@section('js')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script src="{{asset('public/admin/assets/js/jquery.js')}}"></script>
<script>
    $('#package').on('change', function() {
    if ($(this).val() == 'yes') {
        $('#package_cat').removeClass('d-none'); // Show the category
    } else if ($(this).val() == 'no') {
        $('#package_cat').addClass('d-none');   // Hide the category
        $('#package_name').val('');            // Clear the input value
    }
});

$(document).ready(function () {
    // Define options for packages based on services
    const options = {
        'Language Editing': [
            { value: 'Basic', text: 'Basic' },
            { value: 'Advance', text: 'Advance' }
        ],
        'Thesis Editing Service': [
            { value: 'Advance', text: 'Advance' }
        ]
    };

    // Event listener for the 'Service Name' dropdown
    $('#is_dropdown').on('change', function () {
        const selectedService = $(this).val(); // Get selected service
        const $packagesDropdown = $('#packages_dropdown'); // Reference to packages dropdown

        // Clear existing options
        $packagesDropdown.empty();
        $packagesDropdown.append('<option disabled selected>Select value</option>');

        // Populate dropdown based on selected service
        if (options[selectedService]) {
            $.each(options[selectedService], function (index, option) {
                $packagesDropdown.append(
                    $('<option>', { value: option.value, text: option.text })
                );
            });
        }
    });

    // Retain old selected package if any (useful for form validation errors)
    const oldPackage = "{{ old('packages') }}";
    if (oldPackage) {
        $('#packages_dropdown').val(oldPackage);
    }
});


</script>
@endsection
