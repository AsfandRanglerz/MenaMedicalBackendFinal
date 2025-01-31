@extends('admin.layout.app')
@section('title', 'Edit Header Content')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ route('LanguageEditingThree') }}">Back</a>
                <form action="{{ route('LanguageEditingThreeUpdate', $LanguageEditingThree->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Edit Language Editing 3</h4>
                                <div class="row mx-0 px-4">
                                    
                                    {{-- <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Link</label>
                                            <input type="link" placeholder="Enter Link" name="link"
                                            id="link" value="{{ old('link', $LanguageEditingThree->link) }}" class="form-control">
                                        @error('link')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Text Content</label>
                                            <label>Link-Text</label>
                                            <input type="linktext" placeholder="Enter Link-Text" name="linktext"
                                            id="linktext" value="{{ old('link_text', $LanguageEditingThree->link_text) }}" class="form-control">
                                        @error('linktext')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div> --}}

                                    {{-- <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Text Content</label>
                                            <label>Text</label>
                                            <input type="text" placeholder="Enter Text" name="text"
                                            id="text" value="{{ old('text', $LanguageEditingThree->text) }}" class="form-control">
                                        @error('text')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div> --}}
                                    
                                    {{-- <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Description</label>
                                            <textarea placeholder="Enter Description" name="description" id="description" class="form-control">{{ old('description', $LanguageEditingThree->description) }}</textarea>
                                            @error('description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Description<span class="text-danger">*</span></label>
                                        <textarea name="description" cols="30" rows="10" id="description" class="form-control description edit-description">{{ $LanguageEditingThree->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- CKEditor Script -->
                            <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
                            <script>
                                let editor;
                                ClassicEditor
                                    .create(document.querySelector('.description'))
                                    .then(newEditor => {
                                        editor = newEditor;
                                    })
                                    .catch(error => {
                                        console.error(error);
                                    });
                            </script>
                                

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
