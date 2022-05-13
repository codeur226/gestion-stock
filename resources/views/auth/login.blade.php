@extends('layouts.auth')

@section('container')

<div class="login-box" style="width:700px;">

  <div class="row">
    <div class="col-4">
     
    </div>
    <div class="col-4">
    <center>
      <div class="">
        <img class="rounded-circle" src="{{asset('images/images.png')}}" alt="Logo" width="130" height="130">
      </div>
    <center/>
    </div>
    <div class="col-4">
     
    </div>
  </div>

  

  <div class="login-logo">
    <a href="#" style="color: #b3b6b9; font-size: 1.8em;"><b style="font-weight:bold;">GESTION STOCK</b></a>
    <div class="row">
      <div class="col-1">
      
      </div>
      <div class="col-10">
         <hr/>
      </div>

      <div class="col-1">
      
      </div>
    </div>
    
   
  </div>
  <!-- /.login-logo -->

  <div class="row">
    <div class="col-1">
     
    </div>
    <div class="col-10">


        <div class="card bg-dark">
    <div class="card-body bg-dark login-card-body">

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-3">
          <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">

          <!-- /.col -->
          <div class="col">
            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
          </div>
          <!-- /.col -->
        </div>
      </form>



    </div>
    <!-- /.login-card-body -->
  </div>
    
    </div>
    <div class="col-1">
     
    </div>
  </div>

  
</div>





@endsection
