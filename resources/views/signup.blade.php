@extends('layouts.36rem')
@section("page_title") Buat Dashboard KirimPesan @endsection 		
@section('main_container')	
		@section("header_text")
			Buat dashboard dapatkan pesan anonim dari temanmu
		@endsection
			<main>
				<form action="" method="post">
					@csrf
					<div class="form-floating mb-3">
						<input type="text" value="{{old("name")}}" class="form-control @error("name") is-invalid @enderror" id="inputName" placeholder="Nama" name="name">
						<label for="inputName">Nama Tampilan</label>
						@error("name")
							<div class="invalid-feedback">
								{{$message}}
							</div>
						@enderror
					</div>
					<div class="form-floating mb-3">
						<input type="email" value="{{old("email")}}" class="form-control @error("email") is-invalid @enderror" placeholder="Alamat Email " id="emailInput" name="email">
						<label for="emailInput">Alamat Email</label>
						@error("email")
							<div class="invalid-feedback">
								{{$message}}
							</div>
						@enderror
					</div>
					<div class="form-floating mb-3">
						<input type="password" class="form-control @error("password") is-invalid @enderror" placeholder="Kata Sandi minimal 6 karakter" id="passwordInput" name="password">
						<label for="passwordInput">Password</label>
					</div>
					<div class="form-floating mb-3">
						<input type="password" class="form-control @error("password") is-invalid @enderror" placeholder="Kata Sandi minimal 6 karakter" id="passwordConfirmInput" name="password_confirmation">
						<label for="passwordInput">Konfirmasi Password</label>
						@error("password")
							<div class="invalid-feedback">
								{{$message}}
							</div>
						@enderror
					</div>
					<div class="d-grid gap-2">
						<button class="btn btn-primary btn-lg" type="submit">Daftar Sekarang</button>
					  </div>
				</form>
				<div class="mt-2 text-center text-muted">
					<em>Sudah memiliki akun? <a href="/login">Masuk disini</a></em>
				</div>
			</main>
	@endsection