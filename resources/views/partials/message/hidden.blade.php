<div class="pinned-message border border-2 border-secondary rounded p-2 mt-3 mb-2 ">
    <h5>Pesan Disembunyikan</h5>
    @foreach($user->messages->where('isHidden',1)->sortByDesc("created_at") as $message)
    <div class="border rounded-top border-secondary p-2 mt-3 mb-1">
        @include('partials.message.text')
        @if ($message->replies->count())
        <hr class="bg-secondary color-secondary mb-1">
        @include('partials.message.replyBox')
        @endif
        @include('partials.message.footer')
    </div>
    @endforeach
</div>