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
                                    <h4>Services Price</h4>
                                </div>
                            </div>
                            <div class="card-body table-striped table-bordered table-responsive">
                                <div class="d-flex">
                                    <a class="btn btn-success mb-3 mr-3" href="{{ route('newServicePrice.create') }}">Add
                                    Price</a>
                                        <div class="filter-container">
                                                    <form id="serviceFilterForm" method="GET" action="{{ route('newServicePrice.index') }}">
                                                        <select id="statusFilter" name="service" class="form-control select1">
                                                            @foreach ($navBars as $data)
                                                                <option value="{{ $data }}" {{ $data === $service ? 'selected' : '' }}>
                                                                    {{ $data }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </form>
                                                </div>
                                    </div>

                                <table class="responsive table" id="table-1">
                                    <thead>
                                        <tr>
                                             <th class="text-center">
                                                <i class="fas fa-th"></i>
                                            </th>
                                            <th>Sr.</th>
                                            <th>Service name</th>
                                            {{-- <th>Price Category</th> --}}
                                            <th>Pacakge</th>
                                            <th>Range </th>
                                            <th>Price</th>
                                            <th>Delivery Time</th>
                                            {{-- <th>Status</th> --}}
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pricing as $data)
                                            <tr>
                                                <td>
                                                    <div class="sort-handler"><i class="fas fa-th"></i></div>
                                                    <a href="javascript:void(0)" class="editSubadminBtn" data-id="{{ $data->id }}"></a> {{-- Hidden anchor for sorting logic --}}
                                                </td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->service_name }}</td>
                                                {{-- <td>{{ $data->price_category }}</td> --}}
                                                <td>
                                                    @if ($data->package_name)
                                                        {{ $data->package_name }}
                                                    @else
                                                        <div class="badge badge-danger">No record found</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($data->range)
                                                        {{ $data->range }}
                                                    @else
                                                        <div class="badge badge-danger">No record found</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($data->price !== null)
                                                        {{ $data->price }} $
                                                    @else
                                                        <div class="badge badge-danger">No record found</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($data->delivery_time)
                                                        {{ $data->delivery_time }} days
                                                    @else
                                                        <div class="badge badge-danger">No record found</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-4">
                                                        <a href="{{ route('newServicePrice.edit', $data->id) }}"
                                                            class="btn btn-primary" style="margin-left: 10px">
                                                            <span class="fas fa-edit"></span>
                                                        </a>
                                                        <form action="{{ route('newServicePrice.delete', $data->id) }}"
                                                            method="POST" style="display:inline-block; margin-left: 10px">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-flat show_confirm"
                                                                data-toggle="tooltip">
                                                                <span class="fas fa-trash-alt"></span> <!-- Delete icon -->
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach


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
    $(function() {
        $('#table-1 tbody').sortable({
            items: 'tr',
            handle: '.sort-handler',
            cursor: 'move',
            update: function() {
                var navName = $('#statusFilter').val(); // Using your filter select
                var order = [];

                $('#table-1 tbody tr').each(function(index) {
                    var id = $(this).find('a.editSubadminBtn').data('id');
                    if (id !== undefined) {
                        order.push({
                            id: id,
                            position: index + 1
                        });
                    }
                });

                // AJAX call to update order
                $.ajax({
                    url: "{{ route('newServicePrice.sort') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        order: order,
                        service: navName,
                    },
                    success: function() {
                        toastr.success('Order Updated Successfully');
                        setTimeout(() => {
                            window.location.reload(); // Reload the page to reflect changes
                        }, 2000);
                    },
                    error: function(xhr) {
                        console.error('Sorting update failed', xhr);
                    }
                });
            }
        }).disableSelection();
    });
</script>

<script>
    document.getElementById('statusFilter').addEventListener('change', function() {
        document.getElementById('serviceFilterForm').submit();
    });
</script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(document).on('click', '.show_confirm', function(event) {
            var form = $(this).closest("form");
            event.preventDefault();
            swal({
                title: "Are you sure you want to delete this record?",
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
