@extends('layout.master')

@section('title', 'Poster / PowerPoint Presentation Service')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="container-fluid section-devision">
                <h4 class="primary-heading">Poster / PowerPoint Presentation Service</h4>
                <div class="row mt-4">
                    <div class="col-md-8">
                        <form action="" class="mena-form">
                            <div>
                                <div class="d-flex align-items-center gap-2 px-3 py-3 heading-band">
                                    <img src="{{ asset('public/assets/images/Path 328.png') }}" class="arrow">
                                    <p class="text-white m-0 font-500">STEP 1: Select Price Category</p>
                                </div>
                                <p class="mt-2 font-500">Please selct the required service from the drop-down list and calculate the price</p>
                                <div class="mt-3 overflow-auto">
                                    <div class="advance-table-container">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th colspan="3" class="header">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between px-3 py-2">
                                                            <label for="wordCount" class="font-600" style="width: 40%">Type of Service Required</label>
                                                            <div class="d-flex align-items-center justify-content-end gap-3" style="width: 60%">
                                                                <select id="wordCount" class="py-1" style="width: 40%">
                                                                    <option value="" disabled selected>Select</option>
                                                                    <option value="10">10 Words</option>
                                                                    <option value="20">20 Words</option>
                                                                    <option value="30">30 Words</option>
                                                                  </select>

                                                                <button class="px-3 py-1 theme-btn-green">Calculate Price</button>
                                                            </div>
                                                        </div>

                                                    </th>
                                                </tr>
                                                <tr class="category-header">
                                                    <th class="px-3 py-2 head-one font-600">Select Price Category
                                                    </th>
                                                    <th class="text-white font-600 text-center price-column">Price</th>
                                                    <th class="text-white font-600 text-center delivery-column">Delivery
                                                        Time
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <label>
                                                            <input type="radio" name="word_count">
                                                            Regular Price
                                                        </label>
                                                    </td>
                                                    <td>USD xxx</td>
                                                    <td>XXX days</td>
                                                </tr>
                                                <tr class="head-one">
                                                    <td>
                                                        <label>
                                                            <input type="radio" name="word_count">
                                                            Discounted Price for students and researchers in MENA Region
                                                        </label>
                                                    </td>
                                                    <td>USD xxx</td>
                                                    <td>XXX days</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <p class="m-0 mt-1 font-500 small">*Days shown above are working days</p>
                            </div>
                            <div class="section-devision">
                                <div class="d-flex align-items-center gap-2 px-3 py-3 heading-band">
                                    <img src="{{ asset('public/assets/images/Path 328.png') }}" class="arrow">
                                    <p class="text-white m-0 font-500">STEP 2 – Upload Document</p>
                                </div>
                                <p class="mt-4 font-600 primary-heading">Upload the article / document that you would like our experts to use for developing your poster/ presentation</p>
                                <input type="file" name="" id="uploadFile" class="d-none">
                                <div class="d-flex">
                                    <label for="uploadFile" class="d-flex align-items-center gap-2 mb-3 px-3 py-2 border-0 btn rounded-0 upload-btn theme-btn-green">
                                        <img src="{{ asset('public/assets/images/upload-file-icon.png') }}" class="arrow">
                                        <p class="text-white m-0 btn-small-text font-500">UPLOAD YOUR DOCUMENT FILE</p>
                                    </label>
                                </div>
                                <p class="mt-2 mb-1 font-600 primary-heading">Upload documents for reference (if any)</p>
                                <p>Share figures, tables, posters, slide decks, or other reference files that can be used by our experts. (Maximum size = 10MB)</p>
                                <input type="file" name="" id="additionalFile" class="d-none">
                                <div class="d-flex">
                                    <label for="uploadFile" class="d-flex align-items-center gap-2 px-3 py-2 border-0 btn rounded-0 upload-btn theme-btn-green">
                                        <img src="{{ asset('public/assets/images/plus.png') }}" class="p-1 arrow">
                                        <p class="text-white m-0 btn-small-text font-500">UPLOAD ADDITIONAL DOCUMENTS</p>
                                    </label>
                                </div>
                            </div>
                            <div class="section-devision">
                                <div class="d-flex align-items-center gap-2 px-3 py-3 heading-band">
                                    <img src="{{ asset('public/assets/images/Path 328.png') }}" class="arrow">
                                    <p class="text-white m-0 font-500">STEP 3 – Additional Information</p>
                                </div>
                                <p class="mt-3">Please provide as much additional information and context as possibe. This will help our experts in understanding your requirements better and coming up with the best product.</p>
                                <div class="mt-4">
                                    <p class="font-600">Who would you consider to be your target audience? *</p>
                                    <textarea name="" id="" cols="30" rows="4" class="w-100 light-border"></textarea>
                                </div>
                                <div class="mt-4">
                                    <p class="font-600">Are there any specific points, key takeaways, or concepts from your research article that you would like us to highlight? *</p>
                                    <textarea name="" id="" cols="30" rows="4" class="w-100 light-border"></textarea>
                                </div>
                                <div class="mt-4">
                                    <p class="font-600">Select language style</p>
                                    <div class="overflow-auto">
                                        <div class="advance-table-container remove-border">
                                            <table class="set-width">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                <input type="radio" name="language">
                                                                British English
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                <input type="radio" name="language">
                                                                American English
                                                            </label>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section-devision">
                                <div class="d-flex align-items-center gap-2 px-3 py-3 heading-band">
                                    <img src="{{ asset('public/assets/images/Path 328.png') }}" class="arrow">
                                    <p class="text-white m-0 font-500">STEP 4 – Contact Details</p>
                                </div>
                                <div class="container-width">
                                    <div class="row mt-5">
                                        <div class="col-3">
                                            <div class="w-100 shadow-none dropdown">
                                                <button class="w-100 btn shadow-none bg-white dropdown-toggle border-make"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <p class="mb-0 text-center small-text-btn">Salutation</p>
                                                    <span class="salutation">Dr.</span>
                                                    <input type="hidden" value="" />
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item sal-role">Action</a></li>
                                                    <li><a class="dropdown-item sal-role">Another action</a></li>
                                                    <li><a class="dropdown-item sal-role">Something else here</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="h-100 shadow-none form-control border-make"
                                                placeholder="First name *">
                                        </div>
                                    </div>
                                    <div class="my-4">
                                        <input type="text"
                                            class="shadow-none form-control border-make input-field-info"
                                            placeholder="Last name *">
                                    </div>
                                    <div class="my-4">
                                        <input type="text"
                                            class="shadow-none form-control border-make input-field-info"
                                            placeholder="Primary email *">
                                    </div>
                                    <div class="my-4">
                                        <h6>Which category describes you the best*</h6>
                                        <select name="category" id="contactCategory" class="shadow-none rounded w-100 select-control border-make input-field-info">
                                            <option value="" selected disabled>Select</option>
                                            <option value="undergraduate">Undergraduate Student (in Bachelor Program)</option>
                                            <option value="postgraduate">Postgraduate Student (in Master Program)</option>
                                            <option value="phd">PhD student</option>
                                            <option value="researcher">Researcher by profession</option>
                                            <option value="other">Other</option>
                                        </select>
                                        <input type="text"
                                            id="otherInput"
                                            name="other_category"
                                            class="mt-3 shadow-none form-control border-make input-field-info"
                                            placeholder="Specify other category"
                                            style="display: none;">
                                    </div>
                                    <div class="my-4">
                                        <input type="text"
                                            class="shadow-none form-control border-make input-field-info"
                                            placeholder="Your University / Company Name">
                                    </div>
                                    <div class="my-4">
                                        <select name="" id="countries" class="shadow-none rounded w-100 select-control border-make input-field-info">
                                                <option value="" selected disabled>I am located in *</option>
                                                <option value="">Pakistan</option>
                                                <option value="">America</option>
                                                <option value="">England</option>
                                                <option value="">Germany</option>
                                            </select>
                                    </div>
                                    <div class="my-4">
                                        <input type="text"
                                            class="shadow-none form-control border-make input-field-info"
                                            placeholder="How did you hear about us? *">
                                    </div>
                                </div>
                                <div class="ms-md-4 my-4">
                                    <label class="d-flex gap-2 align-items-center">
                                        <input type="radio">
                                        <p class="mb-0">I would like to receive latest news and announcements from MENA
                                            Medical Research</p>
                                    </label>
                                    <label class="mt-3 d-flex gap-2 align-items-center">
                                        <input type="radio">
 <p class="mb-0">I have read and agree to MENA Medical Research’s <a
                                                href="{{route('privacy-policy')}}" class="text-decoration-none text-blue">Privacy Policy</a>
                                            and <a href="{{route('term-condition')}}" class="text-decoration-none text-blue">Terms of Use</a>
                                        </p>
                                    </label>
                                </div>
                            </div>
                            <input type="submit"
                                class="d-flex align-items-center gap-2 mt-4 text-white m-0 btn-small-text font-500 px-3 py-3 border-0 upload-btn theme-btn-green"
                                value="SUBMIT QUOTATION REQUEST" />
                        </form>
                    </div>
                    <div class="col-md-4 mt-md-0 mt-4">
                        @include('common.components.order_summary')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script></script>
@endsection
