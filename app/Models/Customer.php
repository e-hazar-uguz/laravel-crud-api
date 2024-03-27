<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

        //doldurulmasını istediğimiz alanlar.
        protected $fillable = [
            'name',
            'type',
            'email',
            'address',
            'city',
            'state',
            'postal_code',
        ];

       //one to many relationship , bir müşterinin birden fazla faturası olabilir.
       public function bills(){
        return $this->hasMany(Bill::class);
    }
}
