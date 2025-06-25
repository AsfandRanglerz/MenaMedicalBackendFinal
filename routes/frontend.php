<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\JournalsController;
use App\Http\Controllers\PlaceOrderController;
use App\Http\Controllers\AdvancedDataController;
use App\Http\Controllers\DataAnalysisController;
use App\Http\Controllers\ThesisEditingController;
use App\Http\Controllers\ThesisServiceController;
use App\Http\Controllers\AdvanceEditingController;
use App\Http\Controllers\PosterCreationController;
use App\Http\Controllers\LanguageEditingController;
use App\Http\Controllers\SimilarityReviewController;
use App\Http\Controllers\AssignmentEditingController;
use App\Http\Controllers\ScientificEditingController;
use App\Http\Controllers\PosterPresentationController;
use App\Http\Controllers\AccidentalPlagiarismController;
use App\Http\Controllers\ManuscriptFormattingController;
use App\Http\Controllers\ScientificAssignmentController;
use App\Http\Controllers\AssignmentEditingFormController;
use App\Http\Controllers\ScientificEditingFormController;
use App\Http\Controllers\ManuscriptFormattingFormController;
use App\Http\Controllers\ScientificEditingServiceController;
use App\Http\Controllers\PrivacyPolicyTermConditionController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/accidental-plagiarism', [AccidentalPlagiarismController::class, 'accidentalPlagiarism']);
Route::get('/language-editing', [LanguageEditingController::class, 'languageEditing']);
Route::get('/manuscript-formatting-service', [ManuscriptFormattingController::class, 'manuscriptFormattingService']);
Route::get('/data-analysis', [DataAnalysisController::class, 'dataAnalysis']);
Route::get('/poster-creation-service', [PosterCreationController::class, 'posterCreationService']);
Route::get('/assignment-editing-service', [AssignmentEditingController::class, 'assignmentEditingService']);
Route::get('/place-order', [PlaceOrderController::class, 'placeOrder']);
Route::get('/advance-editing', [AdvanceEditingController::class, 'advanceEditingService']);
Route::get('/thesis-editing-service', [ThesisEditingController::class, 'thesisEditingService']);
Route::get('/similarty-review-report', [SimilarityReviewController::class, 'similarityReviewReport']);
Route::get('/poster-presentation-service', [PosterPresentationController::class, 'posterPresentationService']);
Route::get('/advanced-data-analysis', [AdvancedDataController::class, 'advancedDataAnalysis']);
Route::get('/scientific-assignment-service', [ScientificAssignmentController::class, 'scientificAssignmentService']);
Route::get('/thesis-service', [ThesisServiceController::class, 'thesisService']);
Route::get('/assignment-editing', [AssignmentEditingFormController::class, 'assignmentEditingForm']);
Route::get('/manuscript-formatting', [ManuscriptFormattingFormController::class, 'manuscriptFormattingForm']);

Route::get('/scientific-editing', [ScientificEditingController::class, 'scientificEditing']);
// Route::get('/scientific-editing-service-form', [ScientificEditingController::class, 'scientificEditingForm'])->name('scientificEditingService');
// Route::get('/scientific-editing-service-form-prices', [ScientificEditingController::class, 'scientificEditingFormPrices'])->name('scientificEditingServicePrices');
// Route::post('/scientific-editing-service-form-calculate-price', [ScientificEditingController::class, 'calculatePrice'])->name('calculatePrice');
// Route::post('/scientific-editing-service-submit-quotation-request', [ScientificEditingController::class, 'submitQuotationRequest'])->name('submitQuotationRequest');

Route::post('/show-package-price',[PriceController::class,'showPrice'])->name('showPackagePrices');

//** Language Editing Service **
Route::get('/language-editing-service', [LanguageEditingController::class, 'languageEditingService']);
Route::get('/language-editing-service-form/{package}', [LanguageEditingController::class, 'languageEditingServiceForm'])->name('languageEditingService');
Route::post('/language-editing-service-form-prices', [LanguageEditingController::class, 'languageEditingServiceFormPrices'])->name('languageEditingServicePrices');
Route::post('/language-editing-service-form-calculate-price', [LanguageEditingController::class, 'calculatePrice'])->name('languageEditingService.calculatePrice');
Route::post('/language-editing-service-submit-quotation-request', [LanguageEditingController::class, 'submitQuotationRequest'])->name('languageEditingService.submit.request');


//** Scientific Editing Service **
Route::get('/scientific-editing-service', [ScientificEditingServiceController::class, 'scientificEditingService']);
Route::get('/scientific-editing-service-form', [ScientificEditingServiceController::class, 'scientificEditingForm'])->name('scientificEditingService');
Route::post('/scientific-editing-service-form-prices', [ScientificEditingServiceController::class, 'scientificEditingFormPrices'])->name('scientificEditingServicePrices');
Route::post('/scientific-editing-service-form-calculate-price', [ScientificEditingServiceController::class, 'calculatePrice'])->name('calculatePrice');
Route::post('/scientific-editing-service-submit-quotation-request', [ScientificEditingServiceController::class, 'submitQuotationRequest'])->name('submitQuotationRequest');

