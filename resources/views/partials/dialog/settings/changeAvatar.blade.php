<div class="modal fade" id="changeAvatarModal" tabindex="-1" aria-labelledby="changeAvatarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="max-width:64rem">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="changeAvatarModalLabel">Ubah Avatar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
          <div class="mb-3">
            <label for="input-avatar" class="form-label">Pilih File untuk Avatar</label>
            <input class="form-control mb-2" name="avatar" type="file" id="input-avatar">
                <div class="invalid-feedback input-file">
                </div>
            <div id="croppie-mount"></div>
            
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        @if ($user->avatar)
            <form class="d-inline" method="POST" action="/{{$user->id}}/avatar">
              @method('delete')@csrf
              <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Hapus Avatar</button>
            </form>
        @endif
       
        <form class="d-inline" method="POST" action="/{{$user->id}}/avatar">
          @method('patch')@csrf
      <input type="hidden" name="avatar" id="avatar-encoded">
			<button type="submit" id="actions" class="btn btn-success"><i class="bi bi-person-circle"></i> Ubah Avatar</button>
      </form>
      
      </div>
    </div>
  </div>
</div>

<script>
  let croppie = null;
  let croppieMount = document.getElementById('croppie-mount');
  let inputFile = document.getElementById('input-avatar')
  function cleanUp() {
      croppieMount.innerHTML = '';
      croppieMount.classList.remove('croppie-container');
  
      croppie = null;
      inputFile.classList.remove("is-invalid")
  }
  
  inputFile.addEventListener('change', () => {
      cleanUp();
  
      // Our input file
      let file = inputFile.files[0];
  
      let reader = new FileReader();
      reader.onloadend = function(event) {
          // Get the data url of the file
          const data = event.target.result;
  
          
            if(data.startsWith("data:image")){
              croppie = new Croppie(croppieMount, {
                url: data,
                viewport: {
                    width: 500,
                    height: 500,
                    type: 'circle'
                },
                boundary: {
                    width: 500,
                    height: 500
                },
                mouseWheelZoom: false
            });
              // Binds the image to croppie
              croppie.bind();
            }else{

              inputFile.classList.add("is-invalid")
              document.querySelector(".invalid-feedback.input-file")
                  .innerHTML =  `File gambar tidak valid`
            }
            
      }
  
      reader.readAsDataURL(file);
  })
  saveBtn = document.getElementById("actions")
  avatarInput = document.getElementById("avatar-encoded")
  saveBtn.addEventListener('click', (e) => {
    e.preventDefault()
    // Get the cropped image result from croppie
    croppie.result({
        type: 'base64',
        circle: false,
        format: 'png',
        size: 'viewport'
    }).then((imageResult) => {
        avatarInput.value = imageResult
        e.target.form.submit()
    });
});
avatarModal = document.getElementById("changeAvatarModal")
avatarModal.addEventListener("shown.bs.modal",()=>{
  if ("{{$user->avatar}}" !== "") {
    croppie = new Croppie(croppieMount, {
                url: "{{asset('storage/'.$user->avatar)}}",
                viewport: {
                    width: 500,
                    height: 500,
                    type: 'circle'
                },
                boundary: {
                    width: 500,
                    height: 500
                },
                mouseWheelZoom: false
            });
              // Binds the image to croppie
              croppie.bind()
    }
  })
  </script>