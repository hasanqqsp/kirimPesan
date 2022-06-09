<div class="modal fade" id="changeBioModal" tabindex="-1" aria-labelledby="changeBioModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 40rem">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="changeBioModalLabel">Ubah Bio</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form class="d-inline" method="POST" action="/{{$user->id}}/bio">
            @csrf @method('patch')
          <div class="form-floating">
          <textarea class="form-control" placeholder="Tulis bio singkat anda" name="bio" maxlength="500" style="height: 200px">{{$user->bio}}</textarea>
            <label>Bio</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
         
              <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan</button>
          </form>
          </div>
      </div>
    </div>
  </div>