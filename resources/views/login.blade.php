@extends('layouts.36rem')
@section('page_title')
Masuk kirimPesan
@endsection

@section('header_text')
Masuk ke dashboard pribadimu dan  lihat pesan anonim dari teman.
@endsection

@section('main_container')
		@error('credentials')
		<div class="alert alert-danger my-2">
			{{$message}}
		</div>	
		@enderror
		
		
		 	<form method="post">
				 @csrf		    
				<div class="my-3 form-floating">
					<input type="email" class="form-control @error("email") is-invalid @enderror" id="email" name="email" value="{{old("email")}}" placeholder="email">
					<label for="email" class="form-label">Alamat Email</label>
					@error("email")
						<div class="invalid-feedback">
							{{$message}}
						</div>
					@enderror
				</div>
				<div class="my-3 form-floating">
					<input type="password" class="form-control @error("password") is-invalid @enderror" id="password" name="password" placeholder="password">
					<label for="password" class="form-label">Kata Sandi</label>
					@error("password")
						<div class="invalid-feedback">
							{{$message}}
						</div>
					@enderror
				</div>
				    <div class="my-3 d-grid gap-2">
					  <button class="btn btn-primary btn-lg">Login</button>
					</div>			   
				</form>
				
				<div class="mt-2 text-center text-muted">
					<em>Belum memiliki akun? <a href="/signup0">Daftar disini</a></em>
				</div>
	@endsection
