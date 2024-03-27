<?php

namespace App\Filters;

use App\Filters\BaseApiFilter;

class CustomersFilter extends BaseApiFilter{

    protected $safeParms = [
        'name' => ['eq'],
        'type' => ['eq'],
        'email' => ['eq'],
        'address' => ['eq'],
        'city' => ['eq'],
        'state' => ['eq'],
        'postal_code'  => ['eq', 'gt', 'lt']
    ];

    //veritabanı nesnesine dönüştürme
    // protected $columnMap = [
    //     'postalCode' => 'postal_code'
    // ];

    //veritabanında operatorlar için dönüşüm
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
    ];

}
