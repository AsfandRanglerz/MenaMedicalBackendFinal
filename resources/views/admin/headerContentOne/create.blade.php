@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ route('headerContentOne') }}">Back</a>
                 <form id="add_header_content_two" action="{{ route('headerContentOneStore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Add Header Content 1</h4>
                                <div class="row mx-0 px-4">
                                    <!-- File Input for Icon -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label for="icon">Icon</label>
                                            <input type="file" name="icon" id="icon" class="form-control" accept="image/*">
                                            @error('icon')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                
                                    <!-- Text Content Input -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label for="text">Text Content</label>
                                            <input type="text" placeholder="Enter Text Content" name="text" id="text" value="{{ old('text') }}" class="form-control">
                                            @error('text')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                
                                    <!-- URL Input -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label for="url">URL</label>
                                            <input type="url" placeholder="Enter URL" name="url" id="url" value="{{ old('url') }}" class="form-control">
                                            @error('url')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                
                                <!-- Submit Button -->
                                <div class="card-footer text-center">
                                    <div class="col">
                                        <button type="submit" class="btn btn-success mr-1 btn-bg" id="submit">Save</button>
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
