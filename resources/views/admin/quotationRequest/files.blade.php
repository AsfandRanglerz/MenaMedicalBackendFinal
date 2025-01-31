@extends('admin.layout.app')
@section('title', 'index')
@section('content')
    <div class="main-content" style="min-height: 562px;">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ url()->previous() }}">Back</a>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-12">
                                    <h4>Quotation Files</h4>
                                </div>
                            </div>

                            <div class="card-body table-striped table-bordered table-responsive">

                                <table class="responsive table" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>Sr.</th>
                                            <th>Files</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($files as $data)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                @php
                                                    $file_name = $data->file;
                                                    $ext = explode('.', $file_name);
                                                @endphp
                                                <td>
                                                    <a target="_black" href="{{ asset('' . '/' . $data->file) }}">
                                                        @if ($ext[1] == 'pdf')
                                                            <img src="{{ asset('public/admin/assets/icons/pdf-icon.png') }}"
                                                                style="height: 50px;width:50px">
                                                        @elseif($ext[1] == 'docx')
                                                            <img src="{{ asset('public/admin/assets/icons/docx-icon.png') }}"
                                                                style="height: 50px;width:50px">
                                                        @elseif($ext[1] == 'xls' || $ext[1] == 'xlsx')
                                                            <img src="{{ asset('public/admin/assets/icons/excel-icon.png') }}"
                                                                style="height: 50px;width:50px">
                                                        @elseif($ext[1] == 'pptx')
                                                            <img src="{{ asset('public/admin/assets/icons/pptx-icon.png') }}"
                                                                style="height: 50px;width:50px">
                                                        @else
                                                            <img src="{{ asset('' . '/' . $data->file) }}"
                                                                style="height: 50px;width:50px">
                                                        @endif
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        @php
                                                            $file_name = $data->file;
                                                            $ext = explode('files/', $file_name);
                                                        @endphp
                                                            <a href="{{route('files.download',$ext[1])}}" class='btn btn-download'><span><button class="btn btn-primary">Download</button></span></a>
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
