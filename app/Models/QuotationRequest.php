<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationRequest extends Model
{
    use HasFactory;
    Protected $guarded = [];
    public function personalInfos(){
        return $this->hasMany(QuotationPersonalInfo::class,'quotation_request_id');
    }
    public function files(){
        return $this->hasMany(QuotationFile::class,'quotation_request_id');
    }
    public function additionalServices(){
        return $this->hasMany(QuotationAdditionalService::class,'quotation_request_id');
    }
    public function additionalInfo(){
        return $this->hasMany(AdditionalInformation::class,'quotation_request_id');
    }
}
