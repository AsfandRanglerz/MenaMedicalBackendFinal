@extends('admin.layout.app')
@section('title', 'Edit Header Content')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ route('AdditionalPrice') }}">Back</a>
                <form action="{{ route('AdditionalPrice.Update', $additionalprice->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Edit Additional Price</h4>
                                <div class="row mx-0 px-4">
                                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Service Name</label>
                                            <select name="services" id="is_dropdown" class="form-control">
                                                <option disabled selected>Select value</option>
                                                <option value="Language Editing"
                                                {{ $additionalprice->services == 'Language Editing' ? 'selected' : '' }}>
                                                Language Editing</option>

                                                <option value="Thesis Editing Service"
                                                {{ $additionalprice->services == 'Thesis Editing Service' ? 'selected' : '' }}>
                                                Thesis Editing Service</option>
                                                <option value="Accidental Plagirisam" {{ $additionalprice->services == 'Accidental Plagirisam' ? 'selected' : '' }}>Accidental Plagirisam</option>
                                                <option value="Manuscript Formatting Service" {{ $additionalprice->services == 'Manuscript Formatting Service' ? 'selected' : '' }}>Manuscript Formatting Service</option>
                                                {{-- <option value="Scientific Editing"
                                                    {{ $additionalprice->services == 'Scientific Editing' ? 'selected' : '' }}>
                                                    Scientific Editing</option>
                                                <option value="Accidental Plagirisam"
                                                    {{ $additionalprice->services == 'Accidental Plagirisam' ? 'selected' : '' }}>
                                                    Accidental Plagirisam</option>
                                                <option value="Manuscript Formatting Service"
                                                    {{ $additionalprice->services == 'Manuscript Formatting Service' ? 'selected' : '' }}>
                                                    Manuscript Formatting Service</option>
                                                <option value="Poster & Presentations"
                                                    {{ $additionalprice->services == 'Poster & Presentations' ? 'selected' : '' }}>
                                                    Poster & Presentations</option>
                                                <option value="Assignment Editing Service"
                                                    {{ $additionalprice->services == 'Assignment Editing Service' ? 'selected' : '' }}>
                                                    Assignment Editing Service</option>
                                                 --}}
                                                {{-- <option value="Data Analysis"
                                                    {{ $additionalprice->services == 'Data Analysis' ? 'selected' : '' }}>Data
                                                    Analysis</option> --}}
                                            </select>
                                            @error('services')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-4 pl-sm-0 pr-sm-3">
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
                                    </div> --}}
                                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Basic Price</label>
                                            <input type="number" name="basic_package_price"
                                                value="{{ $additionalprice->basic_package_price }}" class="form-control"
                                                placeholder="enter price" step="0.01">
                                            @error('basic_package_price')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Words Limit</label>
                                            <input type="number" name="words_limit" class="form-control"
                                                placeholder="words limit" value="{{ $pricing->words_limit }}">
                                            @error('words_limit')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="row mx-0 px-4"> --}}
                                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Advance Price</label>
                                            <input type="number" name="advance_package_price"
                                                value="{{ $additionalprice->advance_package_price }}" class="form-control"
                                                placeholder="enter price" step="0.01">
                                            @error('advance_package_price')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-8 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Additional Service</label>
                                            <input type="text" name="additional_services"
                                                value="{{ $additionalprice->additional_services }}" class="form-control"
                                                placeholder="Enter Additional Service" >
                                            @error('additional_services ')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option value="0" {{ $additionalprice->status == 0 ? 'selected' : '' }}>
                                                    Activate</option>
                                                <option value="1" {{ $additionalprice->status == 1 ? 'selected' : '' }}>
                                                    Deactivate</option>
                                            </select>
                                            @error('status')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Price for above</label>
                                            <input type="number" name="above_equal_price"
                                                value="{{ $pricing->above_equal_price }}" class="form-control"
                                                placeholder="enter price" step="0.01">
                                            @error('words_limit')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-sm-4 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Delivery Time</label>
                                            <input type="number" name="delivery_days" class="form-control"
                                                value="{{ $pricing->delivery_days }}" placeholder="enter number of days">
                                            @error('words_limit')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}
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
