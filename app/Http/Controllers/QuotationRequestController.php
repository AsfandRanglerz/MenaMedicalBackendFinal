<?php

namespace App\Http\Controllers;

use App\Mail\ApproveQuotationRequest;
use App\Mail\RejectQuotationRequest;
use Illuminate\Http\Request;
use App\Models\QuotationFile;
use App\Models\QuotationRequest;
use Illuminate\Support\Facades\Mail;
use App\Models\AdditionalInformation;
use App\Models\QuotationAdditionalService;

class QuotationRequestController extends Controller
{
    public function index(){
        $quotationRequests = QuotationRequest::with('personalInfos','files','additionalServices')
        ->where('status','0')
        ->latest()->get();
        // QuotationRequest::where('status','0')->update(['status','1']);
        // return $quotationRequests;
        return view('admin.quotationRequest.index',compact('quotationRequests'));
    }

    public function approvedRequests(){
        $quotationRequests = QuotationRequest::with('personalInfos','files','additionalServices')
        ->where('status','1')
        ->latest()->get();
        return view('admin.quotationRequest.approvedRequests',compact('quotationRequests'));
    }

    public function RejectedRequests(){
        $quotationRequests = QuotationRequest::with('personalInfos','files','additionalServices')
        ->where('status','2')
        ->latest()->get();
        return view('admin.quotationRequest.rejectedRequests',compact('quotationRequests'));
    }

    public function status(Request $request, $id){
        $quotationRequest = QuotationRequest::with('personalInfos')->where('id',$id)->first();
        // return $quotationRequest;
        // return $request;
        $email = $quotationRequest->personalInfos->first()->email;
        $quotationRequest->update([
            'status'=>$request->status,
        ]);
        if($request->status == '2'){
            $reason = $request->reason;
            // return $reason;
            Mail::to($email)->send(new RejectQuotationRequest($reason));
        }elseif($request->status == '1'){
            Mail::to($email)->send(new ApproveQuotationRequest);
        }

        $quotationRequests = QuotationRequest::with('personalInfos','files','additionalServices')
        ->where('status','0')
        ->latest()->get();
        // QuotationRequest::where('status','0')->update(['status','1']);
        // return $quotationRequests;
        return view('admin.quotationRequest.index',compact('quotationRequests'))->with(['message'=>'Quotation status has been changed Successfuly']);
    }


    public function quotationRequestCounter()
    {
        $orderCount = QuotationRequest::where('status','0')->count();
        return response()->json(['count' => $orderCount]);
    }
    public function files($id,$service){
        // return [$id,$service];
        $files = QuotationFile::where('quotation_request_id',$id)->get();
        $quotationRequest = QuotationRequest::find($id);
        return view('admin.quotationRequest.files',compact('quotationRequest','service','files'));
    }
     public function filesDownload($id){
        //    return $id;
           $path = public_path('/assets/files/' . $id);
           // return $path;
           return response()->download($path);
    }
    public function additionalServices($id){
        // return [$id];
        $data = QuotationAdditionalService::where('quotation_request_id',$id)->get();
        $quotationRequest = QuotationRequest::find($id);
        // return $data;
        return view('admin.quotationRequest.additionalServices',compact('data'));
    }
    public function additionalInformation($id){
        // return [$id];
        $data = AdditionalInformation::where('quotation_request_id',$id)->get();
        $quotationRequest = QuotationRequest::find($id);
        // return $data;
        return view('admin.quotationRequest.additionalInformation',compact('data'));
    }
}
