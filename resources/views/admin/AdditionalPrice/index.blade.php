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
                                    <h4>Additional Service Prices</h4>
                                </div>
                            </div>
                            <div class="card-body table-striped table-bordered table-responsive">
                                {{-- <a class="btn btn-success mb-3" href="{{ route('AdditionalPrice.Create') }}">Add</a> --}}

                                <table class="responsive table" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>Sr.</th>
                                            <th>Service name</th>
                                            <th>Additional Service</th>
                                            <th>Basic Price</th>
                                            <th>Advance Price</th>
                                            {{-- <th>Status</th> --}}
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($additionalprices as $additionalprice)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if ($additionalprice->services)
                                                        {{ $additionalprice->services }}
                                                    @else
                                                        <div class="badge badge-danger">No record found</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($additionalprice->additional_services)
                                                        {{ $additionalprice->additional_services }}
                                                    @else
                                                        <div class="badge badge-danger">No record found</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($additionalprice->basic_package_price !== null)
                                                        {{ $additionalprice->basic_package_price }} $
                                                    @else
                                                        <div class="badge badge-danger">No record found</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($additionalprice->advance_package_price !== null)
                                                        {{ $additionalprice->advance_package_price }} $
                                                    @else
                                                        <div class="badge badge-danger">No record found</div>
                                                    @endif
                                                </td>
                                                {{-- <td>
                                                    <div
                                                        class="badge {{ $additionalprice->status == 0 ? 'badge-success' : 'badge-danger' }} badge-shadow">
                                                        {{ $additionalprice->status == 0 ? 'Activated' : 'Deactivated' }}
                                                    </div>
                                                </td> --}}
                                                <td>
                                                    <div class="d-flex gap-4">
                                                        <a href="{{ route('AdditionalPrice.Edit', $additionalprice->id) }}"
                                                            class="btn btn-primary" style="margin-left: 10px">
                                                            <span class="fas fa-edit"></span>
                                                        </a>
                                                        {{-- <form
                                                            action="{{ route('AdditionalPrice.Destroy', $additionalprice->id) }}"
                                                            method="POST" style="display:inline-block; margin-left: 10px">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-flat show_confirm"
                                                                data-toggle="tooltip">
                                                                <span class="fas fa-trash-alt"></span> <!-- Delete icon -->
                                                            </button>
                                                        </form> --}}
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
