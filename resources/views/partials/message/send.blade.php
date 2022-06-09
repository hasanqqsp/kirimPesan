<div class="message-box  border border-2 border-primary rounded-1 mx-1 p-2">
    <h4>Kirim Pesan Anonim Untuk {{$user->name}}</h4>
    <form method="post">
        @csrf
        <textarea name="message" rows="3" placeholder="Ketik pesanmu disini....." class="border-primary form-control w-100" ></textarea>
        <div class="w-100 d-flex justify-content-between">
            <small class="form-text text-muted ms-2">
                Markdown standar <i>Bold, Italic, Underline, Strikethrough, Monospace</i> dapat digunakan.
                <br>
                Setelah mengirim pesan anda tidak dapat menghapus pesan tersebut.
            </small>
            <button type="submit" class="btn btn-primary rounded-bottom fs-4" style="border-radius: 0; font-family: 'Shadows Into Light', cursive;" >Kirim Pesan <i class="bi bi-send"></i></button>
        </div>
    </form>
</div>
<hr>