<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="changePasswordModalLabel">Ubah Password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form class="d-inline" action="/{{$user->id}}/password" method="POST">
            @method('patch')@csrf
            <div class="form-floating my-2">
              <input type="password" class="form-control @error("old_password") is-invalid @enderror" name="old_password" maxlength="40"/> 
              <label>Password Lama</label>
              @error("old_password")
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="form-floating my-2">
              <input type="password" class="form-control @error("new_password") is-invalid @enderror" name="new_password" maxlength="40"/> 
              <label>Password</label>
            </div>
            <div class="form-floating my-2">
              <input type="password" class="form-control @error("new_password") is-invalid @enderror" name="new_password_confirmation" maxlength="40"/> 
              <label>Konfirmasi Password</label>
              @error("new_password")
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          
              <button type="submit" class="btn btn-success"><i class="bi bi-key"></i> Ubah Password</button>
        </form>
        </div>
      </div>
    </div>
  </div>