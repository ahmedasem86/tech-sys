@extends ('welcome')
@section ('content')
  <!-- Jumbotron -->

  <div class="jumbotron">
    <h1>Instalments System</h1>
    <p class="lead">This is my system for organizing products intallements for making it easy for customers for buying whatever they want in addition to making it easy for service provider for organizing their work.</p>
    </div>

  <!-- Example row of columns -->
  <div class="row">
    <table border="1" style="border:double;border-color:grey; border-radius:12px; width:100%;" >
      <tr style="background-color:aqua; ">
        <td>Customer id</td>
        <td>customer name</td>
        <td>customer age</td>
        <td>customer address</td>
      </tr>

      @foreach($customers as $customer)
      <tr>
        <td>    <a href="customer/{{$customer->id}}">{{$customer->id}}</a></td>
        <td>    <a href="customer/{{$customer->id}}">{{$customer->name}}</a></td>
        <td>    <a href="customer/{{$customer->id}}">{{$customer->age}}</a></td>
        <td>    <a href="customer/{{$customer->id}}">{{$customer->address}}</a></td>
      </tr>
    @endforeach

    </table>

</div> <!-- /container -->
@endsection
