<div class="row p-4 pt-5">
          <div class="col-12">
            <div class="card">
              <div class="card-header bg-gradient-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fa fa-list fa-2x"></i>Sortie de Materiel</h3>

                <div class="card-tools d-flex align-items-center ">
                <a class="btn btn-link text-white mr-4 d-block" wire:click="goToAddSortie()"><i class="fas fa-user-plus"></i> Nouvelle Sortie</a>
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
                        <th>Nom</th>
                        <th >Quantité</th>
                        <th  class="text-center">Ajouté</th>
                        <th  class="text-center">Action</th>
                        </tr>
                    </thead>
                  <tbody>
                   @foreach ($sorties as $sortie)
                            <tr>
                                <td>{{$sortie->nom}}</td>
                                <td>{{$sortie->quantite_sortie}}</td>
                                <td class="text-center">{{optional($sortie->created_at)->diffForHumans() }}</td>
                                <td class="text-center">
                                    <button class="btn btn-link" wire:click="goToEditSortie({{$sortie->id}})"> <i class="far fa-edit"></i> </button>
                                    <button class="btn btn-link" wire:click="confirmDelete('{{ $sortie->nom }} {{ $sortie->materiels_id }}', {{$sortie->id}})"> <i class="far fa-trash-alt"></i> </button>
                                </td>
                            </tr>
                            <tr>
                            </td>

                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                    {{--$CategorieMateriels->links() --}}
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
    </div>
