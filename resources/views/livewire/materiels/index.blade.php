<div>
   @if ($editMateriel != [])
    @include("livewire.materiels.edit")
   @endif 

   @include("livewire.materiels.add")

    @include("livewire.materiels.liste")

    @include("livewire.materiels.consulter")


</div>



<script>
    window.addEventListener("showSuccessMessage", event=>{
        Swal.fire({
                position: 'top-end',
                icon: 'success',
                toast:true,
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 5000
                }
            )
    })
</script>

<script>
    window.addEventListener("showConfirmMessage", event=>{
       Swal.fire({
        title: event.detail.message.title,
        text: event.detail.message.text,
        icon: event.detail.message.type,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuer',
        cancelButtonText: 'Annuler'
        }).then((result) => {
        if (result.isConfirmed) {
            const materiels_id = event.detail.message.data.materiels_id
            if(materiels_id){
                @this.deleteMateriel(materiels_id)
            }
        }
        })
    })

</script>

<script>
    window.addEventListener("showModal", event=>{
       $("#modalAdd").modal({
           "show": true,
           "backdrop": "static"
       })
    })
    window.addEventListener("closeModal", event=>{
       $("#modalAdd").modal("hide")
    })
   window.addEventListener("showModalConsulter", event=>{
       $("#modalConsulter").modal({
           "show": true,
           "backdrop": "static"
       })
    })
    window.addEventListener("closeModalConsulter", event=>{
       $("#modalConsulter").modal("hide")
    })
    window.addEventListener("showEditModal", event=>{
       $("#editModal").modal({
           "show": true,
           "backdrop": "static"
       })
    })
    window.addEventListener("closeEditModal", event=>{
       $("#editModal").modal("hide")
    })

</script>