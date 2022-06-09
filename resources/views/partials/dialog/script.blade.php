<script>
    if(document.getElementById('deleteConfirmModal')){
    const deleteModal = document.getElementById('deleteConfirmModal')
        deleteModal.addEventListener('show.bs.modal', event => {
          const button = event.relatedTarget
          const actionLink = button.getAttribute('data-bs-action')
          const form = deleteModal.querySelector('.modal-footer form')
          form.action = actionLink
        })
    }
</script>
<script>
  const toastElList = document.querySelectorAll('.toast')
  const toastList = [...toastElList].map(toastEl => {
    const toast = new bootstrap.Toast(toastEl)
    if(toastEl.id != "toastCopy"){
        toast.show()
    }
    return toast
  })

  const linkBox = document.getElementById('linkBox')
  linkBox.value = location.origin + location.pathname
  const copyLink = () => {
      navigator.clipboard.writeText(location.origin + location.pathname);
      const copyToast = document.getElementById('toastCopy')
      bootstrap.Toast.getInstance(copyToast).show()
  }
 </script>

 <script>
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
 </script>

 <script>
   imgLightbox("img-lightbox-link");
 </script>