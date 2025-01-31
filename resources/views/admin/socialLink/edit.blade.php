@extends('admin.layout.app')
@section('title', 'Edit Header Content')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ route('socialLink') }}">Back</a>
                <form action="{{ route('socialLinkUpdate', $socialLink->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Edit Social Link</h4>
                                <div class="row mx-0 px-4">
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Text Content</label>
                                            <input type="text" name="text"
                                                value="{{ old('text', $socialLink->text) }}" class="form-control">
                                            @error('text')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Icon Class</label>
                                            <input type="text" name="icon" class="form-control" placeholder="e.g., fa-facebook">
                                            @error('icon')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>URL</label>
                                            <input type="url" name="url"
                                                value="{{ old('url', $socialLink->url) }}" class="form-control">
                                            @error('url')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Class</label>
                                            <input type="text" name="class" value="{{ old('class', $socialLink->class) }}" class="form-control" placeholder="e.g., me-2 facebook">
                                            @error('class')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    


                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option value="0" {{ $socialLink->status == 0 ? 'selected' : '' }}>
                                                    Activate</option>
                                                <option value="1" {{ $socialLink->status == 1 ? 'selected' : '' }}>
                                                    Deactivate</option>
                                            </select>
                                            @error('status')
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
