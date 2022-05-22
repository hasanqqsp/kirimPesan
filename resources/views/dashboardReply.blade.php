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
								  <div class="button-group">
								  <form class="d-inline" method="POST" action="{{$message->user->id}}/{{$message->id}}">
									@method('delete')@csrf
									<button class="btn btn-danger"> <i class="bi bi-trash-fill"></i></button>
								  </form>
								  <form class="d-inline" method="POST" action="{{$message->user->id}}/{{$message->id}}/hide">
									@method('patch')@csrf
									<button class="btn btn-secondary"> <i class="bi bi-eye-slash"></i></button>
								  </form>
								  <form class="d-inline" method="POST" action="{{$message->user->id}}/{{$message->id}}/pin">
									@method('patch')@csrf
									<button class="btn btn-success"> <i class="bi bi-pin-fill"></i></button>
								  </form>
								  
								  
							  </div>
							</div>
						</li>
						
				    
				    @if($message->replies->where('isHidden',1)->count())
					<section class="hidden-message">
						<li class="list-group-item ps-3">
						<div class="mb-1 ms-3">
						<h5>Balasan Tersembunyi</h5>
						</div>
						
						@foreach($message->replies->where('isHidden',1) as $reply)
						<li class="list-group-item ps-5">
							<div class="mb-1 ms-3">
							  <div class="border border-2 rounded-top border-secondary p-2">
								  <p>{{$reply->message}}</p>
							  </div>
							  <div class="border  d-flex align-items-center justify-content-between border-2 rounded-bottom border-to p-0 border-secondary p-2"> 
								  <div class="timestamp">{{$reply->created_at}}</div>
								  <div class="button-group">
							
									<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal" data-bs-action="{{$message->id}}/{{$reply->id}}"> <i class="bi bi-trash-fill"></i></button>
					
								  <form class="d-inline" method="POST" action="{{$message->id}}/{{$reply->id}}/hide">
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
									<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal" data-bs-action="{{$message->id}}/{{$reply->id}}"> <i class="bi bi-trash-fill"></i></button>

								  <form class="d-inline" method="POST" action="{{$message->id}}/{{$reply->id}}/hide">
									@method('patch')@csrf
									<button class="btn btn-secondary"> <i class="bi bi-eye-slash"></i></button>
								  </form>
								 
								  
							  </div>
							</div>
						</li>
						@endforeach
					    </li>
					</section>
					@endif
			  </div>
@endsection
@include('partials.dialogSystem')
