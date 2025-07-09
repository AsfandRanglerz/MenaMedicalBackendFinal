@extends('admin.layout.app')
@section('title', 'Edit Header Content')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ route('OrderServices') }}">Back</a>
                <form action="{{ route('OrderServicesUpdate', $PlaceOrderFour->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Edit Services</h4>
                                <div class="row mx-0 px-4">
                                    {{-- <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Text Content</label>
                                            <label>Main Title</label>
                                            <input type="text" placeholder="Enter Main Title" name="main_title"
                                            id="main_title" value="{{ old('main_title', $PlaceOrderFour->main_title) }}" class="form-control">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div> --}}

                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Text Content</label>
                                            <label>Title <span class="text-danger">*</span></label>
                                            <input type="text" placeholder="Enter Title" name="title"
                                            id="title" value="{{ old('title', $PlaceOrderFour->title) }}" class="form-control">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Link <span class="text-danger">*</span></label>
                                            <input type="link" placeholder="Enter Link" name="link"
                                            id="link" value="{{ old('link', $PlaceOrderFour->link) }}" class="form-control">
                                        @error('link')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Text Content</label>
                                             <label>Link-Text <span class="text-danger">*</span></label>
                                            <input type="link_text" placeholder="Enter Link-Text" name="link_text"
                                            id="link_text" value="{{ old('link_text', $PlaceOrderFour->link_text) }}" class="form-control">
                                        @error('link_text')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                    {{-- <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Background Colour</label>
                                            <select name="colour" id="colour" class="form-control">
                                                <option value="">Select Colour</option>
                                                <option value="bg-blue" {{ old('colour', $PlaceOrderFour->colour) == 'bg-blue' ? 'selected' : '' }}>Blue</option>
                                                <option value="bg-orange" {{ old('colour', $PlaceOrderFour->colour) == 'bg-orange' ? 'selected' : '' }}>Orange</option>
                                                <option value="bg-green" {{ old('colour', $PlaceOrderFour->colour) == 'bg-green' ? 'selected' : '' }}>Green</option>
                                                <option value="bg-danger" {{ old('colour', $PlaceOrderFour->colour) == 'bg-danger' ? 'selected' : '' }}>Red</option>
                                            </select>
                                            @error('colour')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div> --}}

                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Description <span class="text-danger">*</span></label>
                                            <textarea placeholder="Enter Description" name="description" id="description" class="form-control">{{ old('description', $PlaceOrderFour->description) }}</textarea>
                                            @error('description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

@endsection
