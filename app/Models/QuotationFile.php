<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationFile extends Model
{
    use HasFactory;
    Protected $guarded = [];
    public function quotationRequest(){
        return $this->belongsTo(quotationRequest::class,'quotation_request_id');
    }

}
