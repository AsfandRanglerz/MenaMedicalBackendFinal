<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" style="height:auto; width:150px;"
                    src="{{ asset('public/assets/images/logo.png') }}" class="header-logo" /> {{-- <span class="logo-name">Mena Medical Research</span> --}}
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <a href="{{ url('/admin/dashboard') }}" class="nav-link"><i
                        data-feather="monitor"></i><span>Dashboard</span></a>
            </li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="layout"></i> <!-- Changed to 'layout' for header section -->
                    <span>Service Prices</span>
                </a>
                <ul
                    class="dropdown-menu {{ request()->is('admin/Additional-Prices*') || request()->is('admin/pricing-services*') ? 'show' : '' }}">


                    {{-- Pricing --}}
                    <li class="{{ request()->is('admin/pricing-services*') ? 'active' : '' }}">
                        <a href="{{ route('newServicePrice.index') }}"
                            class="nav-link {{ request()->is('admin/pricing-services*') ? 'text-white' : '' }}">
                            <span data-feather="dollar-sign"></span>
                            <span>Pricing</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('admin/Additional-Prices*') ? 'active' : '' }}">
                        <a href="{{ route('AdditionalPrice') }}"
                            class="nav-link {{ request()->is('admin/Additional-Prices*') ? 'text-white' : '' }}">
                            <i data-feather="dollar-sign"></i>
                            <span>Additional Services</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="{{ request()->is('admin/Quotation-Requests*') ? 'active' : '' }}">
                <a href="{{ route('quotationRequests.index') }}"
                    class="nav-link {{ request()->is('admin/Quotation-Requests*') ? 'text-white' : '' }}">
                    <i data-feather="file-text"></i> <!-- Icon for Quotation Requests -->
                    <span>Quotation Request</span>
                    <div id="quotationRequest"
                        class="badge {{ request()->is('admin/Quotation-Requests*') ? 'bg-white text-dark' : 'bg-primary text-white' }} rounded-circle">
                    </div>
                </a>
            </li>
            <li class="{{ request()->is('admin/Approved-Requests*') ? 'active' : '' }}">
                <a href="{{ route('quotationRequests.approved') }}"
                    class="nav-link {{ request()->is('admin/Approved-Requests*') ? 'text-white' : '' }}">
                    <i data-feather="check-circle"></i> <!-- Icon for Approved Requests -->
                    <span>Approved Requests</span>
                </a>
            </li>
            <li class="{{ request()->is('admin/Rejected-Requests*') ? 'active' : '' }}">
                <a href="{{ route('quotationRequests.rejected') }}"
                    class="nav-link {{ request()->is('admin/Rejected-Requests*') ? 'text-white' : '' }}">
                    <i data-feather="x-circle"></i> <!-- Icon for Rejected Requests -->
                    <span>Rejected Requests</span>
                </a>
            </li>


            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="layout"></i> <!-- Changed to 'layout' for header section -->
                    <span>Header</span>
                </a>
                <ul
                    class="dropdown-menu {{ request()->is('admin/headerContentOne*') || request()->is('admin/headerContentTwo*') || request()->is('admin/logo*') || request()->is('admin/navBar*') ? 'show' : '' }} ? 'show' : '' }}">

                    {{-- Logo --}}
                    <li class="{{ request()->is('admin/logo*') ? 'active' : '' }}">
                        <a href="{{ route('logo') }}"
                            class="nav-link {{ request()->is('admin/logo*') ? 'text-white' : '' }}">
                            <span data-feather="image"></span> <!-- Updated icon to 'image' for Logo -->
                            <span>Logo</span>
                        </a>
                    </li>

                    {{-- Header Content One --}}
                    <li class="{{ request()->is('admin/headerContentOne*') ? 'active' : '' }}">
                        <a href="{{ route('headerContentOne') }}"
                            class="nav-link {{ request()->is('admin/headerContentOne*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span> <!-- Changed to 'file-text' for Content 1 -->
                            <span>Header Content 1</span>
                        </a>
                    </li>

                    {{-- Header Content Two --}}
                    <li class="{{ request()->is('admin/headerContentTwo*') ? 'active' : '' }}">
                        <a href="{{ route('headerContentTwo') }}"
                            class="nav-link {{ request()->is('admin/headerContentTwo*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span> <!-- Changed to 'file' for Content 2 -->
                            <span>Header Content 2</span>
                        </a>
                    </li>

                    {{-- Nav-Bar --}}
                    {{-- <li class="{{ request()->is('admin/navBar*') ? 'active' : '' }}">
                        <a href="{{ route('navBar') }}"
                           class="nav-link {{ request()->is('admin/navBar*') ? 'text-white' : '' }}">
                            <span data-feather="menu"></span>
                            <span>Navbar</span>
                        </a>
                    </li> --}}



                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="grid"></i> <!-- Changed to 'layout' for header section -->
                    <span>Footer</span>
                </a>
                <ul
                    class="dropdown-menu {{ request()->is('admin/footerContentOne*') || request()->is('admin/service*') || request()->is('admin/journal*') || request()->is('admin/news*') || request()->is('admin/profile*') || request()->is('admin/socialLink*') ? 'show' : '' }}">

                    {{-- Footer Content One --}}
                    <li class="{{ request()->is('admin/footerContentOne*') ? 'active' : '' }}">
                        <a href="{{ route('footerContentOne') }}"
                            class="nav-link {{ request()->is('admin/footerContentOne*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span>
                            <span>Footer Content</span>
                        </a>
                    </li>

                    {{-- Service --}}
                    <li class="{{ request()->is('admin/service*') ? 'active' : '' }}">
                        <a href="{{ route('service') }}"
                            class="nav-link {{ request()->is('admin/service*') ? 'text-white' : '' }}">
                            <span data-feather="settings"></span>
                            <span>Services</span>
                        </a>
                    </li>

                    {{-- Journal --}}
                    <li class="{{ request()->is('admin/journal*') ? 'active' : '' }}">
                        <a href="{{ route('journal') }}"
                            class="nav-link {{ request()->is('admin/journal*') ? 'text-white' : '' }}">
                            <span data-feather="book-open"></span>
                            <span>Journals</span>
                        </a>
                    </li>

                    {{-- News --}}
                    <li class="{{ request()->is('admin/news*') ? 'active' : '' }}">
                        <a href="{{ route('news') }}"
                            class="nav-link {{ request()->is('admin/news*') ? 'text-white' : '' }}">
                            <span data-feather="archive"></span>
                            <span>News</span>
                        </a>
                    </li>

                    {{-- Profile --}}
                    <li class="{{ request()->is('admin/profile*') ? 'active' : '' }}">
                        <a href="{{ route('profile') }}"
                            class="nav-link {{ request()->is('admin/profile*') ? 'text-white' : '' }}">
                            <span data-feather="clipboard"></span>
                            <span>Profiles</span>
                        </a>
                    </li>

                    {{-- Social Link --}}
                    <li class="{{ request()->is('admin/socialLink*') ? 'active' : '' }}">
                        <a href="{{ route('socialLink') }}"
                            class="nav-link {{ request()->is('admin/socialLink*') ? 'text-white' : '' }}">
                            <span data-feather="link"></span>
                            <span>Social Links</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="layout"></i> <!-- Changed to 'layout' for header section -->
                    <span>Common Sections</span>
                </a>
                <ul
                    class="dropdown-menu {{ request()->is('admin/HomeSectionThree*') || request()->is('admin/HomeSectionFive*') || request()->is('admin/HomeSectionSix*') || request()->is('admin/LanguageEditingFour*') || request()->is('admin/main-title*') || request()->is('admin/commitment*') ? 'show' : '' }}">
                    <li
                        class="{{ request()->is('admin/HomeSectionSix*') || request()->is('admin/HomeSectionThree*') ? 'active' : '' }}">
                        <a href="{{ route('HomeSectionSix') }}"
                            class="nav-link {{ request()->is('admin/HomeSectionSix*') || request()->is('admin/HomeSectionThree*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span> <!-- Changed to 'file' for Content 2 -->
                            <span>Partners Text</span>
                        </a>
                    </li>


                    {{-- Logo --}}


                    <li
                        class="{{ request()->is('admin/HomeSectionFive*') || request()->is('admin/main-title*') ? 'active' : '' }}">
                        <a href="{{ route('HomeSectionFive') }}"
                            class="nav-link {{ request()->is('admin/HomeSectionFive*') || request()->is('admin/main-title*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span> <!-- Changed to 'file' for Content 2 -->
                            <span>Satisfaction Guarantee</span>
                        </a>
                    </li>



                    <li
                        class="{{ request()->is('admin/LanguageEditingFour*') || request()->is('admin/commitment*') ? 'active' : '' }}">
                        <a href="{{ route('LanguageEditingFour') }}"
                            class="nav-link {{ request()->is('admin/LanguageEditingFour*') || request()->is('admin/commitment*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span> <!-- Changed to 'file' for Content 2 -->
                            <span>Commitment</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="layout"></i> <!-- Changed to 'layout' for header section -->
                    <span>Home</span>
                </a>
                <ul
                    class="dropdown-menu {{ request()->is('admin/HomeSectionOne*') || request()->is('admin/HomeSectionTwo*') || request()->is('admin/HomeSectionFour*') || request()->is('admin/Services*') || request()->is('admin/Works*') ? 'show' : '' }}">

                    {{-- Logo --}}
                    <li class="{{ request()->is('admin/HomeSectionOne*') ? 'active' : '' }}">
                        <a href="{{ route('HomeSectionOne') }}"
                            class="nav-link {{ request()->is('admin/HomeSectionOne*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span> <!-- Updated icon to 'image' for Logo -->
                            <span>Introduction</span>
                        </a>
                    </li>

                    {{-- Header Content One --}}
                    <li
                        class="{{ request()->is('admin/HomeSectionTwo*') || request()->is('admin/Services*') ? 'active' : '' }}">
                        <a href="{{ route('HomeSectionTwo') }}"
                            class="nav-link {{ request()->is('admin/HomeSectionTwo*') || request()->is('admin/Services*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span> <!-- Changed to 'file-text' for Content 1 -->
                            <span>Our Services</span>
                        </a>
                    </li>

                    <li
                        class="{{ request()->is('admin/HomeSectionFour*') || request()->is('admin/Works*') ? 'active' : '' }}">
                        <a href="{{ route('HomeSectionFour') }}"
                            class="nav-link {{ request()->is('admin/HomeSectionFour*') || request()->is('admin/Works*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span> <!-- Changed to 'file' for Content 2 -->
                            <span>How It Works</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="layout"></i> <!-- Changed to 'layout' for header section -->
                    <span>Language Editing</span>
                </a>
                <ul
                    class="dropdown-menu {{ request()->is('admin/LanguageEditingOne*') || request()->is('admin/LanguageEditingTwo*') || request()->is('admin/LanguageEditingThree*') ? 'show' : '' }} ? 'show' : '' }}">

                    {{-- Logo --}}
                    <li class="{{ request()->is('admin/LanguageEditingOne*') ? 'active' : '' }}">
                        <a href="{{ route('LanguageEditingOne') }}"
                            class="nav-link {{ request()->is('admin/LanguageEditingOne*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span> <!-- Updated icon to 'image' for Logo -->
                            <span>Introduction</span>
                        </a>
                    </li>

                    {{-- Header Content One --}}
                    <li class="{{ request()->is('admin/LanguageEditingTwo*') ? 'active' : '' }}">
                        <a href="{{ route('LanguageEditingTwo') }}"
                            class="nav-link {{ request()->is('admin/LanguageEditingTwo*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span> <!-- Changed to 'file-text' for Content 1 -->
                            <span>Packages</span>
                        </a>
                    </li>

                    {{-- Header Content Two --}}
                    <li class="{{ request()->is('admin/LanguageEditingThree*') ? 'active' : '' }}">
                        <a href="{{ route('LanguageEditingThree') }}"
                            class="nav-link {{ request()->is('admin/LanguageEditingThree*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span> <!-- Changed to 'file' for Content 2 -->
                            <span>Quality Guarantee</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="layout"></i> <!-- Changed to 'layout' for header section -->
                    <span>Scientific Editing</span>
                </a>
                <ul
                    class="dropdown-menu {{ request()->is('admin/ScientificEditingOne*') || request()->is('admin/ScientificEditingTwo*') || request()->is('admin/ScientificEditingThree*') || request()->is('admin/Features*') ? 'show' : '' }}">

                    {{-- Logo --}}
                    <li class="{{ request()->is('admin/ScientificEditingOne*') ? 'active' : '' }}">
                        <a href="{{ route('ScientificEditingOne') }}"
                            class="nav-link {{ request()->is('admin/ScientificEditingOne*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span> <!-- Updated icon to 'image' for Logo -->
                            <span>Introduction</span>
                        </a>
                    </li>

                    <li class="{{ request()->is('admin/ScientificEditingTwo*') ? 'active' : '' }}">
                        <a href="{{ route('ScientificEditingTwo') }}"
                            class="nav-link {{ request()->is('admin/ScientificEditingTwo*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span> <!-- Updated icon to 'image' for Logo -->
                            <span>Key Features</span>
                        </a>
                    </li>

                    <li
                        class="{{ request()->is('admin/ScientificEditingThree*') || request()->is('admin/Features*') ? 'active' : '' }}">
                        <a href="{{ route('ScientificEditingThree') }}"
                            class="nav-link {{ request()->is('admin/ScientificEditingThree*') || request()->is('admin/Features*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span> <!-- Changed to 'file' for Content 2 -->
                            <span>Features and Benefits</span>
                        </a>
                    </li>

                    {{-- <li class="{{ request()->is('admin/LanguageEditingFour*') ? 'active' : '' }}">
                        <a href="{{ route('LanguageEditingFour') }}"
                           class="nav-link {{ request()->is('admin/LanguageEditingFour*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span> <!-- Changed to 'file' for Content 2 -->
                            <span>section 4</span>
                        </a>
                    </li> --}}
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="layout"></i> <!-- Icon for header section -->
                    <span>Publication Support</span>
                </a>
                <ul
                    class="dropdown-menu {{ request()->is('admin/AccidentalPlagiarismOne*') || request()->is('admin/ManuscriptFormattingOne*') || request()->is('admin/ManuscriptFormattingTwo*') || request()->is('admin/ManuscriptFormattingThree*') || request()->is('admin/ManuscriptFeatures*') ? 'show' : '' }}">
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown">
                            <i data-feather="layout"></i>
                            <span>Accidental plagiarism</span>
                        </a>
                        <ul class="dropdown-menu {{ request()->is('admin/AccidentalPlagiarismOne*') ? 'show' : '' }}">
                            <li class="{{ request()->is('admin/AccidentalPlagiarismOne*') ? 'active' : '' }}">
                                <a href="{{ route('AccidentalPlagiarismOne') }}"
                                    class="nav-link {{ request()->is('admin/AccidentalPlagiarismOne*') ? 'text-white' : '' }}">
                                    <span data-feather="file-text"></span>
                                    <span>Introduction</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown">
                            <i data-feather="layout"></i>
                            <span>Manuscript Formatting</span>
                        </a>
                        <ul
                            class="dropdown-menu {{ request()->is('admin/ManuscriptFormattingOne*') || request()->is('admin/ManuscriptFormattingTwo*') || request()->is('admin/ManuscriptFormattingThree*') || request()->is('admin/ManuscriptFeatures*') ? 'show' : '' }}">
                            <li class="{{ request()->is('admin/ManuscriptFormattingOne*') ? 'active' : '' }}">
                                <a href="{{ route('ManuscriptFormattingOne') }}"
                                    class="nav-link {{ request()->is('admin/ManuscriptFormattingOne*') ? 'text-white' : '' }}">
                                    <span data-feather="file-text"></span>
                                    <span>Introduction</span>
                                </a>
                            </li>

                            <li
                                class="{{ request()->is('admin/ManuscriptFormattingTwo*') || request()->is('admin/ManuscriptFeatures*') ? 'active' : '' }}">
                                <a href="{{ route('ManuscriptFormattingTwo') }}"
                                    class="nav-link {{ request()->is('admin/ManuscriptFormattingTwo*') || request()->is('admin/ManuscriptFeatures*') ? 'text-white' : '' }}">
                                    <span data-feather="file-text"></span>
                                    <span>Features and Benefits</span>
                                </a>
                            </li>

                            <li class="{{ request()->is('admin/ManuscriptFormattingThree*') ? 'active' : '' }}">
                                <a href="{{ route('ManuscriptFormattingThree') }}"
                                    class="nav-link {{ request()->is('admin/ManuscriptFormattingThree*') ? 'text-white' : '' }}">
                                    <span data-feather="file-text"></span>
                                    <span>Manuscript Review</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>


            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="layout"></i>
                    <span>Post and Presentation</span>
                </a>
                <ul
                    class="dropdown-menu {{ request()->is('admin/PostandPresentationOne*') || request()->is('admin/PostandPresentationTwo*') || request()->is('admin/PostandPresentationThree*') || request()->is('admin/PostandPresentationFour*') ? 'show' : '' }}">

                    {{-- Logo --}}
                    <li class="{{ request()->is('admin/PostandPresentationOne*') ? 'active' : '' }}">
                        <a href="{{ route('PostandPresentationOne') }}"
                            class="nav-link {{ request()->is('admin/PostandPresentationOne*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span>
                            <span>Introduction</span>
                        </a>
                    </li>

                    <li class="{{ request()->is('admin/PostandPresentationTwo*') ? 'active' : '' }}">
                        <a href="{{ route('PostandPresentationTwo') }}"
                            class="nav-link {{ request()->is('admin/PostandPresentationTwo*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span>
                            <span>Key Features</span>
                        </a>
                    </li>

                    <li class="{{ request()->is('admin/PostandPresentationThree*') ? 'active' : '' }}">
                        <a href="{{ route('PostandPresentationThree') }}"
                            class="nav-link {{ request()->is('admin/PostandPresentationThree*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span>
                            <span>What we need</span>
                        </a>
                    </li>

                    <li class="{{ request()->is('admin/PostandPresentationFour*') ? 'active' : '' }}">
                        <a href="{{ route('PostandPresentationFour') }}"
                            class="nav-link {{ request()->is('admin/PostandPresentationFour*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span>
                            <span>Review and Editing</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="layout"></i> <!-- Changed to 'layout' for header section -->
                    <span>Thesis Support</span>
                </a>
                <ul
                    class=" dropdown-menu {{ request()->is('admin/AssignmentEditingServiceOne*') || request()->is('admin/AssignmentEditingServiceTwo*') || request()->is('admin/ThesisEditingServiceOne*') || request()->is('admin/ThesisEditingServicTwo*') || request()->is('admin/ThesisEditingServicThree*') || request()->is('admin/ThesisEditingServiceTwo*') || request()->is('admin/ThesisEditingServiceThree*') ? 'show' : '' }}">
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown">
                            <i data-feather="layout"></i>
                            <span>Assignment Editing</span>
                        </a>
                        <ul
                            class="dropdown-menu {{ request()->is('admin/AssignmentEditingServiceOne*') || request()->is('admin/AssignmentEditingServiceTwo*') ? 'show' : '' }}">
                            <li class="{{ request()->is('admin/AssignmentEditingServiceOne*') ? 'active' : '' }}">
                                <a href="{{ route('AssignmentEditingServiceOne') }}"
                                    class="nav-link {{ request()->is('AssignmentEditingServiceOne*') || request()->is('admin/AssignmentEditingServiceOne*') ? 'text-white' : '' }}">
                                    <span data-feather="file-text"></span> <!-- Updated icon to 'image' for Logo -->
                                    <span>Introduction</span>
                                </a>
                            </li>

                            <li class="{{ request()->is('admin/AssignmentEditingServiceTwo*') ? 'active' : '' }}">
                                <a href="{{ route('AssignmentEditingServiceTwo') }}"
                                    class="nav-link {{ request()->is('admin/AssignmentEditingServiceTwo*') ? 'text-white' : '' }}">
                                    <span data-feather="file-text"></span> <!-- Updated icon to 'image' for Logo -->
                                    <span>Key Features</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown">
                            <i data-feather="layout"></i>
                            <span>Thesis Editing Services</span>
                        </a>
                        <ul
                            class="dropdown-menu {{ request()->is('admin/ThesisEditingServiceOne*') || request()->is('admin/ThesisEditingServiceTwo*') || request()->is('admin/ThesisEditingServiceThree*') ? 'show' : '' }}">
                            <li class="{{ request()->is('admin/ThesisEditingServiceOne*') ? 'active' : '' }}">
                                <a href="{{ route('ThesisEditingServiceOne') }}"
                                    class="nav-link {{ request()->is('admin/ThesisEditingServiceOne*') ? 'text-white' : '' }}">
                                    <span data-feather="file-text"></span>
                                    <span>Introduction</span>
                                </a>
                            </li>

                            <li class="{{ request()->is('admin/ThesisEditingServiceTwo*') ? 'active' : '' }}">
                                <a href="{{ route('ThesisEditingServiceTwo') }}"
                                    class="nav-link {{ request()->is('admin/ThesisEditingServiceTwo*') ? 'text-white' : '' }}">
                                    <span data-feather="file-text"></span>
                                    <span>Features of Advanced</span>
                                </a>
                            </li>

                            <li class="{{ request()->is('admin/ThesisEditingServiceThree*') ? 'active' : '' }}">
                                <a href="{{ route('ThesisEditingServiceThree') }}"
                                    class="nav-link {{ request()->is('admin/ThesisEditingServiceThree*') ? 'text-white' : '' }}">
                                    <span data-feather="file-text"></span>
                                    <span>Features of Premium</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="layout"></i> <!-- Changed to 'layout' for header section -->
                    <span>Data Analysis Services</span>
                </a>
                <ul
                    class="dropdown-menu {{ request()->is('admin/DataAnalysisServiceOne*') || request()->is('admin/DataAnalysisServiceTwo*') || request()->is('admin/DataAnalysisServiceThree*') ? 'show' : '' }}">

                    {{-- Logo --}}
                    <li class="{{ request()->is('admin/DataAnalysisServiceOne*') ? 'active' : '' }}">
                        <a href="{{ route('DataAnalysisServiceOne') }}"
                            class="nav-link {{ request()->is('admin/DataAnalysisServiceOne*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span>
                            <span>Introduction</span>
                        </a>
                    </li>

                    <li class="{{ request()->is('admin/DataAnalysisServiceTwo*') ? 'active' : '' }}">
                        <a href="{{ route('DataAnalysisServiceTwo') }}"
                            class="nav-link {{ request()->is('admin/DataAnalysisServiceTwo*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span>
                            <span>Features of Advanced</span>
                        </a>
                    </li>

                    <li class="{{ request()->is('admin/DataAnalysisServiceThree*') ? 'active' : '' }}">
                        <a href="{{ route('DataAnalysisServiceThree') }}"
                            class="nav-link {{ request()->is('admin/DataAnalysisServiceThree*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span>
                            <span>Features of Premium</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="layout"></i> <!-- Changed to 'layout' for header section -->
                    <span>Place Order</span>
                </a>
                <ul
                    class="dropdown-menu {{ request()->is('admin/PlaceOrderOne*') || request()->is('admin/PlaceOrderTwo*') || request()->is('admin/PlaceOrderThree*') || request()->is('admin/PlaceOrderFour*') || request()->is('admin/OrderWorks*') || request()->is('admin/OrderServices*') ? 'show' : '' }}">

                    {{-- Logo --}}
                    <li class="{{ request()->is('admin/PlaceOrderOne*') ? 'active' : '' }}">
                        <a href="{{ route('PlaceOrderOne') }}"
                            class="nav-link {{ request()->is('admin/PlaceOrderOne*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span> <!-- Updated icon to 'image' for Logo -->
                            <span>Introduction</span>
                        </a>
                    </li>

                    <li
                        class="{{ request()->is('admin/PlaceOrderTwo*') || request()->is('admin/OrderWorks*') ? 'active' : '' }}">
                        <a href="{{ route('PlaceOrderTwo') }}"
                            class="nav-link {{ request()->is('admin/PlaceOrderTwo*') || request()->is('admin/OrderWorks*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span> <!-- Updated icon to 'image' for Logo -->
                            <span>How it Works</span>
                        </a>
                    </li>

                    <li class="{{ request()->is('admin/PlaceOrderThree*') ? 'active' : '' }}">
                        <a href="{{ route('PlaceOrderThree') }}"
                            class="nav-link {{ request()->is('admin/PlaceOrderThree*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span> <!-- Updated icon to 'image' for Logo -->
                            <span>Payment and Delivery</span>
                        </a>
                    </li>

                    <li
                        class="{{ request()->is('admin/PlaceOrderFour*') || request()->is('admin/OrderServices*') ? 'active' : '' }}">
                        <a href="{{ route('PlaceOrderFour') }}"
                            class="nav-link {{ request()->is('admin/PlaceOrderFour*') || request()->is('admin/OrderServices*') ? 'text-white' : '' }}">
                            <span data-feather="file-text"></span> <!-- Updated icon to 'image' for Logo -->
                            <span>Services</span>
                        </a>
                    </li>
                </ul>
            </li>



            <li class="{{ request()->is('admin/seo*') ? 'active' : '' }}">
                <a href="{{ route('seo.index') }}"
                    class="nav-link {{ request()->is('admin/seo*') ? 'text-white' : '' }}">
                    <i data-feather="help-circle"></i>
                    <span>SEO</span>
                </a>
            </li>
            <li class="{{ request()->is('admin/faq*') ? 'active' : '' }}">
                <a href="{{ route('faq.index') }}"
                    class="nav-link {{ request()->is('admin/faq*') ? 'text-white' : '' }}">
                    <i data-feather="help-circle"></i>
                    <span>FAQ's</span>
                </a>
            </li>

            <li class="dropdown {{ request()->is('admin/Privacy-policy*') ? 'active' : '' }}">
                <a href="{{ route('privacy.index') }}"
                    class="nav-link {{ request()->is('admin/Privacy-policy*') ? 'text-white' : '' }}">
                    <i data-feather="shield"></i><span>Privacy Policy</span>
                </a>
            </li>

            <li class="dropdown {{ request()->is('admin/terms-conditions*') ? 'active' : '' }}">
                <a href="{{ route('termCondition.index') }}"
                    class="nav-link {{ request()->is('admin/terms-conditions*') ? 'text-white' : '' }}">
                    <i data-feather="file-text"></i><span>Terms & Conditions</span>
                </a>
            </li>

            {{-- <li class="dropdown {{ request()->is('admin/Privacy-policy') ? 'active' : '' }}">
                <a href="{{ url('/admin/Privacy-policy') }}" class="nav-link"><i
                        data-feather="monitor"></i><span>Privacy policy</span></a>
            </li>
            <li class="dropdown {{ request()->is('admin/term-condition') ? 'active' : '' }}">
                <a href="{{ url('/admin/term-condition') }}" class="nav-link"><i
                        data-feather="monitor"></i><span>Term&Condition</span></a>
            </li> --}}

        </ul>
    </aside>
</div>
