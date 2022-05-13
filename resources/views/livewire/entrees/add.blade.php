<div class="row p-4 pt-5">
            <div class="col-md-5">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'entree d'un nouveau materiel</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" wire:submit.prevent="addEntree(1)">
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
                           <input type="text" wire:model="newEntree.nom" class="form-control @error('newEntree.nom') is-invalid @enderror">
                            @error("newEntree.nom")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                       <div class="form-group flex-grow-1">
                            <label > MATERIEL ID</label>
                            {{--<input type="text" wire:model="newEntree.materiels_id" class="form-control @error('newEntree.materiels_id') is-invalid @enderror" hidden>--}}

                          <select class="form-control @error('newEntree.materiels_id') is-invalid @enderror" wire:model="newEntree.materiels_id">
                        <option value="">---------</option>
                       @foreach ($Materiels as $Materiel)
                                            <option value="{{$Materiel->id}}">{{$Materiel->nom}}</option>
                                        @endforeach
                        </select>

                            @error("newEntree.materiels_id")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                  {{--<div class="form-group">
                    <label >Sexe</label>
                    <select class="form-control @error('newUser.sexe') is-invalid @enderror" wire:model="newUser.sexe">
                        <option value="">---------</option>
                        <option value="0">Homme</option>
                        <option value="1">Femme</option>
                    </select>
                    @error("newUser.sexe")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>--}}
                  <div class="d-flex">
                  <div class="form-group  flex-grow-1 mr-2">
                    <label >ID Fournisseur</label>
                    {{--<input type="text" class="form-control @error('newEntree.fournisseurs_id') is-invalid @enderror" wire:model="newEntree.fournisseurs_id">--}}

                    <select class="form-control @error('newEntree.fournisseurs_id') is-invalid @enderror" wire:model="newEntree.fournisseurs_id">
                        <option value="">---------</option>
                         @foreach ($Fournisseurs as $Fournisseur)
                                            <option value="{{ $Fournisseur->id}}">{{$Fournisseur->prenom}}</option>
                                        @endforeach
                    </select>
                    @error("newEntree.fournisseurs_id")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>

                  <div class="form-group flex-grow-1">
                    <label >Quantité</label>
                    <input type="array" class="form-control @error('newEntree.quantite_entree') is-invalid @enderror" wire:model="newEntree.quantite_entree">
                    @error("newEntree.quantite_entree")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>
                   </div>

                  <div class="d-flex">
                  <div class="form-group  flex-grow-1 mr-2">
                    <label >Date D'entree</label>
                    <input type="date" class="form-control @error('newEntree.date_entree') is-invalid @enderror" wire:model="newEntree.date_entree">
                    @error("'newEntree.date_entree")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>

                  {{--<div class="form-group flex-grow-1">
                    <label >STOCK</label>
                    <input type="text" class="form-control @error('newEntree.stock_initial') is-invalid @enderror" wire:model="newEntree.stock_initial">
                    @error("newEntree.stock_initial")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>
                 </div>--}}

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
                  <button type="submit" class="btn btn-primary" >Enregistrer</button>
                  <button type="button" wire:click="goToListEntree()" class="btn btn-danger">Retouner à la liste des utilisateurs</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
        </div>

