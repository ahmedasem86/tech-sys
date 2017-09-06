@extends ('welcome')
@section ('content')
  <!-- Jumbotron -->
@foreach ($customer_data as $customer)
  <div class="jumbotron">
    <div class="row" style="border:2px dashed black;padding:5px;">
      <div class="col-md-6" >
        <strong>User name :</strong>  {{$customer->user_name}}
        <br><strong>Cusomer full name :</strong>  {{$customer->name}}
        <br><strong>Cusomer address :</strong>  {{$customer->address}}
      </div>
      <div class="col-md-6">
        <strong>Cusomer id :</strong>  {{$customer->id_number}}
        <br><strong>Cusomer age :</strong>  {{$customer->age}}
        <br><strong>Customer mobile_number :</strong>  {{$customer->mobile_number}}

      </div>
    </div>
  </div>
  @endforeach
  <div class="row">
    <table border="1" style="border:double;border-color:grey;text-align:center; border-radius:12px; width:100%; margin-bottom:5px;" >
      <tr>
        <td class="text-center"colspan="5"><h1>New Product</h1></td>
      </tr>
      <tr style="background-color:#28a745; ">
        <td>Product name</td>
        <td>Product total price</td>
        <td>Forepart</td>
        <td>Remaining Cost</td>
        <td>No of installements</td>
      </tr>
      <tr>
        <td>{{$new_product['name']}}</td>
        <td>{{$new_product['total_price']}}</td>
        <td>{{$new_product['forepart']}}</td>
        <td>{{$new_product['remainig_price']}}</td>
        <td>{{$new_product['no_of_installemnts']}}</td>


      </tr>
      <tr>
        <td class="text-center"colspan="5"><h1>Instalments</h1></td>
      </tr>
      <tr style="background-color:#28a745; ">
        <td>Instalment no</td>
        <td>Claiming date</td>
        <td>Instalment cost</td>
        <td>Is paid</td>
        <td>Date of payment</td>
      </tr>
        <?php
            $today = date ("Y-m-d");
           for ($i=1 ; $i<=$new_product['no_of_installemnts']; $i++){
             $today = date ("Y-m-d", strtotime ($today ."+31 days"))
             ?>
            <tr>
              <td>{{$i}}</td>
              <td>{{$today}}</td>
              <td>{{$new_product['instalment_quantity']}}</td>
              <td>Not Paid</td>
              <td>Not Paid</td>

          </tr>
        <?php

          }
        ?>
    </table>
    <div class="col-md-12">
      <a href="/products/store" class="btn btn-block btn-primary btn-success full-width"><span class="glyphicon glyphicon-user"></span> Approve this product</a>
    </div>

</div> <!-- /container -->
  <!-- Example row of columns -->
  <div class="row">
    <table border="1" style="border:double;border-color:grey; border-radius:12px; width:100%; margin-top:10px;" >
      <tr>
        <td class="text-center"colspan="4"><h1>Already sold products for this customer</h1></td>
      </tr>
      <tr style="background-color:#28a745; ">
        <td>Product name</td>
        <td>Product total price</td>
        <td>Selling date</td>
        <td>No of installements</td>
      </tr>
      @foreach($customer_pro as $product)
      <tr>
        <td>    <a href="/product/{{$product->id}}">{{$product->product_name}}</a></td>
        <td>    <a href="/product/{{$product->id}}">{{$product->product_total_price}}</a></td>
        <td>    <a href="/product/{{$product->id}}">{{$product->created_at}}</a></td>
        <td>    <a href="/product/{{$product->id}}">{{$product->no_of_instalments}}</a></td>
      </tr>
    @endforeach

    </table>

</div> <!-- /container -->
@endsection
