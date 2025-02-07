@extends('admin.layout.app')
@section('title', 'index')
@section('content')
    <div class="main-content" style="min-height: 562px;">
        <section class="section">
            <div class="card-body d-flex">
                <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link rounded-0 active" id="index-tab" data-toggle="tab" href="#index" role="tab"
                            aria-controls="index" aria-selected="true">Index</a>
                        <input type="text" value="Index" name="index" hidden class="index_section">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-0" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true" onclick="homeSectionGet()">Home</a>
                        <input type="text" value="Home" name="home" hidden class="home_section">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-0" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                             aria-controls="profile" aria-selected="false" onclick="languageEditingGet()">Language Editing</a>
                        <input type="text" value="Language Editing" name="language_editing" hidden class="languageEditing_section">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-0" id="spo-tab" data-toggle="tab" href="#spo" role="tab"
                            aria-controls="spo" aria-selected="false" onclick="scientificEditingGet()">Scientific Editing</a>
                        <input type="text" value="Scientific Editing" name="scientific_editing" hidden class="scientificEditing_section">

                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-0" id="partime-tab" data-toggle="tab" href="#partime" role="tab"
                            aria-controls="partime" aria-selected="false" onclick="publicationSupportGet()">Accidental Plagiarism</a>
                        <input type="text" value="Accidental Plagiarism" name="publication_support" hidden class="publication_section">

                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-0" id="manuscript-tab" data-toggle="tab" href="#manuscript" role="tab"
                            aria-controls="manuscript" aria-selected="false" onclick="manuscriptFormattingGet()">Manuscript Formatting</a>
                        <input type="text" value="Manuscript Formatting" name="manuscript" hidden class="manuscript_section">

                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-0" id="UaE-tab" data-toggle="tab" href="#UaE" role="tab"
                            aria-controls="UaE" aria-selected="false" onclick="posterPresentationGet()">Posters & Presentations</a>
                        <input type="text" value="Posters & Presentations" name="posters" hidden class="posters_section">

                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-0" id="Modify_Contract-tab" data-toggle="tab" href="#Modify_Contract"
                            role="tab" aria-controls="Modify_Contract" aria-selected="false" onclick="thesisSupportGet()">Thesis Editing Service</a>
                        <input type="text" value="Thesis Editing Service" name="thesis" hidden class="thesis_section">

                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-0" id="assignment-tab" data-toggle="tab" href="#assignment"
                            role="tab" aria-controls="assignment" aria-selected="false" onclick="assignmentEditingGet()">Assignemnt Editing Service</a>
                        <input type="text" value="Assignemnt Editing Service" name="assignment" hidden class="assignment_section">

                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-0" id="modification_visa-tab" data-toggle="tab" href="#modification_visa"
                            role="tab" aria-controls="modification_visa" aria-selected="false" onclick="dataAnalysisGet()">Data Analysis</a>
                            <input type="text" value="Data Analysis" name="data_analysis" hidden class="dataAnalysis_section">

                    </li>
                </ul>
                {{-- owner --}}
                <div class="w-100 tab-content" id="myTabContent">
                     {{-- Home --}}
                     <div class="tab-pane fade active show" id="index" role="tabpanel" aria-labelledby="index-tab">
                        <div class="card-body table-striped table-bordered table-responsive">
                            <div class="tab-pane fade active show" id="settings" role="tabpanel"
                                aria-labelledby="profile-tab2">
                                <form enctype="multipart/form-data" id="seoForm">
                                    <div class="card-header">
                                        <h4>SEO Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Title</label>
                                                <input type="text" name="title" id="index_title" class="form-control">
                                                @error('name')
                                                    <div class="text-danger">
                                                        Please fill in the Name
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Title</label>
                                                <input type="text" name="og_title" id="index_og_title"
                                                    class="form-control">
                                                @error('og_title')
                                                    <div class="text-danger">
                                                        Please fill in the OG Title
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Description</label>
                                                <textarea name="description" id="index_description" class="form-control" rows="3"></textarea>
                                                @error('description')
                                                    <div class="text-danger">
                                                        Please fill in the description
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Description</label>
                                                <textarea name="og_description" id="index_og_description" class="form-control" rows="3"></textarea>
                                                @error('og_description')
                                                    <div class="text-danger">
                                                        Please fill in the OG description
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12 col-12">
                                                <label>Keywords</label>
                                                <textarea name="keywords" id="index_keywords" class="form-control" rows="2"></textarea>
                                                @error('keywords')
                                                    <div class="text-danger">
                                                        Please fill in the Keywords
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="button" class="btn btn-primary submit-index-changes">Save</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                    {{-- Home --}}
                    <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card-body table-striped table-bordered table-responsive">
                            <div class="tab-pane fade active show" id="settings" role="tabpanel"
                                aria-labelledby="profile-tab2">
                                <form enctype="multipart/form-data" id="seoForm">
                                    <div class="card-header">
                                        <h4>SEO Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Title</label>
                                                <input type="text" name="title" id="home_title" class="form-control">
                                                @error('name')
                                                    <div class="text-danger">
                                                        Please fill in the Name
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Title</label>
                                                <input type="text" name="og_title" id="home_og_title"
                                                    class="form-control">
                                                @error('og_title')
                                                    <div class="text-danger">
                                                        Please fill in the OG Title
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Description</label>
                                                <textarea name="description" id="home_description" class="form-control" rows="3"></textarea>
                                                @error('description')
                                                    <div class="text-danger">
                                                        Please fill in the description
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Description</label>
                                                <textarea name="og_description" id="home_og_description" class="form-control" rows="3"></textarea>
                                                @error('og_description')
                                                    <div class="text-danger">
                                                        Please fill in the OG description
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12 col-12">
                                                <label>Keywords</label>
                                                <textarea name="keywords" id="home_keywords" class="form-control" rows="2"></textarea>
                                                @error('keywords')
                                                    <div class="text-danger">
                                                        Please fill in the Keywords
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="button" class="btn btn-primary submit-home-changes">Save</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                    {{-- Language Editing --}}
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="card-body table-striped table-bordered table-responsive">
                            <div class="tab-pane fade active show" id="settings" role="tabpanel"
                                aria-labelledby="profile-tab2">
                                <form enctype="multipart/form-data" id="seoForm">
                                    <div class="card-header">
                                        <h4>SEO Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Title</label>
                                                <input type="text" name="title" id="language_title" class="form-control">
                                                @error('name')
                                                    <div class="text-danger">
                                                        Please fill in the Name
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Title</label>
                                                <input type="text" name="og_title" id="language_og_title"
                                                    class="form-control">
                                                @error('og_title')
                                                    <div class="text-danger">
                                                        Please fill in the OG Title
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Description</label>
                                                <textarea name="description" id="language_description" class="form-control" rows="3"></textarea>
                                                @error('description')
                                                    <div class="text-danger">
                                                        Please fill in the description
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Description</label>
                                                <textarea name="og_description" id="language_og_description" class="form-control" rows="3"></textarea>
                                                @error('og_description')
                                                    <div class="text-danger">
                                                        Please fill in the OG description
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12 col-12">
                                                <label>Keywords</label>
                                                <textarea name="keywords" id="language_keywords" class="form-control" rows="2"></textarea>
                                                @error('keywords')
                                                    <div class="text-danger">
                                                        Please fill in the Keywords
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="button" class="btn btn-primary submit-language-changes">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- Scientific Editing --}}
                    <div class="tab-pane fade" id="spo" role="tabpanel" aria-labelledby="spo-tab">
                        <div class="card-body table-striped table-bordered table-responsive">
                            <div class="tab-pane fade active show" id="settings" role="tabpanel"
                                aria-labelledby="profile-tab2">
                                <form enctype="multipart/form-data" id="seoForm">
                                    <div class="card-header">
                                        <h4>SEO Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Title</label>
                                                <input type="text" name="title" id="scientific_title" class="form-control">
                                                @error('name')
                                                    <div class="text-danger">
                                                        Please fill in the Name
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Title</label>
                                                <input type="text" name="og_title" id="scientific_og_title"
                                                    class="form-control">
                                                @error('og_title')
                                                    <div class="text-danger">
                                                        Please fill in the OG Title
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Description</label>
                                                <textarea name="description" id="scientific_description" class="form-control" rows="3"></textarea>
                                                @error('description')
                                                    <div class="text-danger">
                                                        Please fill in the description
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Description</label>
                                                <textarea name="og_description" id="scientific_og_description" class="form-control" rows="3"></textarea>
                                                @error('og_description')
                                                    <div class="text-danger">
                                                        Please fill in the OG description
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12 col-12">
                                                <label>Keywords</label>
                                                <textarea name="keywords" id="scientific_keywords" class="form-control" rows="2"></textarea>
                                                @error('keywords')
                                                    <div class="text-danger">
                                                        Please fill in the Keywords
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="button" class="btn btn-primary submit-scientific-changes">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- Publication Support --}}
                    <div class="tab-pane fade" id="partime" role="tabpanel" aria-labelledby="partime-tab">
                        <div class="card-body table-striped table-bordered table-responsive">
                            <div class="tab-pane fade active show" id="settings" role="tabpanel"
                                aria-labelledby="profile-tab2">
                                <form enctype="multipart/form-data" id="seoForm">
                                    <div class="card-header">
                                        <h4>SEO Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Title</label>
                                                <input type="text" name="title" id="publication_title" class="form-control">
                                                @error('name')
                                                    <div class="text-danger">
                                                        Please fill in the Name
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Title</label>
                                                <input type="text" name="og_title" id="publication_og_title"
                                                    class="form-control">
                                                @error('og_title')
                                                    <div class="text-danger">
                                                        Please fill in the OG Title
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Description</label>
                                                <textarea name="description" id="publication_description" class="form-control" rows="3"></textarea>
                                                @error('description')
                                                    <div class="text-danger">
                                                        Please fill in the description
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Description</label>
                                                <textarea name="og_description" id="publication_og_description" class="form-control" rows="3"></textarea>
                                                @error('og_description')
                                                    <div class="text-danger">
                                                        Please fill in the OG description
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12 col-12">
                                                <label>Keywords</label>
                                                <textarea name="keywords" id="publication_keywords" class="form-control" rows="2"></textarea>
                                                @error('keywords')
                                                    <div class="text-danger">
                                                        Please fill in the Keywords
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="button" class="btn btn-primary submit-publication-changes">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                      {{-- Publication Support --}}
                      <div class="tab-pane fade" id="manuscript" role="tabpanel" aria-labelledby="manuscript-tab">
                        <div class="card-body table-striped table-bordered table-responsive">
                            <div class="tab-pane fade active show" id="settings" role="tabpanel"
                                aria-labelledby="profile-tab2">
                                <form enctype="multipart/form-data" id="seoForm">
                                    <div class="card-header">
                                        <h4>SEO Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Title</label>
                                                <input type="text" name="title" id="manuscript_title" class="form-control">
                                                @error('name')
                                                    <div class="text-danger">
                                                        Please fill in the Name
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Title</label>
                                                <input type="text" name="og_title" id="manuscript_og_title"
                                                    class="form-control">
                                                @error('og_title')
                                                    <div class="text-danger">
                                                        Please fill in the OG Title
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Description</label>
                                                <textarea name="description" id="manuscript_description" class="form-control" rows="3"></textarea>
                                                @error('description')
                                                    <div class="text-danger">
                                                        Please fill in the description
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Description</label>
                                                <textarea name="og_description" id="manuscript_og_description" class="form-control" rows="3"></textarea>
                                                @error('og_description')
                                                    <div class="text-danger">
                                                        Please fill in the OG description
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12 col-12">
                                                <label>Keywords</label>
                                                <textarea name="keywords" id="manuscript_keywords" class="form-control" rows="2"></textarea>
                                                @error('keywords')
                                                    <div class="text-danger">
                                                        Please fill in the Keywords
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="button" class="btn btn-primary submit-manuscript-changes">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- Posters & Presentations --}}
                    <div class="tab-pane fade" id="UaE" role="tabpanel" aria-labelledby="UaE-tab">
                        <div class="card-body table-striped table-bordered table-responsive">
                            <div class="tab-pane fade active show" id="settings" role="tabpanel"
                                aria-labelledby="profile-tab2">
                                <form enctype="multipart/form-data" id="seoForm">
                                    <div class="card-header">
                                        <h4>SEO Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Title</label>
                                                <input type="text" name="title" id="posters_title" class="form-control">
                                                @error('name')
                                                    <div class="text-danger">
                                                        Please fill in the Name
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Title</label>
                                                <input type="text" name="og_title" id="posters_og_title"
                                                    class="form-control">
                                                @error('og_title')
                                                    <div class="text-danger">
                                                        Please fill in the OG Title
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Description</label>
                                                <textarea name="description" id="posters_description" class="form-control" rows="3"></textarea>
                                                @error('description')
                                                    <div class="text-danger">
                                                        Please fill in the description
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Description</label>
                                                <textarea name="og_description" id="posters_og_description" class="form-control" rows="3"></textarea>
                                                @error('og_description')
                                                    <div class="text-danger">
                                                        Please fill in the OG description
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12 col-12">
                                                <label>Keywords</label>
                                                <textarea name="keywords" id="posters_keywords" class="form-control" rows="2"></textarea>
                                                @error('keywords')
                                                    <div class="text-danger">
                                                        Please fill in the Keywords
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="button" class="btn btn-primary submit-posters-changes">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- Thesis Support --}}
                    <div class="tab-pane fade" id="Modify_Contract" role="tabpanel"
                        aria-labelledby="Modify_Contract-tab">
                        <div class="card-body table-striped table-bordered table-responsive">
                            <div class="tab-pane fade active show" id="settings" role="tabpanel"
                                aria-labelledby="profile-tab2">
                                <form enctype="multipart/form-data" id="seoForm">
                                    <div class="card-header">
                                        <h4>SEO Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Title</label>
                                                <input type="text" name="title" id="thesis_title" class="form-control">
                                                @error('name')
                                                    <div class="text-danger">
                                                        Please fill in the Name
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Title</label>
                                                <input type="text" name="og_title" id="thesis_og_title"
                                                    class="form-control">
                                                @error('og_title')
                                                    <div class="text-danger">
                                                        Please fill in the OG Title
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Description</label>
                                                <textarea name="description" id="thesis_description" class="form-control" rows="3"></textarea>
                                                @error('description')
                                                    <div class="text-danger">
                                                        Please fill in the description
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Description</label>
                                                <textarea name="og_description" id="thesis_og_description" class="form-control" rows="3"></textarea>
                                                @error('og_description')
                                                    <div class="text-danger">
                                                        Please fill in the OG description
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12 col-12">
                                                <label>Keywords</label>
                                                <textarea name="keywords" id="thesis_keywords" class="form-control" rows="2"></textarea>
                                                @error('keywords')
                                                    <div class="text-danger">
                                                        Please fill in the Keywords
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="button" class="btn btn-primary submit-thesis-changes">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                       {{-- Thesis Support --}}
                       <div class="tab-pane fade" id="assignment" role="tabpanel"
                       aria-labelledby="assignment-tab">
                       <div class="card-body table-striped table-bordered table-responsive">
                           <div class="tab-pane fade active show" id="settings" role="tabpanel"
                               aria-labelledby="profile-tab2">
                               <form enctype="multipart/form-data" id="seoForm">
                                   <div class="card-header">
                                       <h4>SEO Details</h4>
                                   </div>
                                   <div class="card-body">
                                       <div class="row">
                                           <div class="form-group col-md-6 col-12">
                                               <label>Title</label>
                                               <input type="text" name="title" id="assignment_title" class="form-control">
                                               @error('name')
                                                   <div class="text-danger">
                                                       Please fill in the Name
                                                   </div>
                                               @enderror
                                           </div>
                                           <div class="form-group col-md-6 col-12">
                                               <label>OG-Title</label>
                                               <input type="text" name="og_title" id="assignment_og_title"
                                                   class="form-control">
                                               @error('og_title')
                                                   <div class="text-danger">
                                                       Please fill in the OG Title
                                                   </div>
                                               @enderror
                                           </div>
                                       </div>
                                       <div class="row">
                                           <div class="form-group col-md-6 col-12">
                                               <label>Description</label>
                                               <textarea name="description" id="assignment_description" class="form-control" rows="3"></textarea>
                                               @error('description')
                                                   <div class="text-danger">
                                                       Please fill in the description
                                                   </div>
                                               @enderror
                                           </div>
                                           <div class="form-group col-md-6 col-12">
                                               <label>OG-Description</label>
                                               <textarea name="og_description" id="assignment_og_description" class="form-control" rows="3"></textarea>
                                               @error('og_description')
                                                   <div class="text-danger">
                                                       Please fill in the OG description
                                                   </div>
                                               @enderror
                                           </div>
                                       </div>
                                       <div class="row">
                                           <div class="form-group col-md-12 col-12">
                                               <label>Keywords</label>
                                               <textarea name="keywords" id="assignment_keywords" class="form-control" rows="2"></textarea>
                                               @error('keywords')
                                                   <div class="text-danger">
                                                       Please fill in the Keywords
                                                   </div>
                                               @enderror
                                           </div>
                                       </div>
                                   </div>
                                   <div class="card-footer text-right">
                                       <button type="button" class="btn btn-primary submit-assignment-changes">Save</button>
                                   </div>
                               </form>
                           </div>
                       </div>
                   </div>
                    {{-- Data analysis --}}
                    <div class="tab-pane fade" id="modification_visa" role="tabpanel"
                        aria-labelledby="modification_visa-tab">
                        <div class="card-body table-striped table-bordered table-responsive">
                            <div class="tab-pane fade active show" id="settings" role="tabpanel"
                                aria-labelledby="profile-tab2">
                                <form enctype="multipart/form-data" id="seoForm">
                                    <div class="card-header">
                                        <h4>SEO Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Title</label>
                                                <input type="text" name="title" id="analysis_title" class="form-control">
                                                @error('name')
                                                    <div class="text-danger">
                                                        Please fill in the Name
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Title</label>
                                                <input type="text" name="og_title" id="analysis_og_title"
                                                    class="form-control">
                                                @error('og_title')
                                                    <div class="text-danger">
                                                        Please fill in the OG Title
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Description</label>
                                                <textarea name="description" id="analysis_description" class="form-control" rows="3"></textarea>
                                                @error('description')
                                                    <div class="text-danger">
                                                        Please fill in the description
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Description</label>
                                                <textarea name="og_description" id="analysis_og_description" class="form-control" rows="3"></textarea>
                                                @error('og_description')
                                                    <div class="text-danger">
                                                        Please fill in the OG description
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12 col-12">
                                                <label>Keywords</label>
                                                <textarea name="keywords" id="analysis_keywords" class="form-control" rows="2"></textarea>
                                                @error('keywords')
                                                    <div class="text-danger">
                                                        Please fill in the Keywords
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="button" class="btn btn-primary submit-analysis-changes">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>



