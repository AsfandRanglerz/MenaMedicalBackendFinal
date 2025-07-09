@extends('admin.layout.app')
@section('title', 'Edit FAQ')
@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <a class="btn btn-primary mb-3" href="{{ route('faq.index') }}">Back</a>
            <form action="{{ route('faq.update', $faq->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST') <!-- Correct method for updating -->

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <h4 class="text-center my-4">Edit FAQ</h4>
                            <div class="row mx-0 px-4">
                                <!-- NavBar ID -->
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="navbar_name">NavBar Section<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="navbar_name" value="{{ $faq->navbar_name }}" required>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>

                                <!-- Question -->
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="questions">Question<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="questions" value="{{ $faq->questions }}" required>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>

                                <!-- Answer -->
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Answer <span class="text-danger">*</span></label>
                                        <textarea name="answers" cols="30" rows="10" id="answers" class="form-control description edit-description">{{ $faq->answers }}</textarea>
                                    <div class="invalid-feedback d-block">
                                        @error('answers') {{ $message }} @enderror
                                    </div>
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
                                        document.querySelector('form').addEventListener('submit', function (e) {
                                            geteditor.updateSourceElement();
                                        });
                            </script>

                            <!-- Submit Button -->
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

{{--
@extends('admin.layout.app')
@section('title', 'FAQ')
@section('content')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>


    <div class="modal fade" id="createFAQModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add FAQ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="createFAQForm" enctype="multipart/form-data">


                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="form-group">
                                <label for="navBar">Select NavBar Section<span class="text-danger">*</span></label>
                                <select class="form-control" id="navBar_id" name="navBar_id" required>
                                    <option value="" selected disabled>Select NavBar</option>
                                    @foreach ($navBars as $navBar)
                                        <option value="{{ $navBar->id }}">{{ $navBar->text }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="form-group">
                                <label for="name">Question<span class="text-danger">*</span></label>
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
                    </form>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-success button-color" onclick="createFAQ()">Create</button>
                </div>
            </div>
            <script>
                let geteditor;
                ClassicEditor
                    .create(document.querySelector('.edit-description'))
                    .then(newGetEditor => {
                        geteditor = newGetEditor;
                    })
                    .catch(error => {
                        console.error(error);
                    });
            </script>
        </div>
    </div>

    <div class="modal fade" id="editFAQModal" tabindex="-1" role="dialog" aria-labelledby="editFAQModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFAQModalLabel">Edit FAQ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editFAQ" enctype="multipart/form-data">

                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="form-group">
                                <label for="navBar_id">NavBar Section<span class="text-danger">*</span></label>
                                <input type="text" class="form-control navBar_id " name="navBar_id" readonly>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="form-group">
                                <label for="name">Question<span class="text-danger">*</span></label>
                                <input type="text" class="form-control questions" name="questions" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="form-group">
                                <label>Answer <span class="text-danger">*</span></label>
                                <textarea name="answers" cols="20" rows="50" id="answers" class="description form-control edit-description"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-success button-color" onclick="updateFAQ()">Update</button>
                </div>
                <script>
                    let editor;
                    ClassicEditor
                        .create(document.querySelector('.description'))
                        .then(newGetEditor => {
                            editor = newGetEditor;
                        })
                        .catch(error => {
                            console.error(error);
                        });
                </script>

            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteFAQModal" tabindex="-1" role="dialog" aria-labelledby="deleteFAQModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteFAQModalLabel">Delete FAQ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to delete this FAQ?</h5>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-danger" id="confirmDeleteSubadmin">Delete</button>
                </div>
            </div>
        </div>
    </div>


    <div class="main-content"   style="min-height: 562px;">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-12">
                                    <h4>FAQ`s</h4>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <a class="btn btn-success mb-3 button-color text-white" data-toggle="modal"
                                    data-target="#createFAQModal">
                                    Create FAQ
                                </a>
                                <table class="responsive table table-striped table-bordered" id="example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <i class="fas fa-th"></i>
                                            </th>
                                            <th>Sr.</th>
                                            <th>NavBar</th>
                                            <th>Questions</th>
                                            <th>Answers</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('js')


    <script>

        function reloadDataTable() {
            var dataTable = $('#example').DataTable();
            dataTable.ajax.reload();
        }
        $(document).ready(function() {

            var dataTable = $('#example').DataTable({
                "ajax": {
                    "url": "{{ route('faq.get') }}",
                    "type": "GET",
                    "data": {
                        "_token": "{{ csrf_token() }}"
                    }
                },
                "columns": [{
                        "data": null,
                        "render": function(data, type, row, meta) {
                            return '<div class="sort-handler"><i class="fas fa-th"></i></div>';
                        }
                    },
                    {
                        "data": null,
                        "render": function(data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        "data": "navBar_name"
                    },
                    {
                        "data": "questions"
                    },
                    {
                        "data": "answers",
                        "render": function(data, type, row) {
                            var words = data.split(" ");
                            if (words.length > 15) {
                                return words.slice(0, 10).join(" ") + '...';
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            return '<div class="d-flex justify-content-start">' +
                                '<button class="btn btn-success button-color mr-2 text-white editSubadminBtn" data-id="' +
                                row.id + '"><i class="fas fa-edit"></i></button>' +
                                '<button class="btn btn-danger  mr-2 text-white deleteSubadminBtn" data-id="' +
                                row.id + '"><i class="fas fa-trash-alt"></i></button>' +
                                '</div>';
                        }
                    }
                ]
            });


            $('#example tbody').sortable({
                items: 'tr',
                cursor: 'move',
                update: function(event, ui) {
                    var order = [];
                    $('#example tbody tr').each(function(index) {
                        var id = $(this).find('.editSubadminBtn').data('id');
                        order.push({
                            id: id,
                            position: index + 1
                        });
                    });


                    $.ajax({
                        url: "{{ route('faq.updateOrder') }}",
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            order: order
                        },
                        success: function(response) {
                            reloadDataTable()

                        },
                        error: function(xhr) {
                            console.log(xhr);
                            toastr.error("Error updating order!");
                        }
                    });
                }
            }).disableSelection();

            $('#example').on('click', '.editSubadminBtn', function() {
                var id = $(this).data('id');
                editFAQModal(id);
            });
            $('#example').on('click', '.deleteSubadminBtn', function() {
                var id = $(this).data('id');
                deleteFAQModal(id);
            });
        });



        $(document).ready(function() {
            $('#createFAQForm input, #createFAQForm select, #createFAQForm textarea').on(
                'input change',
                function() {
                    $(this).siblings('.invalid-feedback').text('');
                    $(this).removeClass('is-invalid');
                });
        });

        function createFAQ() {
            var form = document.getElementById("createFAQForm");
            var questions = form["questions"].value;
            var answers = geteditor.getData();
            var navBarId = $('#navBar_id').val();

            if (!navBarId) {
                toastr.error("Please select a Navigation Bar.");
                return;
            }

            var formData = new FormData();
            formData.append('questions', questions);
            formData.append('answers', answers);
            formData.append('navBar_id', navBarId);


            formData.append('_token', "{{ csrf_token() }}");

            var createButton = $('#createFAQModal').find('.modal-footer button');
            createButton.prop('disabled', true);

            $.ajax({
                url: '{{ route('faq.create') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    toastr.success('FAQ Created Successfully!');
                    $('#createFAQModal').modal('hide');
                    geteditor.setData('');
                    reloadDataTable();
                    form.reset();
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            toastr.error(value[0]);
                        });
                    } else {
                        toastr.error("An unexpected error occurred. Please try again.");
                    }
                },
                complete: function() {
                    createButton.prop('disabled', false);
                }
            });
        }

        $('#createFAQForm input').keyup(function() {
            $(this).removeClass('is-invalid').siblings('.invalid-feedback').html('');
        });



        function editFAQModal(id) {
            var showFAQ = '{{ route('faq.show', ':id') }}';
            $.ajax({
                url: showFAQ.replace(':id', id),
                type: 'GET',
                success: function(response) {

                    $('#editFAQ .questions').val(response.faq.questions);
                    editor.setData(response.faq.answers);


                    response.navBars.forEach(function(navBar) {
                if (navBar.id === response.faq.navBar_id) {

                    $('.navBar_id').val(navBar.text);
                }
            });

                    $('#editFAQModal').modal('show');
                    $('#editFAQModal').data('id', id);
                },
                error: function(xhr, status, error) {

                    console.log(xhr.responseText);
                }
            });
        }

        $(document).ready(function() {
            $('#editFAQ input, #editFAQ select, #editFAQ textarea').on(
                'input change',
                function() {
                    $(this).siblings('.invalid-feedback').text('');
                    $(this).removeClass('is-invalid');
                });
        });


        function updateFAQ() {
            var updateFAQRoute = '{{ route('faq.update', ':id') }}';
            var id = $('#editFAQModal').data('id');
            var form = document.getElementById("editFAQ");
            var questions = form["questions"].value;
            var answers = editor.getData();
            var formData = new FormData();
            formData.append('questions', questions);
            formData.append('answers', answers);
            formData.append('_token', "{{ csrf_token() }}");

            var updateButton = $('#editFAQModal').find('.modal-footer button');
            updateButton.prop('disabled', true);

            $.ajax({
                url: updateFAQRoute.replace(':id', id),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    toastr.success('FAQ Updated Successfully!');
                    $('#editFAQModal').modal('hide');
                    reloadDataTable();
                    form.reset();
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            toastr.error(value[0]);
                        });
                    } else {
                        toastr.error("An unexpected error occurred. Please try again.");
                        console.error("Error:", xhr);
                    }
                },
                complete: function() {
                    updateButton.prop('disabled', false);
                }
            });
        }

        function deleteFAQModal(id) {
            $('#confirmDeleteSubadmin').data('subadmin-id', id);
            $('#deleteFAQModal').modal('show');
        }
        $(document).ready(function() {
            $('#confirmDeleteSubadmin').click(function() {
                var id = $(this).data('subadmin-id');
                deleteFAQ(id)

            });
        });

        function deleteFAQ(id) {
            $.ajax({
                url: "{{ route('faq.delete', ['id' => ':id']) }}".replace(':id', id),
                type: 'GET',
                success: function(response) {
                    toastr.success('FAQ Deleted Successfully!');
                    $('#deleteFAQModal').modal('hide');
                    reloadDataTable();
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }
    </script>


@endsection --}}
