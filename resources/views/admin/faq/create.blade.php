@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ route('faq.index') }}">Back</a>
                <form id="add_header_content_two" action="{{ route('faq.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Add Faq</h4>
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="navBar">Select NavBar Section<span class="text-danger">*</span></label>
                                        <select class="form-control" id="navBar_id" name="navbar_name" required>
                                            <option value="" selected disabled>Select NavBar</option>
                                            @foreach ($navBars as $navBar)
                                                <option value="{{ $navBar->text }}">{{ $navBar->text }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
        
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Question<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="questions" name="questions" required>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Answer <span class="text-danger">*</span></label>
                                        <textarea name="answers" cols="50" rows="5" id="answers" class="form-control edit-description"></textarea>
                                    </div>
                                    <div class="invalid-feedback"></div>
                                </div>
                             <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

                                <script>
                                    let geteditor;
                                    ClassicEditor
                                        .create(document.querySelector('#answers'))
                                        .then(newGetEditor => {
                                            geteditor = newGetEditor;
                                        })
                                        .catch(error => {
                                            console.error(error);
                                        });
                                </script>

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