//** Accidental Plagiarism Service **
Route::get('/accidental-plagiarism', [AccidentalPlagiarismController::class, 'accidentalPlagiarism']);
Route::get('/accidental-plagiarism-form', [AccidentalPlagiarismController::class, 'accidentalPlagiarismForm'])->name('accidentalPlagiarismService');
Route::post('/accidental-plagiarism-form-prices', [AccidentalPlagiarismController::class, 'accidentalPlagiarismFormPrices'])->name('accidentalPlagiarismServicePrices');
Route::post('/accidental-plagiarism-form-calculate-price', [AccidentalPlagiarismController::class, 'calculatePrice'])->name('accidentalPlagiarism.calculatePrice');
Route::post('/accidental-plagiarism-submit-quotation-request', [AccidentalPlagiarismController::class, 'submitQuotationRequest'])->name('accidentalPlagiarism.submit.request');

//** Manuscript Formating Service **
// Route::get('/manuscript-formatting-service', [ManuscriptFormattingController::class, 'accidentalPlagiarism']);
Route::get('/manuscript-formatting-service-form', [ManuscriptFormattingController::class, 'manuscriptFormattingForm'])->name('manuscriptFormattingService');
Route::post('/manuscript-formatting-service-form-prices', [ManuscriptFormattingController::class, 'manuscriptFormattingFormPrices'])->name('manuscriptFormattingServicePrices');
Route::post('/manuscript-formatting-service-form-calculate-price', [ManuscriptFormattingController::class, 'calculatePrice'])->name('manuscriptFormatting.calculatePrice');
Route::post('/manuscript-formatting-service-submit-quotation-request', [ManuscriptFormattingController::class, 'submitQuotationRequest'])->name('manuscriptFormatting.submit.request');

// ** Posters and presentations **
Route::get('/poster-creation-service-form/{service_name}', [PosterCreationController::class, 'postersAndPresentationForm'])->name('posterPresentationService');
Route::post('/poster-creation-service-form-prices', [PosterCreationController::class, 'postersAndPresentationFormPrices'])->name('postersAndPresentationServicePrices');
Route::post('/poster-creation-service-form-calculate-price', [PosterCreationController::class, 'calculatePrice'])->name('postersAndPresentation.calculatePrice');
Route::post('/poster-creation-service-submit-quotation-request', [PosterCreationController::class, 'submitQuotationRequest'])->name('postersAndPresentation.submit.request');


// ** Thesis support section **
// Assignment Editing Service
Route::get('/assignment-editing-service-form', [AssignmentEditingController::class, 'assignmentEditingServiceForm'])->name('assignmentEditingService');
Route::post('/assignment-editing-service-form-prices', [AssignmentEditingController::class, 'assignmentEditingServiceFormPrices'])->name('assignmentEditingServiceServicePrices');
Route::post('/assignment-editing-service-form-calculate-price', [AssignmentEditingController::class, 'calculatePrice'])->name('assignmentEditingService.calculatePrice');
Route::post('/assignment-editing-service-submit-quotation-request', [AssignmentEditingController::class, 'submitQuotationRequest'])->name('assignmentEditingService.submit.request');

// Thesis Editing Service
Route::get('/thesis-editing-service-form/{package}', [ThesisEditingController::class, 'thesisEditingServiceForm'])->name('thesisEditingService');
Route::post('/thesis-editing-service-form-prices', [ThesisEditingController::class, 'thesisEditingServiceFormPrices'])->name('thesisEditingServiceServicePrices');
Route::post('/thesis-editing-service-form-calculate-price', [ThesisEditingController::class, 'calculatePrice'])->name('thesisEditingService.calculatePrice');
Route::post('/thesis-editing-service-submit-quotation-request', [ThesisEditingController::class, 'submitQuotationRequest'])->name('thesisEditingService.submit.request');

// Advance Data Editing Service
Route::get('/data-analysis', [DataAnalysisController::class, 'dataAnalysis']);

Route::get('/data-analysis-service-form/{package}', [DataAnalysisController::class, 'dataAnalysisServiceForm'])->name('dataAnalysisService');
Route::post('/data-analysis-service-form-prices', [DataAnalysisController::class, 'dataAnalysisServiceFormPrices'])->name('dataAnalysisServiceServicePrices');
Route::post('/data-analysis-service-form-calculate-price', [DataAnalysisController::class, 'calculatePrice'])->name('dataAnalysisService.calculatePrice');
Route::post('/data-analysis-service-submit-quotation-request', [DataAnalysisController::class, 'submitQuotationRequest'])->name('dataAnalysisService.submit.request');

// place orders route
Route::post('/place-order-from', [PlaceOrderController::class, 'getPlceOrderForm'])->name('get.order');


Route::get('/journal', [JournalsController::class, 'journalModule']);

Route::get('/privacy-policy',[PrivacyPolicyTermConditionController::class,'privacyPage'])->name('privacy-policy');
Route::get('/term-condition',[PrivacyPolicyTermConditionController::class,'termsPage'])->name('term-condition');
Route::get('/contact-us',[PrivacyPolicyTermConditionController::class,'contctPage'])->name('contct-us');
Route::post('/contact-us/post',[PrivacyPolicyTermConditionController::class,'contactPost'])->name('contact.submit');

// Route::get('/scientific-editing', [ScientificEditingController::class, 'scientificEditing']);
// Route::get('/scientific-editing-form', [ScientificEditingController::class, 'scientificEditingForm'])->name('scientificEditingService');
// Route::post('/scientific-editing-form-calculate-price', [ScientificEditingController::class, 'calculatePrice'])->name('calculatePrice');
// Route::post('/scientific-editing-submit-quotation-request', [ScientificEditingController::class, 'submitQuotationRequest'])->name('submitQuotationRequest');
