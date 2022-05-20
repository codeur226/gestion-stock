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

<h1>BON DE SORTIE DE MATERIEL</h1>

<table id="customers">
  <tr>
   <th>N°</th>
    <th>Désignation</th>
    <th>Réferences</th>
    <th>Quantité</th>
    <th>Utilité/destination</th>
      <th>Imputable à</th>
    {{--<th>Date de sortie</th>--}}
  </tr>
  @php
      $no=1;
  @endphp
  @foreach ($data as $sortie)
<tr>
 <td>{{$no++}}</td>
 <td>{{  $sortie->materiels }}</td>
 <td>{{  $sortie->reference }}</td>
 <td class="text-center">{{ $sortie->quantite_sortie}}</td>
 <td class="text-center">{{  $sortie->destination}}</td>
 <td class="text-center">{{  $sortie->imputable}}</td>
 {{--<td class="text-center">{{  $sortie->date_sortie}}</td>--}}
 </tr>
  @endforeach
  
</table>

</body>
</html>


