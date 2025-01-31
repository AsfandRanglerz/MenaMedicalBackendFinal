@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ route('LanguageEditingThree') }}">Back</a>
                <form id="add_header_content_two" action="{{ route('LanguageEditingThreeStore') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Add Language Editing 3</h4>
                                <div class="row mx-0 px-4">
                                   
                                         
                                {{-- <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                    <div class="form-group mb-2">
                                        <label>Link</label>
                                        <input type="link" placeholder="Enter Link" name="link" id="link"
                                            value="{{ old('link') }}" class="form-control">
                                        @error('link')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                    <div class="form-group mb-2">
                                        <label>Link-Text</label>
                                        <input type="link_text" placeholder="Enter Link-Text" name="link_text" id="link_text"
                                            value="{{ old('link_text') }}" class="form-control">
                                        @error('link_text')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                    <div class="form-group mb-2">
                                        <label>Text</label>
                                        <input type="text" placeholder="Enter Text" name="text" id="text"
                                            value="{{ old('text') }}" class="form-control">
                                        @error('text')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                    <div class="form-group mb-2">
                                    <label>Description</label>
                                    <textarea type="text" placeholder="Enter Description" name="description"
                                        id="description" value="{{ old('description') }}" class="form-control"></textarea>
                                    @error('text')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> --}}
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Description<span class="text-danger">*</span></label>
                                        <textarea name="description" cols="30" rows="10" id="description" class="form-control description edit-description"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-footer text-center">
                                <div class="col">
                                    <button type="submit" class="btn btn-success mr-1 btn-bg"
                                        id="submit">Save</button>
                                </div>
                            <!-- CKEditor Script -->
                            <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
                            <script>
                                let editor;
                                ClassicEditor
                                    .create(document.querySelector('#description'))
                                    .then(newEditor => {
                                        editor = newEditor;
                                    })
                                    .catch(error => {
                                        console.error(error);
                                    });
                            </script>
                            </div>
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
