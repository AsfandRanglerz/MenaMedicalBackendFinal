@extends('admin.layout.app')
@section('title', 'Edit Header Content')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ route('HomeSectionThree') }}">Back</a>
                <form action="{{ route('HomeSectionThreeUpdate', $HomeSection->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Edit Partners Images</h4>
                                <div class="row mx-0 px-4">
                                    

                                    
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Image</label>
                                            <!-- Input to Upload New Image -->
                                            <input type="file" name="image" id="image" class="form-control">
                                            @error('image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <!-- Display Existing Image -->
                                            @if($HomeSection->image)
                                                <div class="mb-2">
                                                    <img src="{{ asset($HomeSection->image) }}" 
                                                         alt="image" 
                                                         style="width: 150px; height: auto; margin-top:15px; margin-bottom:10px; border: 1px solid #ddd;">
                                                </div>
                                            @endif
                                    
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
