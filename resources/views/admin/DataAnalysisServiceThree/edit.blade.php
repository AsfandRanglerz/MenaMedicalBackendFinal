@extends('admin.layout.app')
@section('title', 'Edit Header Content')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ route('DataAnalysisServiceThree') }}">Back</a>
                <form action="{{ route('DataAnalysisServiceThreeUpdate', $DataAnalysisServiceThree->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Edit Key Features of Premium</h4>
                                <div class="row mx-0 px-4">


                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Text Content</label>
                                            <label>Feature Title <span class="text-danger">*</span></label>
                                            <input type="text" placeholder="Enter Feature Title" name="feature_title"
                                            id="feature_title" value="{{ old('feature_title', $DataAnalysisServiceThree->feature_title) }}" class="form-control">
                                        @error('feature_title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Text Content</label>
                                             <label>Service <span class="text-danger">*</span></label>
                                            <input type="text" placeholder="Enter Service Title" name="service_title"
                                            id="service_title" value="{{ old('service_title', $DataAnalysisServiceThree->service_title) }}" class="form-control">
                                        @error('service_title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>



                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Feature <span class="text-danger">*</span></label>
                                            <textarea placeholder="Enter Feature" name="feature" id="feature" class="form-control">{{ old('feature', $DataAnalysisServiceThree->feature) }}</textarea>
                                            @error('feature')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Services <span class="text-danger">*</span></label>
                                            <textarea placeholder="Enter Services" name="service" id="service" class="form-control">{{ old('service', $DataAnalysisServiceThree->service) }}</textarea>
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
