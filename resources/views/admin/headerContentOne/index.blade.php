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
                                    <h4>Header Content One</h4>
                                </div>
                            </div>
                             <div class="card-body table-striped table-bordered table-responsive">
                                {{-- <a class="btn btn-success mb-3" href="{{ route('headerContentOneCreate') }}">Add
                                    Content</a> --}}

                                <table class="responsive table" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>Sr.</th>
                                            <th>Icon</th>
                                            <th>Text Content</th>
                                            <th>Url</th>
                                            {{-- <th>Status</th> --}}
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($headerContents as $headerContent)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                {{-- <td>
                                                   <span><i class="fa {{ $headerContent->icon }}" style="font-size: 24px;"></i></span>
                                                </td> --}}

                                                <td>
                                                    <img src="{{ asset( $headerContent->icon) }}" alt="" height="50"
                                                        width="50" class="image">
                                                </td>

                                                <td>{{ $headerContent->text }}</td>
                                                <td>
                                                    @if(!empty($headerContent->url ))
                                                    <a href="{{ $headerContent->url }}" target="_blank">
                                                        {{ $headerContent->url }}
                                                    </a>
                                                    @else
                                                    <span class="text-muted">No URL</span>
                                                    @endif
                                                </td>
                                                {{-- <td>
                                                    <div class="badge {{ $headerContent->status == 0 ? 'badge-success' : 'badge-danger' }} badge-shadow">
                                                        {{ $headerContent->status == 0 ? 'Activated' : 'Deactivated' }}
                                                    </div>
                                                </td> --}}
                                                <td>
                                                    <div class="d-flex gap-4">
                                                        <a href="{{ route('headerContentOneEdit', $headerContent->id) }}"
                                                            class="btn btn-primary" style="margin-left: 10px">
                                                            <span class="fas fa-edit"></span> </a>
                                                        {{-- <form
                                                            action="{{ route('headerContentOneDestroy', $headerContent->id) }}"
                                                            method="POST" style="display:inline-block; margin-left: 10px">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-flat show_confirm" data-toggle="tooltip">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
@endsection
