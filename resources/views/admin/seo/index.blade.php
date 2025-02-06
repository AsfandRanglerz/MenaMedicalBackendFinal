@extends('admin.layout.app')
@section('title', 'index')
@section('content')
    <div class="main-content" style="min-height: 562px;">
        <section class="section">
            <div class="card-body d-flex">
                <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link rounded-0 active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-0" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Language Editing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-0" id="spo-tab" data-toggle="tab" href="#spo" role="tab"
                            aria-controls="spo" aria-selected="false">Scientific Editing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-0" id="partime-tab" data-toggle="tab" href="#partime" role="tab"
                            aria-controls="partime" aria-selected="false">Publication Support</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-0" id="UaE-tab" data-toggle="tab" href="#UaE" role="tab"
                            aria-controls="UaE" aria-selected="false">Posters & Presentations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-0" id="Modify_Contract-tab" data-toggle="tab" href="#Modify_Contract" role="tab"
                            aria-controls="Modify_Contract" aria-selected="false">Thesis Support</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-0" id="modification_visa-tab" data-toggle="tab" href="#modification_visa" role="tab"
                            aria-controls="modification_visa" aria-selected="false">Data Analysis</a>
                    </li>
                </ul>
                {{-- owner --}}
                <div class="w-100 tab-content" id="myTabContent">
                    {{-- new visa --}}
                    <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card-body table-striped table-bordered table-responsive">
                            <div class="tab-pane fade active show" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                                <form method="post" action="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-header">
                                        <h4>SEO Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Title</label>
                                                <input type="text" name="title" class="form-control" >
                                                @error('name')
                                                <div class="text-danger">
                                                    Please fill in the  Name
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Title</label>
                                                <input type="text" name="og_title"  class="form-control">
                                                @error('og_title')
                                                <div class="text-danger">
                                                    Please fill in the email
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Description</label>
                                                <textarea name="description" class="form-control" rows="3"></textarea>
                                                @error('description')
                                                <div class="text-danger">
                                                    Please fill in the description
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Description</label>
                                                <textarea name="og_description" class="form-control" rows="3"></textarea>
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
                                                <textarea name="keywords" class="form-control" rows="2"></textarea>
                                                @error('keywords')
                                                <div class="text-danger">
                                                    Please fill in the Keywords
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary submit-changes">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    {{-- renewal --}}
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="card-body table-striped table-bordered table-responsive">
                            <div class="tab-pane fade active show" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                                <form method="post" action="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-header">
                                        <h4>SEO Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Title</label>
                                                <input type="text" name="title" class="form-control" >
                                                @error('name')
                                                <div class="text-danger">
                                                    Please fill in the  Name
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Title</label>
                                                <input type="text" name="og_title"  class="form-control">
                                                @error('og_title')
                                                <div class="text-danger">
                                                    Please fill in the email
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Description</label>
                                                <textarea name="description" class="form-control" rows="3"></textarea>
                                                @error('description')
                                                <div class="text-danger">
                                                    Please fill in the description
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Description</label>
                                                <textarea name="og_description" class="form-control" rows="3"></textarea>
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
                                                <textarea name="keywords" class="form-control" rows="2"></textarea>
                                                @error('keywords')
                                                <div class="text-danger">
                                                    Please fill in the Keywords
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary submit-changes">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- sponsoared by some one --}}
                    <div class="tab-pane fade" id="spo" role="tabpanel" aria-labelledby="spo-tab">
                        <div class="card-body table-striped table-bordered table-responsive">
                            <div class="tab-pane fade active show" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                                <form method="post" action="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-header">
                                        <h4>SEO Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Title</label>
                                                <input type="text" name="title" class="form-control" >
                                                @error('name')
                                                <div class="text-danger">
                                                    Please fill in the  Name
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Title</label>
                                                <input type="text" name="og_title"  class="form-control">
                                                @error('og_title')
                                                <div class="text-danger">
                                                    Please fill in the email
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Description</label>
                                                <textarea name="description" class="form-control" rows="3"></textarea>
                                                @error('description')
                                                <div class="text-danger">
                                                    Please fill in the description
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Description</label>
                                                <textarea name="og_description" class="form-control" rows="3"></textarea>
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
                                                <textarea name="keywords" class="form-control" rows="2"></textarea>
                                                @error('keywords')
                                                <div class="text-danger">
                                                    Please fill in the Keywords
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary submit-changes">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- part time --}}
                    <div class="tab-pane fade" id="partime" role="tabpanel" aria-labelledby="partime-tab">
                        <div class="card-body table-striped table-bordered table-responsive">
                            <div class="tab-pane fade active show" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                                <form method="post" action="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-header">
                                        <h4>SEO Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Title</label>
                                                <input type="text" name="title" class="form-control" >
                                                @error('name')
                                                <div class="text-danger">
                                                    Please fill in the  Name
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Title</label>
                                                <input type="text" name="og_title"  class="form-control">
                                                @error('og_title')
                                                <div class="text-danger">
                                                    Please fill in the email
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Description</label>
                                                <textarea name="description" class="form-control" rows="3"></textarea>
                                                @error('description')
                                                <div class="text-danger">
                                                    Please fill in the description
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Description</label>
                                                <textarea name="og_description" class="form-control" rows="3"></textarea>
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
                                                <textarea name="keywords" class="form-control" rows="2"></textarea>
                                                @error('keywords')
                                                <div class="text-danger">
                                                    Please fill in the Keywords
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary submit-changes">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- uae and gcc --}}
                    <div class="tab-pane fade" id="UaE" role="tabpanel" aria-labelledby="UaE-tab">
                        <div class="card-body table-striped table-bordered table-responsive">
                            <div class="tab-pane fade active show" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                                <form method="post" action="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-header">
                                        <h4>SEO Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Title</label>
                                                <input type="text" name="title" class="form-control" >
                                                @error('name')
                                                <div class="text-danger">
                                                    Please fill in the  Name
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Title</label>
                                                <input type="text" name="og_title"  class="form-control">
                                                @error('og_title')
                                                <div class="text-danger">
                                                    Please fill in the email
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Description</label>
                                                <textarea name="description" class="form-control" rows="3"></textarea>
                                                @error('description')
                                                <div class="text-danger">
                                                    Please fill in the description
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Description</label>
                                                <textarea name="og_description" class="form-control" rows="3"></textarea>
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
                                                <textarea name="keywords" class="form-control" rows="2"></textarea>
                                                @error('keywords')
                                                <div class="text-danger">
                                                    Please fill in the Keywords
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary submit-changes">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- modify contract --}}
                    <div class="tab-pane fade" id="Modify_Contract" role="tabpanel" aria-labelledby="Modify_Contract-tab">
                        <div class="card-body table-striped table-bordered table-responsive">
                            <div class="tab-pane fade active show" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                                <form method="post" action="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-header">
                                        <h4>SEO Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Title</label>
                                                <input type="text" name="title" class="form-control" >
                                                @error('name')
                                                <div class="text-danger">
                                                    Please fill in the  Name
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Title</label>
                                                <input type="text" name="og_title"  class="form-control">
                                                @error('og_title')
                                                <div class="text-danger">
                                                    Please fill in the email
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Description</label>
                                                <textarea name="description" class="form-control" rows="3"></textarea>
                                                @error('description')
                                                <div class="text-danger">
                                                    Please fill in the description
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Description</label>
                                                <textarea name="og_description" class="form-control" rows="3"></textarea>
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
                                                <textarea name="keywords" class="form-control" rows="2"></textarea>
                                                @error('keywords')
                                                <div class="text-danger">
                                                    Please fill in the Keywords
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary submit-changes">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- modification of visa --}}

                    <div class="tab-pane fade" id="modification_visa" role="tabpanel" aria-labelledby="modification_visa-tab">
                        <div class="card-body table-striped table-bordered table-responsive">
                            <div class="tab-pane fade active show" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                                <form method="post" action="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-header">
                                        <h4>SEO Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Title</label>
                                                <input type="text" name="title" class="form-control" >
                                                @error('name')
                                                <div class="text-danger">
                                                    Please fill in the  Name
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Title</label>
                                                <input type="text" name="og_title"  class="form-control">
                                                @error('og_title')
                                                <div class="text-danger">
                                                    Please fill in the email
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Description</label>
                                                <textarea name="description" class="form-control" rows="3"></textarea>
                                                @error('description')
                                                <div class="text-danger">
                                                    Please fill in the description
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Description</label>
                                                <textarea name="og_description" class="form-control" rows="3"></textarea>
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
                                                <textarea name="keywords" class="form-control" rows="2"></textarea>
                                                @error('keywords')
                                                <div class="text-danger">
                                                    Please fill in the Keywords
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary submit-changes">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- modification of emirates --}}

                    <div class="tab-pane fade" id="modification_emirates" role="tabpanel" aria-labelledby="modification_emirates-tab">
                        <div class="card-body table-striped table-bordered table-responsive">
                            <div class="tab-pane fade active show" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                                <form method="post" action="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-header">
                                        <h4>SEO Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Title</label>
                                                <input type="text" name="title" class="form-control" >
                                                @error('name')
                                                <div class="text-danger">
                                                    Please fill in the  Name
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Title</label>
                                                <input type="text" name="og_title"  class="form-control">
                                                @error('og_title')
                                                <div class="text-danger">
                                                    Please fill in the email
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Description</label>
                                                <textarea name="description" class="form-control" rows="3"></textarea>
                                                @error('description')
                                                <div class="text-danger">
                                                    Please fill in the description
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Description</label>
                                                <textarea name="og_description" class="form-control" rows="3"></textarea>
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
                                                <textarea name="keywords" class="form-control" rows="2"></textarea>
                                                @error('keywords')
                                                <div class="text-danger">
                                                    Please fill in the Keywords
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary submit-changes">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- visa cancelation --}}

                    <div class="tab-pane fade" id="visa_cancelation" role="tabpanel" aria-labelledby="visa_cancelation-tab">
                        <div class="card-body table-striped table-bordered table-responsive">
                            <div class="tab-pane fade active show" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                                <form method="post" action="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-header">
                                        <h4>SEO Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Title</label>
                                                <input type="text" name="title" class="form-control" >
                                                @error('name')
                                                <div class="text-danger">
                                                    Please fill in the  Name
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Title</label>
                                                <input type="text" name="og_title"  class="form-control">
                                                @error('og_title')
                                                <div class="text-danger">
                                                    Please fill in the email
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Description</label>
                                                <textarea name="description" class="form-control" rows="3"></textarea>
                                                @error('description')
                                                <div class="text-danger">
                                                    Please fill in the description
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Description</label>
                                                <textarea name="og_description" class="form-control" rows="3"></textarea>
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
                                                <textarea name="keywords" class="form-control" rows="2"></textarea>
                                                @error('keywords')
                                                <div class="text-danger">
                                                    Please fill in the Keywords
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary submit-changes">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- permit cancelation --}}

                    <div class="tab-pane fade" id="permit_cancelation" role="tabpanel" aria-labelledby="permit_cancelation-tab">
                        <div class="card-body table-striped table-bordered table-responsive">
                            <div class="tab-pane fade active show" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                                <form method="post" action="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-header">
                                        <h4>SEO Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Title</label>
                                                <input type="text" name="title" class="form-control" >
                                                @error('name')
                                                <div class="text-danger">
                                                    Please fill in the  Name
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Title</label>
                                                <input type="text" name="og_title"  class="form-control">
                                                @error('og_title')
                                                <div class="text-danger">
                                                    Please fill in the email
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Description</label>
                                                <textarea name="description" class="form-control" rows="3"></textarea>
                                                @error('description')
                                                <div class="text-danger">
                                                    Please fill in the description
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Description</label>
                                                <textarea name="og_description" class="form-control" rows="3"></textarea>
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
                                                <textarea name="keywords" class="form-control" rows="2"></textarea>
                                                @error('keywords')
                                                <div class="text-danger">
                                                    Please fill in the Keywords
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary submit-changes">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- individual visa --}}
                    <div class="tab-pane fade" id="individual" role="tabpanel" aria-labelledby="individual-tab">
                        <div class="card-body table-striped table-bordered table-responsive">
                            <div class="tab-pane fade active show" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                                <form method="post" action="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-header">
                                        <h4>SEO Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Title</label>
                                                <input type="text" name="title" class="form-control" >
                                                @error('name')
                                                <div class="text-danger">
                                                    Please fill in the  Name
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Title</label>
                                                <input type="text" name="og_title"  class="form-control">
                                                @error('og_title')
                                                <div class="text-danger">
                                                    Please fill in the email
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Description</label>
                                                <textarea name="description" class="form-control" rows="3"></textarea>
                                                @error('description')
                                                <div class="text-danger">
                                                    Please fill in the description
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>OG-Description</label>
                                                <textarea name="og_description" class="form-control" rows="3"></textarea>
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
                                                <textarea name="keywords" class="form-control" rows="2"></textarea>
                                                @error('keywords')
                                                <div class="text-danger">
                                                    Please fill in the Keywords
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary submit-changes">Save</button>
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
