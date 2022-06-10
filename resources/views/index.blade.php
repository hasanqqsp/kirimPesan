@extends('layouts.36rem')

@section('page_title')
kirimPesan : send message anonymously
@endsection

@section('main_container')
	<div class="container">
		<h4 class="text-center">Buat dashboard pribadimu dan biarkan temanmu mengirimkan pesan secara anonim.</h4>
		<div class="alert alert-info" role="alert">
			<ul>
				<li>Aplikasi ini terinspirasi dari <a href="https://secreto.site" target="_blank">secreto.site</a></li>
				<li>Kode sumber aplikasi ini dapat dilihat di <a href="https://github.com/hasanqqsp/kirimPesan" target="_blank">github.com/hasanqqsp</a><b></b></li>
			</ul>
		</div>
		<div class="d-grid gap-2">
			<a href="signup" class="btn btn-primary btn-lg">Buat Dashboard</a>
		</div>
		<p class="m-1 text-center">atau</p>
		<div class="d-grid gap-2">
			<a href="login" class="btn btn-success btn-lg">Login</a>
		</div>
    </div>
@endsection
