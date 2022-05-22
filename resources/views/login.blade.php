@extends('layouts.main')
@section('page_title')
Masuk kirimPesan
@endsection

@section('header_text')
Masuk ke dashboard pribadimu dan  lihat pesan anonim dari teman.</h4>
@endsection

@section('main_container')
  				<div class="card text-left" style="width: 25rem;">
  				
				  <div class="card-header d-flex justify-content-between">
				  <h2 class="h3 my-2">Login</h2> <a class="btn btn-primary m-1" href="/">Home</a>
				  </div>
		 	<form method="post">
				  <ul class="list-group list-group-flush">
				    <li class="list-group-item">
				     <div class="alert alert-danger" role="alert">
					  A simple danger alert—check it out!
					</div>
				    </li>
				    <li class="list-group-item">
				    <div class="mb-3">
					  <label for="email" class="form-label">Alamat Email</label>
					  <input type="email" class="form-control"autofocus id="email" placeholder="name@example.com">
					</div>
				    </li>
				    
				    <li class="list-group-item">
				    <div class="mb-3">
					  <label for="password" class="form-label">Kata Sandi</label>
					  <input type="password" class="form-control" id="password" placeholder="password">
					</div>
				    </li>
				    <li class="list-group-item">
				    <div class="my-3 d-grid gap-2">
					  <button class="btn btn-primary btn-block">Login</button>
					</div>
				    </li>
				    </ul>
				 
			    </div>
			    </form>
			  </div>
	@endsection
