@extends('layout.master')

@section('title', 'Journal')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="section-devision">
                <p class="mb-0">
                MENA Medical Research has a mission to improve bioscience research output from the MENA region. Our journals and services support this mission by providing convenient and cost-effective mediums to publish research. You can find out more about our journals below:
                </p>
            </div>
            <div class="section-devision">
                <div class="journal-section">
                    <div class="row gy-4 gy-lg-0">
                        <div class="col-md-6 p-2 border-section">
                            <div class="py-2 head-one">
                                <p class="m-0 text-center heading">Journal of Bioscience Research</p>
                            </div>
                            <div class="d-flex flex-column flex-sm-row align-items-center align-items-sm-start">
                                <div>
                                    <div class="py-2 px-2 h-100 border-inner">
                                        <img src="{{ asset('public/assets/images/journal1.png') }}" alt="">
                                    </div>
                                </div>
                                <div>
                                    <div class="py-2 px-2">
                                        <p class="m-0 line-height paragraph">
                                            Journal of Bioscience Research publishes scientific output of bioscience graduate and undergraduate students from the MENA region at highly discounted publishing charges to support research output from early researchers.
                                        </p>
                                        <div class="anchor">
                                            <a href="" class="text-decoration-none text-primary">Find out more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-2 border-section">
                            <div class="py-2 head-two">
                                <p class="m-0 text-center heading">Journal of Case Reports</p>
                            </div>
                            <div class="d-flex flex-column flex-sm-row align-items-center align-items-sm-start">
                                <div>
                                    <div class="py-2 px-2 h-100 border-inner">
                                        <img src="{{ asset('public/assets/images/journal2.png') }}" alt="">
                                    </div>
                                </div>
                                <div>
                                    <div class="py-2 px-2">
                                        <p class="m-0 line-height paragraph">
                                            Journal of Case Reports publishes case reports from MENA region at affordable publication charges to expand clinical knowledge output from clinicians and researchers.
                                        </p>
                                        <div class="anchor">
                                            <a href="" class="text-decoration-none text-primary">Find out more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script></script>
@endsection
