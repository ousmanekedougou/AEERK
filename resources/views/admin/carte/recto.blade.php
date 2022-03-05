
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

        *{
            box-sizing: border-box;
        }

        body {
       
        background-image: url('../img/graph-paper.svg');
        background-repeat: repeat;
        padding: 0;
        box-sizing: border-box;
        margin: 0;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .card-content-all {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
            margin-bottom: 15px;
        }

        .card-container {
        background: #34495e;
            /* border-radius: 20px; */
        width: 497px;
        height: auto;
        position: relative;
        /* border: 2px solid black; */
        /* box-shadow: 0px 0px 10px 5px rgba(0,0,0,0.1);  */
            /* border-bottom: 6px solid #2c3e50;
            border-right: 6px solid #2c3e50; */
        }
        .header {
        margin: 0;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2%;
        position: absolute;
        left: 0;
        right: -6px;
        font-family: sans-serif;
        color: black;
        font-weight: bold;
        background-color:silver;
        /* border-radius: 20px 20px 0px 0px; */
        }
        .header img{
            margin-left: -20px;
        }
        .header .company{
            margin-left: -9px;
            width: 100%;
            font-size: 0.5em;
            font-weight: bold;
        }

        .card {
        position: relative;
        padding-top: 60%;
        overflow: hidden;
        }

        .chip {
        position: absolute;
        top: 22%;
        left: 2%;
        width: 150px;
        height: 150px;
        /* height: auto; */
        border: 1px solid silver;
        text-align: center;
        }
        .chip span{
            text-align: center;
            position: absolute;
            top: 40%;
            left: 30%;
            color: white;
        }
         .status {
        position: absolute;
        top: 77%;
        left: 5%;
        color: white;
        }
        .text_card{
        position: absolute;
        top: 17%;
        left:39%;
        color: white;
        display:block;
        }
        .text_card .title{
        font-size: 2em;
        margin-top: 6px;
        margin-bottom: -10px;
        font-weight: bold;
        text-align: center;
        }
        .text_card .annee{
            text-align: center;
            margin-bottom: -5px;
        }

         .visa-recto {
        position: absolute;
        bottom: 1%;
        right: 1%;
        height: 30%;
        border-radius: 100%;
        }

        .visa {
        position: absolute;
        bottom: 5%;
        right: 5%;
        height: 30%;
        border-radius: 100%;
        }

        .text_card .user_first_name,.user_last_name,.user_phone,.user_city{
            margin-bottom: -13px;

        }
        .text_card .annee{
            font-weight: bold;
        }

        .card_recto_footer{
            position: absolute;
            top: 90%;
            left:1%;
            color: white;
        }
        .card_recto_footer span{
            display: block;
            font-size: 14px;
            font-weight: bold;
            text-decoration: underline;
        }
        
        .card-container {
        transition: 0.5s transform, 0.5s box-shadow;
        }

        .verso_header{
            background-color:transparent;
        }
        .text_verso_card{
        position: absolute;
        top: 1%;
        left:36%;
        color: white;
        display:block;
        font-size: 13px;
        }

        .verso_img{
            position: absolute;
            border-radius: 100%;
            top: 5%;
            left: 2%;
            height: 55%;
        }
        .card_footer{
            position: absolute;
            top: 65%;
            left:2%;
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
    </style>
  </head>
  <body id="print">
        
    <div class="card-content-all">
        <div class="card-container">
            <!-- <p class="bank-name">Bank 1337</p> -->
            <div class="header">
                <img src="{{asset('user/img/accueil.png')}}" alt="" srcset="">
                <div class="company">Association des élèves et étudiants ressortissants de kédougou</div>
            </div>
            <div class="card">
                <!-- <img class="chip" src="{{asset('user/img/diallo.png')}}"/> -->
                <div class="chip"> <span>PHOTO</span> </div>
                <!-- <span class="status">Ancien</span> -->
                <div class="text_card">
                    <p class="title">Carte Membre</p>
                    <p class="annee">ANNEE : 2021-2022  </p>
                    <p class="user_first_name">Prenom : .................................</p>
                    <p class="user_last_name">Nom : .......................................</p>
                    <p class="user_city">D.N.L : ..............................</p>
                    <p class="user_phone">Tel : .............................</p>
                </div>
                <div class="card_recto_footer">
                    <span> Cette carte n'est valable que pour l'annee en cours </span>
                </div>
                <img class="visa-recto"src="{{asset('user/img/3ccs.jpg')}}">
            </div>
        </div>

        <div style="margin: 10px;"></div>

        <div class="card-container">
            <!-- <p class="bank-name">Bank 1337</p> -->
            <div class="header">
                <div class="logo"><img src="{{asset('user/img/accueil.png')}}" alt="" srcset=""></div>
                <div class="company">Association des élèves et étudiants ressortissants de kédougou</div>
            </div>
            <div class="card">
                <!-- <img class="chip" src="{{asset('user/img/diallo.png')}}"/> -->
                <div class="chip"> <span>PHOTO</span> </div>
                <!-- <span class="status">Ancien</span> -->
                <div class="text_card">
                    <p class="title">Carte Membre</p>
                    <p class="annee">ANNEE : 2021-2022  </p>
                    <p class="user_first_name">Prenom : .................................</p>
                    <p class="user_last_name">Nom : .......................................</p>
                    <p class="user_city">D.N.L : ..............................</p>
                    <p class="user_phone">Tel : .............................</p>
                </div>
                <div class="card_recto_footer">
                    <span> Cette carte n'est valable que pour l'annee en cours </span>
                </div>
                <img class="visa-recto"src="{{asset('user/img/3ccs.jpg')}}">
            </div>
        </div>
    </div>
    <div class="card-content-all">
        <div class="card-container">
            <!-- <p class="bank-name">Bank 1337</p> -->
            <div class="header">
                <div class="logo"><img src="{{asset('user/img/accueil.png')}}" alt="" srcset=""></div>
                <div class="company">Association des élèves et étudiants ressortissants de kédougou</div>
            </div>
            <div class="card">
                <!-- <img class="chip" src="{{asset('user/img/diallo.png')}}"/> -->
                <div class="chip"> <span>PHOTO</span> </div>
                <!-- <span class="status">Ancien</span> -->
                <div class="text_card">
                    <p class="title">Carte Membre</p>
                    <p class="annee">ANNEE : 2021-2022  </p>
                    <p class="user_first_name">Prenom : .................................</p>
                    <p class="user_last_name">Nom : .......................................</p>
                    <p class="user_city">D.N.L : ..............................</p>
                    <p class="user_phone">Tel : .............................</p>
                </div>
                <div class="card_recto_footer">
                    <span> Cette carte n'est valable que pour l'annee en cours </span>
                </div>
                <img class="visa-recto"src="{{asset('user/img/3ccs.jpg')}}">
            </div>
        </div>

        <div style="margin: 10px;"></div>

        <div class="card-container">
            <!-- <p class="bank-name">Bank 1337</p> -->
            <div class="header">
                <div class="logo"><img src="{{asset('user/img/accueil.png')}}" alt="" srcset=""></div>
                <div class="company">Association des élèves et étudiants ressortissants de kédougou</div>
            </div>
            <div class="card">
                <!-- <img class="chip" src="{{asset('user/img/diallo.png')}}"/> -->
                  <div class="chip"> <span>PHOTO</span> </div>
                <!-- <span class="status">Ancien</span> -->
                <div class="text_card">
                    <p class="title">Carte Membre</p>
                    <p class="annee">ANNEE : 2021-2022  </p>
                    <p class="user_first_name">Prenom : .................................</p>
                    <p class="user_last_name">Nom : .......................................</p>
                    <p class="user_city">D.N.L : ..............................</p>
                    <p class="user_phone">Tel : .............................</p>
                </div>
                <div class="card_recto_footer">
                    <span> Cette carte n'est valable que pour l'annee en cours </span>
                </div>
                <img class="visa-recto"src="{{asset('user/img/3ccs.jpg')}}">
            </div>
        </div>
    </div>
    <div class="card-content-all">
        <div class="card-container">
            <!-- <p class="bank-name">Bank 1337</p> -->
            <div class="header">
                <div class="logo"><img src="{{asset('user/img/accueil.png')}}" alt="" srcset=""></div>
                <div class="company">Association des élèves et étudiants ressortissants de kédougou</div>
            </div>
            <div class="card">
                <!-- <img class="chip" src="{{asset('user/img/diallo.png')}}"/> -->
                  <div class="chip"> <span>PHOTO</span> </div>
                <!-- <span class="status">Ancien</span> -->
                <div class="text_card">
                    <p class="title">Carte Membre</p>
                    <p class="annee">ANNEE : 2021-2022  </p>
                    <p class="user_first_name">Prenom : .................................</p>
                    <p class="user_last_name">Nom : .......................................</p>
                    <p class="user_city">D.N.L : ..............................</p>
                    <p class="user_phone">Tel : .............................</p>
                </div>
                <div class="card_recto_footer">
                    <span> Cette carte n'est valable que pour l'annee en cours </span>
                </div>
                <img class="visa-recto"src="{{asset('user/img/3ccs.jpg')}}">
            </div>
        </div>

        <div style="margin: 10px;"></div>

        <div class="card-container">
            <!-- <p class="bank-name">Bank 1337</p> -->
            <div class="header">
                <div class="logo"><img src="{{asset('user/img/accueil.png')}}" alt="" srcset=""></div>
                <div class="company">Association des élèves et étudiants ressortissants de kédougou</div>
            </div>
            <div class="card">
                <!-- <img class="chip" src="{{asset('user/img/diallo.png')}}"/> -->
                  <div class="chip"> <span>PHOTO</span> </div>
                <!-- <span class="status">Ancien</span> -->
                <div class="text_card">
                    <p class="title">Carte Membre</p>
                    <p class="annee">ANNEE : 2021-2022  </p>
                    <p class="user_first_name">Prenom : .................................</p>
                    <p class="user_last_name">Nom : .......................................</p>
                    <p class="user_city">D.N.L : ..............................</p>
                    <p class="user_phone">Tel : .............................</p>
                </div>
                <div class="card_recto_footer">
                    <span> Cette carte n'est valable que pour l'annee en cours </span>
                </div>
                <img class="visa-recto"src="{{asset('user/img/3ccs.jpg')}}">
            </div>
        </div>
    </div>
    <div class="card-content-all">
        <div class="card-container">
            <!-- <p class="bank-name">Bank 1337</p> -->
            <div class="header">
                <div class="logo"><img src="{{asset('user/img/accueil.png')}}" alt="" srcset=""></div>
                <div class="company">Association des élèves et étudiants ressortissants de kédougou</div>
            </div>
            <div class="card">
                <!-- <img class="chip" src="{{asset('user/img/diallo.png')}}"/> -->
                  <div class="chip"> <span>PHOTO</span> </div>
                <!-- <span class="status">Ancien</span> -->
                <div class="text_card">
                    <p class="title">Carte Membre</p>
                    <p class="annee">ANNEE : 2021-2022  </p>
                    <p class="user_first_name">Prenom : .................................</p>
                    <p class="user_last_name">Nom : .......................................</p>
                    <p class="user_city">D.N.L : ..............................</p>
                    <p class="user_phone">Tel : .............................</p>
                </div>
                <div class="card_recto_footer">
                    <span> Cette carte n'est valable que pour l'annee en cours </span>
                </div>
                <img class="visa-recto"src="{{asset('user/img/3ccs.jpg')}}">
            </div>
        </div>

        <div style="margin: 10px;"></div>

        <div class="card-container">
            <!-- <p class="bank-name">Bank 1337</p> -->
            <div class="header">
                <div class="logo"><img src="{{asset('user/img/accueil.png')}}" alt="" srcset=""></div>
                <div class="company">Association des élèves et étudiants ressortissants de kédougou</div>
            </div>
            <div class="card">
                <!-- <img class="chip" src="{{asset('user/img/diallo.png')}}"/> -->
                  <div class="chip"> <span>PHOTO</span> </div>
                <!-- <span class="status">Ancien</span> -->
                <div class="text_card">
                    <p class="title">Carte Membre</p>
                    <p class="annee">ANNEE : 2021-2022  </p>
                    <p class="user_first_name">Prenom : .................................</p>
                    <p class="user_last_name">Nom : .......................................</p>
                    <p class="user_city">D.N.L : ..............................</p>
                    <p class="user_phone">Tel : .............................</p>
                </div>
                <div class="card_recto_footer">
                    <span> Cette carte n'est valable que pour l'annee en cours </span>
                </div>
                <img class="visa-recto"src="{{asset('user/img/3ccs.jpg')}}">
            </div>
        </div>
    </div>
    
  
    

    {{--
    <div class="card-content-all">
        <div class="card-container">
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
                    <span><i class="fas fa-phone-alt"> 77 043 32 35 / 78 201 47 72</i></span>
                    <span><i class="fas fa-envelope"> aeerk-sn@gmail.com</i></span>
                    <span><i class="fas fa-link"> www.aeerk.com</i></span>
                </div>
                <img class="visa"src="{{asset('user/img/3ccs.jpg')}}">
            </div>
        </div>
            <div style="margin: 10px;"></div>
        <div class="card-container">
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
                    <span><i class="fas fa-phone-alt"> 77 043 32 35 / 78 201 47 72</i></span>
                    <span><i class="fas fa-envelope"> aeerk-sn@gmail.com</i></span>
                    <span><i class="fas fa-link"> www.aeerk.com</i></span>
                </div>
                <img class="visa"src="{{asset('user/img/3ccs.jpg')}}">
            </div>
        </div>
    </div>

    <div class="card-content-all">
        <div class="card-container">
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
                    <span><i class="fas fa-phone-alt"> 77 043 32 35 / 78 201 47 72</i></span>
                    <span><i class="fas fa-envelope"> aeerk-sn@gmail.com</i></span>
                    <span><i class="fas fa-link"> www.aeerk.com</i></span>
                </div>
                <img class="visa"src="{{asset('user/img/3ccs.jpg')}}">
            </div>
        </div>
            <div style="margin: 10px;"></div>
        <div class="card-container">
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
                    <span><i class="fas fa-phone-alt"> 77 043 32 35 / 78 201 47 72</i></span>
                    <span><i class="fas fa-envelope"> aeerk-sn@gmail.com</i></span>
                    <span><i class="fas fa-link"> www.aeerk.com</i></span>
                </div>
                <img class="visa"src="{{asset('user/img/3ccs.jpg')}}">
            </div>
        </div>
    </div>

    <div class="card-content-all">
        <div class="card-container">
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
                    <span><i class="fas fa-phone-alt"> 77 043 32 35 / 78 201 47 72</i></span>
                    <span><i class="fas fa-envelope"> aeerk-sn@gmail.com</i></span>
                    <span><i class="fas fa-link"> www.aeerk.com</i></span>
                </div>
                <img class="visa"src="{{asset('user/img/3ccs.jpg')}}">
            </div>
        </div>
            <div style="margin: 10px;"></div>
        <div class="card-container">
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
                    <span><i class="fas fa-phone-alt"> 77 043 32 35 / 78 201 47 72</i></span>
                    <span><i class="fas fa-envelope"> aeerk-sn@gmail.com</i></span>
                    <span><i class="fas fa-link"> www.aeerk.com</i></span>
                </div>
                <img class="visa"src="{{asset('user/img/3ccs.jpg')}}">
            </div>
        </div>
    </div>

    <div class="card-content-all">
        <div class="card-container">
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
                    <span><i class="fas fa-phone-alt"> 77 043 32 35 / 78 201 47 72</i></span>
                    <span><i class="fas fa-envelope"> aeerk-sn@gmail.com</i></span>
                    <span><i class="fas fa-link"> www.aeerk.com</i></span>
                </div>
                <img class="visa"src="{{asset('user/img/3ccs.jpg')}}">
            </div>
        </div>
            <div style="margin: 10px;"></div>
        <div class="card-container">
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
                    <span><i class="fas fa-phone-alt"> 77 043 32 35 / 78 201 47 72</i></span>
                    <span><i class="fas fa-envelope"> aeerk-sn@gmail.com</i></span>
                    <span><i class="fas fa-link"> www.aeerk.com</i></span>
                </div>
                <img class="visa"src="{{asset('user/img/3ccs.jpg')}}">
            </div>
        </div>
    </div>
    --}}

    <div><button  class="btn btn-success btn-xs" style="margin-top:10px" id="print_Button" onclick="printDiv()"><i class="fa fa-print">Telecharger le recu</i></button> </div>
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