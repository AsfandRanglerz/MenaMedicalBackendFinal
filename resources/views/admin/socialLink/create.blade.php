@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ route('socialLink') }}">Back</a>
                <form id="add_header_content_two" action="{{ route('socialLinkStore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Add Social Link</h4>
                                <div class="row mx-0 px-4">
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Text Content</label>
                                            <input type="text" placeholder="Enter Text Content" name="text"
                                                id="text" value="{{ old('text') }}" class="form-control">
                                            @error('text')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <!-- Input for Font Awesome Class -->
                                        <div class="form-group mb-2">
                                            <label>Icon Class</label>
                                            <input type="text" name="icon" value="{{ old('icon') }}" class="form-control" placeholder="e.g., fa-facebook">
                                            @error('icon')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>URL</label>
                                            <input type="url" placeholder="Enter URL" name="url"
                                                id="url" value="{{ old('url') }}" class="form-control">
                                            @error('url')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Class</label>
                                            <input type="text" name="class" value="{{ old('class') }}" class="form-control" placeholder="e.g., me-2 facebook">
                                            @error('class')
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
