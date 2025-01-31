@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ route('PlaceOrderFour') }}">Back</a>
                <form id="add_header_content_two" action="{{ route('PlaceOrderFourStore') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Add Place Order 4</h4>
                                <div class="row mx-0 px-4">

                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Main Title</label>
                                            <input type="text" placeholder="Enter Main Title" name="main_title"
                                            id="main_title" value="{{ old('main_title') }}" class="form-control">
                                        @error('main_title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Title</label>
                                            <input type="text" placeholder="Enter Title" name="title"
                                            id="title" value="{{ old('title') }}" class="form-control">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Link</label>
                                            <input type="link" placeholder="Enter Link" name="link" id="link"
                                                value="{{ old('link') }}" class="form-control">
                                            @error('link')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Link-Text</label>
                                            <input type="link_text" placeholder="Enter Link-Text" name="link_text" id="link_text"
                                                value="{{ old('link_text') }}" class="form-control">
                                            @error('link_text')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label for="colour">Background Color</label>
                                            <select name="colour" id="color" class="form-control">
                                                <option value="">Select Colour</option>
                                                <option value="bg-blue" {{ old('colour') == 'bg-blue' ? 'selected' : '' }}>Blue</option>
                                                <option value="bg-orange" {{ old('colour') == 'bg-orange' ? 'selected' : '' }}>Orange</option>
                                                <option value="bg-green" {{ old('colour') == 'bg-green' ? 'selected' : '' }}>Green</option>
                                                <option value="bg-danger" {{ old('colour') == 'bg-danger' ? 'selected' : '' }}>Red</option>
                                            </select>
                                            @error('colour')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                        <label>Description</label>
                                        <textarea type="text" placeholder="Enter Description" name="description"
                                            id="description"  class="form-control">{{ old('description') }}</textarea>
                                        @error('text')
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
