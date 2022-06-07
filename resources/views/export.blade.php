<!DOCTYPE html>
<html>
<head>
<div class="header">
            <div class="row">
               <div class="col-6 mb4" style="float:left; font-weight:bold; font-size:15px;">
                    <div style="width:320px;text-align:center">MINISTERE DE LA TRANSITION DIGITALE, DES POSTES ET DES COMMUNICATIONS ELECTRONIQUES</div>
                    <div style ="width:320px;text-align:center">**</div>
                    <div style ="width:320px;text-align:center">SECRETARIAT GENERAL</div>
                    <div style ="width:320px;text-align:center">**</div>
                    <div  name="company_address" style="text-align:center"></div>
                    <div style ="width:320px;text-align:center"> <span>AGENCE NATIONALE DE PROMOTION DES TIC</span></div>
                    <div style ="width:320px;text-align:center">**</div>
                </div>
                
                <div class="col-3 mb4" style="float:center;">
                    <img t-if="company.logo" t-att-src="image_data_uri(company.logo)" style="max-height: 100px;text-align:center" alt="Logo"/>
                </div>
               
                <div class="col-3 mb4" style="float:right">
                   <!--<div class="col-9 text-right" style="margin-top:22px;" t-field="company.report_header" name="moto"/>-->
                   <div style ="font-weight:bold;font-size:15px;text-align:center">BURKINA FASO</div>
                    <div style ="font-weight:bold;font-size:12px;text-align:center"></div>
                   <div style ="font-size:13px;text-align:center"><i>Unité-Progrès-Justice</i></div>
                </div>
               
            </div>


<div  t-if="company.logo or company.report_header" class="row zero_min_height">
                <div class="col-12">
                    <div style="border-bottom: 0px solid #999999; margin-bottom:20px;margin-top:10px"/>
                </div>
            </div>

<style>
#customers {
  margin-top:100px;
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#titre {
  margin-top:140px;
  margin-left:100px;
 
}

#tit {
  font-family: Arial, Helvetica, sans-serif;
  font-weight:bold ;
}

#t {
  font-family: Arial, Helvetica, sans-serif;
  font-size:18px ;
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

<div  id="titre"class="row">
<h2 id="tit"> BON DE SORTIE DE MATERIEL N° ..............</h2> <br>
<p id="t">Demandé par : ...................................................</p>
<p id="t">Date : ............/............./...........</p>
<p id="t">Service du demandeur : ....................................signature...........</p>

</div>



<table id="customers" >
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
 <td>{{getNomMateriel($sortie->materiels_id) }}</td>
 <td>{{  $sortie->reference }}</td>
 <td class="text-center">{{ $sortie->quantite_sortie}}</td>
 <td class="text-center">{{  $sortie->destination}}</td>
 <td class="text-center">{{  $sortie->imputable}}</td>
 {{--<td class="text-center">{{  $sortie->date_sortie}}</td>--}}
 </tr>
  @endforeach
  
</table>
<table id="customers" >
    <tr>
      <td ROWSPAN="2" class="text-center">Le Directeur des Finances et de la Comptabilités
      (Date et signature) <br><br><br><br></td>
      <td class="text-center"></td>
      <td ROWSPAN="2" class="text-center">Signature du Responsable de service du demandeur (Date et signature) <br><br><br><br></td>
    </tr>
    <tr>
      <td class="text-center"></td>  
    </tr>
     <tr>
      <td class="text-center"></td>
      <td class="text-center">Le Magasinier/Gestionnaire du stock
      (Date et signature) <br> <br> <br><br> </td>
      <td class="text-center"></td>
    </tr>
    
</table>

<div class="row">

      <div class="col-4">
      </div>

      <div class="col-4">

      </div>

      <div class="col-4">
        <p id="t">Signature du vigile au magasin:</p>
      </div>
  
</div>


</body>
</html>


