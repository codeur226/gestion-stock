<div class="row p-4 pt-5">
            <div class="col-md-5">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de sortie d'un nouveau materiel</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" wire:submit.prevent="addSortie()">
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
                        <div class="form-group flex-grow mr-2">
                            <label >Nom Sortie</label>
                            <input type="text" wire:model="newSortie.nom" class="form-control @error('newSortie.nom') is-invalid @enderror">

                            @error("newSortie.nom")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                         </div>
                         <div class="form-group flex-grow mr-1">
                            <label >Désignation</label>
                            {{--<input type="text" wire:model="newSortie.materiels_id" class="form-control @error('newSortie.materiels_id') is-invalid @enderror">--}}
                           <select class="form-control @error('newSortie.materiels_id') is-invalid @enderror" wire:model="newSortie.materiels_id">
                             <option value="">---------</option>
                             @foreach ($Materiels as $Materiel)
                             <option value="{{ $Materiel->id}}">{{  $Materiel->nom}}</option>
                             @endforeach
                            </select>

                            @error("newSortie.materiels_id")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                <div class="d-flex">
                  <div class="form-group flex-grow mr -2">
                    <label >Références</label>
                      <input type="array" class="form-control @error('newSortie.reference') is-invalid @enderror" wire:model="newSortie.reference">

                            @error("newSortie.reference")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>
                  <div class="form-group flex-grow mr -2">
                    <label >Quantités</label>
                      <input type="array" class="form-control @error('newSortie.quantite_sortie') is-invalid @enderror" wire:model="newSortie.quantite_sortie">
                            @error("newSortie.quantite_sortie")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>
                </div>


                  <div class="d-flex">
                     <div class="form-group flex-grow mr-1">
                    <label >Utilité/destination</label>
                  <input type="array" class="form-control @error('newSortie.destination') is-invalid @enderror" wire:model="newSortie.destination">  
                    @error("newSortie.destination")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                  <div class="form-group flex-grow mr-2">
                    <label >Imputable à</label>
                    <input type="array" class="form-control @error('newSortie.imputable') is-invalid @enderror" wire:model="newSortie.imputable">
                    
                    @error("newSortie.imputable")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                   </div>
                  </div>

                  <div class="d-flex">
                   <div class="form-group flex-grow ">
                    <label >Date Sortie</label>
                    <input type="date" class="form-control @error('newSortie.date_sortie') is-invalid @enderror" wire:model="newSortie.date_sortie">
                    @error("'newSortie.date_sortie")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                   </div>
                  </div>




              </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                  <button type="button" wire:click="goToListSortie()" class="btn btn-danger">Retourner à la liste des utilisateurs</button>
                </div>
          </form>
</div>
<!-- /.card -->

</div>
</div>

