<div class="row p-4 pt-5">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'édition d'entree</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" wire:submit.prevent="updateEntree()" method="POST">
            <div class="card-body">

                <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Nom</label>
                            <input type="text" wire:model="editEntree.nom" class="form-control @error('editEntree.nom') is-invalid @enderror">

                            @error("editEntree.nom")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label >ID MATERIEL</label>
                             <select class="form-control @error('newEntree.materiels_id') is-invalid @enderror" wire:model="newEntree.materiels_id">
                        
                       @foreach ($Materiels as $Materiel)
                                            <option value="{{ $Materiel->id}}">{{  $Materiel->nom}}</option>
                                        @endforeach
                        </select>

                            @error("editEntree.materiels_id")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                </div>

                <div class="d-flex">
                  <div class="form-group  flex-grow-1 mr-2">
                    <label >ID Fournisseur</label>
                     <select class="form-control @error('newEntree.fournisseurs_id') is-invalid @enderror" wire:model="newEntree.fournisseurs_id">
                         @foreach ($Fournisseurs as $Fournisseur)
                                            <option value="{{ $Fournisseur->id}}">{{$Fournisseur->prenom}}</option>
                                        @endforeach
                    </select>
                    @error("editEntree.fournisseurs_id")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>

                  <div class="form-group flex-grow-1">
                    <label >Quantité</label>
                    <input type="array" class="form-control @error('editEntree.quantite_entree') is-invalid @enderror" wire:model="editEntree.quantite_entree">
                    @error("editEntree.quantite_entree")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>
                </div>

                  <div class="d-flex">
                  <div class="form-group  flex-grow-1 mr-2">
                    <label >Date D'entree</label>
                    <input type="date" class="form-control @error('editEntree.date_entree') is-invalid @enderror" wire:model="editEntree.date_entree">
                    @error("editEntree.date_entree")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>

                  {{--<div class="form-group flex-grow-1">
                    <label >STOCK</label>
                    <input type="text" class="form-control @error('editEntree.stock_initial') is-invalid @enderror" wire:model="editEntree.stock_initial">
                    @error("editEntree.stock_initial")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>--}}
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
                <button type="button" wire:click="goToListEntree()" class="btn btn-danger">Retouner à la liste des entrees</button>
            </div>
            </form>
        </div>
        <!-- /.card -->

    </div>

</div>
