@extends('layouts.main')

@section('page_title')
{{$user->name}} | Dashboard
@endsection

@section('main_container')
  				<div class="card text-left mw-100">
  				
				  <div class="card-header">
				  <h2 class="h3 my-2">Dashboard Pribadi</h2>
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
						<button class="btn btn-primary">Ubah bio</button>
						<button class="btn btn-warning">Setelan</button>
						<button class="btn btn-danger">Logout</button>
					    </div>
					  </div>
				    </li>
				    @if(session()->has('danger'))
				    <li class="list-group-item">
				     <div class="alert alert-danger" role="alert">
						{{session('danger')}}
					</div>
				    </li>
				    @endif
				    @if($user->messages->count())
				    <li class="list-group-item">
				     <div class="alert alert-primary" role="alert">
					  Anda mempunyai {{$user->messages->count()}} pesan
					</div>
				    </li>
				    
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
								  <a href="/dashboard/{{$message->user->id}}/{{$message->id}}" class="text-left">Balasan {{$message->replies->count()}} <i class="bi bi-reply-fill"></i></a>
								  <div class="timestamp">{{$message->created_at}}</div>
								  <div class="button-group">
								  <form class="d-inline" method="POST" action="{{$user->id}}/{{$message->id}}">
									@method('delete')@csrf
									<button class="btn btn-danger"> <i class="bi bi-trash-fill"></i></button>
								  </form>
								  <form class="d-inline" method="POST" action="{{$user->id}}/{{$message->id}}/hide">
									@method('patch')@csrf
									<button class="btn btn-secondary"> <i class="bi bi-eye-slash"></i></button>
								  </form>
								  <form class="d-inline" method="POST" action="{{$user->id}}/{{$message->id}}/pin">
									@method('patch')@csrf
									<button class="btn btn-success"> <i class="bi bi-pin-fill"></i></button>
								  </form>
								  
								  
							  </div>
							</div>
						</li>
						@endforeach
						</li>
				    </section>
				    @endif
				    @if($user->messages->where('isHidden',1)->count())
					<section class="hidden-message">
						<li class="list-group-item">
						<div class="mb-1">
						<h5>Pesan Disembunyikan / Perlu Tinjauan</h5>
						</div>
						
						@foreach($user->messages->where('isHidden',1) as $message)
						<li class="list-group-item">
						<div class="mb-3">
						  <div class="border border-2 rounded-top border-secondary p-2">
						<p>{{$message->message}}</p>
						</div>
						  <div class="border  d-flex  align-items-center justify-content-between border-2 rounded-bottom border-to p-0 border-secondary p-2"> 
							  <a href="/dashboard/{{$message->user->id}}/{{$message->id}}" class="text-left">Balasan {{$message->replies->count()}} <i class="bi bi-reply-fill"></i></a>
								  <div class="timestamp">{{$message->created_at}}</div>
								  <div class="button-group">
								  
								  
								  <form class="d-inline" method="POST" action="{{$user->id}}/{{$message->id}}">
									@method('delete')@csrf
									<button class="btn btn-danger"> <i class="bi bi-trash-fill"></i></button>
								  </form>
								  <form class="d-inline" method="POST" action="{{$user->id}}/{{$message->id}}/hide">
									@method('patch')@csrf
									<button class="btn btn-secondary"> <i class="bi bi-eye-fill"></i></button>
								  </form>
								  
							  
						  </div>
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
								  <a href="/dashboard/{{$message->user->id}}/{{$message->id}}" class="text-left">Balasan {{$message->replies->count()}} <i class="bi bi-reply-fill"></i></a>
								  <div class="timestamp">{{$message->created_at}}</div>
								  <div class="button-group">
								  <form class="d-inline" method="POST" action="{{$user->id}}/{{$message->id}}">
									@method('delete')@csrf
									<button class="btn btn-danger"> <i class="bi bi-trash-fill"></i></button>
								  </form>
								  <form class="d-inline" method="POST" action="{{$user->id}}/{{$message->id}}/hide">
									@method('patch')@csrf
									<button class="btn btn-secondary"> <i class="bi bi-eye-slash"></i></button>
								  </form>
								  <form class="d-inline" method="POST" action="{{$user->id}}/{{$message->id}}/pin">
									@method('patch')@csrf
									<button class="btn btn-success"> <i class="bi bi-pin-angle-fill"></i></button>
								  </form>
								  
								  
							  </div>
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
