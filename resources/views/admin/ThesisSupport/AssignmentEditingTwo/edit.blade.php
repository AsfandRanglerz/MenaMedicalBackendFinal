@extends('admin.layout.app')
@section('title', 'Edit Header Content')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ route('AssignmentEditingServiceTwo') }}">Back</a>
                <form action="{{ route('AssignmentEditingServiceTwoUpdate', $AssignmentEditingServiceOne->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Edit Key Features</h4>
                                <div class="row mx-0 px-4">
                                    {{-- <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Text Content</label>
                                            <label>Title</label>
                                            <input type="text" placeholder="Enter Title" name="title"
                                            id="title" value="{{ old('title', $AssignmentEditingServiceOne->title) }}" class="form-control">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div> --}}

                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Text Content</label>
                                            <label>Feature Title</label>
                                            <input type="text" placeholder="Enter Feature Title" name="feature_title"
                                            id="feature_title" value="{{ old('feature_title', $AssignmentEditingServiceOne->feature_title) }}" class="form-control">
                                        @error('feature_title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Text Content</label>
                                            <label>Service Title</label>
                                            <input type="text" placeholder="Enter Service Title" name="service_title"
                                            id="service_title" value="{{ old('service_title', $AssignmentEditingServiceOne->service_title) }}" class="form-control">
                                        @error('service_title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                    {{-- <div class="col-sm-5 d-flex align-items-center">
                                        <!-- Input to Upload New Image -->
                                        <div class="flex-grow-1">
                                            <div class="form-group mb-2">
                                                <label>Image</label>
                                                <input type="file" name="image" id="image" class="form-control">
                                                @error('image')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    
                                        <!-- Display Existing Image -->
                                        @if($AssignmentEditingServiceOne->image)
                                            <div class="ms-3">
                                                <img src="{{ asset($AssignmentEditingServiceOne->image) }}" 
                                                     alt="image" 
                                                     style="width: 80px; height: auto; margin-left:20px; border: 1px solid #ddd;">
                                            </div>
                                        @endif
                                    </div> --}}
                                    
                                    {{-- <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Description</label>
                                            <textarea placeholder="Enter Description" name="description" id="description" class="form-control">{{ old('description', $AssignmentEditingServiceOne->description) }}</textarea>
                                            @error('description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div> --}}

                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Features</label>
                                            <textarea placeholder="Enter Feature" name="feature" id="feature" class="form-control">{{ old('feature', $AssignmentEditingServiceOne->feature) }}</textarea>
                                            @error('feature')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Services</label>
                                            <textarea placeholder="Enter Services" name="service" id="service" class="form-control">{{ old('service', $AssignmentEditingServiceOne->service) }}</textarea>
                                            @error('service')
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
