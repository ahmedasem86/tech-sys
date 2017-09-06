@extends ('welcome')
@section ('content')
  <!-- Jumbotron -->

  {{-- @foreach ($product_data as $product)
    <div class="jumbotron">
      <div class="row" style="border:2px dashed black;padding:5px;">
        <div class="col-md-6" >
          <strong>Product name :</strong>  {{$product->product_name}}
          <br><strong>Product total price :</strong>  {{$product->product_total_price}}
          <br><strong>Forepart :</strong>  {{$product->forepart}}
        </div>
        <div class="col-md-6">
          <strong>Product id</strong>  {{$product->id}}
          <br><strong>No of Instalments</strong>  {{$product->no_of_instalments}}
        </div>
      </div>
    </div>
    @endforeach --}}

  <!-- Example row of columns -->
  <div class="row">
    <table border="1" style="text-align: center;border:double;border-color:grey; border-radius:12px; width:100%;" >
      <tr style="background-color:aqua; ">
        <td>Instalement id</td>
        <td>Product id</td>
        <td>Instalement cost</td>
        <td>Date of payment</td>
        <td>Is paid</td>
        <td>Claiming date</td>

      </tr>
      @foreach($instalments as $instalement)
      <tr>
        <td>{{$instalement->id}}</td>
        <td>{{$instalement->product_id}}</td>
        <td>{{$instalement->instalment_amount}}</td>
        <td>{{$instalement->payment_date}}</td>
        <td>@if ($instalement->is_paid == 0)
          <div>
            <a href="/ispaid/{{$instalement->id}}" class="btn btn-block btn-primary btn-success full-width"><span class="glyphicon glyphicon-user"></span>Pay Now</a>
          </div>
        @else {{'is paid'}}
        @endif </td>
        <td>{{$instalement->claiming_date}}</td>
      </tr>
    @endforeach

    </table>

</div> <!-- /container -->
@endsection
