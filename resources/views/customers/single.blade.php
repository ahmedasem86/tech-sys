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

  <!-- Example row of columns -->
  <div class="row">
    <table border="1" style="border:double;border-color:grey; border-radius:12px; width:100%;" >
      <tr style="background-color:aqua; ">
        <td>Product id</td>
        <td>Product name</td>
        <td>Total Price</td>
        <td>Forepart</td>
      </tr>

      @foreach($cproduct as $product)
      <tr>
        <td><a href="/product/{{$product->id}}">{{$product->id}}</a></td>
        <td><a href="/product/{{$product->id}}">{{$product->product_name}}</a></td>
        <td><a href="/product/{{$product->id}}">{{$product->product_total_price}}</a></td>
        <td><a href="/product/{{$product->id}}">{{$product->forepart}}</a></td>

      </tr>
    @endforeach

    </table>

</div> <!-- /container -->
@endsection
