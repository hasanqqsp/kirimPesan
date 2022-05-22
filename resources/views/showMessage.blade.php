@extends('layouts.main')

@section('page_title')
Pesan untuk {{$message->user->name}}
@endsection

@section('main_container')

<div class="card text-left mw-10">
  				
				  <div class="card-header d-flex justify-content-between">
				  <h2 class="h3 my-2">Pesan untuk {{$message->user->name}}</h2>
				  <a href="." class="btn btn-outline-success"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
				  </div>
		 <li class="list-group-item">
							<div class="mb-1">
							  <div class="border border-2 rounded-top border-primary p-2">
								  <p>{{$message->message}}</p>
							  </div>
							  <div class="border  d-flex align-items-center justify-content-between border-2 rounded-bottom border-to p-0 border-primary p-2"> 
								 
								  <div class="timestamp">{{$message->created_at}}</div>
								  <div></div>
							</div>
						</li>
						
						<li class="list-group-item">
				     <div class="d-flex justify-content-center flex-wrap">
				     <p class="h4  flex-fill w-100 text-center">
				     	Kirim Balasan untuk pesan ini
				     </p>
				     <form method="POST" class="w-100">
						 @csrf
				     <textarea class="form-control" name="message" id="message" rows="3"></textarea>
					    <div class="my-1 flex-fill d-grid gap-2">
						  <button class="btn btn-primary w-100">Kirim</button>
						</div>
						</form>
				     </div>
				    </li>
				   
				  
					</section>
				@include('partials.alertingSystem')
				    
				    

					
						@if($message->replies->where('isHidden',0)->count())
					<section class="unpinned-message">
						<li class="list-group-item ps-3">
						<div class="mb-1 ms-3">
						<h5>Balasan</h5>
						</div>
						
						@foreach($message->replies->where('isHidden',0) as $reply)
						<li class="list-group-item ps-5">
							<div class="mb-1 ms-3">
							  <div class="border border-2 rounded-top border-primary p-2">
								  <p>{{$reply->message}}</p>
							  </div>
							  <div class="border  d-flex align-items-center justify-content-between border-2 rounded-bottom border-to p-0 border-primary p-2"> 
								  <div class="timestamp">{{$reply->created_at}}</div>
								  <div class="button-group">
							
								  
							  </div>
							</div>
						</li>
						@endforeach
					    </li>
					</section>
					@endif
			  </div>
	@endsection
	@section('add_script')
			 <script>
				const toastElList = document.querySelectorAll('.toast')
				const toastList = [...toastElList].map(toastEl => {
					const toast = new bootstrap.Toast(toastEl)
					toast.show()
					console.log(toast)
					return toast
					})

			 </script>
@endsection
