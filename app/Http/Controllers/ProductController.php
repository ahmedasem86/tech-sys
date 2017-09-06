<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Product;
use App\Instalment;

class ProductController extends Controller
{
  public function index () {
      $products = Product::all();
      return view('products.home',compact('products'));
  }
  public function show($id) {
      $product_instalement = Instalment::where('product_id' ,$id)->get();
      $product_data = Product::where('id' ,$id)->get();
       return view('products.single',compact('product_instalement','product_data'));
  }
  public function create () {
    $customers = Customer::all();
      return view('products.create',compact('customers'));
  }
  public function preview(Request $request){
    $request->session()->put('name', request('name'));
    $request->session()->put('customer_id', request('id_number'));
    $request->session()->put('total_price', request('total_price'));
    $request->session()->put('forepart', request('forepart'));
    $request->session()->put('no_of_installements', request('no_of_installements'));
    $request->session()->put('notes', request('notes'));
    $user_id = request('id_number');
    $customer_pro = Product::where('customer_id',$user_id)->get();
    $customer_data = Customer::where('id_number',$user_id)->get();
    $new_product = [];
    $new_product['name']= request('name');
    $new_product['total_price']  = request('total_price');
    $new_product['forepart'] = request('forepart');
    $new_product['no_of_installemnts'] = request('no_of_installements');
    $new_product['notes'] = request('notes');
    $new_product['remainig_price'] = $new_product['total_price'] - $new_product['forepart'];
    $new_product['instalment_quantity'] = $new_product['remainig_price'] / $new_product['no_of_installemnts'] ;

         return view('products.preview',compact('customer_pro' , 'new_product' , 'customer_data'));

        }
  public function store(Request $request){

    $product_name = $request->session()->get('name');
    $customer_id = $request->session()->get('customer_id');
    $product_total_price = $request->session()->get('total_price');
    $forepart = $request->session()->get('forepart');
    $no_of_instalements = $request->session()->get('no_of_installements');
    $notes = $request->session()->get('notes');
    // $this->validate(request(),[
    //   'name' => 'required|max:255',
    //   'email' => 'required',
    //   'id_number' => 'required',
    //   'age' => 'max:2',
    // ]);
    Product::create([
      'customer_id' => $customer_id,
      'product_name' => $product_name,
      'product_total_price' => $product_total_price,
      'forepart' => $forepart,
      'no_of_instalments' => $no_of_instalements,
      'notes' => $notes,
    ]);
    $product= Product::orderBy('created_at', 'desc')->first();
    $remaining_cost = $product_total_price -  $forepart ;
    $instalment_cost = $remaining_cost / $no_of_instalements;
    $today = date ("Y-m-d");
    for($i=0;$i<$no_of_instalements;$i++)
    {
      $today = date ("Y-m-d", strtotime ($today ."+31 days"));
      Instalment::create([
        'product_id' => $product->id,
        'instalment_amount' => $instalment_cost,
        'is_paid' => 0,
        'payment_date' => $today,
      ]);
    }
      $request->session()->flush();
      return redirect('/product/'.$product->id);

        }
}
