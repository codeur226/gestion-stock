<div class="row p-4 pt-5">

            <div class="col-md-2">
                    </div>

            <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'entree d'un nouveau materiel</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" wire:submit.prevent="addEntree(1)">
                <div class="card-body">

              

                    <div class="row">
                        <div class="form-group  col-5 mr-2">
                           <label >Nom Entrée</label>
                           <input type="text" wire:model="newEntree.nom" class="form-control @error('newEntree.nom') is-invalid @enderror">
                            @error("newEntree.nom")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                       <div class="form-group col-5 mr-1">
                            <label >Désignation</label>
                            {{--<input type="text" wire:model="newEntree.materiels_id" class="form-control @error('newEntree.materiels_id') is-invalid @enderror" hidden>--}}

                          <select class="form-control @error('newEntree.materiels_id') is-invalid @enderror" wire:model="newEntree.materiels_id">
                        <option value="">---------------------</option>
                       @foreach ($Materiels as $Materiel)
                                            <option value="{{$Materiel->id}}">{{$Materiel->nom}}</option>
                                        @endforeach
                        </select>

                            @error("newEntree.materiels_id")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                  <div class="row">
                  <div class="form-group  col-5 mr-2">
                    <label >Nom Fournisseur</label>
                    {{--<input type="text" class="form-control @error('newEntree.fournisseurs_id') is-invalid @enderror" wire:model="newEntree.fournisseurs_id">--}}

                    <select class="form-control @error('newEntree.fournisseurs_id') is-invalid @enderror" wire:model="newEntree.fournisseurs_id">
                        <option value="">----------------------</option>
                         @foreach ($Fournisseurs as $Fournisseur)
                                            <option value="{{ $Fournisseur->id}}">{{$Fournisseur->prenom}}</option>
                                        @endforeach
                    </select>
                    @error("newEntree.fournisseurs_id")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>

                  <div class="form-group col-5 mr-1">
                    <label >Quantités</label>
                    <input type="Number" class="form-control @error('newEntree.quantite_entree') is-invalid @enderror" wire:model="newEntree.quantite_entree">
                    @error("newEntree.quantite_entree")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>
                   </div>

                  <div class="row">
                  <div class="form-group  col-5 mr-1">
                    <label >Date D'entree</label>
                    <input type="date" class="form-control @error('newEntree.date_entree') is-invalid @enderror" wire:model="newEntree.date_entree">
                    @error("'newEntree.date_entree")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>
                  </div>

                  

                </div>
                <!-- /.card-body -->

                <div class="row mb-2">

                      <div class="col-2">
                      </div>

                  <button type="submit" class="btn btn-primary col-4 mr-2" >Enregistrer</button>
                  <button type="button" wire:click="goToListEntree()" class="btn btn-danger col-4">Retour</button>

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

