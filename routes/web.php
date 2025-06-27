<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\NavBarController;
use App\Http\Controllers\Admin\JournalController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SecurityController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\QuotationRequestController;
use App\Http\Controllers\Admin\FooterContentController;
use App\Http\Controllers\Admin\PlaceOrderOneController;
use App\Http\Controllers\Admin\PlaceOrderTwoController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\HomeSectionOneController;
use App\Http\Controllers\Admin\HomeSectionSixController;
use App\Http\Controllers\Admin\HomeSectionTwoController;
use App\Http\Controllers\Admin\PlaceOrderFourController;
use App\Http\Controllers\Admin\AdditionalPriceController;
use App\Http\Controllers\Admin\HomeSectionFiveController;
use App\Http\Controllers\Admin\HomeSectionFourController;
use App\Http\Controllers\Admin\PlaceOrderThreeController;
use App\Http\Controllers\Admin\SetServicePriceController;
use App\Http\Controllers\Pricing\PricingController;
use App\Http\Controllers\Admin\HeaderContentOneController;
use App\Http\Controllers\Admin\HeaderContentTwoController;
use App\Http\Controllers\Admin\HomeSectionThreeController;
use App\Http\Controllers\Admin\TermsAndConditionController;
use App\Http\Controllers\Admin\LanguageEditingOneController;
use App\Http\Controllers\Admin\LanguageEditingTwoController;
use App\Http\Controllers\Admin\LanguageEditingFourController;
use App\Http\Controllers\Admin\LanguageEditingThreeController;
use App\Http\Controllers\Admin\ScientificEditingOneController;
use App\Http\Controllers\Admin\ScientificEditingTwoController;
use App\Http\Controllers\Admin\DataAnalysisServiceOneController;
use App\Http\Controllers\Admin\DataAnalysisServiceTwoController;
use App\Http\Controllers\Admin\PostandPresentationOneController;
use App\Http\Controllers\Admin\PostandPresentationTwoController;
use App\Http\Controllers\Admin\ScientificEditingThreeController;
use App\Http\Controllers\Admin\AccidentalPlagiarismOneController;
use App\Http\Controllers\Admin\ManuscriptFormattingOneController;
use App\Http\Controllers\Admin\ManuscriptFormattingTwoController;
use App\Http\Controllers\Admin\PostandPresentationFourController;
use App\Http\Controllers\Admin\ThesisEditingServiceOneController;
use App\Http\Controllers\Admin\ThesisEditingServiceTwoController;
use App\Http\Controllers\Admin\DataAnalysisServiceThreeController;
use App\Http\Controllers\Admin\PostandPresentationThreeController;
use App\Http\Controllers\Admin\ManuscriptFormattingThreeController;
use App\Http\Controllers\Admin\ThesisEditingServiceThreeController;
use App\Http\Controllers\Admin\AssignmentEditingServiceOneController;
use App\Http\Controllers\Admin\SeoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*Admin routes
 * */
