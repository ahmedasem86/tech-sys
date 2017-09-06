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
      <form method="post" action="/customer/store" class="container col-md-6">
        {{ csrf_field() }}
        <h1 align="center">Add Customer</h1>
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
          <label for="name"><strong>Name</strong></label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
        </div>
        <div class="form-group">
          <label for="email"><strong>E-mail</strong></label>
          <input type="email" class="form-control" id="exampleFormControlInput2" name="email">
        </div>
        <div class="form-group">
          <label for="age"><strong>Age</strong></label>
          <input type="number" class="form-control" id="exampleFormControlInput3" name="age">
        </div>
        <div class="form-group">
          <label for="id_number"><strong>ID Number</strong></label>
          <input type="number" class="form-control" id="exampleFormControlInput4" name="id_number">
        </div>
        <div class="form-group">
          <label for="id_number"><strong>Mobile number</strong></label>
          <input type="number" class="form-control" id="exampleFormControlInput4" name="mobile_number">
        </div>
        <div class="form-group">
          <label for="address"><strong>Address</strong></label>
          <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="address"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add customer</button>
      </form>
    </div>
</div> <!-- /container -->
@endsection
