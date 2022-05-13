<div class="row p-4 pt-5">
          <div class="col-12">
            <div class="card">
              <div class="card-header bg-gradient-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fa fa-list fa-2x"></i> Liste des materiels</h3>

                <div class="card-tools d-flex align-items-center ">
                <a class="btn btn-link text-white mr-4 d-block" wire:click="showAddMaterielModal()" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-user-plus"></i>Ajouter Materiel</a>
               {{--<a class="btn btn-link text-white mr-4 d-block" wire:click="showAddMaterielModal()"><i class="fas fa-user-plus"></i> Ajouter un materiel</a>--}}

                  <div class="input-group input-group-md" style="width: 250px;">
                    <input type="text" name="table_search" wire:model.debounce.250ms="search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0 table-striped" >
                <div class="d-flex justify-content-end p-4 bg-indigo">
                    <div class="form-group mr-3">
                        <label for="filtreCategorie">Filtrer par categorie</label>
                        <select  id="filtreCategorie" wire:model="filtreCategorie" class="form-control">
                                <option value=""></option>
                                @foreach ($CategorieMateriels as $CategorieMateriel)
                                    <option value="{{$CategorieMateriel->id}}">{{ $CategorieMateriel->nom }}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="filtreEtat">Filtrer par etat</label>
                        <select  id="filtreEtat" wire:model="filtreEtat" class="form-control">
                            <option value=""></option>
                            <option value="1">Disponible</option>
                            <option value="0">Indisponible</option>
                        </select>
                    </div>
                </div>
                <div style="height:350px;">
                    <table class="table table-head-fixed">
                    <thead>
                        <tr>
                        <th></th>
                        <th >Materiel</th>
                        <th class="text-center">Categorie</th>
                        <th class="text-center">Etat</th>
                        <th class="text-center">Stock</th>
                        <th  class="text-center">Ajouté</th>
                        <th  class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                            @forelse ($materiels as $materiel)
                                <tr>
                                    <td>
                                        <img src="{{asset($materiel->imageUrl)}}" alt="" style="width:60px;height:60px;">

                                    </td>
                                    <td>{{ $materiel->nom }} - {{ $materiel->noSerie }}</td>
                                    <td class="text-center">{{$materiel->Categorie["nom"]}}</td>
                                    <td class="text-center">
                                        @if($materiel->estDisponible)
                                            <span class="badge badge-success">Disponible</span>
                                        @else
                                            <span class="badge badge-danger">Indisponible</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $materiel->stock }}</td>
                                    <td class="text-center">{{ optional($materiel->created_at)->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-link" data-toggle="modal" data-target="#editModal" wire:click="editMateriel({{$materiel->id}})"> <i class="far fa-edit"></i></button>
                                        <a class="btn btn-link" data-toggle="modal" data-target="#modalConsulter"wire:click="showConsulter()"> <i class="fa fa-eye"></i></a>
                                        {{--<a class="btn btn-link" data-toggle="modal" data-target="#modalConsulter" wire:click="showAddMaterielModalConsulter()"><i class="fa fa-eye"></i></a>--}}
                                        {{--<button class="btn btn-link" data-toggle="modal" data-target="#ModalConsulter" wire:click=""> <i class="fa fa-eye"></i> </button>
                                        {{--<a href="{{route('MaterielComp.Add_entree','$materiel->id')}}" class="btn btn-danger btn-sm mr-2"></a>--}}
                                        <a href="/exportpdf" class="btn btn-link"><i class="fa fa-print" aria-hidden="true"></i></a>
                                        {{--<button class="btn btn-link" wire:click="goToAddEntree()" > <i class='fas fa fa-arrow-up'></i> </button>--}}
                                        {{--<button class="btn btn-link" wire:click=""> <i class='fas fa fa-arrow-down'></i> </button>--}}
                                        {{--<a class="btn btn-link" wire:click="showAddMaterielModalConsulter()" data-toggle="modal" data-target="#modalconsulter"><i class="fa fa-eye"></i></a>--}}
                                        <button class="btn btn-link" wire:click="confirmDelete({{$materiel->id}})"> <i class="far fa-trash-alt"></i></button>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="alert alert-danger">

                                            <h5><i class="icon fas fa-ban"></i> Information!</h5>
                                            Aucune donnée trouvée par rapport aux éléments de recherche entrés.
                                            </div>
                                    </td>
                                </tr>
                            @endforelse
                    </tbody>
                    </table>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                    {{ $materiels->links() }}
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
        {{--@include("livewire.materiels.add")--}}
    </div>
