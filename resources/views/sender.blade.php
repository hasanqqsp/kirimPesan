@extends('layouts.main')
@section('page_title')
Kirim Pesan untuk {{$user->name}}
@endsection

@section('main_container')
  				<div class="card text-left mw-100">
  				
				  <div class="card-header">
				  <h2 class="h3 my-2">Kirim Pesan</h2>
				  </div>
		 	<form method="post">
				  <ul class="list-group list-group-flush">
				    <li class="list-group-item">
				     <div class="row">
					    <div class="col-6 col-md-3"> 
					      <img src="https://www.w3schools.com/howto/img_avatar.png" class="img-thumbnail rounded-circle" alt="...">
					    </div>
					    <div class="col-md-9">
					     <h4>{{$user->name}}</h4>
					     <p>
							{{$user->bio}}
							</p>					    
						</div>
					  </div>
				    </li>
				    <li class="list-group-item">
				     <div class="d-flex justify-content-center flex-wrap">
				     <p class="h4  flex-fill w-100 text-center">
				     	Kirim Pesan Anonim Untuk {{$user->name}}
				     </p>
				     <form method="POST" >
						 @csrf
				     <textarea class="form-control" name="message" id="message" rows="3"></textarea>
					    <div class="my-1 flex-fill d-grid gap-2">
						  <button class="btn btn-primary w-100">Kirim</button>
						</div>
						</form>
				     </div>
				    </li>
				    @if(session()->has('danger'))
				    <li class="list-group-item">
				     <div class="alert alert-danger" role="alert">
						{{session('danger')}}
					</div>
				    </li>
				    @endif
				    @if(session()->has('success'))
				    <li class="list-group-item">
				     <div class="alert alert-success" role="alert">
						{{session('success')}}
					</div>
				    </li>
				    @endif
				    @if($user->messages->where('isHidden',0)->count())
				    
				    @if($user->messages->where('isHidden',0)->where('isPinned',1)->count())
				    <section class="pinned-message">
						<li class="list-group-item">
							<div class="mb-1">
								<h5>Pesan Tersemat</h5>
							</div>
						@foreach($user->messages->where('isHidden',0)->where('isPinned',1) as $message)
						<li class="list-group-item">
							<div class="mb-1">
							  <div class="border border-2 rounded-top border-primary p-2">
								  <p>{{$message->message}}</p>
							  </div>
							  <div class="border  d-flex align-items-center justify-content-between border-2 rounded-bottom border-to p-0 border-primary p-2"> 
								  <a href="{{$user->id}}/{{$message->id}}" class="text-left">Balasan {{$message->replies->count()}} <i class="bi bi-reply-fill"></i></a>
								  <div class="timestamp">{{$message->created_at}}</div>
								 
							</div>
						</li>
						@endforeach
						</li>
				    </section>
				    @endif
				   
				    @if($user->messages->where('isHidden',0)->where('isPinned',0)->count())
					<section class="unpinned-message">
						<li class="list-group-item">
						<div class="mb-1">
						<h5>Pesan</h5>
						</div>
						
						@foreach($user->messages->where('isHidden',0)->where('isPinned',0) as $message)
						<li class="list-group-item">
							<div class="mb-1">
							  <div class="border border-2 rounded-top border-primary p-2">
								  <p>{{$message->message}}</p>
							  </div>
							  <div class="border  d-flex align-items-center justify-content-between border-2 rounded-bottom border-to p-0 border-primary p-2"> 
								  <a href="{{$user->id}}/{{$message->id}}" class="text-left">Balasan {{$message->replies->count()}} <i class="bi bi-reply-fill"></i></a>
								  <div class="timestamp">{{$message->created_at}}</div>
								  
							</div>
						</li>
						@endforeach
					    </li>
					</section>
					@endif
					@else
						<li class="list-group-item">
							<div class="mb-1">
							  <div class="alert alert-primary" role="alert">
								  {{$user->name}} belum menerima pesan.
								</div>
							</div>
						</li>
					    </li>
					
				    @endif
				    </ul>
				 
			    </div>
			    </form>
			  </div>
  			@endsection
