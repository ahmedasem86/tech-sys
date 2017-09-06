<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instalment;

class InstalmentController extends Controller
{
  public function ispaid ($id) {
    $instalment = Instalment::where('id', $id)->get();
     Instalment::where('id', $id)->update(array('is_paid' => '1'));
     Instalment::where('id', $id)->update(array('claiming_date' => date('Y-m-d')));
    return redirect('/product/'.$instalment[0]->product_id);
  }
  public function claim () {
    $instalments = Instalment::where('payment_date', '>', date('Y-m-d'))->where('is_paid', 0)->get();
    return view('products.claim',compact('instalments'));

  }
}
