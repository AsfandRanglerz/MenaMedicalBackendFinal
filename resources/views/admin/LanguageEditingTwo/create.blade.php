@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ route('LanguageEditingTwo') }}">Back</a>
                <form id="add_header_content_two" action="{{ route('LanguageEditingTwoStore') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Add Language Editing 2</h4>
                                <div class="row mx-0 px-4">
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Title</label>
                                            <input type="text" placeholder="Enter Title" name="title"
                                            id="title" value="{{ old('title') }}" class="form-control">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                    

                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label for="colour">Background Color</label>
                                            <select name="colour" id="color" class="form-control">
                                                <option value="">Select Colour</option>
                                                <option value="bg-blue" {{ old('colour') == 'bg-blue' ? 'selected' : '' }}>Blue</option>
                                                <option value="bg-orange" {{ old('colour') == 'bg-orange' ? 'selected' : '' }}>Orange</option>
                                                <option value="bg-green" {{ old('colour') == 'bg-green' ? 'selected' : '' }}>Green</option>
                                            </select>
                                            @error('colour')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                        <label>Description</label>
                                        <textarea type="text" placeholder="Enter Description" name="description"
                                            id="description"  class="form-control">{{ old('description') }}</textarea>
                                        @error('text')
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
