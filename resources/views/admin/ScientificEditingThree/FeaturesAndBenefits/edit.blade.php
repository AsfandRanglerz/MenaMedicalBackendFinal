@extends('admin.layout.app')
@section('title', 'Edit Header Content')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ route('Features') }}">Back</a>
                <form action="{{ route('FeaturesUpdate', $ScientificEditing->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Edit Features and Benefits</h4>
                                <div class="row mx-0 px-4">
                                    {{-- <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Text Content</label>
                                            <label>Title</label>
                                            <input type="text" placeholder="Enter Title" name="title"
                                            id="title" value="{{ old('title', $ScientificEditing->title) }}" class="form-control">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div> --}}

                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Image</label>
                                            <!-- Input to Upload New Image -->
                                            <input type="file" name="image" id="image" class="form-control">
                                            @error('image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <!-- Display Existing Image -->
                                            @if($ScientificEditing->image)
                                                <div class="mb-2">
                                                    <img src="{{ asset($ScientificEditing->image) }}" 
                                                         alt="image" 
                                                         style="width: 80px; height: auto; margin-top:15px; margin-bottom:10px; border: 1px solid #ddd;">
                                                </div>
                                            @endif
                                    
                                    </div>
                                    </div>
                                    
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Description</label>
                                            <textarea placeholder="Enter Description" name="description" id="description" class="form-control">{{ old('description', $ScientificEditing->description) }}</textarea>
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
