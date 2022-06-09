<div class="modal fade" id="settingsModal" tabindex="-1" aria-labelledby="settingsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 40rem">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="settingsModalLabel">Setelan Akun</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form class="d-inline" method="POST" action="/{{$user->id}}/settings">
            @csrf @method('patch')
            <div class="form-floating my-2">
              <input type="text" class="form-control @error("name") is-invalid @enderror" placeholder="Ubah nama tampilan" name="name" value="{{old('name',$user->name)}}" maxlength="40"/> 
              <label>Nama Tampilan</label>
              @error("name")
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
              
            </div>
            <div class="form-floating my-2">
              <input type="email" class="form-control @error("email") is-invalid @enderror" placeholder="E-mail anda" name="email" value="{{old('email',$user->email)}}"/> 
              <label>E-Mail</label>
              @error("email")
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
            
              <button class="btn btn-primary my-2" type="button" data-bs-toggle="modal" data-bs-target="#changePasswordModal" data-bs-action="/{{$user->id}}/password">
                <span data-bs-dismiss="modal"><i class="bi bi-key"> Ubah Password</i></span>
              </button>
              <button class="btn btn-primary my-2" type="button" data-bs-toggle="modal" data-bs-target="#changeAvatarModal" data-bs-action="/{{$user->id}}/password">
                <span data-bs-dismiss="modal"><i class="bi bi-person-circle"> Ubah Avatar</i></span>
              </button>
            
          
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" name="defaultHide" id="autohide" @if($user->defaultHide == 1 || old("defaultHide") == "on")checked @endif >
              <label class="form-check-label" for="flexSwitchCheckDefault">Sembunyikan pesan dan balasan baru secara otomatis {{old("defaultHide")}}</label>
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

  
@include('partials.dialog.settings.changePassword')
@include('partials.dialog.settings.changeAvatar')