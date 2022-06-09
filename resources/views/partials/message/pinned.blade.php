<div class="pinned-message border border-2 border-success rounded p-2 mb-1 ">
    <h5 >Pesan Tersemat</h5>
    @foreach($user->messages->where('isHidden',0)->where('isPinned',1)->sortByDesc("created_at") as $message)
    <div class="border rounded-top border-success p-2 mt-3 mb-1">
        @include('partials.message.text')
        @if ($message->replies->where("isHidden",0)->count())
        <hr class="bg-success color-success mb-1">
        @include('partials.message.replyBox')
        @endif
        @include('partials.message.footer')
    </div>
    @endforeach
</div>