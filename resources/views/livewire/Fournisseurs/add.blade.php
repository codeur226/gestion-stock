<div class="row p-4 pt-5">

 <div class="col-md-2">
        </div>

            <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'entree d'un nouveau Fournisseur</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" wire:submit.prevent="addFournisseur()">
                <div class="card-body">

                    <div class="row">
                        <div class="form-group col-5 mr-2">
                            <label >Nom</label>
                            <input type="text" wire:model="newFournisseur.nom" class="form-control @error('newFournisseur.nom') is-invalid @enderror">

                            @error("newFournisseur.nom")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-5 mr-1">
                            <label >Prenom</label>
                            <input type="text" wire:model="newFournisseur.prenom" class="form-control @error('newFournisseur.prenom') is-invalid @enderror">

                            @error("newFournisseur.prenom")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                  <div class="row">
                  <div class="form-group col-5 mr-2">
                    <label >Email</label>
                    <input type="text" class="form-control @error('newFournisseur.email') is-invalid @enderror" wire:model="newFournisseur.email">
                    @error("newFournisseur.email")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>

                  <div class="form-group col-5 mr-1">
                    <label >Telephone1</label>
                    <input type="array" class="form-control @error('newFournisseur.telephone1') is-invalid @enderror" wire:model="newFournisseur.telephone1">
                    @error("newFournisseur.telephone1")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>
                   </div>


                </div>
                <!-- /.card-body -->

                 <div class="row mb-2">
                <div class="col-2">
                 </div>

                  <button type="submit" wire:click=" goToListFournisseur() "class="btn btn-primary col-4 mr-2">Enregistrer</button>
                  <button type="button" wire:click=" goToListFournisseur()" class="btn btn-danger col-4">Retour</button>

                   <div class="col-2">
                      </div>


                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>

           <div class="col-md-2">
                </div>


        </div>