Route::get('/config_cache', function () {
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('optimize:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    return 'Configuration cache cleared!';
});

Route::get('/admin-login', [AuthController::class, 'getLoginPage']);
Route::post('/login', [AuthController::class, 'Login']);
Route::get('/admin-forgot-password', [AdminController::class, 'forgetPassword']);
Route::post('/admin-reset-password-link', [AdminController::class, 'adminResetPasswordLink']);
Route::get('/change_password/{id}', [AdminController::class, 'change_password']);
Route::post('/admin-reset-password', [AdminController::class, 'ResetPassword']);

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'getdashboard']);
    Route::get('my-profile', [AdminController::class, 'getProfile']);
    Route::post('update-profile', [AdminController::class, 'update_profile']);
    Route::get('Privacy-policy', [SecurityController::class, 'PrivacyPolicy']);
    Route::get('privacy-policy-edit', [SecurityController::class, 'PrivacyPolicyEdit']);
    Route::post('privacy-policy-update', [SecurityController::class, 'PrivacyPolicyUpdate']);
    Route::get('term-condition', [SecurityController::class, 'TermCondition']);
    Route::get('term-condition-edit', [SecurityController::class, 'TermConditionEdit']);
    Route::post('term-condition-update', [SecurityController::class, 'TermConditionUpdate']);
    Route::get('logout', [AdminController::class, 'logout']);

    //Quotation requests
    Route::get('Quotation-Requests/count', [QuotationRequestController::class, 'quotationRequestCounter'])->name('quotationRequests.count');
    Route::get('Quotation-Requests/index', [QuotationRequestController::class, 'index'])->name('quotationRequests.index');
    Route::get('Quotation-Requests/files/{id},{service}', [QuotationRequestController::class, 'files'])->name('quotationRequests.files');
    Route::get('Quotation-Requests/additionalService/{id}', [QuotationRequestController::class, 'additionalServices'])->name('quotationRequests.aditionalServices');
    Route::get('Quotation-Requests/additionalInformation/{id}', [QuotationRequestController::class, 'additionalInformation'])->name('quotationRequests.additionalInformation');
    Route::get('Quotation-Requests/filesDownload/{id}', [QuotationRequestController::class, 'filesDownload'])->name('files.download');
    Route::get('Approved-Requests/index', [QuotationRequestController::class, 'approvedRequests'])->name('quotationRequests.approved');
    Route::get('Rejected-Requests/index', [QuotationRequestController::class, 'RejectedRequests'])->name('quotationRequests.rejected');
    Route::delete('Rejected-Requests/delete/{id}', [QuotationRequestController::class, 'delete'])->name('quotationRequests.delete');
    Route::delete('Rejected-Requests/deleteAll/', [QuotationRequestController::class, 'deleteAll'])->name('quotationAll.delete');
    Route::post('Quotation-Requests/status/{id}', [QuotationRequestController::class, 'status'])->name('quotationRequests.status');


    //Header Content One
    Route::get('/headerContentOne', [HeaderContentOneController::class, 'index'])->name('headerContentOne');
    Route::get('/headerContentOneCreate', [HeaderContentOneController::class, 'create'])->name('headerContentOneCreate');
    Route::post('/headerContentOneStore', [HeaderContentOneController::class, 'store'])->name('headerContentOneStore');
    Route::get('/headerContentOneEdit/{id}', [HeaderContentOneController::class, 'edit'])->name('headerContentOneEdit');
    Route::post('/headerContentOneUpdate/{id}', [HeaderContentOneController::class, 'update'])->name('headerContentOneUpdate');
    Route::delete('/headerContentOneDestroy/{id}', [HeaderContentOneController::class, 'destroy'])->name('headerContentOneDestroy');

    //Header Content Two
    Route::get('/headerContentTwo', [HeaderContentTwoController::class, 'index'])->name('headerContentTwo');
    Route::get('/headerContentTwoCreate', [HeaderContentTwoController::class, 'create'])->name('headerContentTwoCreate');
    Route::post('/headerContentTwoStore', [HeaderContentTwoController::class, 'store'])->name('headerContentTwoStore');
    Route::get('/headerContentTwoEdit/{id}', [HeaderContentTwoController::class, 'edit'])->name('headerContentTwoEdit');
    Route::post('/headerContentTwoUpdate/{id}', [HeaderContentTwoController::class, 'update'])->name('headerContentTwoUpdate');
    Route::delete('/headerContentTwoDestroy/{id}', [HeaderContentTwoController::class, 'destroy'])->name('headerContentTwoDestroy');

    //Header Logo
    Route::get('/logo', [LogoController::class, 'index'])->name('logo');
    Route::get('/logoCreate', [LogoController::class, 'create'])->name('logoCreate');
    Route::post('/logoStore', [LogoController::class, 'store'])->name('logoStore');
    Route::get('/logoEdit/{id}', [LogoController::class, 'edit'])->name('logoEdit');
    Route::post('/logoUpdate/{id}', [LogoController::class, 'update'])->name('logoUpdate');
    Route::delete('/logoDestroy/{id}', [LogoController::class, 'destroy'])->name('logoDestroy');

    //Footer Service
    Route::get('/service', [ServiceController::class, 'index'])->name('service');
    Route::get('/serviceCreate', [ServiceController::class, 'create'])->name('serviceCreate');
    Route::post('/serviceStore', [ServiceController::class, 'store'])->name('serviceStore');
    Route::get('/serviceEdit/{id}', [ServiceController::class, 'edit'])->name('serviceEdit');
    Route::post('/serviceUpdate/{id}', [ServiceController::class, 'update'])->name('serviceUpdate');
    Route::delete('/serviceDestroy/{id}', [ServiceController::class, 'destroy'])->name('serviceDestroy');

    //Footer Journal
    Route::get('/journal', [JournalController::class, 'index'])->name('journal');
    Route::get('/journalCreate', [JournalController::class, 'create'])->name('journalCreate');
    Route::post('/journalStore', [JournalController::class, 'store'])->name('journalStore');
    Route::get('/journalEdit/{id}', [JournalController::class, 'edit'])->name('journalEdit');
    Route::post('/journalUpdate/{id}', [JournalController::class, 'update'])->name('journalUpdate');
    Route::delete('/journalDestroy/{id}', [JournalController::class, 'destroy'])->name('journalDestroy');

     //Footer Content
    Route::get('/footerContentOne', [FooterContentController::class, 'index'])->name('footerContentOne');
    Route::get('/footerContentOneCreate', [FooterContentController::class, 'create'])->name('footerContentOneCreate');
    Route::post('/footerContentOneStore', [FooterContentController::class, 'store'])->name('footerContentOneStore');
    Route::get('/footerContentOneEdit/{id}', [FooterContentController::class, 'edit'])->name('footerContentOneEdit');
    Route::post('/footerContentOneUpdate/{id}', [FooterContentController::class, 'update'])->name('footerContentOneUpdate');
    Route::delete('/footerContentOneDestroy/{id}', [FooterContentController::class, 'destroy'])->name('footerContentOneDestroy');

    //Footer News
    Route::get('/news', [NewsController::class, 'index'])->name('news');
    Route::get('/newsCreate', [NewsController::class, 'create'])->name('newsCreate');
    Route::post('/newsStore', [NewsController::class, 'store'])->name('newsStore');
    Route::get('/newsEdit/{id}', [NewsController::class, 'edit'])->name('newsEdit');
    Route::post('/newsUpdate/{id}', [NewsController::class, 'update'])->name('newsUpdate');
    Route::delete('/newsDestroy/{id}', [NewsController::class, 'destroy'])->name('newsDestroy');

    //Footer Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profileCreate', [ProfileController::class, 'create'])->name('profileCreate');
    Route::post('/profileStore', [ProfileController::class, 'store'])->name('profileStore');
    Route::get('/profileEdit/{id}', [ProfileController::class, 'edit'])->name('profileEdit');
    Route::post('/profileUpdate/{id}', [ProfileController::class, 'update'])->name('profileUpdate');
    Route::delete('/profileDestroy/{id}', [ProfileController::class, 'destroy'])->name('profileDestroy');

    Route::get('/socialLink', [SocialLinkController::class, 'index'])->name('socialLink');
    Route::get('/socialLinkCreate', [SocialLinkController::class, 'create'])->name('socialLinkCreate');
    Route::post('/socialLinkStore', [SocialLinkController::class, 'store'])->name('socialLinkStore');
    Route::get('/socialLinkEdit/{id}', [SocialLinkController::class, 'edit'])->name('socialLinkEdit');
    Route::post('/socialLinkUpdate/{id}', [SocialLinkController::class, 'update'])->name('socialLinkUpdate');
    Route::delete('/socialLinkDestroy/{id}', [SocialLinkController::class, 'destroy'])->name('socialLinkDestroy');

    Route::get('/navBar', [NavBarController::class, 'index'])->name('navBar');
    Route::get('/navBar/Create', [NavBarController::class, 'create'])->name('navBarCreate');
    Route::post('/navBar/Store', [NavBarController::class, 'store'])->name('navBarStore');
    Route::get('/navBar/Edit/{id}', [NavBarController::class, 'edit'])->name('navBarEdit');
    Route::post('/navBar/Update/{id}', [NavBarController::class, 'update'])->name('navBarUpdate');
    Route::delete('/navBar/Destroy/{id}', [NavBarController::class, 'destroy'])->name('navBarDestroy');

    Route::get('/navBar/DropDownItem/{id}', [NavBarController::class, 'dropDownItems'])->name('navBarDropDownItem');
    Route::get('/navBar/editDropDownItem/{id}', [NavBarController::class, 'editdropDownItem'])->name('editNavBarDropDownItem');
    Route::post('/navBar/updateDropDownItem/{id}', [NavBarController::class, 'updateDropDownItem'])->name('updateNavBarDropDownItem');
    Route::delete('/navBar/delete/DropDownItem/{id}', [NavBarController::class, 'destroyDropdownItem'])->name('deleteNavBarDropDownItem');

    Route::get('/HomeSectionOne', [HomeSectionOneController::class, 'index'])->name('HomeSectionOne');
    Route::get('/HomeSectionOneCreate', [HomeSectionOneController::class, 'create'])->name('HomeSectionOneCreate');
    Route::post('/HomeSectionOneStore', [HomeSectionOneController::class, 'store'])->name('HomeSectionOneStore');
    Route::get('/HomeSectionOneEdit/{id}', [HomeSectionOneController::class, 'edit'])->name('HomeSectionOneEdit');
    Route::post('/HomeSectionOneUpdate/{id}', [HomeSectionOneController::class, 'update'])->name('HomeSectionOneUpdate');
    Route::delete('/HomeSectionOneDestroy/{id}', [HomeSectionOneController::class, 'destroy'])->name('HomeSectionOneDestroy');

    Route::get('/HomeSectionTwo', [HomeSectionTwoController::class, 'index'])->name('HomeSectionTwo');
    Route::get('/HomeSectionTwoCreate', [HomeSectionTwoController::class, 'create'])->name('HomeSectionTwoCreate');
    Route::post('/HomeSectionTwoStore', [HomeSectionTwoController::class, 'store'])->name('HomeSectionTwoStore');
    Route::get('/HomeSectionTwoEdit/{id}', [HomeSectionTwoController::class, 'edit'])->name('HomeSectionTwoEdit');
    Route::post('/HomeSectionTwoUpdate/{id}', [HomeSectionTwoController::class, 'update'])->name('HomeSectionTwoUpdate');
    Route::delete('/HomeSectionTwoDestroy/{id}', [HomeSectionTwoController::class, 'destroy'])->name('HomeSectionTwoDestroy');

    Route::get('/Services', [HomeSectionTwoController::class, 'services'])->name('Services');
    Route::get('/ServicesEdit/{id}', [HomeSectionTwoController::class, 'servicesedit'])->name('ServicesEdit');
    Route::post('/ServicesUpdate/{id}', [HomeSectionTwoController::class, 'servicesupdate'])->name('ServicesUpdate');

    Route::get('/HomeSectionThree', [HomeSectionThreeController::class, 'index'])->name('HomeSectionThree');
    Route::get('/HomeSectionThreeCreate', [HomeSectionThreeController::class, 'create'])->name('HomeSectionThreeCreate');
    Route::post('/HomeSectionThreeStore', [HomeSectionThreeController::class, 'store'])->name('HomeSectionThreeStore');
    Route::get('/HomeSectionThreeEdit/{id}', [HomeSectionThreeController::class, 'edit'])->name('HomeSectionThreeEdit');
    Route::post('/HomeSectionThreeUpdate/{id}', [HomeSectionThreeController::class, 'update'])->name('HomeSectionThreeUpdate');
    Route::delete('/HomeSectionThreeDestroy/{id}', [HomeSectionThreeController::class, 'destroy'])->name('HomeSectionThreeDestroy');

    Route::get('/HomeSectionFour', [HomeSectionFourController::class, 'index'])->name('HomeSectionFour');
    Route::get('/HomeSectionFourCreate', [HomeSectionFourController::class, 'create'])->name('HomeSectionFourCreate');
    Route::post('/HomeSectionFourStore', [HomeSectionFourController::class, 'store'])->name('HomeSectionFourStore');
    Route::get('/HomeSectionFourEdit/{id}', [HomeSectionFourController::class, 'edit'])->name('HomeSectionFourEdit');
    Route::post('/HomeSectionFourUpdate/{id}', [HomeSectionFourController::class, 'update'])->name('HomeSectionFourUpdate');
    Route::delete('/HomeSectionFourDestroy/{id}', [HomeSectionFourController::class, 'destroy'])->name('HomeSectionFourDestroy');

    Route::get('/Works', [HomeSectionFourController::class, 'works'])->name('Works');
    Route::get('/WorksEdit/{id}', [HomeSectionFourController::class, 'worksedit'])->name('WorksEdit');
    Route::post('/WorksUpdate/{id}', [HomeSectionFourController::class, 'worksupdate'])->name('WorksUpdate');


    Route::get('/HomeSectionFive', [HomeSectionFiveController::class, 'index'])->name('HomeSectionFive');
    Route::get('/HomeSectionFiveCreate', [HomeSectionFiveController::class, 'create'])->name('HomeSectionFiveCreate');
    Route::post('/HomeSectionFiveStore', [HomeSectionFiveController::class, 'store'])->name('HomeSectionFiveStore');
    Route::get('/HomeSectionFiveEdit/{id}', [HomeSectionFiveController::class, 'edit'])->name('HomeSectionFiveEdit');
    Route::post('/HomeSectionFiveUpdate/{id}', [HomeSectionFiveController::class, 'update'])->name('HomeSectionFiveUpdate');
    Route::delete('/HomeSectionFiveDestroy/{id}', [HomeSectionFiveController::class, 'destroy'])->name('HomeSectionFiveDestroy');

    Route::get('/main-title', [HomeSectionFiveController::class, 'maintitle'])->name('main-title');
    Route::get('/main-titleEdit/{id}', [HomeSectionFiveController::class, 'maintitleedit'])->name('main-titleEdit');
    Route::post('/main-titleUpdate/{id}', [HomeSectionFiveController::class, 'maintitleupdate'])->name('main-titleUpdate');

    Route::get('/HomeSectionSix', [HomeSectionSixController::class, 'index'])->name('HomeSectionSix');
    Route::get('/HomeSectionSixCreate', [HomeSectionSixController::class, 'create'])->name('HomeSectionSixCreate');
    Route::post('/HomeSectionSixStore', [HomeSectionSixController::class, 'store'])->name('HomeSectionSixStore');
    Route::get('/HomeSectionSixEdit/{id}', [HomeSectionSixController::class, 'edit'])->name('HomeSectionSixEdit');
    Route::post('/HomeSectionSixUpdate/{id}', [HomeSectionSixController::class, 'update'])->name('HomeSectionSixUpdate');
    Route::delete('/HomeSectionSixDestroy/{id}', [HomeSectionSixController::class, 'destroy'])->name('HomeSectionSixDestroy');

    Route::get('/LanguageEditingOne', [LanguageEditingOneController::class, 'index'])->name('LanguageEditingOne');
    Route::get('/LanguageEditingOneCreate', [LanguageEditingOneController::class, 'create'])->name('LanguageEditingOneCreate');
    Route::post('/LanguageEditingOneStore', [LanguageEditingOneController::class, 'store'])->name('LanguageEditingOneStore');
    Route::get('/LanguageEditingOneEdit/{id}', [LanguageEditingOneController::class, 'edit'])->name('LanguageEditingOneEdit');
    Route::post('/LanguageEditingOneUpdate/{id}', [LanguageEditingOneController::class, 'update'])->name('LanguageEditingOneUpdate');
    Route::delete('/LanguageEditingOneDestroy/{id}', [LanguageEditingOneController::class, 'destroy'])->name('LanguageEditingOneDestroy');


    Route::get('/LanguageEditingTwo', [LanguageEditingTwoController::class, 'index'])->name('LanguageEditingTwo');
    Route::get('/LanguageEditingTwoCreate', [LanguageEditingTwoController::class, 'create'])->name('LanguageEditingTwoCreate');
    Route::post('/LanguageEditingTwoStore', [LanguageEditingTwoController::class, 'store'])->name('LanguageEditingTwoStore');
    Route::get('/LanguageEditingTwoEdit/{id}', [LanguageEditingTwoController::class, 'edit'])->name('LanguageEditingTwoEdit');
    Route::post('/LanguageEditingTwoUpdate/{id}', [LanguageEditingTwoController::class, 'update'])->name('LanguageEditingTwoUpdate');
    Route::delete('/LanguageEditingTwoDestroy/{id}', [LanguageEditingTwoController::class, 'destroy'])->name('LanguageEditingTwoDestroy');

    Route::get('/LanguageEditingThree', [LanguageEditingThreeController::class, 'index'])->name('LanguageEditingThree');
    Route::get('/LanguageEditingThreeCreate', [LanguageEditingThreeController::class, 'create'])->name('LanguageEditingThreeCreate');
    Route::post('/LanguageEditingThreeStore', [LanguageEditingThreeController::class, 'store'])->name('LanguageEditingThreeStore');
    Route::get('/LanguageEditingThreeEdit/{id}', [LanguageEditingThreeController::class, 'edit'])->name('LanguageEditingThreeEdit');
    Route::post('/LanguageEditingThreeUpdate/{id}', [LanguageEditingThreeController::class, 'update'])->name('LanguageEditingThreeUpdate');
    Route::delete('/LanguageEditingThreeDestroy/{id}', [LanguageEditingThreeController::class, 'destroy'])->name('LanguageEditingThreeDestroy');

    Route::get('/LanguageEditingFour', [LanguageEditingFourController::class, 'index'])->name('LanguageEditingFour');
    Route::get('/LanguageEditingFourCreate', [LanguageEditingFourController::class, 'create'])->name('LanguageEditingFourCreate');
    Route::post('/LanguageEditingFourStore', [LanguageEditingFourController::class, 'store'])->name('LanguageEditingFourStore');
    Route::get('/LanguageEditingFourEdit/{id}', [LanguageEditingFourController::class, 'edit'])->name('LanguageEditingFourEdit');
    Route::post('/LanguageEditingFourUpdate/{id}', [LanguageEditingFourController::class, 'update'])->name('LanguageEditingFourUpdate');
    Route::delete('/LanguageEditingFourDestroy/{id}', [LanguageEditingFourController::class, 'destroy'])->name('LanguageEditingFourDestroy');

    Route::get('/commitment', [LanguageEditingFourController::class, 'commitment'])->name('commitment');
    Route::get('/commitmentEdit/{id}', [LanguageEditingFourController::class, 'commitmentedit'])->name('commitmentEdit');
    Route::post('/commitmentUpdate/{id}', [LanguageEditingFourController::class, 'commitmentupdate'])->name('commitmentUpdate');

    Route::get('/ScientificEditingOne', [ScientificEditingOneController::class, 'index'])->name('ScientificEditingOne');
    Route::get('/ScientificEditingOneCreate', [ScientificEditingOneController::class, 'create'])->name('ScientificEditingOneCreate');
    Route::post('/ScientificEditingOneStore', [ScientificEditingOneController::class, 'store'])->name('ScientificEditingOneStore');
    Route::get('/ScientificEditingOneEdit/{id}', [ScientificEditingOneController::class, 'edit'])->name('ScientificEditingOneEdit');
    Route::post('/ScientificEditingOneUpdate/{id}', [ScientificEditingOneController::class, 'update'])->name('ScientificEditingOneUpdate');
    Route::delete('/ScientificEditingOneDestroy/{id}', [ScientificEditingOneController::class, 'destroy'])->name('ScientificEditingOneDestroy');

    Route::get('/ScientificEditingTwo', [ScientificEditingTwoController::class, 'index'])->name('ScientificEditingTwo');
    Route::get('/ScientificEditingTwoCreate', [ScientificEditingTwoController::class, 'create'])->name('ScientificEditingTwoCreate');
    Route::post('/ScientificEditingTwoStore', [ScientificEditingTwoController::class, 'store'])->name('ScientificEditingTwoStore');
    Route::get('/ScientificEditingTwoEdit/{id}', [ScientificEditingTwoController::class, 'edit'])->name('ScientificEditingTwoEdit');
    Route::post('/ScientificEditingTwoUpdate/{id}', [ScientificEditingTwoController::class, 'update'])->name('ScientificEditingTwoUpdate');
    Route::delete('/ScientificEditingTwoDestroy/{id}', [ScientificEditingTwoController::class, 'destroy'])->name('ScientificEditingTwoDestroy');


    Route::get('/ScientificEditingThree', [ScientificEditingThreeController::class, 'index'])->name('ScientificEditingThree');
    Route::get('/ScientificEditingThreeCreate', [ScientificEditingThreeController::class, 'create'])->name('ScientificEditingThreeCreate');
    Route::post('/ScientificEditingThreeStore', [ScientificEditingThreeController::class, 'store'])->name('ScientificEditingThreeStore');
    Route::get('/ScientificEditingThreeEdit/{id}', [ScientificEditingThreeController::class, 'edit'])->name('ScientificEditingThreeEdit');
    Route::post('/ScientificEditingThreeUpdate/{id}', [ScientificEditingThreeController::class, 'update'])->name('ScientificEditingThreeUpdate');
    Route::delete('/ScientificEditingThreeDestroy/{id}', [ScientificEditingThreeController::class, 'destroy'])->name('ScientificEditingThreeDestroy');

    Route::get('/Features', [ScientificEditingThreeController::class, 'features'])->name('Features');
    Route::get('/FeaturesEdit/{id}', [ScientificEditingThreeController::class, 'featuresedit'])->name('FeaturesEdit');
    Route::post('/FeaturesUpdate/{id}', [ScientificEditingThreeController::class, 'featuresupdate'])->name('FeaturesUpdate');

    Route::get('/AccidentalPlagiarismOne', [AccidentalPlagiarismOneController::class, 'index'])->name('AccidentalPlagiarismOne');
    Route::get('/AccidentalPlagiarismOneCreate', [AccidentalPlagiarismOneController::class, 'create'])->name('AccidentalPlagiarismOneCreate');
    Route::post('/AccidentalPlagiarismOneStore', [AccidentalPlagiarismOneController::class, 'store'])->name('AccidentalPlagiarismOneStore');
    Route::get('/AccidentalPlagiarismOneEdit/{id}', [AccidentalPlagiarismOneController::class, 'edit'])->name('AccidentalPlagiarismOneEdit');
    Route::post('/AccidentalPlagiarismOneUpdate/{id}', [AccidentalPlagiarismOneController::class, 'update'])->name('AccidentalPlagiarismOneUpdate');
    Route::delete('/AccidentalPlagiarismOneDestroy/{id}', [AccidentalPlagiarismOneController::class, 'destroy'])->name('AccidentalPlagiarismOneDestroy');

    Route::get('/ManuscriptFormattingOne', [ManuscriptFormattingOneController::class, 'index'])->name('ManuscriptFormattingOne');
    Route::get('/ManuscriptFormattingOneCreate', [ManuscriptFormattingOneController::class, 'create'])->name('ManuscriptFormattingOneCreate');
    Route::post('/ManuscriptFormattingOneStore', [ManuscriptFormattingOneController::class, 'store'])->name('ManuscriptFormattingOneStore');
    Route::get('/ManuscriptFormattingOneEdit/{id}', [ManuscriptFormattingOneController::class, 'edit'])->name('ManuscriptFormattingOneEdit');
    Route::post('/ManuscriptFormattingOneUpdate/{id}', [ManuscriptFormattingOneController::class, 'update'])->name('ManuscriptFormattingOneUpdate');
    Route::delete('/ManuscriptFormattingOneDestroy/{id}', [ManuscriptFormattingOneController::class, 'destroy'])->name('ManuscriptFormattingOneDestroy');

    Route::get('/ManuscriptFormattingTwo', [ManuscriptFormattingTwoController::class, 'index'])->name('ManuscriptFormattingTwo');
    Route::get('/ManuscriptFormattingTwoCreate', [ManuscriptFormattingTwoController::class, 'create'])->name('ManuscriptFormattingTwoCreate');
    Route::post('/ManuscriptFormattingTwoStore', [ManuscriptFormattingTwoController::class, 'store'])->name('ManuscriptFormattingTwoStore');
    Route::get('/ManuscriptFormattingTwoEdit/{id}', [ManuscriptFormattingTwoController::class, 'edit'])->name('ManuscriptFormattingTwoEdit');
    Route::post('/ManuscriptFormattingTwoUpdate/{id}', [ManuscriptFormattingTwoController::class, 'update'])->name('ManuscriptFormattingTwoUpdate');
    Route::delete('/ManuscriptFormattingTwoDestroy/{id}', [ManuscriptFormattingTwoController::class, 'destroy'])->name('ManuscriptFormattingTwoDestroy');

    Route::get('/ManuscriptFeatures', [ManuscriptFormattingTwoController::class, 'features'])->name('ManuscriptFeatures');
    Route::get('/ManuscriptFeaturesEdit/{id}', [ManuscriptFormattingTwoController::class, 'featuresedit'])->name('ManuscriptFeaturesEdit');
    Route::post('/ManuscriptFeaturesUpdate/{id}', [ManuscriptFormattingTwoController::class, 'featuresupdate'])->name('ManuscriptFeaturesUpdate');

    Route::get('/ManuscriptFormattingThree', [ManuscriptFormattingThreeController::class, 'index'])->name('ManuscriptFormattingThree');
    Route::get('/ManuscriptFormattingThreeCreate', [ManuscriptFormattingThreeController::class, 'create'])->name('ManuscriptFormattingThreeCreate');
    Route::post('/ManuscriptFormattingThreeStore', [ManuscriptFormattingThreeController::class, 'store'])->name('ManuscriptFormattingThreeStore');
    Route::get('/ManuscriptFormattingThreeEdit/{id}', [ManuscriptFormattingThreeController::class, 'edit'])->name('ManuscriptFormattingThreeEdit');
    Route::post('/ManuscriptFormattingThreeUpdate/{id}', [ManuscriptFormattingThreeController::class, 'update'])->name('ManuscriptFormattingThreeUpdate');
    Route::delete('/ManuscriptFormattingThreeDestroy/{id}', [ManuscriptFormattingThreeController::class, 'destroy'])->name('ManuscriptFormattingThreeDestroy');

    Route::get('/PostandPresentationOne', [PostandPresentationOneController::class, 'index'])->name('PostandPresentationOne');
    Route::get('/PostandPresentationOneCreate', [PostandPresentationOneController::class, 'create'])->name('PostandPresentationOneCreate');
    Route::post('/PostandPresentationOneStore', [PostandPresentationOneController::class, 'store'])->name('PostandPresentationOneStore');
    Route::get('/PostandPresentationOneEdit/{id}', [PostandPresentationOneController::class, 'edit'])->name('PostandPresentationOneEdit');
    Route::post('/PostandPresentationOneUpdate/{id}', [PostandPresentationOneController::class, 'update'])->name('PostandPresentationOneUpdate');
    Route::delete('/PostandPresentationOneDestroy/{id}', [PostandPresentationOneController::class, 'destroy'])->name('PostandPresentationOneDestroy');

    Route::get('/PostandPresentationTwo', [PostandPresentationTwoController::class, 'index'])->name('PostandPresentationTwo');
    Route::get('/PostandPresentationTwoCreate', [PostandPresentationTwoController::class, 'create'])->name('PostandPresentationTwoCreate');
    Route::post('/PostandPresentationTwoStore', [PostandPresentationTwoController::class, 'store'])->name('PostandPresentationTwoStore');
    Route::get('/PostandPresentationTwoEdit/{id}', [PostandPresentationTwoController::class, 'edit'])->name('PostandPresentationTwoEdit');
    Route::post('/PostandPresentationTwoUpdate/{id}', [PostandPresentationTwoController::class, 'update'])->name('PostandPresentationTwoUpdate');
    Route::delete('/PostandPresentationTwoDestroy/{id}', [PostandPresentationTwoController::class, 'destroy'])->name('PostandPresentationTwoDestroy');

    Route::get('/PostandPresentationThree', [PostandPresentationThreeController::class, 'index'])->name('PostandPresentationThree');
    Route::get('/PostandPresentationThreeCreate', [PostandPresentationThreeController::class, 'create'])->name('PostandPresentationThreeCreate');
    Route::post('/PostandPresentationThreeStore', [PostandPresentationThreeController::class, 'store'])->name('PostandPresentationThreeStore');
    Route::get('/PostandPresentationThreeEdit/{id}', [PostandPresentationThreeController::class, 'edit'])->name('PostandPresentationThreeEdit');
    Route::post('/PostandPresentationThreeUpdate/{id}', [PostandPresentationThreeController::class, 'update'])->name('PostandPresentationThreeUpdate');
    Route::delete('/PostandPresentationThreeDestroy/{id}', [PostandPresentationThreeController::class, 'destroy'])->name('PostandPresentationThreeDestroy');

    Route::get('/PostandPresentationFour', [PostandPresentationFourController::class, 'index'])->name('PostandPresentationFour');
    Route::get('/PostandPresentationFourCreate', [PostandPresentationFourController::class, 'create'])->name('PostandPresentationFourCreate');
    Route::post('/PostandPresentationFourStore', [PostandPresentationFourController::class, 'store'])->name('PostandPresentationFourStore');
    Route::get('/PostandPresentationFourEdit/{id}', [PostandPresentationFourController::class, 'edit'])->name('PostandPresentationFourEdit');
    Route::post('/PostandPresentationFourUpdate/{id}', [PostandPresentationFourController::class, 'update'])->name('PostandPresentationFourUpdate');
    Route::delete('/PostandPresentationFourDestroy/{id}', [PostandPresentationFourController::class, 'destroy'])->name('PostandPresentationFourDestroy');

    Route::get('/AssignmentEditingServiceOne', [AssignmentEditingServiceOneController::class, 'index'])->name('AssignmentEditingServiceOne');
    Route::get('/AssignmentEditingServiceOneCreate', [AssignmentEditingServiceOneController::class, 'create'])->name('AssignmentEditingServiceOneCreate');
    Route::post('/AssignmentEditingServiceOneStore', [AssignmentEditingServiceOneController::class, 'store'])->name('AssignmentEditingServiceOneStore');
    Route::get('/AssignmentEditingServiceOneEdit/{id}', [AssignmentEditingServiceOneController::class, 'edit'])->name('AssignmentEditingServiceOneEdit');
    Route::post('/AssignmentEditingServiceOneUpdate/{id}', [AssignmentEditingServiceOneController::class, 'update'])->name('AssignmentEditingServiceOneUpdate');
    Route::delete('/AssignmentEditingServiceOneDestroy/{id}', [AssignmentEditingServiceOneController::class, 'destroy'])->name('AssignmentEditingServiceOneDestroy');

    Route::get('/AssignmentEditingServiceTwo', [AssignmentEditingServiceOneController::class, 'servicetwoindex'])->name('AssignmentEditingServiceTwo');
    Route::get('/AssignmentEditingServiceTwoEdit/{id}', [AssignmentEditingServiceOneController::class, 'servicetwoedit'])->name('AssignmentEditingServiceTwoEdit');
    Route::post('/AssignmentEditingServiceTwoUpdate/{id}', [AssignmentEditingServiceOneController::class, 'servicetwoupdate'])->name('AssignmentEditingServiceTwoUpdate');

    Route::get('/ThesisEditingServiceOne', [ThesisEditingServiceOneController::class, 'index'])->name('ThesisEditingServiceOne');
    Route::get('/ThesisEditingServiceOneCreate', [ThesisEditingServiceOneController::class, 'create'])->name('ThesisEditingServiceOneCreate');
    Route::post('/ThesisEditingServiceOneStore', [ThesisEditingServiceOneController::class, 'store'])->name('ThesisEditingServiceOneStore');
    Route::get('/ThesisEditingServiceOneEdit/{id}', [ThesisEditingServiceOneController::class, 'edit'])->name('ThesisEditingServiceOneEdit');
    Route::post('/ThesisEditingServiceOneUpdate/{id}', [ThesisEditingServiceOneController::class, 'update'])->name('ThesisEditingServiceOneUpdate');
    Route::delete('/ThesisEditingServiceOneDestroy/{id}', [ThesisEditingServiceOneController::class, 'destroy'])->name('ThesisEditingServiceOneDestroy');

    Route::get('/ThesisEditingServiceTwo', [ThesisEditingServiceTwoController::class, 'index'])->name('ThesisEditingServiceTwo');
    Route::get('/ThesisEditingServiceTwoCreate', [ThesisEditingServiceTwoController::class, 'create'])->name('ThesisEditingServiceTwoCreate');
    Route::post('/ThesisEditingServiceTwoStore', [ThesisEditingServiceTwoController::class, 'store'])->name('ThesisEditingServiceTwoStore');
    Route::get('/ThesisEditingServiceTwoEdit/{id}', [ThesisEditingServiceTwoController::class, 'edit'])->name('ThesisEditingServiceTwoEdit');
    Route::post('/ThesisEditingServiceTwoUpdate/{id}', [ThesisEditingServiceTwoController::class, 'update'])->name('ThesisEditingServiceTwoUpdate');
    Route::delete('/ThesisEditingServiceTwoDestroy/{id}', [ThesisEditingServiceTwoController::class, 'destroy'])->name('ThesisEditingServiceTwoDestroy');

    Route::get('/ThesisEditingServiceThree', [ThesisEditingServiceThreeController::class, 'index'])->name('ThesisEditingServiceThree');
    Route::get('/ThesisEditingServiceThreeCreate', [ThesisEditingServiceThreeController::class, 'create'])->name('ThesisEditingServiceThreeCreate');
    Route::post('/ThesisEditingServiceThreeStore', [ThesisEditingServiceThreeController::class, 'store'])->name('ThesisEditingServiceThreeStore');
    Route::get('/ThesisEditingServiceThreeEdit/{id}', [ThesisEditingServiceThreeController::class, 'edit'])->name('ThesisEditingServiceThreeEdit');
    Route::post('/ThesisEditingServiceThreeUpdate/{id}', [ThesisEditingServiceThreeController::class, 'update'])->name('ThesisEditingServiceThreeUpdate');
    Route::delete('/ThesisEditingServiceThreeDestroy/{id}', [ThesisEditingServiceThreeController::class, 'destroy'])->name('ThesisEditingServiceThreeDestroy');

    Route::get('/DataAnalysisServiceOne', [DataAnalysisServiceOneController::class, 'index'])->name('DataAnalysisServiceOne');
    Route::get('/DataAnalysisServiceOneCreate', [DataAnalysisServiceOneController::class, 'create'])->name('DataAnalysisServiceOneCreate');
    Route::post('/DataAnalysisServiceOneStore', [DataAnalysisServiceOneController::class, 'store'])->name('DataAnalysisServiceOneStore');
    Route::get('/DataAnalysisServiceOneEdit/{id}', [DataAnalysisServiceOneController::class, 'edit'])->name('DataAnalysisServiceOneEdit');
    Route::post('/DataAnalysisServiceOneUpdate/{id}', [DataAnalysisServiceOneController::class, 'update'])->name('DataAnalysisServiceOneUpdate');
    Route::delete('/DataAnalysisServiceOneDestroy/{id}', [DataAnalysisServiceOneController::class, 'destroy'])->name('DataAnalysisServiceOneDestroy');

    Route::get('/DataAnalysisServiceTwo', [DataAnalysisServiceTwoController::class, 'index'])->name('DataAnalysisServiceTwo');
    Route::get('/DataAnalysisServiceTwoCreate', [DataAnalysisServiceTwoController::class, 'create'])->name('DataAnalysisServiceTwoCreate');
    Route::post('/DataAnalysisServiceTwoStore', [DataAnalysisServiceTwoController::class, 'store'])->name('DataAnalysisServiceTwoStore');
    Route::get('/DataAnalysisServiceTwoEdit/{id}', [DataAnalysisServiceTwoController::class, 'edit'])->name('DataAnalysisServiceTwoEdit');
    Route::post('/DataAnalysisServiceTwoUpdate/{id}', [DataAnalysisServiceTwoController::class, 'update'])->name('DataAnalysisServiceTwoUpdate');
    Route::delete('/DataAnalysisServiceTwoDestroy/{id}', [DataAnalysisServiceTwoController::class, 'destroy'])->name('DataAnalysisServiceTwoDestroy');

    Route::get('/DataAnalysisServiceThree', [DataAnalysisServiceThreeController::class, 'index'])->name('DataAnalysisServiceThree');
    Route::get('/DataAnalysisServiceThreeCreate', [DataAnalysisServiceThreeController::class, 'create'])->name('DataAnalysisServiceThreeCreate');
    Route::post('/DataAnalysisServiceThreeStore', [DataAnalysisServiceThreeController::class, 'store'])->name('DataAnalysisServiceThreeStore');
    Route::get('/DataAnalysisServiceThreeEdit/{id}', [DataAnalysisServiceThreeController::class, 'edit'])->name('DataAnalysisServiceThreeEdit');
    Route::post('/DataAnalysisServiceThreeUpdate/{id}', [DataAnalysisServiceThreeController::class, 'update'])->name('DataAnalysisServiceThreeUpdate');
    Route::delete('/DataAnalysisServiceThreeDestroy/{id}', [DataAnalysisServiceThreeController::class, 'destroy'])->name('DataAnalysisServiceThreeDestroy');


    Route::get('/PlaceOrderOne', [PlaceOrderOneController::class, 'index'])->name('PlaceOrderOne');
    Route::get('/PlaceOrderOneCreate', [PlaceOrderOneController::class, 'create'])->name('PlaceOrderOneCreate');
    Route::post('/PlaceOrderOneStore', [PlaceOrderOneController::class, 'store'])->name('PlaceOrderOneStore');
    Route::get('/PlaceOrderOneEdit/{id}', [PlaceOrderOneController::class, 'edit'])->name('PlaceOrderOneEdit');
    Route::post('/PlaceOrderOneUpdate/{id}', [PlaceOrderOneController::class, 'update'])->name('PlaceOrderOneUpdate');
    Route::delete('/PlaceOrderOneDestroy/{id}', [PlaceOrderOneController::class, 'destroy'])->name('PlaceOrderOneDestroy');

    Route::get('/PlaceOrderTwo', [PlaceOrderTwoController::class, 'index'])->name('PlaceOrderTwo');
    Route::get('/PlaceOrderTwoCreate', [PlaceOrderTwoController::class, 'create'])->name('PlaceOrderTwoCreate');
    Route::post('/PlaceOrderTwoStore', [PlaceOrderTwoController::class, 'store'])->name('PlaceOrderTwoStore');
    Route::get('/PlaceOrderTwoEdit/{id}', [PlaceOrderTwoController::class, 'edit'])->name('PlaceOrderTwoEdit');
    Route::post('/PlaceOrderTwoUpdate/{id}', [PlaceOrderTwoController::class, 'update'])->name('PlaceOrderTwoUpdate');
    Route::delete('/PlaceOrderTwoDestroy/{id}', [PlaceOrderTwoController::class, 'destroy'])->name('PlaceOrderTwoDestroy');

    Route::get('/OrderWorks', [PlaceOrderTwoController::class, 'works'])->name('OrderWorks');
    Route::get('/OrderWorksEdit/{id}', [PlaceOrderTwoController::class, 'worksedit'])->name('OrderWorksEdit');
    Route::post('/OrderWorksUpdate/{id}', [PlaceOrderTwoController::class, 'worksupdate'])->name('OrderWorksUpdate');

    Route::get('/PlaceOrderThree', [PlaceOrderThreeController::class, 'index'])->name('PlaceOrderThree');
    Route::get('/PlaceOrderThreeCreate', [PlaceOrderThreeController::class, 'create'])->name('PlaceOrderThreeCreate');
    Route::post('/PlaceOrderThreeStore', [PlaceOrderThreeController::class, 'store'])->name('PlaceOrderThreeStore');
    Route::get('/PlaceOrderThreeEdit/{id}', [PlaceOrderThreeController::class, 'edit'])->name('PlaceOrderThreeEdit');
    Route::post('/PlaceOrderThreeUpdate/{id}', [PlaceOrderThreeController::class, 'update'])->name('PlaceOrderThreeUpdate');
    Route::delete('/PlaceOrderThreeDestroy/{id}', [PlaceOrderThreeController::class, 'destroy'])->name('PlaceOrderThreeDestroy');

    Route::get('/PlaceOrderFour', [PlaceOrderFourController::class, 'index'])->name('PlaceOrderFour');
    Route::get('/PlaceOrderFourCreate', [PlaceOrderFourController::class, 'create'])->name('PlaceOrderFourCreate');
    Route::post('/PlaceOrderFourStore', [PlaceOrderFourController::class, 'store'])->name('PlaceOrderFourStore');
    Route::get('/PlaceOrderFourEdit/{id}', [PlaceOrderFourController::class, 'edit'])->name('PlaceOrderFourEdit');
    Route::post('/PlaceOrderFourUpdate/{id}', [PlaceOrderFourController::class, 'update'])->name('PlaceOrderFourUpdate');
    Route::delete('/PlaceOrderFourDestroy/{id}', [PlaceOrderFourController::class, 'destroy'])->name('PlaceOrderFourDestroy');

    Route::get('/OrderServices', [PlaceOrderFourController::class, 'services'])->name('OrderServices');
    Route::get('/OrderServicesEdit/{id}', [PlaceOrderFourController::class, 'servicesedit'])->name('OrderServicesEdit');
    Route::post('/OrderServicesUpdate/{id}', [PlaceOrderFourController::class, 'servicesupdate'])->name('OrderServicesUpdate');


    Route::get('/pricing-services', [SetServicePriceController ::class, 'index'])->name('servicePrice.index');
    Route::get('/pricing-servicesCreate', [SetServicePriceController ::class, 'create'])->name('servicePrice.create');
    Route::post('/pricing-servicesStore', [SetServicePriceController ::class, 'store'])->name('servicePrice.store');
    Route::get('/pricing-servicesEdit/{id}', [SetServicePriceController ::class, 'edit'])->name('servicePrice.edit');
    Route::post('/pricing-servicesUpdate/{id}', [SetServicePriceController ::class, 'update'])->name('servicePrice.update');
    Route::delete('/pricing-servicesDestroy/{id}', [SetServicePriceController ::class, 'delete'])->name('servicePrice.delete');

    // ########################## New Prices ###############################
    Route::get('/pricing-services-index', [PricingController ::class, 'index'])->name('newServicePrice.index');
    Route::get('/pricing-services-create', [PricingController ::class, 'create'])->name('newServicePrice.create');
    Route::post('/pricing-services-store', [PricingController ::class, 'store'])->name('newServicePrice.store');
    Route::get('/pricing-services-edit/{id}', [PricingController ::class, 'edit'])->name('newServicePrice.edit');
    Route::post('/pricing-services-update/{id}', [PricingController ::class, 'update'])->name('newServicePrice.update');
    Route::delete('/pricing-services-destroy/{id}', [PricingController ::class, 'delete'])->name('newServicePrice.delete');
    Route::post('/new-service-price/sort', [PricingController::class, 'sort'])->name('newServicePrice.sort');

    // ########################## Additional Prices ###############################

    Route::get('/Additional-Prices', [AdditionalPriceController ::class, 'index'])->name('AdditionalPrice');
    Route::get('/Additional-PricesCreate', [AdditionalPriceController ::class, 'create'])->name('AdditionalPrice.Create');
    Route::post('/Additional-PricesStore', [AdditionalPriceController ::class, 'store'])->name('AdditionalPrice.Store');
    Route::get('/Additional-PricesEdit/{id}', [AdditionalPriceController ::class, 'edit'])->name('AdditionalPrice.Edit');
    Route::post('/Additional-PricesUpdate/{id}', [AdditionalPriceController ::class, 'update'])->name('AdditionalPrice.Update');
    Route::delete('/Additional-PricesDestroy/{id}', [AdditionalPriceController ::class, 'destroy'])->name('AdditionalPrice.Destroy');
    //  ######################### FAQ #########################
    Route::controller(FAQController::class)->group(function () {
        Route::get('/faq',  'faqIndex')->name('faq.index');
        Route::get('/faq-create',  'faqCreate')->name('faq.create');
        Route::post('/faq-create/store',  'faqStore')->name('faq.store');
        Route::get('/faqData',  'faqData')->name('faq.get');
        Route::get('/faq/{id}',  'showFaq')->name('faq.show');
        Route::get('/faqEdit/{id}',  'faqedit')->name('faq.edit');
        Route::post('/faqUpdate{id}',  'updateFaq')->name('faq.update');
        Route::delete('/faq/delete/{id}',  'deleteFaq')->name('faq.delete');
        Route::post('/faq/reorder',  'faqReorder')->name('faq.updateOrder');

        // Route::post('/faq/reorder',  'faqReorder')->name('faq.updateOrder');


    });

    // Privacy Policy Controller
    Route::controller(PrivacyPolicyController::class)->group(function () {
        Route::get('Privacy-policy/index', 'index')->name('privacy.index');
        Route::get('Privacy-policy/edit/{id}', 'edit')->name('privacy.edit');
        Route::post('Privacy-policy/update/', 'update')->name('privacy.update');
        Route::get('Privacy-policy/read', 'read')->name('privacy.read');
    });

     // Term conditions Controller
     Route::controller(TermsAndConditionController::class)->group(function () {
        Route::get('terms-conditions/index', 'index')->name('termCondition.index');
        Route::get('terms-conditions/edit/{id}', 'edit')->name('termCondition.edit');
        Route::post('terms-conditions/update/', 'update')->name('termCondition.update');
        Route::get('terms-conditions/read', 'read')->name('termCondition.read');
    });


        // Privacy Policy Controller
        Route::controller(SeoController::class)->group(function () {
            Route::get('seo/index', 'index')->name('seo.index');
            Route::get('seo/section/home', 'getHomeSeo')->name('home.seo');
            Route::get('seo/section/languageEditing', 'getlanguageEditingSeo')->name('languageEditing.seo');
            Route::get('seo/section/scientificEditing', 'getscientificEditingSeo')->name('scientificEditing.seo');
            Route::get('seo/section/publicationSupport', 'getpublicationSupportSeo')->name('publicationSupport.seo');
            Route::get('seo/section/posterPresentation', 'getposterPresentationSeo')->name('posterPresentation.seo');
            Route::get('seo/section/thesisSupport', 'getthesisSupportSeo')->name('thesisSupport.seo');
            Route::get('seo/section/dataAnalysis', 'getdataAnalysisSeo')->name('dataAnalysis.seo');

            Route::post('seo/section/update', 'update')->name('home.seo.update');

            Route::get('seo/edit/{id}', 'edit')->name('seo.edit');
            Route::post('seo/update/', 'update')->name('seo.update');
            Route::get('seo/read', 'read')->name('seo.read');
        });
});

require __DIR__ . '/frontend.php';

