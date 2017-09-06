<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Product;
class CustomerController extends Controller
{
  public function home() {
      return view('welcome');
  }

  public function index () {
      $customers = Customer::all();
      return view('customers.home',compact('customers'));
  }

  public function create () {
      return view('customers.create');
  }

  public function store(){
        $this->validate(request(),[
          'name' => 'required|max:255',
          'email' => 'required',
          'id_number' => 'required',
          'age' => 'max:2',
        ]);
        $customer = Customer::all();
        Customer::create([
          'name' => request('name'),
          'age' => request('age'),
          'email' => request('email'),
          'id_number' => request('id_number'),
          'mobile_number' => request('mobile_number'),
          'address' => request('address'),
        ]);
        return redirect('/index');

      }

      public function show($id) {
          $customer_data = Customer::where('id' ,$id)->get();
          $cproduct = Product::where('customer_id' ,$customer_data[0]->id_number)->get();
          return view('customers.single',compact('cproduct','customer_data'));
      }
}
