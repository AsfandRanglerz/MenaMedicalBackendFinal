@extends('admin.layout.app')
@section('title', 'Privacy Policy Edit')
@section('content')


    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <form action="{{ route('privacy.update') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Privacy Policy</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" value="{{ $privacy->id }}" name="decId" hidden>
                                                    <label for="description">Description</label>
                                                    <textarea name="description" id="description" class="description"></textarea>
                                                    <div class="invalid-feedback d-block">
                                                        @error('description')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary mr-1" type="submit">Submit</button>
                                </div>
                                <script>
                                    let editor;
                                    ClassicEditor
                                        .create(document.querySelector('#description'))
                                        .then(newEditor => {
                                            editor = newEditor;
                                            editor.setData({!! json_encode($privacy->description) !!});
                                        })
                                        .catch(error => {
                                            console.error(error);
                                        });
                                        document.querySelector('form').addEventListener('submit', function (e) {
                                            geteditor.updateSourceElement();
                                        });
                                </script>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
