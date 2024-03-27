<?php

namespace App\Http\Controllers\Api;

use App\Models\Bill;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBillRequest;
use App\Http\Requests\UpdateBillRequest;
use App\Http\Resources\BillResource;
use App\Http\Resources\BillCollection;
use App\Filters\BillsFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Requests\StoreMultipleBillRequest;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //tüm müşteriler listesi
    public function index(Request $request)
    {
        $filter = new BillsFilter();
        $filterItems= $filter->transform($request); // tip olarak [['column','operator','value']]

        if(count($filterItems) == 0){
            return new BillCollection(Bill::paginate());
        }
        else{
            $bills  =Bill::where($filterItems)->paginate();
            return new BillCollection( $bills->appends($request->query()));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBillRequest $request)
    {
        //
    }

    public function multipleBillStore(StoreMultipleBillRequest $request)
    {
        //koleksiyona çevirip map özelliğini kullanarak ihtiyaç olan sütunları değiştiricez.
        $multiple = collect($request->all())->map(function($arr, $key){
            return Arr::except($arr, ['customerId', 'billedDate', 'paidDate']);
        });

        Bill::insert($multiple->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(Bill $bill)
    {
        return new BillResource($bill);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBillRequest $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
