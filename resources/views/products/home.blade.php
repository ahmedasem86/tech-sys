@extends ('welcome')
@section ('content')
  <!-- Jumbotron -->

  <div class="jumbotron">
    <h1>Instalments System</h1>
    <p class="lead">This is my system for organizing products intallements for making it easy for customers for buying whatever they want in addition to making it easy for service provider for organizing their work.</p>
    </div>

  <!-- Example row of columns -->
  <div class="row">
    <table border="1" style=" text-align:center; border:double;border-color:grey; border-radius:12px; width:100%;" >
      <tr style="background-color:aqua; ">
        <td>Product id</td>
        <td>Product name</td>
        <td>Total price</td>
        <td>Forepart</td>
        <td>Total Remaining</td>
      </tr>

      @foreach($products as $product)
      <tr>
        <td>    <a href="product/{{$product->id}}">{{$product->id}}</a></td>
        <td>    <a href="product/{{$product->id}}">{{$product->product_name}}</a></td>
        <td>    <a href="product/{{$product->id}}">{{$product->product_total_price}}</a></td>
        <td>    <a href="product/{{$product->id}}">{{$product->forepart}}</a></td>
      </tr>
    @endforeach

    </table>

</div> <!-- /container -->
@endsection
