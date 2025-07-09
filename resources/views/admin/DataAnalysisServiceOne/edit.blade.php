@extends('admin.layout.app')
@section('title', 'Edit Header Content')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ route('DataAnalysisServiceOne') }}">Back</a>
                <form action="{{ route('DataAnalysisServiceOneUpdate', $DataAnalysisServiceOne->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Edit Introduction</h4>
                                <div class="row mx-0 px-4">
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Text Content</label>
                                            <label>Title <span class="text-danger">*</span></label>
                                            <input type="text" placeholder="Enter Title" name="title"
                                            id="title" value="{{ old('title', $DataAnalysisServiceOne->title) }}" class="form-control">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-5 d-flex align-items-center">
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
                                        @if($DataAnalysisServiceOne->image)
                                            <div class="ms-3">
                                                <img src="{{ asset($DataAnalysisServiceOne->image) }}"
                                                     alt="image"
                                                     style="width: 80px; height: 70px; margin-left:20px; border: 1px solid #ddd;">
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Link Text <span class="text-danger">*</span></label>
                                            <textarea placeholder="Enter Link Text" name="link_text" id="dlink_text" class="form-control">{{ old('link_text', $DataAnalysisServiceOne->link_text) }}</textarea>
                                            @error('link_text')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Description <span class="text-danger">*</span></label>
                                            <textarea placeholder="Enter Description" name="description" id="description" class="form-control">{{ old('description', $DataAnalysisServiceOne->description) }}</textarea>
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
