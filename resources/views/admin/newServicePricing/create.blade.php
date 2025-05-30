@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ route('newServicePrice.index') }}">Back</a>
                <form id="add_header_content_two" action="{{ route('newServicePrice.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Add Service Pricing</h4>
                                <div class="row mx-0 px-4">
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Service Name</label>
                                            <select name="service_name" id="is_dropdown" class="form-control">
                                                <option disabled selected>Select value</option>
                                                <option value="Language Editing" {{ old('service_name') == 'Language Editing' ? 'selected' : '' }}>Language Editing</option>
                                                <option value="Scientific Editing" {{ old('service_name') == 'Scientific Editing' ? 'selected' : '' }}>Scientific Editing</option>
                                                <option value="Accidental Plagirisam" {{ old('service_name') == 'Accidental Plagirisam' ? 'selected' : '' }}>Accidental Plagirisam</option>
                                                <option value="Manuscript Formatting Service" {{ old('service_name') == 'Manuscript Formatting Service' ? 'selected' : '' }}>Manuscript Formatting Service</option>
                                                <option value="Power Point Presentations" {{ old('service_name') == 'Poster & Presentations' ? 'selected' : '' }}>Power Point Presentations</option>
                                                <option value="Power Point Poster" {{ old('service_name') == 'Poster & Presentations' ? 'selected' : '' }}>Power Point Poster</option>
                                                <option value="Assignment Editing Service" {{ old('service_name') == 'Assignment Editing Service' ? 'selected' : '' }}>Assignment Editing Service</option>
                                                <option value="Thesis Editing Service" {{ old('service_name') == 'Thesis Editing Service' ? 'selected' : '' }}>Thesis Editing Service</option>
                                                <option value="Data Analysis" {{ old('service_name') == 'Data Analysis' ? 'selected' : '' }}>Data Analysis</option>
                                            </select>
                                            @error('service_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Package</label>
                                            <select name="package_check" id="package" class="form-control">
                                                <option disabled selected>Select value</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                            @error('package')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4 pl-sm-0 pr-sm-3 d-none" id="package_cat">
                                        <div class="form-group mb-2">
                                            <label>Package Category</label>
                                            <select name="package_name" id="package" class="form-control">
                                                <option disabled selected>Select value</option>
                                                <option value="Basic" {{ old('package_name') == 'Basic' ? 'selected' : '' }}>Basic</option>
                                                <option value="Advance" {{ old('package_name') == 'Advance' ? 'selected' : '' }}>Advance</option>
                                                <option value="Premium" {{ old('package_name') == 'Premium' ? 'selected' : '' }}>Premium</option>
                                            </select>
                                            @error('package')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div id="pricing-groups">
                                    <div class="row mx-0 px-4 pricing-group col-md-12 col-lg-12">
                                        <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                            <div class="form-group mb-2">
                                                <label>Range</label>
                                                <input type="text" name="range[]" class="form-control range-input" placeholder="range e.g up to 1000 words">
                                                @error('range')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                            <div class="form-group mb-2">
                                                <label>Price</label>
                                                <input type="number" name="price[]" class="form-control" placeholder="enter price">
                                                @error('price')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                            <div class="form-group mb-2">
                                                <label>Limit</label>
                                                <input readonly type="text" name="limit[]" class="form-control limit-input" placeholder="auto-filled">
                                                @error('words_limit')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                            <div class="form-group mb-2">
                                                <label>Delivery Time</label>
                                                <input type="number" name="delivery_days[]" class="form-control" placeholder="enter number of days">
                                                @error('words_limit')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12 mb-2 d-flex align-items-center justify-content-md-center justify-content-start">
                                            <button type="button" class="btn btn-danger remove-group d-none w-100">Remove</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mx-0 px-4 text-end form-group">
                                    <button type="button" class="btn btn-primary" id="add-more-group">Add More</button>
                                </div>
                                {{-- <div class="row mx-0 px-4">
                                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Package Category</label>
                                            <select name="price_category" id="package" class="form-control">
                                                <option disabled selected>Select value</option>
                                                <option value="Regular" {{ old('price_category') == 'Basic' ? 'selected' : '' }}>Regular Price</option>
                                                <option value="Discounted" {{ old('price_category') == 'Advance' ? 'selected' : '' }}>Discounted Price for students and researchers in MENA Region</option>
                                            </select>
                                            @error('price_category')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="card-footer text-center">
                                    <div class="col">
                                        <button type="submit" class="btn btn-success mr-1 btn-bg"
                                            id="submit">Save</button>
                                    </div>
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
<script>
    $('#package').on('change', function() {
    if ($(this).val() == 'yes') {
        $('#package_cat').removeClass('d-none'); // Show the category
    } else if ($(this).val() == 'no') {
        $('#package_cat').addClass('d-none');   // Hide the category
        $('#package_name').val('');            // Clear the input value
    }
});

function bindRangeToLimit(group) {
    const rangeInput = group.querySelector('.range-input');
    const limitInput = group.querySelector('.limit-input');
    function updateLimit() {
        const value = rangeInput.value;
        const numbers = value.match(/\d+/g);
        if (numbers) {
            limitInput.value = numbers.join(',');
        } else {
            limitInput.value = '';
        }
    }
    rangeInput.addEventListener('input', updateLimit);
    updateLimit();
}

document.addEventListener('DOMContentLoaded', function() {
    const groupsContainer = document.getElementById('pricing-groups');
    const addMoreBtn = document.getElementById('add-more-group');

    // Bind for the initial group
    document.querySelectorAll('.pricing-group').forEach(bindRangeToLimit);

    addMoreBtn.addEventListener('click', function() {
        const lastGroup = groupsContainer.querySelector('.pricing-group:last-child');
        const newGroup = lastGroup.cloneNode(true);

        // Clear input values
        newGroup.querySelectorAll('input').forEach(input => input.value = '');
        // Show remove button
        newGroup.querySelector('.remove-group').classList.remove('d-none');

        // Append and re-bind
        groupsContainer.appendChild(newGroup);
        bindRangeToLimit(newGroup);
    });

    // Remove group handler (event delegation)
    groupsContainer.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-group')) {
            const allGroups = groupsContainer.querySelectorAll('.pricing-group');
            if (allGroups.length > 1) {
                e.target.closest('.pricing-group').remove();
            }
        }
    });
});
</script>
@endsection
