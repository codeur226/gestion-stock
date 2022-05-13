<div class="row p-4 pt-5">
          <div class="col-12">
            <div class="card">
              <div class="card-header bg-gradient-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fa fa-list fa-2x"></i>Entrée de Materiel</h3>

                <div class="card-tools d-flex align-items-center ">
                <a class="btn btn-link text-white mr-4 d-block" wire:click="goToAddEntree()"><i class="fas fa-user-plus"></i> Nouvelle Entrée</a>
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
                        <th>Nom Entrée</th>
                        <th >Quantité</th>
                        {{--<th >stock</th>--}}
                        <th  class="text-center">Ajouté</th>
                        <th  class="text-center">Action</th>
                        </tr>
                    </thead>
                  <tbody>
                   @foreach ($entrees as $entree)
                            <tr>
                                <td>{{$entree->nom}}</td>
                                <td >{{$entree->quantite_entree}}</td>
                                {{--<td>{{$entree->stock_initial}}</td>--}}
                                <td class="text-center">{{optional($entree->created_at)->diffForHumans() }}</td>
                                <td class="text-center">
                                    <button class="btn btn-link" wire:click="goToEditEntree({{$entree->id}})"> <i class="far fa-edit"></i> </button>
                                    <button class="btn btn-link" wire:click="confirmDelete('{{ $entree->nom }} {{ $entree->materiels_id }}', {{$entree->id}})"> <i class="far fa-trash-alt"></i> </button>
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
