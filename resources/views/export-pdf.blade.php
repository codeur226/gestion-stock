<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Liste des materiels</h1>

<table id="customers">
  <tr>
   <th>No</th>
    <th>Nom</th>
    <th>noSerie</th>
    <th>Categorie</th>
    <th>Etat</th>
    <th>Ajouté</th>
  </tr>
  @php
      $no=1;
  @endphp
  @foreach ($data as $materiel)
<tr>
 <td>{{$no++}}</td>
 <td>{{ $materiel->nom }}</td>
 <td>{{ $materiel->noSerie}}</td>
 <td class="text-center">{{$materiel->Categorie["nom"]}}</td>
 <td class="text-center">
 @if($materiel->estDisponible)
 <span class="badge badge-success">Disponible</span>
 @else
 <span class="badge badge-danger">Indisponible</span>
 @endif
 </td>
<td class="text-center">{{ optional($materiel->created_at)->diffForHumans() }}</td>
 </tr>
  @endforeach
  
</table>

</body>
</html>


