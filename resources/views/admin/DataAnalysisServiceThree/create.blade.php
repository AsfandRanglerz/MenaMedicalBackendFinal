@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ route('DataAnalysisServiceThree') }}">Back</a>
                <form id="add_header_content_two" action="{{ route('DataAnalysisServiceThreeStore') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Add Data Analysis Service 3</h4>
                                <div class="row mx-0 px-4">
                                    

                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Feature Title</label>
                                            <input type="text" placeholder="Enter Feature Title" name="feature_title"
                                            id="feature_title" value="{{ old('feature_title') }}" class="form-control">
                                        @error('feature_title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Servive Title</label>
                                            <input type="text" placeholder="Enter Service Title" name="service_title"
                                            id="service_title" value="{{ old('service_title') }}" class="form-control">
                                        @error('service_title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Features</label>
                                            <textarea type="text" placeholder="Enter Features" name="feature"
                                            id="feature" value="{{ old('feature') }}" class="form-control"></textarea>
                                        @error('feature')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Services</label>
                                            <textarea type="text" placeholder="Enter Services" name="service"
                                            id="service" value="{{ old('service') }}" class="form-control"></textarea>
                                        @error('service')
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
