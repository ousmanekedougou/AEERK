<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>AEERK|RECUE</title>
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


  </style>
  </head>
  <body>
      <h1 class="name_h1">REÇUE DE CODIFICATION</h1>
        <div class="box-shadow">
            <header class="clearfix">
                <div id="logo">
                    <img src="{{$image}}" width="150" height="150">
                </div>
                <div id="company">
                    <img src="{{$pic}}" width="147" height="30">
                    <div>Rue 39x30</div>
                    <div>77 000 00 00 / 78 000 00 00</div>
                    <div><a href="">aeerk@gmail.com</a></div>
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
                          @foreach($etudiant->chambre->immeubles as $ac_imb)
                                  {{$ac_imb->name}} : 
                          @endforeach
                          a {{$etudiant->chambre->nom }}
                  </div>
                  <div class="date">
                      A la 
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
          <h1 style="text-align: center;">Le Reglement interieur de l'AEERK</h1>
          <p class="text-justify">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi ut, commodi iure dignissimos sapiente nihil voluptatibus doloremque, obcaecati vel corporis aliquam unde, dolorum atque repudiandae consequuntur eligendi fuga voluptas nulla similique veniam quibusdam deserunt. Nemo possimus nesciunt sequi voluptates velit, consequatur voluptate! Accusamus quo molestias itaque at fuga ipsa est sunt cum quos exercitationem temporibus commodi explicabo voluptate, quisquam excepturi aperiam doloribus magni, ipsam illo tenetur voluptates tempora consequatur. Quae beatae dolore harum atque perspiciatis, ipsa, enim provident nisi tempore eligendi illum non numquam, magni fuga molestiae iste voluptatum quo sed dolor quod nihil. Quisquam exercitationem error laudantium id dignissimos?
          </p>
              <p class="text-justify">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi ut, commodi iure dignissimos sapiente nihil voluptatibus doloremque, obcaecati vel corporis aliquam unde, dolorum atque repudiandae consequuntur eligendi fuga voluptas nulla similique veniam quibusdam deserunt. Nemo possimus nesciunt sequi voluptates velit, consequatur voluptate! Accusamus quo molestias itaque at fuga ipsa est sunt cum quos exercitationem temporibus commodi explicabo voluptate, quisquam excepturi aperiam doloribus magni, ipsam illo tenetur voluptates tempora consequatur. Quae beatae dolore harum atque perspiciatis, ipsa, enim provident nisi tempore eligendi illum non numquam, magni fuga molestiae iste voluptatum quo sed dolor quod nihil. Quisquam exercitationem error laudantium id dignissimos?
          </p>
              <p class="text-justify">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi ut, commodi iure dignissimos sapiente nihil voluptatibus doloremque, obcaecati vel corporis aliquam unde, dolorum atque repudiandae consequuntur eligendi fuga voluptas nulla similique veniam quibusdam deserunt. Nemo possimus nesciunt sequi voluptates velit, consequatur voluptate! Accusamus quo molestias itaque at fuga ipsa est sunt cum quos exercitationem temporibus commodi explicabo voluptate, quisquam excepturi aperiam doloribus magni, ipsam illo tenetur voluptates tempora consequatur. Quae beatae dolore harum atque perspiciatis, ipsa, enim provident nisi tempore eligendi illum non numquam, magni fuga molestiae iste voluptatum quo sed dolor quod nihil. Quisquam exercitationem error laudantium id dignissimos?
          </p>
              <p class="text-justify">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi ut, commodi iure dignissimos sapiente nihil voluptatibus doloremque, obcaecati vel corporis aliquam unde, dolorum atque repudiandae consequuntur eligendi fuga voluptas nulla similique veniam quibusdam deserunt. Nemo possimus nesciunt sequi voluptates velit, consequatur voluptate! Accusamus quo molestias itaque at fuga ipsa est sunt cum quos exercitationem temporibus commodi explicabo voluptate, quisquam excepturi aperiam doloribus magni, ipsam illo tenetur voluptates tempora consequatur. Quae beatae dolore harum atque perspiciatis, ipsa, enim provident nisi tempore eligendi illum non numquam, magni fuga molestiae iste voluptatum quo sed dolor quod nihil. Quisquam exercitationem error laudantium id dignissimos?
          </p>
              <p class="text-justify">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi ut, commodi iure dignissimos sapiente nihil voluptatibus doloremque, obcaecati vel corporis aliquam unde, dolorum atque repudiandae consequuntur eligendi fuga voluptas nulla similique veniam quibusdam deserunt. Nemo possimus nesciunt sequi voluptates velit, consequatur voluptate! Accusamus quo molestias itaque at fuga ipsa est sunt cum quos exercitationem temporibus commodi explicabo voluptate, quisquam excepturi aperiam doloribus magni, ipsam illo tenetur voluptates tempora consequatur. Quae beatae dolore harum atque perspiciatis, ipsa, enim provident nisi tempore eligendi illum non numquam, magni fuga molestiae iste voluptatum quo sed dolor quod nihil. Quisquam exercitationem error laudantium id dignissimos?
          </p>
      </div>
      <div id="thanks">Merci,</div>
      <div id="notices">
        <div>Cordialement:</div>
        <div class="notice">Le Bureau</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>