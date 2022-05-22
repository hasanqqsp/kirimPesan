@extends('layouts.main')
@section('page_title')
Daftar kirimPesan
@endsection

@section('header_text')
Buat dashboard pribadimu dan  biarkan temanmu mengirimkan pesan secara anonim.</h4>
@endsection

@section('main_container')
  				<div class="card text-left" style="width: 25rem;">
  				
				  <div class="card-header">
				  <h2 class="h3 my-2">Buat Akun</h2>
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
					  <label for="name" class="form-label">Nama Tampilan</label>
					  <input type="text" class="form-control"autofocus id="name" placeholder="Nama akan ditampilkan ke temanmu">
					</div>
				    </li>
				    
				    <li class="list-group-item">
				    <div class="mb-3">
					  <label for="email" class="form-label">Alamat Email</label>
					  <input type="email" class="form-control" id="email" placeholder="name@example.com">
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
					  <button class="btn btn-primary btn-block">Buat Akun</button>
					</div>
				    </li>
				    </ul>
				 
			    </div>
			    </form>
			  </div>
  			@endsection
