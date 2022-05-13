<div class="row p-4 pt-5">
          <div class="col-12">
            <div class="card">
              <div class="card-header bg-gradient-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fa fa-list fa-2x"></i>Liste des categorie des materiels</h3>

                <div class="card-tools d-flex align-items-center ">
                <a class="btn btn-link text-white mr-4 d-block" wire:click="toggleShowAddCategorieMaterielForm"><i class="fas fa-user-plus"></i> Nouveau categorie de materiel</a>
                  <div class="input-group input-group-md" style="width: 250px;">
                    <input type="text" name="table_search" wire:model.debounce.250ms="search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
                <table class="table table-head-fixed">
                  <thead>
                    <tr>
                      <th style="width:50%;">Categorie de materiel</th>
                      <th style="width:20%;" class="text-center">Ajouté</th>
                      <th style="width:30%;" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        @if ($isAddCategorieMateriel)
                            <tr>
                                <td colspan="2">
                                    <input type="text"
                                    wire:keydown.enter="addNewCategorieMateriel"
                                    class="form-control @error('newCategorieMaterielName') is-invalid @enderror"
                                    wire:model="newCategorieMaterielName" />
                                    @error('newCategorieMaterielName')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-link" wire:click="addNewCategorieMateriel"> <i class="fa fa-check"></i> Valider</button>
                                    <button class="btn btn-link" wire:click="toggleShowAddCategorieMaterielForm"> <i class="far fa-trash-alt"></i> Annuler</button>
                                </td>
                            </tr>
                        @endif
                        @foreach ($CategorieMateriels as $CategorieMateriel)
                            <tr>
                                <td>{{ $CategorieMateriel->nom }}</td>
                                <td class="text-center">{{ optional($CategorieMateriel->created_at)->diffForHumans() }}</td>
                                <td class="text-center">
                                    <button class="btn btn-link" wire:click="editCategorieMateriel({{$CategorieMateriel->id}})"> <i class="far fa-edit">Editer</i> </button>
                                   {{--<a class="btn btn-link" data-toggle="modal" data-target="#modalAdd" wire:click="showProp({{$CategorieMateriel->id}})"><i class="fa fa-list"></i>Propriétés</a>--}}
                                    <button class="btn btn-link" data-toggle="modal" data-target="#modalProp" wire:click="showProp({{$CategorieMateriel->id}})"> <i class="fa fa-list"></i>Propriétés</button>
                                   {{--@if(count($CategorieMateriel->materiels) ==0)--}}
                                    <button class="btn btn-link" wire:click="confirmDelete('{{$CategorieMateriel->nom}}', {{$CategorieMateriel->id}})"> <i class="far fa-trash-alt"></i>Supprimé</button>
                                   {{--@endif--}}
                                </td>
                            </tr>
                        @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                    {{$CategorieMateriels->links() }}
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
    </div>
