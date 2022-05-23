<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>{{$etudiant->prenom}}_{{$etudiant->nom}}_{{ $etudiant->phone }}</title>
  <style>
@font-face {
  font-family: SourceSansPro;
  src: url(SourceSansPro-Regular.ttf);
}


.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #0087C3;
  text-decoration: none;
}

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #555555;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 16px; 
  font-family: SourceSansPro;
}

header {
  padding: 10px 0;
  margin-bottom: 20px;
  border-bottom: 1px solid #AAAAAA;
}

#logo {
  float: left;
  margin-top: 8px;
}

#logo img {
  height: 70px;
}

#company {
  float: right;
  text-align: left;
}


#details {
  margin-bottom: 50px;
}

#client {
  padding-left: 6px;
  border-left: 6px solid #0087C3;
  float: left;
}

#client .to {
  color: #777777;
}

h2.name {
  font-size: 1.4em;
  font-weight: normal;
  margin: 0;
}

#invoice {
  float: right;
  text-align: left;
}

#invoice h1 {
  color: #0087C3;
  font-size: 2.4em;
  line-height: 1em;
  font-weight: normal;
  margin: 0  0 10px 0;
}

#invoice .date {
  font-size: 1.1em;
  color: #777777;
}

.container .text-justify{
    text-align: justify;
}

#thanks{
  font-size: 2em;
  margin-bottom: 50px;
}

#notices{
  padding-left: 6px;
  border-left: 6px solid #0087C3;  
}

#notices .notice {
  font-size: 1.2em;
}

