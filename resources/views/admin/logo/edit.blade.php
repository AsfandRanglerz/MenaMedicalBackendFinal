@extends('admin.layout.app')
@section('title', 'Edit Header Content')
@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <a class="btn btn-primary mb-3" href="{{ route('logo') }}">Back</a>
            <form action="{{ route('logoUpdate', $logo->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <h4 class="text-center my-4">Edit Logo</h4>
                            <div class="row mx-0 px-4">
                                <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                    <div class="form-group mb-2">
                                        <label>logo</label>
                                        <input type="file" name="logo" class="form-control">
                                        @error('logo')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        @if($logo->logo)
                                            <div class="ms-3">
                                                <img src="{{ asset($logo->logo) }}" 
                                                     alt="image" 
                                                     style="width: 100px; height: auto; margin-top:20px; border: 1px solid #ddd;">
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
