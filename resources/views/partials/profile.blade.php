<h2 class="text-center underline"><u>{{$user->name}}</u></h2>
<div class="row">
    <div class="{{$user->bio ? " col-sm-6 col-md-4" :"col-12"}} p-1 mx-auto">
        <a href="{{$user->avatar == "" ? "https://www.w3schools.com/howto/img_avatar.png" : asset('storage/'.$user->avatar)}}" aria-hidden="true"
        rel="lightbox" class="img-lightbox-link d-block mx-auto">
            <img  src="{{$user->avatar == "" ? "https://www.w3schools.com/howto/img_avatar.png" : asset('storage/'.$user->avatar)}}" style="max-width:40vh" class="img-thumbnail rounded-circle mx-2 border-4 border border-primary d-block mx-auto" alt="{{$user->name}} Avatar">
        </a>
    </div>
    <div class="{{$user->bio ? "col-sm-6 col-md-8" : "col-12"}} p-0">
        @if ($user->bio)
            <div class="border border-primary rounded-1 mx-3 p-2">
                <p class="mb-0 text-center"><small class="simple-markdown">{{$user->bio}}</small></p>
            </div>
        @endif
        <div class="link-box py-2 my-1">
            <div class="mb-3 row d-flex justify-content-start mx-1">
                <div style="max-width: 32rem" class="{{$user->bio ? "" : "mx-auto"}}">
                    <label for="linkBox" class="form-label">Bagikan tautan ke teman</label>
                    <div class="input-group">
                        <input type="text" readonly class="form-control form-control-lg" id="linkBox">
                        <span class="input-group-text" onclick="copyLink()"><i class="bi bi-files fs-3"></i></span>
                    </div>
                </div>
            </div>
        </div>			    
    </div> 
</div>

<div class="button-group m-2 text-center">
    @if ($dashboardMode)
        <button class="m-1 btn btn-primary"  data-bs-toggle="modal" data-bs-target="#changeBioModal" data-bs-action="/{{$user->id}}/bio">{{$user->bio ? "Ubah" : "Tambahkan" }} bio</button>
        <button class="m-1 btn btn-warning" data-bs-toggle="modal" data-bs-target="#settingsModal" data-bs-action="/{{$user->id}}/settings">Setelan</button>
        <button class="m-1 btn btn-danger" data-bs-toggle="modal" data-bs-target="#logoutConfirmModal" data-bs-action="/{{$user->id}}/logout">Logout</button>      
    @endif
    @if ($myDashboard)
        <a href="{{$user->id}}?admin=1" class="btn btn-primary">{{$dashboardMode ? "Lihat Sebagai Orang Lain" : "Buka Dashboard"}}</a>
    @endif
</div>
<hr>