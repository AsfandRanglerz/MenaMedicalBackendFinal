@extends('layout.master')

@section('title', 'Journal')
<style>
    .top-right-buttons {
        position: absolute;
        top: 20px;
        right: 20px;
        z-index: 2;
        display: flex;
        gap: 10px;
    }
        header .navbar {
        display: none;
    }
</style>
@section('content')
    <div class="position-relative banner">
        <img src="{{ asset('public/assets/images/journalsHome.jpg') }}" class="w-100" />
        <!-- Top-right buttons -->
        {{-- <div class="top-right-buttons">
            <a href="https://menamedicalresearch.com/journals/index.php/index/user/register" class="btn theme-btn" target="_blank">
                Register
            </a>
            <a href="https://menamedicalresearch.com/journals/index.php/index/login" class="btn theme-btn" target="_blank">
                Login
            </a>
        </div> --}}

        <div class="content">
            <h1 class="heading">OPEN-ACCESS, PEER REVIEWED JOURNALS</h1>
            <p class="mb-0 mt-3">Making Publication Possible – <span class="orange-text">AT AFFORDABLE PRICES</span></p>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="section-devision">
                    <p class="mb-0">
                        MENA Medical Research has a mission to improve bioscience research output from the MENA region. Our
                        journals and services support this mission by providing convenient and cost-effective mediums to
                        publish research. You can find out more about our journals below:
                    </p>
                </div>
                <div class="section-devision">
                    <div class="journal-section">
                        <div class="row gy-4 gy-lg-0">
                            <div class="col-md-6 p-2 border-section">
                                <div class="py-2 head-one">
                                    <p class="m-0 text-center heading">MENA Journal of Bioscience Research</p>
                                </div>
                                <div class="d-flex flex-column flex-sm-row align-items-center align-items-sm-start">
                                    <div>
                                        <div class="py-2 px-2 h-100 border-inner">
                                            <img src="{{ asset('public/assets/images/MJBR.png') }}" alt="MJBR Logo"
                                                width="160" height="200">

                                        </div>
                                    </div>
                                    <div>
                                        <div class="py-2 px-2">
                                            <p class="m-0 line-height paragraph">
                                                MENA Journal of Bioscience Research  publishes scientific output of early career Bioscience researchers, graduate, and undergraduate students at affordable publication charges to support their research.
                                            </p>
                                            <div class="anchor">
                                                <a href="https://menamedicalresearch.com/journals/index.php/mjbr"
                                                    class="text-decoration-none text-primary">View Journal</a>
                                            </div>
                                            <div class="anchor">
                                                <a href="https://menamedicalresearch.com/journals/index.php/mjbr/issue/current"
                                                    class="text-decoration-none text-primary">Current Issue</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 p-2 border-section">
                                <div class="py-2 head-two">
                                    <p class="m-0 text-center heading">MENA Journal of Case Reports</p>
                                </div>
                                <div class="d-flex flex-column flex-sm-row align-items-center align-items-sm-start">
                                    <div>
                                        <div class="py-2 px-2 h-100 border-inner">
                                            <img src="{{ asset('public/assets/images/MJCR.png') }}" alt="MJCR Logo"
                                                width="150" height="200">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="py-2 px-2">
                                            <p class="m-0 line-height paragraph">
                                               MENA Journal of Case Reports publishes case reports, case series, and case reviews at affordable publication charges to expand clinical knowledge output from clinicians and researchers.
                                            </p>
                                            <div class="anchor">
                                                <a href="https://menamedicalresearch.com/journals/index.php/mjcr"
                                                    class="text-decoration-none text-primary">View Journal</a>
                                            </div>
                                            <div class="anchor">
                                                <a href="https://menamedicalresearch.com/journals/index.php/mjcr/issue/current"
                                                    class="text-decoration-none text-primary">Current Issue</a>
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
