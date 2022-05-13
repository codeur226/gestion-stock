<div class="row p-4 pt-5">
            <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de création d'un nouvel utilisateur</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" wire:submit.prevent="addUser()">
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
                            <input type="text" wire:model="newUser.nom" class="form-control @error('newUser.nom') is-invalid @enderror">

                            @error("newUser.nom")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label >Prenom</label>
                            <input type="text" wire:model="newUser.prenom" class="form-control @error('newUser.prenom') is-invalid @enderror">

                            @error("newUser.prenom")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                  <div class="form-group">
                    <label >Sexe</label>
                    <select class="form-control @error('newUser.sexe') is-invalid @enderror" wire:model="newUser.sexe">
                        <option value="">---------</option>
                        <option value="0">Homme</option>
                        <option value="1">Femme</option>
                    </select>
                    @error("newUser.sexe")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>

                  <div class="form-group">
                    <label >Adresse e-mail</label>
                    <input type="text" class="form-control @error('newUser.email') is-invalid @enderror" wire:model="newUser.email">
                    @error("newUser.email")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>

                   <div class="form-group">
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
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                  <button type="button" wire:click="goToListUser()" class="btn btn-danger">Retouner à la liste des utilisateurs</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
        </div>

