@extends ('welcome')
@section ('content')
  <!-- Jumbotron -->

  <div class="jumbotron">
    <h1>Instalments System</h1>
    <p class="lead">This is my system for organizing products intallements for making it easy for customers for buying whatever they want in addition to making it easy for service provider for organizing their work.</p>
  </div>

  <!-- Example row of columns -->
  <div class="row">
    <div class="container">
      <div class="row">
      <form method="post" action="/product/preview" class="container col-md-6">
        {{ csrf_field() }}
        <h1 align="center">Add Product</h1>
        @if(count($errors))
          <div class="form-group alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
                <li> {{$error}} </li>
              @endforeach
            <ul>
          </div>
        @endif
        <div class="form-group ">
          <label for="name"><strong>Customer User Name</strong></label>
          <select class="form-control" name="id_number" data-style="btn-primary" onChange="document.getElementById('selectedValue').innerHTML = '<strong> Customer id : </strong>'+this.value;">
            @foreach($customers as $customer)
              <option value="{{$customer->id_number}}">{{$customer->user_name}}</option>
            @endforeach
          </select>
          <div >
            <p>  <span id="selectedValue"> </span></p>
          </div>
        </div>


        <div class="form-group">
          <label for="name"><strong>Product Name</strong></label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
        </div>

        <div class="form-group">
          <label for="total price"><strong>Total Price</strong> <small>in EGP</small></label>
          <input type="number" class="form-control" id="exampleFormControlInput2" name="total_price">
        </div>
        <div class="form-group">
          <label for="forepart"><strong>Forepart</strong> <small>in EGP</small></label>
          <input type="number" class="form-control" id="exampleFormControlInput3" name="forepart">
        </div>
        <div class="form-group">
          <label for="no_of_installements"><strong>No. of installements</strong></label>
          <input type="number" class="form-control" id="exampleFormControlInput4" name="no_of_installements">
        </div>
        <div class="form-group">
          <label for="notes"><strong>Notes</strong></label>
          <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="notes"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Product</button>
      </form>
    </div>
    </div>

</div> <!-- /container -->

@endsection
