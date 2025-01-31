@extends('admin.layout.app')
@section('title', 'Term & Conditions')
@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <form action="{{route('termCondition.update')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Term & Conditions</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                 <input type="text" value="{{$term->id}}" name="decId" hidden>
                                                    <label for="description">Description</label>
                                                    <textarea name="description" id="description" class="description"></textarea>
                                                    <div class="invalid-feedback"></div>
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
                                            editor.setData({!! json_encode($term->description) !!});
                                        })
                                        .catch(error => {
                                            console.error(error);
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
        CKEDITOR.replace( 'description');
    </script>
@endsection


