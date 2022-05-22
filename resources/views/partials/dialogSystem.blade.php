<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteConfirmModalLabel">Hapus?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <em>Yakin untuk menghapus pesan ini?</em>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <form class="d-inline" method="POST">
			@method('delete')@csrf
			<button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Hapus</button>
		</form>
		</div>
    </div>
  </div>
</div>

<script>
const deleteModal = document.getElementById('deleteConfirmModal')
	deleteModal.addEventListener('show.bs.modal', event => {
	 
	  const button = event.relatedTarget
	 
	  const actionLink = button.getAttribute('data-bs-action')
	 
	  const modalTitle = exampleModal.querySelector('.modal-title')
	  const form = exampleModal.querySelector('.modal-body form')
	  form.action = actionLink
	})

</script>
