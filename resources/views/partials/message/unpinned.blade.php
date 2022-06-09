<div class="unpinned-message border border-2 border-primary rounded p-2 mb-1 mt-3">
    <h5 >Pesan</h5>
    @foreach($user->messages->where('isHidden',0)->where('isPinned',0)->sortByDesc("created_at") as $message)
    <div class="border rounded-top border-primary p-2 mt-3 mb-1">
        @include('partials.message.text')
        @if ($message->replies->where("isHidden",0)->count())
        <hr class="bg-primary color-primary mb-1">
        @include('partials.message.replyBox')
        @endif
        @include('partials.message.footer')
    </div>
    @endforeach
</div>