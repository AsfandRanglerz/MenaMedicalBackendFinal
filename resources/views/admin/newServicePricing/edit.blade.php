@extends('admin.layout.app')
@section('title', 'Edit Header Content')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="">Back</a>
                <form action="{{ route('newServicePrice.update', $pricing->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Edit Pricing</h4>
                                <div class="row mx-0 px-4">
                                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Service Name <span class="text-danger">*</span></label>
                                            <select name="service_name" id="is_dropdown" class="form-control">
                                                <option disabled selected>Select value</option>
                                                <option value="Language Editing"
                                                    {{ $pricing->service_name == 'Language Editing' ? 'selected' : '' }}>
                                                    Language Editing</option>
                                                <option value="Scientific Editing"
                                                    {{ $pricing->service_name == 'Scientific Editing' ? 'selected' : '' }}>
                                                    Scientific Editing</option>
                                                <option value="Accidental Plagirisam"
                                                    {{ $pricing->service_name == 'Accidental Plagirisam' ? 'selected' : '' }}>
                                                    Accidental Plagirisam</option>
                                                <option value="Manuscript Formatting Service"
                                                    {{ $pricing->service_name == 'Manuscript Formatting Service' ? 'selected' : '' }}>
                                                    Manuscript Formatting Service</option>
                                                <option value="Poster & Presentations"
                                                    {{ $pricing->service_name == 'Poster & Presentations' ? 'selected' : '' }}>
                                                    Poster & Presentations</option>
                                                <option value="Assignment Editing Service"
                                                    {{ $pricing->service_name == 'Assignment Editing Service' ? 'selected' : '' }}>
                                                    Assignment Editing Service</option>
                                                <option value="Thesis Editing Service"
                                                    {{ $pricing->service_name == 'Thesis Editing Service' ? 'selected' : '' }}>
                                                    Thesis Editing Service</option>
                                                <option value="Data Analysis"
                                                    {{ $pricing->service_name == 'Data Analysis' ? 'selected' : '' }}>Data
                                                    Analysis</option>
                                            </select>
                                            @error('service_name')
                                                <div class="text-danger">Service Name is required.</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Package <span class="text-danger">*</span></label>
                                            <select name="package_check" id="package" class="form-control">
                                                <option disabled selected>Select value</option>
                                                <option value="yes"
                                                    {{ $pricing->package_check == 'yes' ? 'selected' : '' }}>Yes</option>
                                                <option value="no"
                                                    {{ $pricing->package_check == 'no' ? 'selected' : '' }}>No</option>
                                            </select>
                                            @error('package_check')
                                                <div class="text-danger">Package selection is required.</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4 pl-sm-0 pr-sm-3 d-none" id="package_cat">
                                        <div class="form-group mb-2">
                                            <label>Package Category <span class="text-danger">*</span></label>
                                            <select name="package_name" id="package_name" class="form-control">
                                                <option disabled selected>Select value</option>
                                                <option value="Basic"
                                                    {{ $pricing->package_name == 'Basic' ? 'selected' : '' }}>Basic
                                                </option>
                                                <option value="Advance"
                                                    {{ $pricing->package_name == 'Advance' ? 'selected' : '' }}>Advance
                                                </option>
                                                <option value="Premium"
                                                    {{ $pricing->package_name == 'Premium' ? 'selected' : '' }}>Premium
                                                </option>
                                            </select>
                                            @error('package_name')
                                                <div class="text-danger">Package Category is required.</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Range <span class="text-danger">*</span></label>
                                            <input type="text" name="range" class="form-control"
                                                placeholder="range e.g up to 1000 words" value="{{ $pricing->range }}">
                                            @error('range')
                                                <div class="text-danger">Range is required.</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mx-0 px-4">
                                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Limit <span class="text-danger">*</span></label>
                                            <input type="text" name="limit" id="limit"
                                                value="{{ $pricing->limit }}" class="form-control"
                                                readonly placeholder="" step="" min="0">
                                            @error('limit')
                                                <div class="text-danger">Limit is required.</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Price <span class="text-danger">*</span></label>
                                            <input type="number" name="price"
                                                value="{{ $pricing->price }}" class="form-control"
                                                placeholder="enter price">
                                            @error('price')
                                                <div class="text-danger">Price is required.</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Delivery Time <span class="text-danger">*</span></label>
                                            <input type="number" name="delivery_days" class="form-control"
                                                value="{{ $pricing->delivery_time }}" placeholder="enter number of days">
                                            @error('delivery_days')
                                                <div class="text-danger">Delivery Time is required.</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row mx-0 px-4">
                                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Package Category</label>
                                            <select name="price_category" id="package" class="form-control">
                                                <option disabled selected>Select value</option>
                                                <option value="Regular"
                                                    {{ $pricing->price_category == 'Regular' ? 'selected' : '' }}>Regular
                                                    Price</option>
                                                <option value="Discounted"
                                                    {{ $pricing->price_category == 'Discounted' ? 'selected' : '' }}>
                                                    Discounted Price for students and researchers in MENA Region</option>
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
            $('#package').on('change', function() {
                if ($(this).val() == 'yes') {
                    $('#package_cat').removeClass('d-none'); // Show the category
                } else if ($(this).val() == 'no') {
                    $('#package_cat').addClass('d-none'); // Hide the category
                    $('#package_name').val(''); // Clear the input value
                }
            });
        });
        $(document).ready(function() {
            if ($('#package').val() == 'yes') {
                $('#package_cat').removeClass('d-none');
            }
        });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Find the range and limit inputs in the edit form
        const rangeInput = document.querySelector('input[name="range"]');
        const limitInput = document.getElementById('limit');

        function updateLimit() {
            const value = rangeInput.value;
            // Extract all numbers from the input
            const numbers = value.match(/\d+/g);
            if (numbers) {
                // Join numbers with comma if more than one
                limitInput.value = numbers.join(',');
            } else {
                limitInput.value = '';
            }
        }

        if (rangeInput && limitInput) {
            rangeInput.addEventListener('input', updateLimit);
            // Call once on page load to sync initial value
            updateLimit();
        }
    });
</script>
@endsection
