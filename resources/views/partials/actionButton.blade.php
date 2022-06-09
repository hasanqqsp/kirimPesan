@if ($dashboardMode)
<div class="button-group text-nowrap text-end">
    <span data-bs-toggle="modal" data-bs-target="#deleteConfirmModal" data-bs-action="{{$user->id}}/{{$message->id}}">
        <button class="btn btn-danger"  data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus"> <i class="bi bi-trash-fill"></i></button>                                    
    </span>                              
    <form class="d-inline" method="POST" action="/{{$user->id}}/{{$message->id}}/hide">
    @method('patch')@csrf
    <button class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$message->isHidden ? "Tampilkan" : "Sembunyikan"}}"> <i class="bi bi-eye{{$message->isHidden == true ? "" : "-slash"}}"></i></button>
    </form>
    <form class="d-inline" method="POST" action="/{{$user->id}}/{{$message->id}}/pin">
    @method('patch')@csrf
    <button class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$message->isPinned ? "Lepas Sematan" : "Sematkan"}}"> <i class="bi bi-pin{{$message->isPinned == true ? "" : "-angle"}}-fill"></i></button>
    </form>
</div>
@endif