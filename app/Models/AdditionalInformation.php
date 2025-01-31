<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalInformation extends Model
{
    use HasFactory;
    Protected $guarded = [];
    public function quotationRequest(){
        return $this->belongsTo(QuotationRequest::class,'quotation_request_id');
    }

}
