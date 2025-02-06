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
                                    <div class="float-right">
                                        <form action="{{ route('quotationAll.delete') }}" method="POST" style="display:inline-block; margin-left: 10px">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-flat show_confirm_all" data-toggle="tooltip">
                                                Delete All
                                            </button>
                                        </form>
                                    </div>
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
                                            <th>Quotation</th>
                                            <th>Service Name</th>
                                            <th>Service Package</th>
                                            <th>Words</th>
                                            <th>Price Category</th>
                                            <th>Total Price</th>
                                            <th>Additional Services</th>
                                    
                                            <th>Language Type</th>
                                            <th>Additional Instructions</th>
                                            <th>Additional Information</th>
                                            <th>Files</th>
                                            <th>Target Journal</th>
                                            <th>Document Type</th>
                                            <th>Requirements</th>
                                            <th>File Explanation One</th>
                                            <th>File Explanation Two</th>
                                            <th>How did you hear about us?</th>
                                            <th>Action</th>
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
                                                        {{ $personal->study_category == 'other' ? $personal->other_study_category ?? '' : $personal->study_category ?? '' }}
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
                                                        {{ $personal->location == 'Other' ? $personal->other_location ?? '' : $personal->location ?? '' }}
                                                        @if ($personal->location == 'Other' && empty($personal->other_location))
                                                            <span class="badge badge-danger">No record found</span>
                                                        @elseif (empty($personal->study_category))
                                                            <span class="badge badge-danger">No record found</span>
                                                        @endif
                                                    </td>
                                                   
                                                @endforeach
                                                <td>
                                                    {{-- @dd($data->additionalServices) --}}
                                                    <button class="btn btn-info" data-toggle="modal"
                                                        data-target="#quotationModal"
                                                        data-service-name="{{ $data->service_name ?? 'no record found' }}"
                                                        data-service-package="{{ $data->service_package ?? 'no record found' }}"
                                                        data-price-category="{{ $data->price_category ?? 'no record found' }}"
                                                        data-words="{{ $data->words ?? 'no record found' }}"
                                                        data-total-price="{{ $data->total_price ?? 'no record found' }}"
                                                        data-base-price="{{ $data->base_price ?? 'no record found' }}"
                                                        data-additional-services='@json($data->additionalServices)'
                                                        data-additional-information='@json($data->additionalInfo)'>
                                                        View
                                                    </button>
                                                </td>

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
                                                    {{ $data->price_category ?? '' }}
                                                    @if (empty($data->price_category))
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
                                                    <a target="_blank"
                                                        href="{{ route('quotationRequests.aditionalServices', $data->id) }}"
                                                        class="btn btn-primary">
                                                        <span class="fas fa-eye"></span> <!-- Font Awesome eye icon -->
                                                    </a>
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
                                                    <a target="_blank"
                                                        href="{{ route('quotationRequests.additionalInformation', $data->id) }}"
                                                        class="btn btn-primary">
                                                        <span class="fas fa-eye"></span> <!-- Font Awesome eye icon -->
                                                    </a>
                                                </td>
                                                @if (
                                                    $data->service_name == 'Posters' ||
                                                        $data->service_name == 'Power Point Presentations' ||
                                                        $data->service_name == 'Data Analysis')
                                                    <td>
                                                        <a target="_blank"
                                                            href="{{ route('quotationRequests.files', ['id' => $data->id, 'service' => $data->service_name]) }}"
                                                            class="btn btn-primary">
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
                                                <td>
                                                    {{ $personal->question ?? '' }}
                                                    @if (empty($personal->question))
                                                        <span class="badge badge-danger">No record found</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-4">
                                                            <form action="{{ route('quotationRequests.delete', $data->id) }}" method="POST" style="display:inline-block; margin-left: 10px">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-flat show_confirm" data-toggle="tooltip">
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
        <div class="modal fade" id="quotationModal" tabindex="-1" role="dialog" aria-labelledby="quotationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="quotationModalLabel">Quotation Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"
                    style="font-family: Arial, sans-serif;
              padding: 20px; border-radius: 8px; width: 100%; background-color: #f9f9f9;">
                    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                        <tr style="border-bottom: 1px solid #000;">
                            <th style="text-align: left; padding: 8px;">Service Name</th>
                            <th style="text-align: left; padding: 8px;">Service Package</th>
                            <th style="text-align: left; padding: 8px;">Price Category</th>
                            <th style="text-align: left; padding: 8px;">Words</th>
                            <th style="text-align: left; padding: 8px;">Base Price</th>
                            <th style="text-align: left; padding: 8px;">Total Price</th>
                        </tr>
                        <tr>
                            <td style="padding: 8px;"><span id="modalServiceName"></span></td>
                            <td style="padding: 8px;"><span id="modalServicePackage"></span></td>
                            <td style="padding: 8px;"><span id="modalPriceCategory"></span></td>
                            <td style="padding: 8px;"><span id="modalWords"></span></td>
                            <td style="padding: 8px;"><span id="modalPrice"></span></td>
                            <td style="padding: 8px;"><span id="modalTotalPrice"></span></td>
                        </tr>

                    </table>

                    <h4 style="margin-bottom: 10px;">Additional Services</h4>
                    <table style="width: 100%; border-collapse: collapse;" id="modalAdditionalServices">
                        <!-- Additional services will be dynamically populated here -->
                    </table>

                    <h4 style="margin-bottom: 10px;">Additional Information</h4>
                    <table style="width: 100%; border-collapse: collapse;" id="modalAdditionalInformation">
                        <!-- Additional services will be dynamically populated here -->
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div>



