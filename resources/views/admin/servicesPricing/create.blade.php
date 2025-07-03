@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ route('servicePrice.index') }}">Back</a>
                <form id="add_header_content_two" action="{{ route('servicePrice.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                     <div class="row">
        <div class="col-12">
            <div class="card">
                <h4 class="text-center my-4">Add Pricing</h4>

                {{-- Row 1 --}}
                <div class="row mx-0 px-4">
                    {{-- Service Name --}}
                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                        <div class="form-group mb-2">
                            <label>Service Name</label>
                            <select name="service_name" class="form-control">
                                <option disabled selected>Select value</option>
                                @foreach(['Language Editing', 'Scientific Editing', 'Accidental Plagirisam', 'Manuscript Formatting Service', 'Power Point Presentations', 'Power Point Poster', 'Assignment Editing Service', 'Thesis Editing Service', 'Data Analysis'] as $service)
                                    <option value="{{ $service }}" {{ old('service_name') == $service ? 'selected' : '' }}>{{ $service }}</option>
                                @endforeach
                            </select>
                            @error('service_name') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    {{-- Package --}}
                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                        <div class="form-group mb-2">
                            <label>Package</label>
                            <select name="package_check" id="package_check" class="form-control">
                                <option disabled selected>Select value</option>
                                <option value="yes" {{ old('package_check') == 'yes' ? 'selected' : '' }}>Yes</option>
                                <option value="no" {{ old('package_check') == 'no' ? 'selected' : '' }}>No</option>
                            </select>
                            @error('package_check') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    {{-- Package Category (conditional) --}}
                    <div class="col-sm-4 pl-sm-0 pr-sm-3 {{ old('package_check') == 'yes' ? '' : 'd-none' }}" id="package_cat">
                        <div class="form-group mb-2">
                            <label>Package Category</label>
                            <select name="package_name" class="form-control">
                                <option disabled selected>Select value</option>
                                @foreach(['Basic', 'Advance', 'Premium'] as $pkg)
                                    <option value="{{ $pkg }}" {{ old('package_name') == $pkg ? 'selected' : '' }}>{{ $pkg }}</option>
                                @endforeach
                            </select>
                            @error('package_name') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                {{-- Row 2 --}}
                <div class="row mx-0 px-4">
                    {{-- Words Limit --}}
                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                        <div class="form-group mb-2">
                            <label>Words Limit</label>
                            <input type="number" name="words_limit" class="form-control" placeholder="words limit" value="{{ old('words_limit') }}">
                            @error('words_limit') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    {{-- Price up to --}}
                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                        <div class="form-group mb-2">
                            <label>Price up to</label>
                            <input type="number" name="less_equal_price" class="form-control" placeholder="enter price" step="0.001" value="{{ old('less_equal_price') }}">
                            @error('less_equal_price') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    {{-- Price for above --}}
                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                        <div class="form-group mb-2">
                            <label>Price for above</label>
                            <input type="number" name="above_equal_price" class="form-control" placeholder="enter price" step="0.001" value="{{ old('above_equal_price') }}">
                            @error('above_equal_price') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                {{-- Row 3 --}}
                <div class="row mx-0 px-4">
                    {{-- Delivery Days --}}
                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                        <div class="form-group mb-2">
                            <label>Delivery Time (in days)</label>
                            <input type="number" name="delivery_days" class="form-control" placeholder="enter number of days" value="{{ old('delivery_days') }}">
                            @error('delivery_days') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    {{-- Price Category --}}
                    <div class="col-sm-4 pl-sm-0 pr-sm-3">
                        <div class="form-group mb-2">
                            <label>Price Category</label>
                            <select name="price_category" class="form-control">
                                <option disabled selected>Select value</option>
                                <option value="Regular" {{ old('price_category') == 'Regular' ? 'selected' : '' }}>Regular Price</option>
                                <option value="Discounted" {{ old('price_category') == 'Discounted' ? 'selected' : '' }}>Discounted Price for students and researchers in MENA Region</option>
                            </select>
                            @error('price_category') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                {{-- Submit --}}
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-success btn-bg" id="submit">Save</button>
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

    $(function () {
        function togglePackageCategory() {
            if ($('#package_check').val() === 'yes') {
                $('#package_cat').removeClass('d-none');
            } else {
                $('#package_cat').addClass('d-none');
            }
        }

        $('#package_check').on('change', togglePackageCategory);
        togglePackageCategory(); // Trigger on page load
    });
</script>

@endsection
