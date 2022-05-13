<div class="modal fade" id="modalConsulter" tabindex="-1" role="dialog" wire:ignore.self>
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title">Détails des materiels </h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
        </button>
     </div>
      <div class="modal-body">
       <table class="table table-striped table-hover">
       <thead>
         <tr>
         <th class="text-center">Nom</th>
          <th class="text-center">noSerie</th>
         <th class="text-center">Categorie</th>
          <th class="text-center">Etat</th>
          <th class="text-center">Stock</th>
          <th  class="text-center">Ajouté</th>
        </tr>
        </thead>
         <tbody>
           @foreach($materiels as $materiel)
           <tr>
            <td class="text-center">{{ $materiel->nom }}</td>
            <td class="text-center">{{ $materiel->noSerie}}</td>
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
            </tr>
          @endforeach
        </tbody>
       </table>
      </div>
    </div>
  </div>
</div>