@endsection

@section('js')
<script>
        $(document).ready(function() {
            indexGet(); // Fetch details on page load
        });

        function indexGet() {
            var section = $('.index_section').val(); // Get the value of the section
            $.ajax({
                url: '{{ route('home.seo') }}', // Laravel route
                type: 'GET', // HTTP method
                data: {
                    _token: "{{ csrf_token() }}", // CSRF token
                    section: section // Selected section value
                },
                success: function(response) {
                    // console.log(response);
                    // Populate form fields with the response data
                    $('#index_title').val(response.title || '');
                    $('#index_og_title').val(response.og_title || '');
                    $('#index_description').val(response.description || '');
                    $('#index_og_description').val(response.og_description || '');
                    $('#index_keywords').val(response.keywords || '');
                },
                error: function(xhr) {
                    console.error('Error fetching SEO details:', xhr.responseJSON?.message || xhr.statusText);
                    alert('Failed to load SEO details. Please try again.');
                }
            });
        }
        $('.submit-index-changes').on('click', function() {
            var section = $('.index_section').val();
            var formData = new FormData();
            formData.append('section', section);
            formData.append('title', $('#index_title').val().trim());
            formData.append('og_title', $('#index_og_title').val().trim());
            formData.append('decsription', $('#index_description').val().trim());
            formData.append('og_decsription', $('#index_og_description').val().trim());
            formData.append('keywords', $('#index_keywords').val().trim());
            // Convert FormData to a JSON string
            var jsonObject = {};
            formData.forEach((value, key) => {
                jsonObject[key] = value;
            });

            console.log(JSON.stringify(jsonObject));
            // return;
            $.ajax({
                url: '{{ route('home.seo.update') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    indexGet();
                    toastr.success('Data Updated Successfully')
                },
                error: function(xhr) {
                    if (xhr.status === 422) { // Laravel validation error
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            toastr.error(messages[0]);
                        });
                    } else {
                        console.error('Error Adding Driver:', xhr);
                        toastr.error('Something went wrong. Please try again.');
                    }
                }
            });

        });
        function homeSectionGet() {
            var section = $('.home_section').val(); // Get the value of the section
            $.ajax({
                url: '{{ route('home.seo') }}', // Laravel route
                type: 'GET', // HTTP method
                data: {
                    _token: "{{ csrf_token() }}", // CSRF token
                    section: section // Selected section value
                },
                success: function(response) {
                    // console.log(response);
                    // Populate form fields with the response data
                    $('#home_title').val(response.title || '');
                    $('#home_og_title').val(response.og_title || '');
                    $('#home_description').val(response.description || '');
                    $('#home_og_description').val(response.og_description || '');
                    $('#home_keywords').val(response.keywords || '');
                },
                error: function(xhr) {
                    console.error('Error fetching SEO details:', xhr.responseJSON?.message || xhr.statusText);
                    alert('Failed to load SEO details. Please try again.');
                }
            });
        }
        $('.submit-home-changes').on('click', function() {
            var section = $('.home_section').val();
            var formData = new FormData();
            formData.append('section', section);
            formData.append('title', $('#home_title').val().trim());
            formData.append('og_title', $('#home_og_title').val().trim());
            formData.append('decsription', $('#home_description').val().trim());
            formData.append('og_decsription', $('#home_og_description').val().trim());
            formData.append('keywords', $('#home_keywords').val().trim());
            // Convert FormData to a JSON string
            var jsonObject = {};
            formData.forEach((value, key) => {
                jsonObject[key] = value;
            });

            console.log(JSON.stringify(jsonObject));
            // return;
            $.ajax({
                url: '{{ route('home.seo.update') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    homeSectionGet();
                    toastr.success('Data Updated Successfully')
                },
                error: function(xhr) {
                    if (xhr.status === 422) { // Laravel validation error
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            toastr.error(messages[0]);
                        });
                    } else {
                        console.error('Error Adding Driver:', xhr);
                        toastr.error('Something went wrong. Please try again.');
                    }
                }
            });

        });
        function languageEditingGet() {
            var section = $('.languageEditing_section').val(); // Get the value of the section
            $.ajax({
                url: '{{ route('home.seo') }}', // Laravel route
                type: 'GET', // HTTP method
                data: {
                    _token: "{{ csrf_token() }}", // CSRF token
                    section: section // Selected section value
                },
                success: function(response) {
                    // console.log(response);
                    // Populate form fields with the response data
                    $('#language_title').val(response.title || '');
                    $('#language_og_title').val(response.og_title || '');
                    $('#language_description').val(response.description || '');
                    $('#language_og_description').val(response.og_description || '');
                    $('#language_keywords').val(response.keywords || '');
                },
                error: function(xhr) {
                    console.error('Error fetching SEO details:', xhr.responseJSON?.message || xhr.statusText);
                    alert('Failed to load SEO details. Please try again.');
                }
            });
        }
        $('.submit-language-changes').on('click', function() {
            var section = $('.languageEditing_section').val();
            var formData = new FormData();
            formData.append('section', section);
            formData.append('title', $('#language_title').val().trim());
            formData.append('og_title', $('#language_og_title').val().trim());
            formData.append('decsription', $('#language_description').val().trim());
            formData.append('og_decsription', $('#language_og_description').val().trim());
            formData.append('keywords', $('#language_keywords').val().trim());
            // Convert FormData to a JSON string
            var jsonObject = {};
            formData.forEach((value, key) => {
                jsonObject[key] = value;
            });

            console.log(JSON.stringify(jsonObject));
            // return;
            $.ajax({
                url: '{{ route('home.seo.update') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    languageEditingGet();
                    toastr.success('Data Updated Successfully')
                },
                error: function(xhr) {
                    if (xhr.status === 422) { // Laravel validation error
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            toastr.error(messages[0]);
                        });
                    } else {
                        console.error('Error Adding Driver:', xhr);
                        toastr.error('Something went wrong. Please try again.');
                    }
                }
            });

        });
        function scientificEditingGet() {
            var section = $('.scientificEditing_section').val(); // Get the value of the section
            $.ajax({
                url: '{{ route('home.seo') }}', // Laravel route
                type: 'GET', // HTTP method
                data: {
                    _token: "{{ csrf_token() }}", // CSRF token
                    section: section // Selected section value
                },
                success: function(response) {
                    // console.log(response);
                    // Populate form fields with the response data
                    $('#scientific_title').val(response.title || '');
                    $('#scientific_og_title').val(response.og_title || '');
                    $('#scientific_description').val(response.description || '');
                    $('#scientific_og_description').val(response.og_description || '');
                    $('#scientific_keywords').val(response.keywords || '');
                },
                error: function(xhr) {
                    console.error('Error fetching SEO details:', xhr.responseJSON?.message || xhr.statusText);
                    alert('Failed to load SEO details. Please try again.');
                }
            });
        }
        $('.submit-scientific-changes').on('click', function() {
            var section = $('.scientificEditing_section').val();
            var formData = new FormData();
            formData.append('section', section);
            formData.append('title', $('#scientific_title').val().trim());
            formData.append('og_title', $('#scientific_og_title').val().trim());
            formData.append('decsription', $('#scientific_description').val().trim());
            formData.append('og_decsription', $('#scientific_og_description').val().trim());
            formData.append('keywords', $('#scientific_keywords').val().trim());
            // Convert FormData to a JSON string
            var jsonObject = {};
            formData.forEach((value, key) => {
                jsonObject[key] = value;
            });

            console.log(JSON.stringify(jsonObject));
            // return;
            $.ajax({
                url: '{{ route('home.seo.update') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    scientificEditingGet();
                    toastr.success('Data Updated Successfully')
                },
                error: function(xhr) {
                    if (xhr.status === 422) { // Laravel validation error
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            toastr.error(messages[0]);
                        });
                    } else {
                        console.error('Error Adding Driver:', xhr);
                        toastr.error('Something went wrong. Please try again.');
                    }
                }
            });

        });


        function publicationSupportGet() {
            var section = $('.publication_section').val(); // Get the value of the section
            $.ajax({
                url: '{{ route('home.seo') }}', // Laravel route
                type: 'GET', // HTTP method
                data: {
                    _token: "{{ csrf_token() }}", // CSRF token
                    section: section // Selected section value
                },
                success: function(response) {
                    // console.log(response);
                    // Populate form fields with the response data
                    $('#publication_title').val(response.title || '');
                    $('#publication_og_title').val(response.og_title || '');
                    $('#publication_description').val(response.description || '');
                    $('#publication_og_description').val(response.og_description || '');
                    $('#publication_keywords').val(response.keywords || '');
                },
                error: function(xhr) {
                    console.error('Error fetching SEO details:', xhr.responseJSON?.message || xhr.statusText);
                    alert('Failed to load SEO details. Please try again.');
                }
            });
        }
        $('.submit-publication-changes').on('click', function() {
            var section = $('.publication_section').val();
            var formData = new FormData();
            formData.append('section', section);
            formData.append('title', $('#publication_title').val().trim());
            formData.append('og_title', $('#publication_og_title').val().trim());
            formData.append('decsription', $('#publication_description').val().trim());
            formData.append('og_decsription', $('#publication_og_description').val().trim());
            formData.append('keywords', $('#publication_keywords').val().trim());
            // Convert FormData to a JSON string
            var jsonObject = {};
            formData.forEach((value, key) => {
                jsonObject[key] = value;
            });

            console.log(JSON.stringify(jsonObject));
            // return;
            $.ajax({
                url: '{{ route('home.seo.update') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    homeSectionGet();
                    toastr.success('Data Updated Successfully')
                },
                error: function(xhr) {
                    if (xhr.status === 422) { // Laravel validation error
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            toastr.error(messages[0]);
                        });
                    } else {
                        console.error('Error Adding Driver:', xhr);
                        toastr.error('Something went wrong. Please try again.');
                    }
                }
            });

        });

        function manuscriptFormattingGet() {
            var section = $('.manuscript_section').val(); // Get the value of the section
            $.ajax({
                url: '{{ route('home.seo') }}', // Laravel route
                type: 'GET', // HTTP method
                data: {
                    _token: "{{ csrf_token() }}", // CSRF token
                    section: section // Selected section value
                },
                success: function(response) {
                    // console.log(response);
                    // Populate form fields with the response data
                    $('#manuscript_title').val(response.title || '');
                    $('#manuscript_og_title').val(response.og_title || '');
                    $('#manuscript_description').val(response.description || '');
                    $('#manuscript_og_description').val(response.og_description || '');
                    $('#manuscript_keywords').val(response.keywords || '');
                },
                error: function(xhr) {
                    console.error('Error fetching SEO details:', xhr.responseJSON?.message || xhr.statusText);
                    alert('Failed to load SEO details. Please try again.');
                }
            });
        }
        $('.submit-manuscript-changes').on('click', function() {
            var section = $('.manuscript_section').val();
            var formData = new FormData();
            formData.append('section', section);
            formData.append('title', $('#manuscript_title').val().trim());
            formData.append('og_title', $('#manuscript_og_title').val().trim());
            formData.append('decsription', $('#manuscript_description').val().trim());
            formData.append('og_decsription', $('#manuscript_og_description').val().trim());
            formData.append('keywords', $('#manuscript_keywords').val().trim());
            // Convert FormData to a JSON string
            var jsonObject = {};
            formData.forEach((value, key) => {
                jsonObject[key] = value;
            });

            console.log(JSON.stringify(jsonObject));
            // return;
            $.ajax({
                url: '{{ route('home.seo.update') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    homeSectionGet();
                    toastr.success('Data Updated Successfully')
                },
                error: function(xhr) {
                    if (xhr.status === 422) { // Laravel validation error
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            toastr.error(messages[0]);
                        });
                    } else {
                        console.error('Error Adding Driver:', xhr);
                        toastr.error('Something went wrong. Please try again.');
                    }
                }
            });

        });


        function posterPresentationGet() {
            var section = $('.posters_section').val(); // Get the value of the section
            $.ajax({
                url: '{{ route('home.seo') }}', // Laravel route
                type: 'GET', // HTTP method
                data: {
                    _token: "{{ csrf_token() }}", // CSRF token
                    section: section // Selected section value
                },
                success: function(response) {
                    // console.log(response);
                    // Populate form fields with the response data
                    $('#posters_title').val(response.title || '');
                    $('#posters_og_title').val(response.og_title || '');
                    $('#posters_description').val(response.description || '');
                    $('#posters_og_description').val(response.og_description || '');
                    $('#posters_keywords').val(response.keywords || '');
                },
                error: function(xhr) {
                    console.error('Error fetching SEO details:', xhr.responseJSON?.message || xhr.statusText);
                    alert('Failed to load SEO details. Please try again.');
                }
            });
        }
        $('.submit-posters-changes').on('click', function() {
            var section = $('.posters_section').val();
            var formData = new FormData();
            formData.append('section', section);
            formData.append('title', $('#posters_title').val().trim());
            formData.append('og_title', $('#posters_og_title').val().trim());
            formData.append('decsription', $('#posters_description').val().trim());
            formData.append('og_decsription', $('#posters_og_description').val().trim());
            formData.append('keywords', $('#posters_keywords').val().trim());
            // Convert FormData to a JSON string
            var jsonObject = {};
            formData.forEach((value, key) => {
                jsonObject[key] = value;
            });

            console.log(JSON.stringify(jsonObject));
            // return;
            $.ajax({
                url: '{{ route('home.seo.update') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    languageEditingGet();
                    toastr.success('Data Updated Successfully')
                },
                error: function(xhr) {
                    if (xhr.status === 422) { // Laravel validation error
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            toastr.error(messages[0]);
                        });
                    } else {
                        console.error('Error Adding Driver:', xhr);
                        toastr.error('Something went wrong. Please try again.');
                    }
                }
            });

        });
        function thesisSupportGet() {
            var section = $('.thesis_section').val(); // Get the value of the section
            $.ajax({
                url: '{{ route('home.seo') }}', // Laravel route
                type: 'GET', // HTTP method
                data: {
                    _token: "{{ csrf_token() }}", // CSRF token
                    section: section // Selected section value
                },
                success: function(response) {
                    // console.log(response);
                    // Populate form fields with the response data
                    $('#thesis_title').val(response.title || '');
                    $('#thesis_og_title').val(response.og_title || '');
                    $('#thesis_description').val(response.description || '');
                    $('#thesis_og_description').val(response.og_description || '');
                    $('#thesis_keywords').val(response.keywords || '');
                },
                error: function(xhr) {
                    console.error('Error fetching SEO details:', xhr.responseJSON?.message || xhr.statusText);
                    alert('Failed to load SEO details. Please try again.');
                }
            });
        }
        $('.submit-thesis-changes').on('click', function() {
            var section = $('.thesis_section').val();
            var formData = new FormData();
            formData.append('section', section);
            formData.append('title', $('#thesis_title').val().trim());
            formData.append('og_title', $('#thesis_og_title').val().trim());
            formData.append('decsription', $('#thesis_description').val().trim());
            formData.append('og_decsription', $('#thesis_og_description').val().trim());
            formData.append('keywords', $('#thesis_keywords').val().trim());
            // Convert FormData to a JSON string
            var jsonObject = {};
            formData.forEach((value, key) => {
                jsonObject[key] = value;
            });

            console.log(JSON.stringify(jsonObject));
            // return;
            $.ajax({
                url: '{{ route('home.seo.update') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    scientificEditingGet();
                    toastr.success('Data Updated Successfully')
                },
                error: function(xhr) {
                    if (xhr.status === 422) { // Laravel validation error
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            toastr.error(messages[0]);
                        });
                    } else {
                        console.error('Error Adding Driver:', xhr);
                        toastr.error('Something went wrong. Please try again.');
                    }
                }
            });

        });

        function assignmentEditingGet() {
            var section = $('.assignment_section').val(); // Get the value of the section
            $.ajax({
                url: '{{ route('home.seo') }}', // Laravel route
                type: 'GET', // HTTP method
                data: {
                    _token: "{{ csrf_token() }}", // CSRF token
                    section: section // Selected section value
                },
                success: function(response) {
                    // console.log(response);
                    // Populate form fields with the response data
                    $('#assignment_title').val(response.title || '');
                    $('#assignment_og_title').val(response.og_title || '');
                    $('#assignment_description').val(response.description || '');
                    $('#assignment_og_description').val(response.og_description || '');
                    $('#assignment_keywords').val(response.keywords || '');
                },
                error: function(xhr) {
                    console.error('Error fetching SEO details:', xhr.responseJSON?.message || xhr.statusText);
                    alert('Failed to load SEO details. Please try again.');
                }
            });
        }
        $('.submit-assignment-changes').on('click', function() {
            var section = $('.assignment_section').val();
            var formData = new FormData();
            formData.append('section', section);
            formData.append('title', $('#assignment_title').val().trim());
            formData.append('og_title', $('#assignment_og_title').val().trim());
            formData.append('decsription', $('#assignment_description').val().trim());
            formData.append('og_decsription', $('#assignment_og_description').val().trim());
            formData.append('keywords', $('#assignment_keywords').val().trim());
            // Convert FormData to a JSON string
            var jsonObject = {};
            formData.forEach((value, key) => {
                jsonObject[key] = value;
            });

            console.log(JSON.stringify(jsonObject));
            // return;
            $.ajax({
                url: '{{ route('home.seo.update') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    scientificEditingGet();
                    toastr.success('Data Updated Successfully')
                },
                error: function(xhr) {
                    if (xhr.status === 422) { // Laravel validation error
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            toastr.error(messages[0]);
                        });
                    } else {
                        console.error('Error Adding Driver:', xhr);
                        toastr.error('Something went wrong. Please try again.');
                    }
                }
            });

        });

        function dataAnalysisGet() {
            var section = $('.dataAnalysis_section').val(); // Get the value of the section
            $.ajax({
                url: '{{ route('home.seo') }}', // Laravel route
                type: 'GET', // HTTP method
                data: {
                    _token: "{{ csrf_token() }}", // CSRF token
                    section: section // Selected section value
                },
                success: function(response) {
                    // console.log(response);
                    // Populate form fields with the response data
                    $('#analysis_title').val(response.title || '');
                    $('#analysis_og_title').val(response.og_title || '');
                    $('#analysis_description').val(response.description || '');
                    $('#analysis_og_description').val(response.og_description || '');
                    $('#analysis_keywords').val(response.keywords || '');
                },
                error: function(xhr) {
                    console.error('Error fetching SEO details:', xhr.responseJSON?.message || xhr.statusText);
                    alert('Failed to load SEO details. Please try again.');
                }
            });
        }
        $('.submit-analysis-changes').on('click', function() {
            var section = $('.dataAnalysis_section').val();
            var formData = new FormData();
            formData.append('section', section);
            formData.append('title', $('#analysis_title').val().trim());
            formData.append('og_title', $('#analysis_og_title').val().trim());
            formData.append('decsription', $('#analysis_description').val().trim());
            formData.append('og_decsription', $('#analysis_og_description').val().trim());
            formData.append('keywords', $('#analysis_keywords').val().trim());
            // Convert FormData to a JSON string
            var jsonObject = {};
            formData.forEach((value, key) => {
                jsonObject[key] = value;
            });

            console.log(JSON.stringify(jsonObject));
            // return;
            $.ajax({
                url: '{{ route('home.seo.update') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    scientificEditingGet();
                    toastr.success('Data Updated Successfully')
                },
                error: function(xhr) {
                    if (xhr.status === 422) { // Laravel validation error
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            toastr.error(messages[0]);
                        });
                    } else {
                        console.error('Error Adding Driver:', xhr);
                        toastr.error('Something went wrong. Please try again.');
                    }
                }
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $('#table_id_1').DataTable();
            $('#table_id_2').DataTable();
            $('#table_id_3').DataTable();
            $('#table_id_4').DataTable();
            $('#table_id_5').DataTable();
            $('#table_id_6').DataTable();
            $('#table_id_7').DataTable();
        });
    </script>
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
