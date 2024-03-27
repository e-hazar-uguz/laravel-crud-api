<?php

namespace App\Http\Controllers\Api;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\CustomerCollection;
use App\Filters\CustomersFilter;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //CustomerCollection collectionı kullanarak tüm veriyi sarmal haline almış oluyoruz , dönüştürüyoruz.
    //all() yerine paginate() kullanarak sayfalara otomatik ayırabiliriz.
    public function index(Request $request)
    {

        //return new CustomerCollection(Customer::paginate());

        $filter = new CustomersFilter();
        $filterItems= $filter->transform($request); // tip olarak [['column','operator','value']]

        $includeBills = $request->query('includeBills');
        $customers = Customer::where($filterItems);

        if($includeBills){
            $customers = $customers->with('bills');
        }
        return new CustomerCollection($customers->paginate()->appends($request->query()));
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
    public function store(StoreCustomerRequest $request)
    {
         //return new CustomerResource(Customer::create($request->all()));
         $customer = Customer::create($request->all());

         if ($customer) {
             return response()->json([
                 'message' => 'Customer Created Successfully.',
                 'customer_data' => new CustomerResource($customer)
             ], 201);
         }
    }

    /**
     * Display the specified resource.
     */
    //id ile detay datasına gidilir.
    //detay datasında data kısıtlama işlemi CustomerResource ile yaplır.
    public function show(Customer $customer)
    {
        $includeBills = request()->query('includeBills');

        if ($includeBills) {
            return new CustomerResource($customer->loadMissing('bills'));
        }


        return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());

        if ($customer->wasChanged()) {
            return response()->json(['message' => 'Customer Updated Successfully'], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json([
            'message' => 'Customer Deleted Successfully'
        ], 200);
    }
}
