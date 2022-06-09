<div class="ms-2 reply-box px-2">
    <h6>Balasan</h6>

    <div class="border rounded bg-secondary p-2 mb-1 bg-opacity-25 fw-bold">
        <span class="simple-markdown">{{ substr($message->replies->sortByDesc("created_at")->first()->message, 0, 150)}}</span>    
    </div>
</div>              