@endsection

@section('js')
<script>
      $('#quotationModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var serviceName = button.data('service-name');
            var servicePackage = button.data('service-package');
            var priceCategory = button.data('price-category');
            var words = button.data('words');
            var totalPrice = button.data('total-price');
            var basePrice = button.data('base-price');
            var additionalServices = button.data('additional-services');
            var additionalInformation = button.data('additional-information');

            // Populate the main service details
            $('#modalServiceName').text(serviceName);
            $('#modalServicePackage').text(servicePackage);
            $('#modalPriceCategory').text(priceCategory);
            $('#modalWords').text(words);
            $('#modalTotalPrice').text(totalPrice);
            $('#modalPrice').text(basePrice);

            // Handle additional services
            var additionalServicesContainer = $('#modalAdditionalServices');
            additionalServicesContainer.empty(); // Clear previous content
            if (additionalServices && additionalServices.length > 0) {
                // If additional services exist, loop through and display them
                additionalServices.forEach(function(service) {
                    additionalServicesContainer.append(
                        `<tr>
                    <td style="padding: 8px;">${service.service}</td>
                    <td style="padding: 8px;">${service.service_price}</td>
                </tr>
                `
                    );
                });
            } else {
                // If no additional services, display "Not Found"
                additionalServicesContainer.append(
                    `<tr>
                <td colspan="3" style="text-align: center; padding: 8px;">No additional services found</td>
            </tr>`
                );
            }

            // Handle additional information
            var additionalInformationContainer = $('#modalAdditionalInformation');
            additionalInformationContainer.empty(); // Clear previous content
            if (additionalInformation && additionalInformation.length > 0) {
                // If additional services exist, loop through and display them
                additionalInformation.forEach(function(info) {
                    additionalInformationContainer.append(
                        `<tr>
                    <td style="padding: 8px;">${info.question}</td>
                    <td style="padding: 8px;">${info.answer}</td>
                </tr>
                `
                    );
                });
            } else {
                // If no additional services, display "Not Found"
                additionalInformationContainer.append(
                    `<tr>
                <td colspan="3" style="text-align: center; padding: 8px;">No additional information found</td>
            </tr>`
                );
            }

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
    $(document).on('click', '.show_confirm_all', function(event) {
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
