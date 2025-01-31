@extends('layout.master')

@section('title', 'Home')
<style>
    header .navbar {
        display: none;
    }
</style>

@section('content')
    <div class="position-relative banner">
        <img src="{{ asset('public/assets/images/banner-img.png') }}" class="w-100" />
        <div class="content">
            <h1 class="heading">ACADEMIC EDITING AND PUBLISHING SERVICES</h1>
            <p class="mb-0">Bioscience Journals, Publishing Support, Academic and Scientific Editing for Researchers and Students in MENA Region – <span class="orange-text">AT AFFORDABLE PRICES</span></p>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="container-fluid">
                <p class="mb-0">MENA Medical Research helps young researchers and students in MENA region grow their career in scientific
                    research. We understand the Academic English Language and Publication challenges faced by Bioscience
                    researchers and students in the MENA region and offer affordable language editing and publication services
                    to help them overcome these challenges.</p>
            </div>
        </div>
    </div> 
    <div class="container-fluid grey-bg modules-section">
        <div class="container-fluid">
            <div class="py-4 container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-sm-4 mb-3">
                        <div class="pb-3 h-100 content editing-content">
                            <p class="mb-0 title">Editing Services</p>
                            <div class="px-xl-5 px-3 pb-3 inner">
                                <div>
                                    <img src="{{ asset('public/assets/images/edit-service.png') }}" class="my-lg-4 my-3" />
                                    <p>High-quality language, academic editing, scientific writing, and research promotion services <b>for students and researchers</b></p>
                                </div>
                                <a href="{{ url('language-editing') }}">Find Out More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-sm-4 mb-3">
                        <div class="pb-3 h-100 content journals-content">
                            <p class="mb-0 title">Bioscience Journals</p>
                            <div class="px-xl-5 px-3 pb-3 inner">
                                <div>
                                    <img src="{{ asset('public/assets/images/journal-svgrepo-com.png') }}" class="my-lg-4 my-3" />
                                    <p>Bioscience Journals for undergraduate and postgraduate students with <b>discounted publication charges</b> for MENA region</p>
                                </div>
                                <a href="{{ url('/') }}">Find Out More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-sm-0 mb-3">
                        <div class="pb-3 h-100 content research-content">
                            <p class="mb-0 title">Researcher Profiles</p>
                            <div class="px-xl-5 px-3 pb-3 inner">
                                <div>
                                    <img src="{{ asset('public/assets/images/research-profile.png') }}" class="my-lg-4 my-3" />
                                    <p>Profiles for Bioscience researchers and students to <b>network and find researchers</b> with similar interests in MENA region</p>
                                </div>
                                <a href="{{ url('/') }}">Find Out More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-sm-0 mb-3">
                        <div class="pb-3 h-100 content news-content">
                            <p class="mb-0 title">MENA Research News</p>
                            <div class="px-xl-5 px-3 pb-3 inner">
                                <div>
                                    <img src="{{ asset('public/assets/images/research-news.png') }}" class="my-lg-4 my-3" />
                                    <p>Research news from regional academic institutes and high impact <b>research published globally from MENA region</b></p>
                                </div>
                                <a href="{{ url('/') }}">Find Out More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('common.components.trusted_by')
    <div class="container-fluid grey-bg editing-section">
        <div class="container-fluid">
            <div class="py-md-5 py-4 container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <h3 class="col-xl-6 heading">EDITING SERVICES</h3>
                        <p class="col-xl-8 col-lg-10 mt-xl-5 mt-3 mb-lg-0 mb-4">“Take Advantage of our Academic & Scientific Editing, Publication Support, and Research Promotion Services to improve the quality of your scientific work”</p>
                    </div>
                    <div class="col-lg-8">
                        <div class="d-flex list-points">
                            <img src="{{ asset('public/assets/images/blue-arrow.png') }}" class="arrow-img" />
                            <div class="ms-2">
                                <h6 class="mb-1">Word-class English Language Editing</h6>
                                <p class="mb-0 small">For accuracy of language, grammar, spellings, syntax, sentence structure, and clarity</p>
                            </div>
                        </div>
                        <div class="d-flex list-points">
                            <img src="{{ asset('public/assets/images/blue-arrow.png') }}" class="arrow-img" />
                            <div class="ms-2">
                                <h6 class="mb-1">Scientific Editing by Experienced Researchers</h6>
                                <p class="mb-0 small">In-depth scientific feedback to help meet the highest standards of academic publishing</p>
                            </div>
                        </div>
                        <div class="d-flex list-points">
                            <img src="{{ asset('public/assets/images/blue-arrow.png') }}" class="arrow-img" />
                            <div class="ms-2">
                                <h6 class="mb-1">Manuscript Formatting</h6>
                                <p class="mb-0 small">To meet the formatting guidelines of any target journal - APA, MLA, ACS, and AMA</p>
                            </div>
                        </div>
                        <div class="d-flex list-points">
                            <img src="{{ asset('public/assets/images/blue-arrow.png') }}" class="arrow-img" />
                            <div class="ms-2">
                                <h6 class="mb-1">Similarity Check for Accidental Plagiarism</h6>
                                <p class="mb-0 small">Identification of passages in scientific writing that could get flagged for plagiarism</p>
                            </div>
                        </div>
                        <div class="d-flex list-points">
                            <img src="{{ asset('public/assets/images/blue-arrow.png') }}" class="arrow-img" />
                            <div class="ms-2">
                                <h6 class="mb-1">Thesis and Research Assignment Support</h6>
                                <p class="mb-0 small">Improving Bachelors /Masters thesis or research assignments through language editing, formatting, and scientific review</p>
                            </div>
                        </div>
                        <div class="d-flex list-points">
                            <img src="{{ asset('public/assets/images/blue-arrow.png') }}" class="arrow-img" />
                            <div class="ms-2">
                                <h6 class="mb-1">Data and Statistical Analysis</h6>
                                <p class="mb-0 small">Statistical modeling and statistical analysis to validate and improve your research findings</p>
                            </div>
                        </div>
                        <div class="d-flex list-points">
                            <img src="{{ asset('public/assets/images/blue-arrow.png') }}" class="arrow-img" />
                            <div class="ms-2">
                                <h6 class="mb-1">Eye-catching Conference Posters</h6>
                                <p class="mb-0 small">Developing eye-catching posters to showcase your research at any scientific meeting</p>
                            </div>
                        </div>
                        <div class="d-flex list-points">
                            <img src="{{ asset('public/assets/images/blue-arrow.png') }}" class="arrow-img" />
                            <div class="ms-2">
                                <h6 class="mb-1">High Impact Presentations</h6>
                                <p class="mb-0 small">Interactive and engaging presentation of your work for conferences, conventions, etc.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid grey-bg journals-section">
        <div class="container-fluid">
            <div class="py-md-5 py-4 container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <h3 class="col-xl-6 heading">BIOSCIENCE JOURNALS</h3>
                    </div>
                    <div class="col-lg-8">
                        <div class="d-flex list-points">
                            <img src="{{ asset('public/assets/images/orange-arrow.png') }}" class="arrow-img" />
                            <div class="ms-2">
                                <h6 class="mb-1">Journal of Bioscience Research</h6>
                                <p class="mb-0 small">Publishes scientific output of bioscience graduate and undergraduate students from MENA region <span class="orange-text">at discounted publishing charges</span></p>
                            </div>
                        </div>
                        <div class="d-flex list-points">
                            <img src="{{ asset('public/assets/images/orange-arrow.png') }}" class="arrow-img" />
                            <div class="ms-2">
                                <h6 class="mb-1">Journal of Case Reports</h6>
                                <p class="mb-0 small">Publishes case reports from MENA region at <span class="orange-text">affordable publication charges</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid grey-bg research-section">
        <div class="container-fluid">
            <div class="py-md-5 py-4 container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <h3 class="col-xl-6 heading">RESEARCHER PROFILES</h3>
                    </div>
                    <div class="col-lg-8">
                        <div class="d-flex list-points">
                            <img src="{{ asset('public/assets/images/green-arrow.png') }}" class="arrow-img" />
                            <div class="ms-2">
                                <h6 class="mb-1">Create Your Research Profile on MENA Medical Research Platform</h6>
                                <p class="mb-0 small">Create Your Research Profile and be discovered by researchers with similar interest(s)</p>
                            </div>
                        </div>
                        <div class="d-flex list-points">
                            <img src="{{ asset('public/assets/images/green-arrow.png') }}" class="arrow-img" />
                            <div class="ms-2">
                                <h6 class="mb-1">Find Researchers with Similar Interests and Create Your Network</h6>
                                <p class="mb-0 small">Find researchers in MENA and learn about their research interests and accomplishments</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid grey-bg news-section">
        <div class="container-fluid">
            <div class="py-md-5 py-4 container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <h3 class="col-xl-6 heading">RESEARCH NEWS</h3>
                    </div>
                    <div class="col-lg-8">
                        <div class="d-flex list-points">
                            <img src="{{ asset('public/assets/images/red-arrow.png') }}" class="arrow-img" />
                            <div class="ms-2">
                                <h6 class="mb-1">News from Research Institutes and Academic Hospitals in MENA Region</h6>
                                <p class="mb-0 small">Find out what is happening in Biosciences research in the MENA region</p>
                            </div>
                        </div>
                        <div class="d-flex list-points">
                            <img src="{{ asset('public/assets/images/red-arrow.png') }}" class="arrow-img" />
                            <div class="ms-2">
                                <h6 class="mb-1">Find High Impact Research Published Globally from the MENA Region</h6>
                                <p class="mb-0 small">Get access to important research published from the MENA region</p>
                            </div>
                        </div>
                        <div class="d-flex list-points">
                            <img src="{{ asset('public/assets/images/red-arrow.png') }}" class="arrow-img" />
                            <div class="ms-2">
                                <h6 class="mb-1">Submit News / Press Release to Spread News from your Institute</h6>
                                <p class="mb-0 small">Share News from your institute by submitting news articles or press releases</p>
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
