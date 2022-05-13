<div class="row p-4 pt-5">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'édition d'entree</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" wire:submit.prevent="updateFournisseur()" method="POST">
            <div class="card-body">

                       <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Nom</label>
                            <input type="text" wire:model="editFournisseur.nom" class="form-control @error('editFournisseur.nom') is-invalid @enderror">

                            @error("editFournisseur.nom")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label >Prenom</label>
                            <input type="text" wire:model="editFournisseur.prenom" class="form-control @error('editFournisseur.prenom') is-invalid @enderror">

                            @error("editFournisseur.prenom")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        </div>

                  <div class="d-flex">
                  <div class="form-group  flex-grow-1 mr-2">
                    <label >Email</label>
                    <input type="text" class="form-control @error('editFournisseur.email') is-invalid @enderror" wire:model="editFournisseur.email">
                    @error("editFournisseur.email")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>

                  <div class="form-group flex-grow-1">
                    <label >Telephone1</label>
                    <input type="array" class="form-control @error('editFournisseur.telephone1') is-invalid @enderror" wire:model="editFournisseur.telephone1">
                    @error("editFournisseur.telephone1")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>
              </div>


            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" wire:click="goToListFournisseur()"  class="btn btn-primary">Appliquer les modifications</button>
                <button type="button" wire:click="goToListFournisseur()" class="btn btn-danger">Retouner à la liste des entrees</button>
            </div>
            </form>
        </div>
        <!-- /.card -->

    </div>

</div>
