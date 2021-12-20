
<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Carte Membre</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='./css/main.css'>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style>
        /* html {
        background: #009FFF;  
        background: -webkit-linear-gradient(to right, #ec2F4B, #009FFF);  
        background: linear-gradient(to right, #ec2F4B, #009FFF); 
        } */

        body {
        width: 100vw;
        height: 100vh;
        background-image: url('../img/graph-paper.svg');
        background-repeat: repeat;
        padding: 20px;
        box-sizing: border-box;
        margin: 0;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        body {
        display: flex;
        justify-content: center;
        align-items: center;
        }

        .card-container {
        background: #34495e;
        border-radius: 20px;
        width: 100%;
        max-width: 600px;
        position: relative;
        box-shadow: 0px 0px 10px 5px rgba(0,0,0,0.1); 
        border-bottom: 6px solid #2c3e50;
        border-right: 6px solid #2c3e50;
        }
          .header {
        margin: 0;
        /* width: 100%; */
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2%;
        position: absolute;
        left: 0;
        right: -6px;
        font-size: 0.7rem;
        font-family: sans-serif;
        color: black;
        font-weight: bold;
        background-color:#fff;
        border-radius: 20px 20px 0px 0px;
        min-width: 30%;
        }

        .card {
        position: relative;
        padding-top: 60%;
        overflow: hidden;
        }

        .chip {
        position: absolute;
        top: 22%;
        left: 5%;
        width: 160px;
        height: 180px;
        }
         .status {
        position: absolute;
        top: 73%;
        left: 13%;
        color: white;
        }
        .text_card{
        position: absolute;
        top: 17%;
        left:33%;
        color: white;
        display:block;
        }
        .text_card .title{
        font-size: 2.9em;
        margin-top: 6px;
        margin-bottom: -10px;
        }

        .visa {
        position: absolute;
        bottom: 5%;
        right: 5%;
        height: 30%;
        border-radius: 100%;
        }

        .text_card .user_first_name,.user_last_name,.user_phone,.user_city{
            margin-bottom: -10px;

        }
        .text_card .user_first_name,.user_last_name{
            font-weight: bold;
        }

        .card_recto_footer{
            position: absolute;
            top: 85%;
            left:5%;
            color: white;
        }
        .card_recto_footer span{
            display: block;
            font-size: 13px;
        }
         .card_recto_footer span i{
            font-size: 10px;
        }

        /* .bank-name {
        margin: 0;
        display: inline-block;
        padding: 10px 20px;
        padding-left: 5%;
        position: absolute;
        top: 10%;
        left: 0;
        font-size: 1.5rem;
        font-family: sans-serif;
        color: black;
        font-weight: bold;
        background-color: white;
        min-width: 30%;
        border-top-right-radius: 50px;
        border-bottom-right-radius: 50px;
        } */

      

        .card-container {
        transition: 0.5s transform, 0.5s box-shadow;
        }

        .verso_header{
            background-color:transparent;
        }
        .text_verso_card{
        position: absolute;
        top: 8%;
        left:40%;
        color: white;
        display:block;
        }

        .verso_img{
            position: absolute;
            top: 10%;
            left: 5%;
            height: 50%;
        }
        .card_footer{
            position: absolute;
            top: 70%;
            left:5%;
            color: white;
        }
        .card_footer span{
            display: block;
            font-size: 13px;
        }
        .card_footer .title{
            font-weight: bold;
            margin-bottom: 10px;
        }
        .card_footer span i{
            font-size: 10px;
        }

        /* .card-container:hover {
        transform: scale(1.1) rotate(3deg);
        box-shadow: 10px 10px 10px 5px rgba(0,0,0,0.3); 
        } */

        @media screen and (max-width: 580px){
            :root {
                font-size: 12px;
            }
            .bank-name {
                padding: 8px 15px;
            }
        }

        @media screen and (max-width: 460px){
            :root {
                font-size: 10px;
            }
            .bank-name {
                padding: 5px 12px;
            }
        }

        @media screen and (max-width: 360px){
            :root {
                font-size: 8px;
            }

            .card-container {
                border-bottom: 3px solid #2c3e50;
                border-right: 3px solid #2c3e50;
            }

            .bank-name {
                padding: 3px 8px;
            }
        }
    </style>
  </head>
  <body>

    <div class="card-container">
        <!-- <p class="bank-name">Bank 1337</p> -->
         <div class="header">
            <div class="logo"><img src="{{asset('user/img/accueil.png')}}" alt="" srcset=""></div>
            <div class="company">Association des élèves et étudiants ressortissants de kédougou</div>
        </div>
        <div class="card">
            <img class="chip" src="{{asset('user/img/diallo.png')}}"/>
             <span class="status">Ancien</span>
            <div class="text_card">
                <p class="title">Carte Membre</p>
                <p class="user_first_name">Ousmane  </p>
                <p class="user_last_name">Diallo</p>
                <p class="user_phone">774569087</p>
                <p class="user_city">Département : Kedougou</p>
                <p class="user_city">Commune :  Kedougou</p>
            </div>
            <div class="card_recto_footer">
                <span> <i class="fas fa-clock"> Date de délivrance : 12/12/2012</i> </span>
                <span><i class="fas fa-hourglass-half"> Date d'éxpiration : 12/12/2021</i></span>
            </div>
            <img class="visa"src="{{asset('user/img/3ccs.jpg')}}">
        </div>
    </div>

    <div style="margin: 30px;"></div>

     <div class="card-container">
        <!-- <p class="bank-name">Bank 1337</p> -->
         <div class="header verso_header">
            
        </div>
        <div class="card">
            <img class="verso_img" src="{{asset('user/img/3ccs.jpg')}}"/>
            <div class="text_verso_card">
                <p>Cette carte est strictement pérsonnelle</p>
                <p>Elle demeure la proprieté de l'association AEERK qui peut l'annuler ou en reprendre posséssion en tout temps
                    si obtenue ou utilisé froduleusement.
                </p>
                <p>
                    Elle est sous la résponsabilite de l'étudiant avec toutes les conséquences de droit.
                </p>
            </div>
            <div class="card_footer">
                <span class="title">Pour tout renséignement</span>
                <span> <i class="fas fa-map-marker-alt"> Médina Rue 39x30 Dakar,Sénégal</i> </span>
                <span><i class="fas fa-phone-alt"> 77-000-00-00 / 77-000-00-00</i></span>
                <span><i class="fas fa-envelope"> aeerk@gmail.com</i></span>
                <span><i class="fas fa-link"> www.aeerk.com</i></span>
            </div>
            <img class="visa"src="{{asset('user/img/3ccs.jpg')}}">
        </div>
    </div>
    
  </body>
</html>