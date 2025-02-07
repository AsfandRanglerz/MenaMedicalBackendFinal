@extends('admin.layout.app')
@section('title', 'index')
@section('content')
    <div class="main-content" style="min-height: 562px;">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-12">
                                    <h4>FAQ </h4>
                                </div>
                            </div>
                            {{-- @dd($service) --}}
                            <div class="card-body table-striped table-bordered table-responsive">
                                <div class="d-flex">
                                    <a class="btn btn-success mb-3 mr-2" href="{{ route('faq.create') }}">Add
                                        Content</a>
                                    <div class="filter-container">
                                        <select id="statusFilter" class="form-control select1">
                                            @foreach ($navBars as $data)
                                                {{-- <option value="" selected>Select Service</option> --}}
                                                <option value="{{ $data->text }}"
                                                    {{ $data->text === $service ? 'selected' : '' }}>
                                                    {{ $data->text }}
                                                </option>
                                            @endforeach
                                            {{-- <option value="">All</option>
                                                <option value="pending">Pending</option>
                                                <option value="approved">Approved</option> --}}
                                        </select>
                                        <input type="text" name="service" value="{{ $service }}" id="service"
                                            hidden>
                                    </div>
                                </div>
                                <table class="responsive table" id="example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <i class="fas fa-th"></i>
                                            </th>
                                            <th>Sr.</th>
                                            <th>NavBar Name</th>
                                            <th>Questions</th>
                                            <th>Answers</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($faqs as $faq)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if (!empty($faq->navbar_name))
                                                        {{ $faq->navbar_name }}
                                                    @else
                                                        <span class="text-muted">No NavBar</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (!empty($faq->questions))
                                                    {{ $faq->questions }}
                                                    @else
                                                    <span class="text-muted">No Questions</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if (!empty($faq->answers))
                                                    {!! $faq->answers  !!}
                                                    @else
                                                    <span class="text-muted">No Answers</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-4">
                                                        <a href="{{ route('faq.edit', $faq->id) }}"
                                                            class="btn btn-primary" style="margin-left: 10px">
                                                            <span class="fas fa-edit"></span> </a>
                                                        <form
                                                            action="{{ route('faq.delete', $faq->id) }}"
                                                            method="POST" style="display:inline-block; margin-left: 10px">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-flat show_confirm" data-toggle="tooltip">
                                                                <span class="fas fa-trash-alt"></span> <!-- Delete icon -->
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach --}}

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
              <!-- Delete FAQ Modal -->
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
            $('#statusFilter').change(function() {
                $('#service').val($('#statusFilter').val());
                dataTable.ajax.reload(); // Reload DataTable with updated filter
            });
            // Initialize DataTable
            var dataTable = $('#example').DataTable({
                "ajax": {
                    "url": "{{ route('faq.get') }}",
                    "type": "GET",
                    data: function(d) {
                        d._token = "{{ csrf_token() }}";
                        d.navName = $('#statusFilter').val(); // Pass the selected status value
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
                            return meta.row + 1; // Serial number
                        }
                    },
                    {
                        "data": "navBar_name" // Navbar Name
                    },
                    {
                        "data": "questions" // Questions
                    },
                    {
                        "data": "answers",
                        "render": function(data) {
                            var words = data.split(" ");
                            if (words.length > 15) {
                                return words.slice(0, 10).join(" ") + '...'; // Limit words
                            }
                            return data;
                        }
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            const editRoute = "{{ route('faq.edit', ':id') }}";
                            const deleteRoute = "{{ route('faq.delete', ':id') }}";
                            const editUrl = editRoute.replace(':id', row.id);
                            const deleteUrl = deleteRoute.replace(':id', row.id);
                            const id = row.id;

                            return `
                            <div class="d-flex justify-content-start">
                                <a href="${editUrl}" class="btn btn-primary mr-2 editSubadminBtn" style="margin-left: 10px" data-id="${id}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="${deleteUrl}" method="POST" style="display:inline-block; margin-left: 10px">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="button" class="btn btn-danger btn-flat show_confirm" data-toggle="tooltip">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>`;
                        }
                    }
                ]
            });

            // Drag-and-Drop Sorting
            $('#example tbody').sortable({
                items: 'tr',
                cursor: 'move',
                update: function() {
                    var navName = $('#service').val();
                    var order = [];
                    $('#example tbody tr').each(function(index) {
                        var id = $(this).find('a.editSubadminBtn').data('id'); // Select the correct anchor and get data-id
                        // alert(id);
                        order.push({
                            id: id,
                            position: index + 1
                        });
                    });

                    // Update Order via AJAX
                    $.ajax({
                        url: "{{ route('faq.updateOrder') }}",
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            order: order,
                            navName: navName,
                        },
                        success: function() {
                            dataTable.ajax.reload();
                            // reloadDataTable();
                        },
                        error: function(xhr) {
                            console.error(xhr);
                        }
                    });
                }
            }).disableSelection();

             // ############# Delete FAQ Data###########
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

        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
       $(document).on('click', '.show_confirm', function(event) {
    event.preventDefault(); // Prevent default form submission
    var form = $(this).closest("form"); // Get the form to be submitted

    swal({
        title: `Are you sure you want to delete this record?`,
        text: "If you delete this, it will be gone forever.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            // Manually submit the form
            form.submit();
        }
    });
});

    </script>
@endsection
