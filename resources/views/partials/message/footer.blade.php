<hr @class([
    "bg-primary" => !$message->isHidden && !$message->isPinned,
    "color-primary" => !$message->isHidden && !$message->isPinned,
    "bg-success" => !$message->isHidden && $message->isPinned,
    "color-success" => !$message->isHidden && $message->isPinned,
    "bg-secondary" => $message->isHidden && !$message->isPinned,
    "color-secondary" => $message->isHidden && !$message->isPinned,
    "mt-3 mb-1" => true
    ]) >
        <div class="w-100 d-flex justify-content-between align-items-center">
            <a href="{{$user->id}}/{{$message->id}}" class="text-start">{{$message->replies->count()-1 > 0 ? "Lihat ".($message->replies->count()-1 - ($dashboardMode ? 0 : $message->replies->where('isHidden',1)->count()))." Balasan lainnya" : "Balas / Lihat Detail" }}</a>
            @include('partials.actionButton') 
        </div>