<div class="modal fade" id="editModal" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edition d'un materiel </h5>

            </div>
            <form wire:submit.prevent="updateMateriel()">
            <div class="modal-body">

                <div class="d-flex">
                        <div class=" my-4 bg-gray-light p-3 flex-grow-1">
                        @if($errors->any())
                                    <div class="alert alert-danger">

                                        <h5><i class="icon fas fa-ban"></i> Erreurs!</h5>
                                        <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                            @endif
                                 <div class="form-group">
                                    <label for="">Nom</label>
                                    <input type="text" wire:model="editMateriel.nom" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Numero de serie</label>
                                    <input type="text" wire:model="editMateriel.noSerie" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Categorie</label>
                                    <select  class="form-control" wire:model="editMateriel.Categorie">
                                         @foreach ($CategorieMateriels as $CategorieMateriel)
                                            <option value="{{$CategorieMateriel->id}}">{{ $CategorieMateriel->nom }}</option>
                                        @endforeach
                                     </select>
                                </div>
                                 {{--<div class="form-group">
                                    <label for="">EstDisponible</label>
                                    <select  class="form-control" wire:model="editMateriel.disponible" class="form-control">
                                        <option value="0">Indisponible</option>
                                        <option value="1">Disponible</option>
                                     </select>
                                </div>--}}
                                {{--<div class="form-group  flex-grow-1 mr-2">
                                     <label >ID Fournisseur</label>
                                    <input type="text" class="form-control @error('newEntree.fournisseurs_id') is-invalid @enderror" wire:model="newEntree.fournisseurs_id">

                                      <select class="form-control @error('editMateriel.fournisseurs_id') is-invalid @enderror" wire:model="editMateriel.fournisseurs_id">
                                      @foreach ($Fournisseurs as $Fournisseur)
                                            <option value="{{ $Fournisseur->id}}">{{  $Fournisseur->nom }}</option>
                                        @endforeach
                                      </select>
                                      @error("editMateriel.fournisseurs_id")
                                       <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                        </div>
                                
                                <div class="form-group flex-grow-1">
                                       <label >Quantité</label>
                                        <input type="array" class="form-control @error('editMateriel.quantite_entree') is-invalid @enderror" wire:model="editMateriel.quantite_entree">
                                         @error("editMateriel.quantite_entree")
                                         <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                </div>
                                 <div class="d-flex">
                                  <div class="form-group  flex-grow-1 mr-2">
                                         <label >Date D'entree</label>
                                         <input type="date" class="form-control @error('editMateriel.date_entree') is-invalid @enderror" wire:model="editMateriel.date_entree">
                                          @error("editMateriel.date_entree")
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                   </div>

                                   <div class="form-group  flex-grow-1 mr-2">
                                         <label >Stock</label>
                                         <input type="array" class="form-control @error('editMateriel.stock_initial') is-invalid @enderror" wire:model="editMateriel.stock_initial">
                                          @error("editMateriel.stock_initial")
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                   </div>
                                   
            
                                </div>--}}
                            {{--@if($editArticle["materiel_proprietes"] != [])
                            <p style="border: 1px dashed black;"></p>
                            <div class="my-3 bg-gray-light">
                                @foreach($editMateriel["materiel_proprietes"] as $index => $materielPropriete)
                                    <div class="form-group">
                                        <label for=""> {{$materielPropriete["propriete"]["nom"]}} @if(!$materielPropriete["propriete"]["estObligatoire"]) (optionel) @endif
                                        </label>

                                        <input type="text" wire:model="editMateriel.materiel_proprietes.{{ $index }}.valeur"  class="form-control">
                                    </div>
                                @endforeach
                            </div>
                            @endif--}}

                        </div>

                        <div class="p-4" >
                                    <div class="form-group">
                                        <input type="file" wire:model="editPhoto" id="image{{$inputEditFileIterator}}">
                                    </div>
                                    <div style="border: 1px solid #d0d1d3; border-radius: 20px; height: 200px; width:200px; overflow:hidden;">
                                            @if (isset($editPhoto))

                                                <img src="{{ $editPhoto->temporaryUrl() }}" style="height:200px; width:200px;">

                                            @else

                                            <img src="{{ asset($editMateriel["imageUrl"]) }}" style="height:200px; width:200px;">

                                            @endif
                                    </div>
                                    @isset($editPhoto)
                                    <div>
                                        <button
                                        type="button" 
                                        class="btn btn-default btn-sm mt-2"
                                        wire:click="$set('editPhoto', null)"
                                        >Réinitialiser</button>    
                                    </div> 
                                    @endisset
                         </div>
                </div>


            </div>
            <div class="modal-footer" >
               <div>
            
                {{--@if( $editHasChanged)--}}
                    <button type="submit" class="btn btn-success" >Valider les modifications</button>
               {{-- @endif--}}
         
               </div> 
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>

            </form>

        </div>
    </div>
</div>
