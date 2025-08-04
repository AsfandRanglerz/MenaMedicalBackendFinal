@extends('layout.master')

@section('title', 'Scientific Editing Service')
<style>
    input[type="number"] {
        -moz-appearance: textfield;
        -webkit-appearance: none;
        appearance: none;
    }

    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .error-message {
        font-size: 0.9em;
        color: #dc3545;
        /* Bootstrap danger color */
        margin-top: 5px;
    }
</style>
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="container-fluid section-devision">
                <h4 class="primary-heading">Scientific Editing Service</h4>
                <div class="row mt-4">
                    <div class="col-md-8">
                        <form action="" id="createQuotationForm" enctype="multipart/form-data" class="mena-form">
                            <div>
                                <div class="d-flex align-items-center gap-2 px-3 py-3 heading-band">
                                    <img src="{{ asset('public/assets/images/Path 328.png') }}" class="arrow">
                                    <p class="text-white m-0 font-500">STEP 1: Select the Word Count for Price Estimate and
                                        Delivery
                                        Time</p>
                                </div>
                                <p class="m-0 mt-2 mb-3 info-heading">Please select the appropriate word count category.</p>
                                <div class="overflow-auto">
                                    <!-- Table for big screen -->
                                    <div class="d-none d-sm-block advance-table-container">
                                        <table>
                                            <thead>
                                                {{-- <tr>
                                                    <th colspan="3" class="header">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between px-3 py-2">
                                                            <label for="wordCount" class="font-600">Enter Word
                                                                Count</label>
                                                            <div class="d-flex align-items-center gap-3">

                                                                <input type="number" id="wordCount" class="py-1"
                                                                    name="words">
                                                                <button class="px-3 py-1 theme-btn-green"
                                                                    id="calculatePrice" type="button">Calculate
                                                                    Price</button>
                                                            </div>
                                                        </div>

                                                    </th>
                                                </tr> --}}
                                                <tr class="category-header">
                                                    <th class="px-3 py-2 head-one font-600">Select Price Category
                                                    </th>
                                                    <th class="text-white font-600 text-center price-column">Price</th>
                                                    <th class="text-white font-600 text-center delivery-column">Delivery
                                                        Time
                                                    </th>
                                                </tr>
                                            </thead>
                                            <table>
                                                @foreach ($newPrices as $data)
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                <input type="radio" name="price_cat"
                                                                    value="{{ $data->range }}"
                                                                    data-price="{{ $data->price }}"
                                                                    data-days="{{ $data->delivery_time }}"
                                                                    data-limit="{{ $data->limit }}">

                                                                {{ $data->range }}
                                                            </label>
                                                                <input type="hidden" name="limit" class="limit" value="{{ $data->limit }}">
                                                        </td>
                                                        <td>USD <span class="price_display">{{ $data->price }}</span></td>
                                                        <td><span class="days_display">{{ $data->delivery_time }}</span>
                                                            days</td>
                                                    </tr>
                                                @endforeach
                                                {{-- <tr>
                                                    <td>
                                                        <label>
                                                            <input type="radio" name="price_cat" value="Regular Price">
                                                            Regular Price
                                                        </label>
                                                    </td>
                                                    <td>USD <span id="regular_price">XXX</span></td>
                                                    <td><span id="regular_price_days">XX</span> days</td>
                                                </tr>
                                                <tr class="head-one">
                                                    <td>
                                                        <label>
                                                            <input type="radio" name="price_cat" value="Discounted Price">
                                                            Discounted Price for students and researchers in MENA Region
                                                        </label>
                                                    </td>
                                                    <td>USD <span id="discounted_price">XXX</span></td>
                                                    <td><span id="discounted_price_days">XX</span> days</td>
                                                </tr> --}}
                                            </table>
                                    </div>

                                    <!-- Table for big screen -->
                                    <div class="d-sm-none advance-table-container">
                                        <table>
                                            <thead>
                                                {{-- <tr>
                                                    <th colspan="3" class="header">
                                                        <div
                                                            class="d-flex flex-column align-items-center justify-content-between px-3 py-2">
                                                            <label for="wordCount2" class="font-600">Enter Word
                                                                Count</label>
                                                            <div class="d-flex align-items-center gap-3">

                                                                <input type="number" id="wordCount2" class="py-1"
                                                                    name="words">
                                                                <button class="px-3 py-1 theme-btn-green"
                                                                    id="calculatePrice2" type="button">Calculate
                                                                    Price</button>
                                                            </div>
                                                        </div>

                                                    </th>
                                                </tr> --}}
                                                <tr>
                                                    <th colspan="2" class="px-3 py-2 head-one font-600">Select Price
                                                        Category
                                                    </th>
                                                </tr>
                                                <tr class="category-header">
                                                    <th class="text-white font-600 text-center price-column py-2">Price</th>
                                                    <th class="text-white font-600 text-center delivery-column">Delivery
                                                        Time
                                                    </th>
                                                </tr>
                                            </thead>
                                            <table>
                                                @foreach ($newPrices as $data)
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                <input type="radio" name="price_cat"
                                                                    value="{{ $data->range }}"
                                                                    data-price="{{ $data->price }}"
                                                                    data-days="{{ $data->delivery_time }}"
                                                                    data-limit="{{ $data->limit }}">

                                                                {{ $data->range }}
                                                            </label>
                                                                <input type="hidden" name="limit" class="limit" value="{{ $data->limit }}">
                                                        </td>
                                                        <td>USD <span class="price_display">{{ $data->price }}</span></td>
                                                        <td><span class="days_display">{{ $data->delivery_time }}</span>
                                                            days</td>
                                                    </tr>
                                                @endforeach
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
                                <input type="file" name="file" id="uploadFile" class="d-none">
                                <div class="d-flex align-items-center gap-3">
                                    <label for="uploadFile"
                                        class="d-flex align-items-center gap-2 my-4 px-3 py-2 border-0 btn rounded-0 upload-btn theme-btn-green">
                                        <img src="{{ asset('public/assets/images/upload-file-icon.png') }}" class="arrow">
                                        <p class="text-white m-0 btn-small-text font-500">UPLOAD YOUR DOCUMENT FILE</p>
                                    </label>
                                    <div class="delete-icon">
                                        <button class="btn border-0 p-0 delete-image-btn"><img class="delete-img"
                                                src="{{ asset('public/assets/images/delete.png') }}"
                                                alt=""></button>
                                    </div>
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
                                                                <input type="radio" name="language" class="language"
                                                                    value="British English">
                                                                British English
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                <input type="radio" name="language" class="language"
                                                                    value="American English">
                                                                American English
                                                            </label>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p class="font-600">Add any additional instructions for the editor</p>
                                    <textarea name="additional_instruction" id="additional-instructions" cols="30" rows="4"
                                        class="container-width light-border"></textarea>
                                </div>
                            </div>
                            <div class="section-devision">
                                <div class="d-flex align-items-center gap-2 px-3 py-3 heading-band">
                                    <img src="{{ asset('public/assets/images/Path 328.png') }}" class="arrow">
                                    <p class="text-white m-0 font-500">STEP 3 – Contact Details</p>
                                </div>
                                <div class="container-width">
                                    <div class="row mt-5">
                                        <div class="col-3">
                                            <div class="w-100 shadow-none dropdown">
                                                <button class="w-100 btn shadow-none bg-white dropdown-toggle border-make"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <p class="mb-0 text-center small-text-btn">Salutation</p>
                                                    <span class="salutation">Dr.</span>
                                                    <input type="hidden" value="" name="salutation" />
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item sal-role">Dr.</a></li>
                                                    <li><a class="dropdown-item sal-role">Mr.</a></li>
                                                    <li><a class="dropdown-item sal-role">Ms.</a></li>
                                                    <li><a class="dropdown-item sal-role">Mrs.</a></li>
                                                    <li><a class="dropdown-item sal-role">Prof.</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="h-100 shadow-none form-control border-make"
                                                placeholder="First name *" name="first_name">
                                        </div>
                                    </div>
                                    <div class="my-4">
                                        <input type="text"
                                            class="shadow-none form-control border-make input-field-info"
                                            placeholder="Last name *" name="last_name">
                                    </div>
                                    <div class="my-4">
                                        <input type="text"
                                            class="shadow-none form-control border-make input-field-info"
                                            placeholder="Primary email *" name="email">
                                    </div>
                                    <div class="my-4">
                                        <h6>Which category describes you the best*</h6>
                                        <select name="program_category" id="contactCategory"
                                            class="shadow-none rounded w-100 select-control border-make input-field-info">
                                            <option value="" selected disabled>Select</option>
                                            <option value="Undergraduate Student (in Bachelor Program)">Undergraduate
                                                Student (in Bachelor Program)
                                            </option>
                                            <option value="Postgraduate Student (in Master Program)">Postgraduate Student
                                                (in Master Program)</option>
                                            <option value="PhD student">PhD student</option>
                                            <option value="Researcher by profession">Researcher by profession</option>
                                            <option value="other">Other</option>
                                        </select>
                                        <input type="text" id="otherInput" name="other_category"
                                            class="mt-3 shadow-none form-control border-make input-field-info"
                                            placeholder="Specify other category" style="display: none;">
                                    </div>
                                    <div class="my-4">
                                        <input type="text"
                                            class="shadow-none form-control border-make input-field-info"
                                            placeholder="Your University / Company Name" name="institute_name">
                                    </div>
                                    <div class="my-4">
                                        <select name="location" id="countries"
                                            class="shadow-none rounded w-100 select-control border-make input-field-info"
                                            onchange="handleOtherOption(this)">
                                            <option value="" selected disabled>I am located in *</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="Brunei">Brunei</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cabo Verde">Cabo Verde</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Republic of the Congo">Republic of the Congo</option>
                                            <option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Eswatini">Eswatini</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran">Iran</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Laos">Laos</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libya">Libya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Micronesia">Micronesia</option>
                                            <option value="Moldova">Moldova</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montenegro">Montenegro</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar (Burma)">Myanmar (Burma)</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="North Korea">North Korea</option>
                                            <option value="North Macedonia">North Macedonia</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau">Palau</option>
                                            <option value="Palestinian Territories">Palestinian Territories</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russia">Russia</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                            <option value="Saint Lucia">Saint Lucia</option>
                                            <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Serbia">Serbia</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="South Korea">South Korea</option>
                                            <option value="South Sudan">South Sudan</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syria">Syria</option>
                                            <option value="Taiwan">Taiwan</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania">Tanzania</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Timor-Leste">Timor-Leste</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Vatican City">Vatican City</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Vietnam">Vietnam</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>

                                            <option value="Other">Other</option>
                                        </select>

                                        <!-- Hidden Input Field -->
                                        <div id="otherLocationContainer" style="display: none; margin-top: 10px;">
                                            <input type="text" id="otherLocationInput" name="other_location"
                                                class="shadow-none rounded w-100 select-control border-make input-field-info"
                                                placeholder="Please specify your location" />
                                        </div>

                                    </div>
                                    <div class="my-4">
                                        <input type="text"
                                            class="shadow-none form-control border-make input-field-info"
                                            placeholder="How did you hear about us? *" name="question">
                                    </div>
                                </div>
                                <div class="ms-md-4 my-4">
                                    <label class="d-flex gap-2 align-items-center">
                                        <input type="checkbox" name="news_check" checked>
                                        <p class="mb-0">I would like to receive latest news and announcements from MENA
                                            Medical Research</p>
                                    </label>
                                    <label class="mt-3 d-flex gap-2 align-items-center">
                                        <input type="radio" name="agree_check" required value="yes">
                                        <p class="mb-0">I have read and agree to MENA Medical Research’s <a
                                                href="{{ route('privacy-policy') }}"
                                                class="text-decoration-none text-blue">Privacy Policy</a>
                                            and <a href="{{ route('term-condition') }}"
                                                class="text-decoration-none text-blue">Terms of Use</a>
                                        </p>
                                    </label>
                                </div>
                            </div>
                            <div id="agreeCheck" class="alert alert-danger alert-dismissible fade show"
                            role="alert" style="display: none;">
                            <strong>Warning!</strong> You must agree to the terms and privacy policy.
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                        <div id="successMessage" class="alert alert-success alert-dismissible fade show" role="alert"
                            style="display: none;">
                            <strong>Success!</strong> Your order has been successfully submitted, and a confirmation
                            email has been sent to your email address.
                            The order will be reviewed by MENA Medical Research, and a final quotation will be emailed
                            to you within 24 hours.
                            In case you do not hear from us within 24 hours, please send an email to
                            <span class="text-info">info@menamedicalresearch.com</span>.
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>


                            <div style="position: absolute; left: -10000px; top: -10000px; height: 1px; width: 1px; overflow: hidden;">
                                <label for="contact_time">Best time to contact you</label>
                                <input type="text" name="contact_time" id="contact_time" autocomplete="off">
                            </div>

                            <!-- reCAPTCHA widget -->
                            <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                            <input type="button" id="submit-quotation"
                                class="d-flex align-items-center gap-2 mt-4 text-white m-0 btn-small-text font-500 px-3 py-3 border-0 upload-btn theme-btn-green"
                                value="SUBMIT REQUEST" />
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
    <script>
        function handleOtherOption(selectElement) {
            const otherLocationContainer = document.getElementById('otherLocationContainer');
            if (selectElement.value === 'Other') {
                // Show input field when "Other" is selected
                otherLocationContainer.style.display = 'block';
            } else {
                // Hide input field for other selections
                otherLocationContainer.style.display = 'none';
            }
        }
        $(document).ready(function() {
            $("input[name='price_cat']").change(function() {
                var selectedPriceCategory = $("input[name='price_cat']:checked")
                    .val(); // Get the value of the selected radio button
                console.log("Selected Price Category:", selectedPriceCategory); // Optional: For debugging
                // let price = 0;
                // let days = 0;
                // if (selectedPriceCategory === "Regular Price") {
                //     price = parseFloat($('#regular_price').text()) || 0;
                //     days = parseInt($('#regular_price_days').text()) || 0;
                // } else if (selectedPriceCategory === "Discounted Price") {
                //     price = parseFloat($('#discounted_price').text()) || 0;
                //     days = parseInt($('#discounted_price_days').text()) || 0;
                // }
                // if (price === 0 || days === 0) {
                //     toastr.error('Please Enter Approximate Word Count to Calculate Price');
                //     $("input[name='price_cat']").prop('checked', false);
                //     return;
                // } else {
                //     console.log(`Price: ${price}, Days: ${days}`);
                // }
                const price = parseFloat($(this).data('price')) || 0;
                const days = parseInt($(this).data('days')) || 0;
                $('#service_name').text('Scientific Editing - ' +
                    selectedPriceCategory); // Concatenate package name and text
                $('#service_price').text(price); // Set the price
                $('#estimate-price').text(parseFloat($('#additional_service_price').text() || 0) + price);
                return;
            });
        });
        //calculate price base of words
        $(document).on('click', '#calculatePrice, #calculatePrice2', function() {
            let priceCat = $('input[name="price_cat"]:checked').val();
            let words = $('#wordCount').val() || $('#wordCount2').val();
            if (!words) {
                toastr.error("Please Enter Approximate Word Count to Calculate Price");
                return;
            }
            var formData = new FormData();
            formData.append('words', words);
            formData.append('service_name', 'Scientific Editing');
            console.log(JSON.stringify(Object.fromEntries(formData.entries())));
            // Send AJAX request
            $.ajax({
                url: '{{ route('calculatePrice') }}',
                method: 'POST',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    if (response.status === "success" && response.results) {
                        response.results.forEach(function(item) {
                            if (item.price_category === "Regular Price") {
                                document.getElementById('regular_price').textContent =
                                    parseFloat(item.price);
                                document.getElementById('regular_price_days').textContent = item
                                    .days;
                                document.getElementById('regular_price2').textContent =
                                    parseFloat(item.price);
                                document.getElementById('regular_price_days2').textContent = item
                                    .days;
                            } else if (item.price_category === "Discounted Price") {
                                document.getElementById('discounted_price').textContent =
                                    parseFloat(item.price);
                                document.getElementById('discounted_price_days').textContent =
                                    item.days;
                                document.getElementById('discounted_price2').textContent =
                                    parseFloat(item.price);
                                document.getElementById('discounted_price_days2').textContent =
                                    item.days;
                            }
                        });
                    } else {
                        console.error("Unexpected response structure:", response);
                    }
                },
                error: function(error) {

                    console.error('Error:', error);

                }
            });
        });
        //store quotation request
        $('#submit-quotation, .submit-quotation').on('click', function() {
             let recaptchaResponse = grecaptcha.getResponse();
                if (!recaptchaResponse) {
                    toastr.error("Please complete the reCAPTCHA");
                    return;
                }

                let priceCat = $('input[name="price_cat"]:checked').val();
                if (!priceCat) {
                    toastr.error("Please Select Price Category");
                    return;
                }
                var button = $(this);
                var originalText = button.val();
                button.val('Submitting...').prop('disabled', true);
                var formData = new FormData();
                // formData.append('words', ($('#createQuotationForm input[name="words"]').val()).trim());
            formData.append('g-recaptcha-response', recaptchaResponse);
            formData.append('price_category', ($('input[name="price_cat"]:checked').val()).trim());
            formData.append('contact_time', ($('#createQuotationForm input[name="contact_time"]').val() || '').trim());
            formData.append('limit', $('input[name="price_cat"]:checked').data('limit'));
            formData.append('service_name', 'Scientific Editing');
            formData.append('language', ($('#createQuotationForm input[name="language"]:checked').val() || '')
                .trim());
            formData.append('additional_instruction', ($(
                '#createQuotationForm textarea[name="additional_instruction"]').val() || '').trim());
            formData.append('salutation', ($('#createQuotationForm input[name="salutation"]').val() || '').trim());
            formData.append('first_name', ($('#createQuotationForm input[name="first_name"]').val() || '').trim());
            formData.append('last_name', ($('#createQuotationForm input[name="last_name"]').val() || '').trim());
            formData.append('email', ($('#createQuotationForm input[name="email"]').val() || '').trim());
            formData.append('institute_name', ($('#createQuotationForm input[name="institute_name"]').val() || '')
                .trim());
            formData.append('program_category', ($('#createQuotationForm select[name="program_category"]').val() ||
                '').trim());
            formData.append('other_category', ($('#createQuotationForm input[name="other_category"]').val() || '')
                .trim());
            formData.append('location', ($('#createQuotationForm select[name="location"]').val() || '').trim());
            formData.append('other_location', ($('#otherLocationInput').val() || '').trim());
            formData.append('question', ($('#createQuotationForm input[name="question"]').val() || '').trim());
            formData.append('news_check', $('#createQuotationForm input[name="news_check"]').is(':checked') ? '1' :
                '0');
            formData.append('agree_check', ($('#createQuotationForm input[name="agree_check"]').val()).trim());
            var priceText = $('#estimate-price').text();
            var priceValue = parseFloat(priceText.replace('$', '').trim());
            formData.append('total_price', priceValue);
            formData.append('advance_editing', ($('#advance-editing').val() || '').trim());
            formData.append('plagirism_value', ($('#plagirism-value').val() || '').trim());
            const agreeCheck = document.querySelector('input[name="agree_check"]:checked');
            if (!agreeCheck) {
                event.preventDefault();
                $('#agreeCheck').fadeIn();
                button.val(originalText).prop('disabled', false);
                return;
            }
            let fileInput = $('input[name="file"]');
            const imageFile = fileInput[0].files[0];
            if (imageFile) {
                formData.append('file', imageFile);
            } else {
                formData.append('file', '');
            }
            console.log(JSON.stringify(Object.fromEntries(formData.entries())));
            // return;
            // Send AJAX request
            $.ajax({
                url: '{{ route('submitQuotationRequest') }}', // Replace with your server endpoint
                method: 'POST',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#successMessage').fadeIn();
                    toastr.success('Your Order has been Submitted Successfully');
                    $('#createQuotationForm')[0].reset();
                    $('#createQuotationForm input[type="text"], #createQuotationForm textarea').val('');
                    $('#createQuotationForm select').prop('selectedIndex', 0);
                    $('#createQuotationForm input[type="radio"]').prop('checked', false);
                    $('#createQuotationForm input[type="checkbox"]').prop('checked', false);
                    $('#createQuotationForm input[type="file"]').val('');
                    $('#service_name').text('');
                    $('#service_price').text('');
                    $('#plagirism-value').text('');
                    $('#estimate-price').text('0');
                    $('.additional_service').text('');
                    $('.additional_service_price').text('');
                    $('#regular_price').text('xxx');
                    $('#regular_price_days').text('XX');
                    $('#discounted_price').text('xxx');
                    $('#discounted_price_days').text('XX');
                    $('#regular_price2').text('xxx');
                    $('#regular_price_days2').text('XX');
                    $('#discounted_price2').text('xxx');
                    $('#discounted_price_days2').text('XX');
                    // setTimeout(function() {
                    //     location.reload();
                    // }, 2000);
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        // Clear any existing error messages
                        $('.error-message').remove();

                        // Loop through the errors and display them under the respective input fields
                        $.each(errors, function(field, messages) {
                            var inputField = $('[name="' + field + '"]');
                            if (inputField.length) {
                                inputField.after(
                                    '<span class="error-message text-danger small">' +
                                    messages[0] + '</span>');
                            }
                        });
                    } else {
                        console.error('Error Adding Driver:', xhr);
                        toastr.error('Something went wrong. Please try again.');
                    }
                },
                complete: function() {
                    button.val(originalText).prop('disabled', false);
                    grecaptcha.reset();
                }
            });
        });

        $('input, select').on('input change', function() {
            $(this).next('.error-message').remove();
        });

        function jumpToError() {
            // Find the first error message
            var firstError = $('.error-message').filter(':visible').first()

            if (firstError.length) {
                // Scroll to the first error message
                $('html, body').animate({
                    scrollTop: firstError.offset().top - 150 // Adjust offset as needed
                }, 1000); // Animation duration in milliseconds
            }
        }

        // Call the function with a delay of 1000ms (1 second) on button click
        $('#submit-quotation, .submit-quotation').on('click', function() {
            jumpToError();
            setTimeout(function() {}, 100); // Delay of 1000 milliseconds
        });
    </script>
@endsection
