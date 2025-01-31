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
                                    <h4>Rejected Request</h4>
                                </div>
                            </div>
                            <div class="card-body table-striped table-bordered table-responsive">
                                {{-- <a class="btn btn-success mb-3" href="{{ route('servicePrice.create') }}">Add
                                    Price</a> --}}

                                <table class="responsive table" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>Sr.</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Program</th>
                                            <th>Institute</th>
                                            <th>Location</th>
                                            <th>Question</th>
                                            <th>Service name</th>
                                            <th>Service Package</th>
                                            <th>Words</th>
                                            <th>Total Price</th>
                                            <th>Price Category</th>
                                            <th>Language Type</th>
                                            <th>Additional Instructions</th>
                                            <th>Additional Service</th>
                                            <th>Additional Information</th>
                                            <th>Files</th>
                                            <th>Journal</th>
                                            <th>Document Type</th>
                                            <th>Requirements</th>
                                            <th>File Explanation One</th>
                                            <th>File Explanation Two</th>
                                            {{-- <th>Status</th> --}}
                                            {{-- <th scope="col">Actions</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($quotationRequests as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                @foreach ($data->personalInfos as $personal)
                                                <td>
                                                    {{ $personal->first_name ?? '' }}
                                                    @if (empty($personal->first_name))
                                                        <span class="badge badge-danger">No record found</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $personal->last_name ?? '' }}
                                                    @if (empty($personal->last_name))
                                                        <span class="badge badge-danger">No record found</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $personal->email ?? '' }}
                                                    @if (empty($personal->email))
                                                        <span class="badge badge-danger">No record found</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $personal->study_category == 'other' ? ($personal->other_study_category ?? '') : ($personal->study_category ?? '') }}
                                                    @if ($personal->study_category == 'other' && empty($personal->other_study_category))
                                                        <span class="badge badge-danger">No record found</span>
                                                    @elseif (empty($personal->study_category))
                                                        <span class="badge badge-danger">No record found</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $personal->institute_name ?? '' }}
                                                    @if (empty($personal->institute_name))
                                                        <span class="badge badge-danger">No record found</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $personal->location ?? '' }}
                                                    @if (empty($personal->location))
                                                        <span class="badge badge-danger">No record found</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $personal->question ?? '' }}
                                                    @if (empty($personal->question))
                                                        <span class="badge badge-danger">No record found</span>
                                                    @endif
                                                </td>

                                                @endforeach
                                                <td>
                                                    {{ $data->service_name ?? '' }}
                                                    @if (empty($data->service_name))
                                                        <span class="badge badge-danger">No record found</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $data->service_package ?? '' }}
                                                    @if (empty($data->service_package))
                                                        <span class="badge badge-danger">No record found</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $data->words ?? '' }}
                                                    @if (empty($data->words))
                                                        <span class="badge badge-danger">No record found</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $data->total_price ?? '' }}
                                                    @if (empty($data->total_price))
                                                        <span class="badge badge-danger">No record found</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $data->price_category ?? '' }}
                                                    @if (empty($data->price_category))
                                                        <span class="badge badge-danger">No record found</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $data->language_type ?? '' }}
                                                    @if (empty($data->language_type))
                                                        <span class="badge badge-danger">No record found</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $data->additional_instructions ?? '' }}
                                                    @if (empty($data->additional_instructions))
                                                        <span class="badge badge-danger">No record found</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <a href="{{route('quotationRequests.aditionalServices',$data->id)}}" class="btn btn-primary">
                                                        <span class="fas fa-eye"></span> <!-- Font Awesome eye icon -->
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{route('quotationRequests.additionalInformation',$data->id)}}" class="btn btn-primary">
                                                        <span class="fas fa-eye"></span> <!-- Font Awesome eye icon -->
                                                    </a>
                                                </td>
                                                    @if ($data->service_name == 'Posters' || $data->service_name == 'Power Point Presentations' || $data->service_name == 'Data Analysis' || $data->service_name == 'Manuscript Formatting Service' || $data->service_name == 'Accidental Plagirisam')
                                                        <td>
                                                            <a href="{{route('quotationRequests.files',['id'=>$data->id,'service'=>$data->service_name])}}" class="btn btn-primary">
                                                                <span class="fas fa-eye"></span> <!-- Font Awesome eye icon -->
                                                            </a>
                                                        </td>
                                                    @else
                                                    @foreach ($data->files as $data)
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
                                                    @endforeach
                                                    @endif
                                                    <td>
                                                        {{ $data->text ?? '' }}
                                                        @if (empty($data->text))
                                                            <span class="badge badge-danger">No record found</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $data->document_type ?? '' }}
                                                        @if (empty($data->document_type))
                                                            <span class="badge badge-danger">No record found</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $data->requirement ?? '' }}
                                                        @if (empty($data->requirement))
                                                            <span class="badge badge-danger">No record found</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $data->file_explanation_one ?? '' }}
                                                        @if (empty($data->file_explanation_one))
                                                            <span class="badge badge-danger">No record found</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $data->file_explanation_two ?? '' }}
                                                        @if (empty($data->file_explanation_two))
                                                            <span class="badge badge-danger">No record found</span>
                                                        @endif
                                                    </td>
                                                {{-- <td>{{ $data->personal_infos->first_name }}</td>
                                                <td>{{ $data->personal_infos->last_name }}</td>
                                                <td>{{ $data->personal_infos->email }}</td>
                                                <td>{{ $data->personal_infos->study_category == 'other' ? $data->personal_infos->other_study_category : $data->personal_infos->study_category }}</td>
                                                <td>{{ $data->personal_infos->institute_name }}</td>
                                                <td>{{ $data->personal_infos->location }}</td>
                                                <td>{{ $data->personal_infos->question }}</td> --}}

                                                {{-- <td>
                                                    <div class="badge {{ $data->status == 0 ? 'badge-success' : 'badge-danger' }} badge-shadow">
                                                        {{ $data->status == 0 ? 'Activated' : 'Deactivated' }}
                                                    </div>
                                                </td> --}}
                                                {{-- <td>
                                                    <div class="d-flex gap-4">
                                                        <a href="{{route('servicePrice.edit',$data->id)}}"
                                                            class="btn btn-primary" style="margin-left: 10px">
                                                            <span class="fas fa-edit"></span> </a>
                                                            <form action="{{ route('servicePrice.delete', $data->id) }}" method="POST" style="display:inline-block; margin-left: 10px">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-flat show_confirm" data-toggle="tooltip">
                                                                    <span class="fas fa-trash-alt"></span> <!-- Delete icon -->
                                                                </button>
                                                            </form>
                                                    </div>
                                                </td> --}}

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
