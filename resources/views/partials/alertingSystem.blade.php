

<div style="z-index: 99" class="toast-container position-fixed top-0 end-0 p-3">
  @if(session()->has('primary'))
  <div class="toast align-items-center text-bg-primary border-0 bg-primary" role="alert" aria-live="assertive" aria-atomic="true">
	<div class="d-flex">
		<div class="toast-body">
			{{session('primary')}}
		</div>
		<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
  @endif
  
  @if(session()->has('success'))
	<div class="toast align-items-center text-bg-success border-0 bg-success" role="alert" aria-live="assertive" aria-atomic="true">
	  <div class="d-flex">
		<div class="toast-body">
		  {{session('success')}}
		</div>
		<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
	  </div>
	</div>
  @endif
  
  @if(session()->has('danger'))
  <div class="toast align-items-center text-bg-danger border-0 bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
      {{session('danger')}}
    </div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>
  @endif
  
  @if(session()->has('warning'))
<div class="toast align-items-center text-bg-warning border-0 bg-warning" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
      {{session('warning')}}
    </div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>
</div>
@endif
</div>
<div class="position-fixed bottom-0 start-50">
  <div class="position-relative translate-middle toast align-items-center text-white bg-dark border-0" style="width:10rem" id="toastCopy" role="alert" aria-live="assertive" data-bs-delay="3000" aria-atomic="true">
      <div class="d-flex">
      <div class="toast-body text-center flex-fill">
          Tautan Disalin
      </div>
      </div>
  </div>
</div>
