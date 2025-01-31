@extends('admin.layout.app')
@section('title', 'Users')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-12">
                                    <h4 class="text-center">Term & Conditions</h4>
                                </div>
                            </div>
                            <div class="card-body  table-responsive">
                                <table class="responsive table table-striped table-bordered  example">
                                    <thead>
                                        <tr>
                                            <th>Sr.</th>
                                            <th>Description</th>
                                            <th scope="col">Actions</th>
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
        <!-- Edit Hobby Modal -->
        <div class="modal fade" id="editPrivacyModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" id="mymodal" role="document">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Document</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editAddsForm" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right">Description</label>
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <textarea name="edit-description" id="" class="edit-description"></textarea>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-primary update-privacy">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')

<script>
        var dataTable;
        $(document).ready(function() {
            dataTable = $(".example").DataTable({
                "ajax": {
                    url: "{{ route('termCondition.read') }}",
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    // Handle the response and pass permissions
                 dataSrc: function (json) {
                        // Pass permissions from backend to DataTable
                        var permissions = json.permissions;
                        return json.data.map(function (row) {
                            row.can_edit = permissions.can_edit;
                            return row;
                        });
                    },
                    error: function(xhr, error, code) {
                        console.log("Error fetching data: " + code);
                    }
                },
                "columns": [
                    // Row number column
                    {
                        "render": function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    // Description column (corrected typo)
                    {
                        data: "description"
                    },
                    // Action buttons column
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            var buttons = '<div class="d-flex">';
                                var buttonsShown = false;
                            // Show edit button if can_edit is true
                            if (row.can_edit) {
                                buttons += '<button class="btn btn-primary button-color mb-3 mr-3 text-white editSubadminBtn" data-id="' +
                                row.id + '"><i class="fas fa-edit"></i></button>';
                                    buttonsShown = true;
                            }
                            if (!buttonsShown) {
                                buttons = '<span class="text-muted">You do not have access to edit</span>';
                            }
                            buttons += '</div>';
                            return buttons;
                        }
                    }
                ]
            });
        });


        // $(document).on('click', '.editSubadminBtn', function() {
        //     var id = $(this).data('id');
        //     $('.update-privacy').attr('data', id);
        //     $('#editPrivacyModel').modal('show');
        //     editHobby(id);
        // });


        $(document).on('click', '.editSubadminBtn', function() {
            var id = $(this).data('id');
            var url = "{{ route('termCondition.edit', ':id') }}".replace(':id', id);
            window.location.href = url
        });


        function editHobby(id) {
            var privacyShow = '{{ route('termCondition.edit', ':id') }}';
            $.ajax({
                url: privacyShow.replace(':id', id),
                type: "GET",
                success: function(response) {
                    console.log(response);
                    if (response.data.description !== null) {
                        geteditor.setData(response.data.description);
                    } else {
                        geteditor.setData(''); // Or set it to an empty string
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    console.error(xhr.responseText);
                }
            });
        }

        $(document).on('click', '.update-privacy', function() {
            let decId = $(this).attr('data');
            let editDescription = geteditor.getData();
            let formData = new FormData();
            formData.append('decId', decId);
            formData.append('description', editDescription);
            console.log(JSON.stringify(Object.fromEntries(formData)));
            // return;
            $.ajax({
                url: '{{ route('termCondition.update') }}',
                type: 'POST',
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}'
                },
                data: formData,
                success: function(data) {
                    $("#editPrivacyModel").modal('hide');
                    toastr.success('Policy Updated Successfully');
                    dataTable.ajax.reload();
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error('Error updating Add:', error);
                    // You can display an error message or handle errors as needed
                }
            });
        });
    </script>
@endsection
