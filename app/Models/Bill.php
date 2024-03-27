<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    //one to one , 1 fatura 1 müşteriye ait olabilir.
    public function customers(){
        return $this->belongsTo(Customer::class);
    }
}
