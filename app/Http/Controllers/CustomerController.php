<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\CreateCustomerRequest;
use DemeterChain\C;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.list', compact('customers'));
    }
    public function create()
    {
        return view('customers.create');
    }
    public function store(CreateCustomerRequest $request)
    {
        $customer = new Customer();
        $customer->number_customer = $request->input('customer_number');
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->address = $request->input('address');
        $customer->phone_number = $request->input('phone_number');
        Session::flash('success', 'them moi thanh cong');
        $customer->save();
        return redirect()->route('customers.index');
    }
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request,$id)
    {
        $customer = Customer::findOrFail($id);
        $customer->number_customer = $request->input('number_customer');
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->address = $request->input('address');
        $customer->phone_number = $request->input('phone_number');

        $customer->save();

        Session::flash('success', 'cap nhat thanh cong');

        return redirect()->route('customers.index');
    }
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        Session::flash('success', 'xoa thanh cong');

        return redirect()->route('customers.index');
    }
}
