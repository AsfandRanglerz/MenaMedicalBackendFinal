@extends('admin.layout.app')
@section('title', 'Edit Header Content')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ route('LanguageEditingTwo') }}">Back</a>
                <form action="{{ route('LanguageEditingTwoUpdate', $LanguageEditingTwo->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Edit Packages</h4>
                                <div class="row mx-0 px-4">
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Text Content</label>
                                            <label>Title</label>
                                            <input type="text" placeholder="Enter Title" name="title"
                                            id="title" value="{{ old('title', $LanguageEditingTwo->title) }}" class="form-control">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                    {{-- <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Background Colour</label>
                                            <select name="colour" id="colour" class="form-control">
                                                <option value="">Select Colour</option>
                                                <option value="bg-blue" {{ old('colour', $LanguageEditingTwo->colour) == 'bg-blue' ? 'selected' : '' }}>Blue</option>
                                                <option value="bg-orange" {{ old('colour', $LanguageEditingTwo->colour) == 'bg-orange' ? 'selected' : '' }}>Orange</option>
                                                <option value="bg-green" {{ old('colour', $LanguageEditingTwo->colour) == 'bg-green' ? 'selected' : '' }}>Green</option>
                                            </select>
                                            @error('colour')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div> --}}

                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Description</label>
                                            <textarea placeholder="Enter Description" name="description" id="description" class="form-control">{{ old('description', $LanguageEditingTwo->description) }}</textarea>
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
