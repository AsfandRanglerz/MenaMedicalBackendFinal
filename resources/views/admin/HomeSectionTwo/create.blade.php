@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ route('HomeSectionTwo') }}">Back</a>
                <form id="add_header_content_two" action="{{ route('HomeSectionTwoStore') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Add Home Section 2</h4>
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
                                            <label>Image</label>
                                            <input type="file" name="image" id="image" class="form-control">
                                            @error('image')
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
                                    <label>Description</label>
                                    <textarea type="text" placeholder="Enter Description" name="description"
                                        id="description" value="{{ old('description') }}" class="form-control"></textarea>
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
