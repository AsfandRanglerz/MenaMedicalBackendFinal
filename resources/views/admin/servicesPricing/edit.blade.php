@extends('admin.layout.app')
@section('title', 'Edit Header Content')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="">Back</a>
                <form action="{{ route('servicePrice.update', $pricing->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Edit Pricing</h4>
                                <div class="row mx-0 px-4">
                                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Service Name</label>
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
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Package</label>
                                            <select name="package_check" id="package" class="form-control">
                                                <option disabled selected>Select value</option>
                                                <option value="yes"
                                                    {{ $pricing->package_check == 'yes' ? 'selected' : '' }}>Yes</option>
                                                <option value="no"
                                                    {{ $pricing->package_check == 'no' ? 'selected' : '' }}>No</option>
                                            </select>
                                            @error('package_check')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4 pl-sm-0 pr-sm-3 d-none" id="package_cat">
                                        <div class="form-group mb-2">
                                            <label>Package Category</label>
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
                                            @error('package')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Words Limit</label>
                                            <input type="number" name="words_limit" class="form-control"
                                                placeholder="words limit" value="{{ $pricing->words_limit }}">
                                            @error('words_limit')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mx-0 px-4">
                                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Price up to</label>
                                            <input type="number" name="less_equal_price"
                                                value="{{ $pricing->less_equal_price }}" class="form-control"
                                                placeholder="enter price" step="0.001" min="0">
                                            @error('words_limit')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Price for above</label>
                                            <input type="number" name="above_equal_price"
                                                value="{{ $pricing->above_equal_price }}" class="form-control"
                                                placeholder="enter price" step="0.001" min="0">
                                            @error('words_limit')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Delivery Time</label>
                                            <input type="number" name="delivery_days" class="form-control"
                                                value="{{ $pricing->delivery_days }}" placeholder="enter number of days">
                                            @error('words_limit')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mx-0 px-4">
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
                                </div>

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
@endsection