footer {
  color: #777777;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #AAAAAA;
  padding: 8px 0;
  text-align: center;
}
.name_h1{
  text-align: center;
}
.box-shadow{
    box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;
}
#company img{
  margin-left: -20px;
}
 .btn{
      border: 1px solid blue;
      border-radius: 4px;
      padding: 10px;
      color: white;
      background-color: blue;
      margin: 10px;
      margin-top: 20px;
  }
  @media print {
      #print_Button{
          display: none;
      }
  }
  h2{
    font-size: 21px;
  }
  h4{
    text-align: center;
  }
  .president{
    float: left;
  }
  .secretaire{
    float: right;
  }
  .notices{
    margin-bottom: 50px;
  }
  </style>
  </head>
  <body id="print">
    <h1 class="name_h1">REÇUE DE CODIFICATION</h1>
        <div class="box-shadow">
      <header class="clearfix">
        <div id="logo">
          @if($etudiant->image !== null)
            <img src="{{$image}}" style="width: 100px;height:auto;">
          @else
            <img src="{{ asset('user/img/3ccs.jpg') }}" style="width: 100px;height:auto;">
          @endif
        </div>
        <div id="company">
            {{-- <img src="{{$pic}}" width="147" height="30"> --}}
            <img src="{{ asset('user/img/accueil.png') }}" width="147" height="30">
            <div>{{$info->email}}</div>
            <div>{{$info->phone}}</div>
            <div>Rue 39x30</div>
            <div><button  class="btn btn-success btn-xs" style="margin-top:10px" id="print_Button" onclick="printDiv()"><i class="fa fa-print">Telecharger le recu</i></button> </div>
        </div>
      </header>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to" style="font-size:24px;">{{$etudiant->prenom}} {{$etudiant->nom}}</div>
          <div class="email"><a href="">{{$etudiant->email }}</a></div>
          <div class="address">{{$etudiant->phone }}</div>
          <div class="address">{{$etudiant->commune->name }} ({{$etudiant->commune->departement->name }})</div>
          <div class="address">
            @if($etudiant->ancienete == 1)
                Nouveau
            @else 
                Ancien
            @endif
          </div>
          <div class="address">
            @if($etudiant->codification_count == 1)
              Pour la {{$etudiant->codification_count }} ere fois
            @else
              Pour la {{$etudiant->codification_count }} eme fois
            @endif
          </div>
        </div>
        <div id="invoice">
          <h2>{{$etudiant->prix }} FCFA</h2>
          <div class="date">
            {{$etudiant->chambre->immeuble->name}}
            {{--
              @foreach($etudiant->chambre->immeubles as $ac_imb)
                      {{$ac_imb->name}} : 
              @endforeach
              --}}
              à  {{$etudiant->chambre->nom }}
            </div>
          <div class="date">
            à la 
            @if($etudiant->position == 1)
                {{$etudiant->position}} ere
            @else 
                {{$etudiant->position}} em
            @endif
            place
          </div>
          <div class="date">Le {{$etudiant->updated_at }}</div>
        </div>
      </div>
    </div>
    <main>
      <div class="container">
          <h1 style="text-align: center;">LE REGLEMENT INTERIEURE : A.E.E.R.K</h1>
          <p class="text-justify">
              Conformément aux règles du code pénal Sénégalais et des différentes règles propres à chaque association valablement formée : L’Association des Élèves et Étudiants Ressortissants de Kédougou adopte comme code de conduite le texte suivant.
          </p>
          <h2>PREMIERE PARTIE : Les REGLES RELATIVES AUX MEMBRES DE L’AEERK</h2>
          <h3 class="text-center">Titre : LA CODIFICATION</h3>
          <h4 class="text-center">Section 1 :L’ORGANE</h4>
          <h5>Article 1 :</h5>
          <p class="text-justify">
              L’organe chargé de la codification est la commission sociale. Elle est assistée par quelques membres du bureau à la demande de son président.
          </p>
          <p class="text-justify">
              En cas de crise définie par le bureau (force majeure, incapacité de la commission) le bureau choisit une commission ad hoc qui sera chargée de la codification.
          </p>
          <h4 class="text-center">Section 2 : CONDITIONS</h4>
          <h5>Article 2 :</h5>
          <p class="text-justify">
              La duré du logement d ‘un membre est fixée à quatre (04) ans d’études supérieures.
          </p>
          <p class="text-justify">
            Cependant une exception est faite :
            Aux étudiants n’ayant repris qu’une seule fois dans un cycle, qui peuvent avoir une année de dérogation.
          </p>
          <p class="text-justify">
            Aux membres du bureau élus par l’assemblée générale peut également bénéficier d’une exception.
          </p>
          <h5>Article 3 :</h5>
          <p class="text-justify">
            Pour être codifié il faut remplir les conditions suivantes :
            Être natif de <span class="text-bold">Kédougou</span> <br>
            Avoir des parents <span class="text-bold">Kédovin</span> <br>
            Avoir fait au moins des études de la sixième à la terminale à <span class="text-bold">Kédougou</span> <br>
            Disposer d'une carte de membre de l'A.E.E.R.K
          </p>

          <h4 class="text-center">Section 3 : MODALITES</h4>
          <h5>Article 4 :</h5>
          <p class="text-justify">La codification se fait strictement par ordre de mérite.</p>
          <h5>Article 5 :</h5>
          <p class="text-justify">Les nouveaux bacheliers inscrits sont prioritaires.</p>
          <h5>Article 6 :</h5>
          <p class="text-justify">La carte membre est exigée lors de la codification.</p>

          <h4 class="text-center">Titre 2 :</h4>
          <h5>Article 7 :</h5>
            <p class="text-justify">
              Les droits à la codification sont fixées à 30000f payables au jour de la codification .Les droits à la codification sont prévus pour une durée de dix (10) mois à partir du mois de janvier. <br>
              Cependant des logements provisoires, jusqu’au mois de décembre, peuvent être accordés à tout étudiant remplissant les conditions exigées pour la fin de l’année en cours.
            </p>
            <h5>Article 8 :</h5>
            <p class="text-justify">La codification et l’occupation du lit sont personnelles. Tout hébergement est interdit.</p>
            <h5>Article 9 :</h5>
            <p class="text-justify">Le respect du matériel est obligatoire sous peine de sanction.</p>
            <h5>Article 10 :</h5>
            <p class="text-justify">Le nom respect du bon  voisinage (tapage nocturne, vol, bagarre) est strictement interdit. </p>
            <h5>Article 11 :</h5>
            <p class="text-justify">Au-delà de 23 heures, les visites sont interdites.</p>



          <h2>DEUXIEME PARTIE : LES REGLES RELATIVES AUX MEMBRES DU BUREAU</h2>
          <h5>Article 12 :</h5>
          <p class="text-justify">Tout membre du bureau est tenu de respecter scrupuleusement le dit règlement intérieur.</p>
          <h4 class="text-center">Titre 1 : DES REUNIONS</h4>
          <h5>Article 13 :</h5>
          <p class="text-justify">Le bureau peut être convoqué en session ordinaire comme en session          extraordinaire.
            Il peut se réunir en session ordinaire au moins deux fois par mois, en principe le week-end
          </p>
          <h5>Article 14 :</h5>
          <p class="text-justify">Il peut aussi se réunir en session extraordinaire </p>
      </div>
      <div id="thanks">Mérci,</div>
      <div id="notices" class="notices">
        <div class="president">Le président <br> <br> Younoussa Diallo <br></div>
        <div class="notice secretaire">Le secrétaire <br> <br> Fodé Cissokho</div>
      </div>
    </main>

     <script type="text/javascript">
        function printDiv(){
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>
  </body>
</html>


