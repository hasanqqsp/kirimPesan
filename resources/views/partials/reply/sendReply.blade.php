<div class="reply-box border border-2 border-primary rounded-1 ms-4 mt-3 p-2">
    <h4 class="fs-6 fw-bolder">Balas pesan ini</h4>
    <form method="post">
        @csrf
        <textarea name="message" rows="1" placeholder="Ketik balasanmu disini....." class="border-primary form-control w-100" ></textarea>
        <div class="w-100 d-flex justify-content-between">
            <small class="form-text text-muted ms-2">Markdown standar dapat digunakan. Setelah mengirim pesan anda tidak dapat menghapus pesan tersebut.
            </small>
            <button type="submit" class="btn btn-primary rounded-bottom " style="border-radius: 0; font-family: 'Shadows Into Light', cursive;" >Kirim Balasan <i class="bi bi-send"></i></button>
        </div>
    </form>
</div>