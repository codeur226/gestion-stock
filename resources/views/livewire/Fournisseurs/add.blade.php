<div class="row p-4 pt-5">
            <div class="col-md-5">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'entree d'un nouveau Fournisseur</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" wire:submit.prevent="addFournisseur()">
                <div class="card-body">

                {{-- <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label >Nom</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label >Prenom</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div> --}}

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Nom</label>
                            <input type="text" wire:model="newFournisseur.nom" class="form-control @error('newFournisseur.nom') is-invalid @enderror">

                            @error("newFournisseur.nom")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label >Prenom</label>
                            <input type="text" wire:model="newFournisseur.prenom" class="form-control @error('newFournisseur.prenom') is-invalid @enderror">

                            @error("newFournisseur.prenom")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                  <div class="d-flex">
                  <div class="form-group  flex-grow-1 mr-2">
                    <label >Email</label>
                    <input type="text" class="form-control @error('newFournisseur.email') is-invalid @enderror" wire:model="newFournisseur.email">
                    @error("newFournisseur.email")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>

                  <div class="form-group flex-grow-1">
                    <label >Telephone1</label>
                    <input type="array" class="form-control @error('newFournisseur.telephone1') is-invalid @enderror" wire:model="newFournisseur.telephone1">
                    @error("newFournisseur.telephone1")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>
                   </div>

                  
                   {{--<div class="form-group">
                    <label >ID Departement</label>
                    <select class="form-control @error('newUser.departement_Id') is-invalid @enderror" wire:model="newUser.departement_Id">
                        <option value="">---------</option>
                        <option value="1">DSA</option>
                        <option value="2">DIG</option>
                        <option value="3">DME</option>
                        <option value="4">DPE</option>
                    </select>
                    @error("newUser.departement_Id")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>
                  

                  <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Telephone 1</label>
                            <input type="text" class="form-control @error('newUser.telephone1') is-invalid @enderror" wire:model="newUser.telephone1">
                            @error("newUser.telephone1")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label >Telephone 2</label>
                            <input type="text" class="form-control" wire:model="newUser.telephone2">
                        </div>
                    </div>


                  <div class="form-group">
                    <label for="exampleInputPassword1">Mot de passe</label>
                    <input type="text" class="form-control" disabled placeholder="Password" >
                  </div>--}}


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" wire:click=" goToListFournisseur() "class="btn btn-primary">Enregistrer</button>
                  <button type="button" wire:click=" goToListFournisseur()" class="btn btn-danger">Retouner à la liste des entrees</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
        </div>

