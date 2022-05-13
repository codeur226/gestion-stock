<div class="row p-4 pt-5">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'édition de sortie </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" wire:submit.prevent="updateSortie()" method="POST">
            <div class="card-body">

               
                    <div class="d-flex">
                        <div class="form-group flex-grow mr-2">
                            <label >Nom</label>
                            <input type="text" wire:model="editSortie.nom" class="form-control @error('editSortie.nom') is-invalid @enderror">

                            @error("editSortie.nom")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow mr-1">
                            <label >ID MATERIEL</label>
                            {{--<input type="text" wire:model="editSortie.materiels_id" class="form-control @error('editSortie.materiels_id') is-invalid @enderror">--}}
                        <select class="form-control @error('editSortie.materiels_id') is-invalid @enderror" wire:model="editSortie.materiels_id">
                        
                       @foreach ($Materiels as $Materiel)
                                            <option value="{{ $Materiel->id}}">{{  $Materiel->nom}}</option>
                                        @endforeach
                        </select>


                            @error("editSortie.materiels_id")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="form-group flex-grow mr-2">
                         <label >ID Fournisseur</label>
                         {{--<input type="text" class="form-control @error('editSortie.fournisseurs_id') is-invalid @enderror" wire:model="editSortie.fournisseurs_id">--}}
                         <select class="form-control @error('newEntree.fournisseurs_id') is-invalid @enderror" wire:model="newEntree.fournisseurs_id">
                         @foreach ($Fournisseurs as $Fournisseur)
                                            <option value="{{ $Fournisseur->id}}">{{$Fournisseur->prenom}}</option>
                                        @endforeach
                    </select>
                        @error("editSortie.fournisseurs_id")
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                       </div>

                         <div class="form-group flex-grow">
                        <label >Quantité</label>
                        <input type="array" class="form-control @error('editSortie.quantite_sortie') is-invalid @enderror" wire:model="editSortie.quantite_sortie">
                        @error("editSortie.quantite_sortie")
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                        </div>
                   </div>
                  <div class="d-flex">
                  <div class="form-group flex-grow mr-2">
                    <label >Date Sortie</label>
                    <input type="date" class="form-control @error('editSortie.date_sortie') is-invalid @enderror" wire:model="editSortie.date_sortie">
                    @error("editSortie.date_sortie")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>

                  <div class="form-group flex-grow">
                    <label >Imputable</label>
                    <select class="form-control @error('editSortie.imputable') is-invalid @enderror" wire:model="editSortie.imputable">
                        <option value="">---------</option>
                        <option value="1">ANPTIC</option>
                        <option value="2">PADITIC</option>
                        <option value="3">E-BURKINA</option>
                          <option value="4">G-Cloud</option>
                    </select>
                    @error("editSortie.imputable")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>

                  </div>

                  <div class="d-flex">
                  <div class="form-group flex-grow mr-2">
                    <label >Destination</label>
                    <select class="form-control @error('editSortie.destinations_id') is-invalid @enderror" wire:model="editSortie.destinations_id">
                        <option value="">---------</option>
                        <option value="1">Siege ANPTIC</option>
                        <option value="2">Ministere de la culture</option>
                        <option value="3">Primature</option>
                         <option value="4">Ministre du genre</option>
                        
                    </select>
                    @error("editSortie.destinations_id")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>
                  </div>


            {{--<div class="form-group">
                <label >Piece d'identité</label>
                <select class="form-control @error('editUser.pieceIdentite') is-invalid @enderror" wire:model="editUser.pieceIdentite">
                    <option value="">---------</option>
                    <option value="CNI">CNI</option>
                    <option value="PASSPORT">PASSPORT</option>
                    <option value="PERMIS DE CONDUIRE">PERMIS DE CONDUIRE</option>
                </select>
                @error("editUser.pieceIdentite")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>

                <div class="form-group">
                        <label >Numero de piece d'identité</label>
                        <input type="text" class="form-control @error('editUser.numeroPieceIdentite') is-invalid @enderror" wire:model="editUser.numeroPieceIdentite">
                        @error("editUser.numeroPieceIdentite")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>--}}



            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
                <button type="button" wire:click="goToListSortie()" class="btn btn-danger">Retouner à la liste des sortie</button>
            </div>
            </form>
        </div>
        <!-- /.card -->

    </div>

</div>
