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
                                            <th scope="col">Actions</th>
                                            <th>Words</th>
                                            <th>Total Price</th>
                                            <th>Price Category</th>
                                            <th>Language Type</th>
                                            <th>Additional Instructions</th>
                                            <th>Additional Service</th>
                                            <th>Additional Information</th>
                                            <th>Files</th>
                                            <th>Target Journal</th>
                                            <th>Document Type</th>
                                            <th>Requirements</th>
                                            <th>File Explanation One</th>
                                            <th>File Explanation Two</th>
                                            {{-- <th>Status</th> --}}
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
                                                {{-- <td>
                                                    {{ $personal->location ?? '' }}
                                                    @if (empty($personal->location))
                                                        <span class="badge badge-danger">No record found</span>
                                                    @endif
                                                </td> --}}
                                                <td>
                                                    {{ $personal->location == 'Other' ? ($personal->other_location ?? '') : ($personal->location ?? '') }}
                                                    @if ($personal->location == 'Other' && empty($personal->other_location))
                                                        <span class="badge badge-danger">No record found</span>
                                                    @elseif (empty($personal->study_category))
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
                                                    <div class="d-flex gap-4">
                                                        <form
                                                        action="{{ route('quotationRequests.status', $data->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('POST')
                                                        <select name="status" class="form-control"
                                                            onchange="handleStatusChange(this, '{{ $data->id }}')">
                                                                <option value="" selected disabled>Select Status</option>
                                                            <option value="1"
                                                                {{ $data->status == 1 ? 'selected' : '' }}>Accepted
                                                            </option>
                                                            <option value="2"
                                                                {{ $data->status == 2 ? 'selected' : '' }}>Rejected
                                                            </option>
                                                        </select>
                                                    </form>
                                                    </div>
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
                                                    <a target="_blank" href="{{route('quotationRequests.aditionalServices',$data->id)}}" class="btn btn-primary">
                                                        <span class="fas fa-eye"></span> <!-- Font Awesome eye icon -->
                                                    </a>
                                                </td>
                                                <td>
                                                    <a target="_blank" href="{{route('quotationRequests.additionalInformation',$data->id)}}" class="btn btn-primary">
                                                        <span class="fas fa-eye"></span> <!-- Font Awesome eye icon -->
                                                    </a>
                                                </td>
                                                    @if ($data->service_name == 'Posters' || $data->service_name == 'Power Point Presentations' || $data->service_name == 'Data Analysis')
                                                        <td>
                                                            <a target="_blank" href="{{route('quotationRequests.files',['id'=>$data->id,'service'=>$data->service_name])}}" class="btn btn-primary">
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
 <!-- Deactivation Modal -->
 <div class="modal fade" id="deactivationModal" tabindex="-1" role="dialog" aria-labelledby="deactivationModalLabel"
 aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <form id="deactivationForm" action="" method="POST">
             @csrf
             <div class="modal-header">
                 <h5 class="modal-title" id="deactivationModalLabel">Reason for Rejection</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="form-group">
                     <label for="reason">Please provide the reason for rejecting this product:</label>
                     <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                 </div>
                 <input type="hidden" name="status" value="2">
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                 <button type="submit" class="btn btn-primary">Submit</button>
             </div>
         </form>
     </div>
 </div>
</div>


@endsection

@section('js')
<script>
    function handleStatusChange(selectElement, id) {
            if (selectElement.value == 2) {
                $('#deactivationForm').attr('action', '{{ url('admin/Quotation-Requests/status/') }}/' + id);
                $('#deactivationModal').modal('show');
            } else {
                selectElement.form.submit();
            }
        }
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
