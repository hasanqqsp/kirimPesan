<div class="mt-2">
    @if ($message->replies->where('isHidden',0)->count())
    <div class="reply-message border border-2 border-primary rounded p-2 ms-4 mb-1 mt-3">
        <h5 class="fw-bolder fs-6">Balasan</h5>          
        @foreach($message->replies->where('isHidden',0)->sortByDesc("created_at") as $reply)
        <div class="rounded{{$dashboardMode ? "-top" : ""}} bg-secondary bg-opacity-50 p-2 mt-3">
            <div class="messageBox simple-markdown fw-bolder">{{$reply->message}}</div>
        </div>
        @if ($dashboardMode)
        <div class="rounded-bottom border-secondary border-top-0 border p-1 w-100 mb-1 d-flex justify-content-end align-items-center">
            <div class="button-group text-nowrap text-end">
                <span data-bs-toggle="modal" data-bs-target="#deleteConfirmModal" data-bs-action="/{{$user->id}}/{{$message->id}}/{{$reply->id}}">
                    <button class="btn btn-danger"  data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus"> <i class="bi bi-trash-fill"></i></button>                                    
                </span>                              
            <form class="d-inline" method="POST" action="/{{$user->id}}/{{$message->id}}/{{$reply->id}}/hide">
                @method('patch')@csrf
                <button class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$reply->isHidden ? "Tampilkan" : "Sembunyikan"}}"> <i class="bi bi-eye{{$reply->isHidden == true ? "" : "-slash"}}"></i></button>
                </form> 
            </div>
        </div>
        @endif
        @endforeach   
    </div>
    @else
    <div class="alert alert-primary ms-3" role="alert">
        Tidak ada balasan untuk ditampilkan
    </div>
    @endif
   @if($message->replies->where('isHidden',1)->count() && $dashboardMode)
    <div class="reply-message border border-2 border-secondary rounded p-2 ms-4 mb-1 mt-3">
        <h5 class="fw-bolder fs-6">Balasan Disembunyikan</h5>          
        @foreach($message->replies->where('isHidden',1) as $reply)
        <div class="rounded-top bg-secondary bg-opacity-50 p-2 mt-3">
            <div class="messageBox simple-markdown fw-bolder">{{$reply->message}}</div>
        </div>
        <div class="rounded-bottom  border-secondary border-top-0 border p-1 w-100 mb-1 d-flex justify-content-end align-items-center">
            <div class="button-group text-nowrap text-end">
                <span data-bs-toggle="modal" data-bs-target="#deleteConfirmModal" data-bs-action="/{{$user->id}}/{{$message->id}}/{{$reply->id}}">
                    <button class="btn btn-danger"  data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus"> <i class="bi bi-trash-fill"></i></button>                                    
                </span>                              
                <form class="d-inline" method="POST" action="/{{$user->id}}/{{$message->id}}/{{$reply->id}}/hide">
                @method('patch')@csrf
                <button class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$reply->isHidden ? "Tampilkan" : "Sembunyikan"}}"> <i class="bi bi-eye{{$reply->isHidden == true ? "" : "-slash"}}"></i></button>
                </form> 
            </div>
        </div>
        @endforeach   
    </div>
</div>
@endif
</div>