    {{--
        @component('mail::message')
        # AEERK KEDOUGOU
        Salut 
        @if($msg->genre == 1)
            M.{{$msg->prenom}} {{$msg->nom}}
        @elseif($msg->genre == 2)
            Mme.{{$msg->prenom}} {{$msg->nom}}
        @endif
        @if($msg->status == 1 && $msg->codifier != 1 && $msg->prix == 0)
            
        @component('mail::panel')
            Le Bureau de l'AEERK vous informe que vos document ont ete valide <br>
            Vous pouver desormer codifier en ligine via le lien ci dessous
            <br>
            Remarque : Apres avoir codifier nous vous prions de verifier votre compte email pour recevoire la notification qui vous informera votre chambre.
        @endcomponent

        @component('mail::button', ['url' => 'http://aeerk.herokuapp.com/codification'])
            Veullez Vous Codifier
        @endcomponent

        @elseif($msg->status == 2 )

        @component('mail::panel')
            Le Bureau de l'AEERK vous informe que vos document ont ete refuse <br>
            Vous pouvez vous raprocher au pres du bureau pour plus d'information <br>
            Nous contactez sur le 77000000 / 7800000 ou l'adresse suivante aeerk@gmail.com. 
        @endcomponent

        @elseif($msg->status == 1 && $msg->codifier == 1 && $msg->prix > 0)
            @component('mail::panel')
                    Nous vous informons que vous avez ete codifier a 
                @foreach($msg->chambre->immeubles as $ac_imb)
                    {{$ac_imb->name}}
                @endforeach
                    a la chambre {{$msg->chambre->nom }}
                    @if($msg->position == 1)
                        a la {{$msg->chambre->position }}ere place
                    @else
                        a la {{$msg->chambre->position }}em place
                    @endif
            @endcomponent
        @endif
        Merci,Le President de la commission sociale
        @endcomponent
    --}}

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
    <!--[if !mso]--><!-- -->
    <link href='https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700' rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel="stylesheet">
    <!--<![endif]-->

    <title>AEERK</title>

    <style type="text/css">
        body {
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            /* mso-margin-top-alt: 0px;
            mso-margin-bottom-alt: 0px;
            mso-padding-alt: 0px 0px 0px 0px; */
            
        }

        .container{
            box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;
        }

        p,
        h1,
        h2,
        h3,
        h4 {
            margin-top: 0;
            margin-bottom: 0;
            padding-top: 0;
            padding-bottom: 0;
        }

        span.preheader {
            display: none;
            font-size: 1px;
        }

        html {
            width: 100%;
        }

        table {
            font-size: 14px;
            border: 0;
        }
        /* ----------- responsivity ----------- */

        @media only screen and (max-width: 640px) {
            /*------ top header ------ */
            .main-header {
                font-size: 20px !important;
            }
            .main-section-header {
                font-size: 28px !important;
            }
            .show {
                display: block !important;
            }
            .hide {
                display: none !important;
            }
            .align-center {
                text-align: center !important;
            }
            .no-bg {
                background: none !important;
            }
            /*----- main image -------*/
            .main-image img {
                width: 440px !important;
                height: auto !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 440px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 440px !important;
            }
            .container580 {
                width: 400px !important;
            }
            .main-button {
                width: 220px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 320px !important;
                height: auto !important;
            }
            .team-img img {
                width: 100% !important;
                height: auto !important;
            }
        }

        @media only screen and (max-width: 479px) {
            /*------ top header ------ */
            .main-header {
                font-size: 18px !important;
            }
            .main-section-header {
                font-size: 26px !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 280px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 280px !important;
            }
            .container590 {
                width: 280px !important;
            }
            .container580 {
                width: 260px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 280px !important;
                height: auto !important;
            }
        }
    </style>
    <!--[if gte mso 9]><style type=”text/css”>
        body {
        font-family: arial, sans-serif!important;
        }
        </style>
    <![endif]-->
</head>


<body class="respond" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
    <!-- pre-header -->
   
  <div class="row container">
        <!-- pre-header end -->
    <!-- header -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff">

        <tr>
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">

                            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                                <tr>
                                    <td align="center" height="70" style="height:70px;">
                                        <a href="" style="display: block; border-style: none !important; border: 0 !important;text-decoration:none">
                                        <!-- <h3 style="text-align: center;">AEERK KEDOUGOU</h3> -->
                                        <img border="0" style="display: block; width: 250px;height:auto" src="{{asset('user/img/accueil.png')}}" alt="" />
                                        </a>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
    <!-- end header -->

    <!-- big image section -->

    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="bg_color">

        <tr>
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                    <tr>
                        <td align="center" style="color: #343434; font-size: 24px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;"
                            class="main-header">
                            <!-- section text ======-->

                            <!-- <div style="line-height: 35px">Message du Bureau</div> -->
                        </td>
                    </tr>

                    <tr>
                        <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">
                            <table border="0" width="40" align="center" cellpadding="0" cellspacing="0" bgcolor="eeeeee">
                                <tr>
                                    <td height="2" style="font-size: 2px; line-height: 2px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="left">
                            <table border="0" width="590" align="center" cellpadding="0" cellspacing="0" class="container590">
                                <tr>
                                    <td align="left" style="color: #888888; font-size: 16px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">
                                        <!-- section text ======-->

                                        <p style="line-height: 24px; margin-bottom:15px;">
                                        Bonjour
                                            @if($msg->genre == 1)
                                                Mme  {{$msg->prenom}} {{$msg->nom}},
                                            @elseif($msg->genre == 2)
                                                Mr {{$msg->prenom}} {{$msg->nom}},
                                            @endif
                                        </p>
                                        @if($msg->status == 1 && $msg->codifier != 1 && $msg->prix == 0)
                                        <p>
                                            Le bureau de l'AEERK vous rémércie de votre compréhesion pour cette attente de vérification. <br>
                                            Nous vous informons que vos documents déposés pour la codification ont étés accéptés. <br>
                                        </p>
                                        <p style="line-height: 24px;margin-bottom:15px;">
                                           Nous vous invitons a aller jetter un coup d'oeil sur la page de documentation <a href="http://localhost:8000/systeme" target="_blank" rel="noopener noreferrer">Documentation</a> de la plateforme pour comprendre la procedure de codification en ligne.
                                        </p>
                                        <p style="line-height: 24px;margin-bottom:15px;">
                                            <span style="font-weight:bold;text-decoration:underline;color:blue">NB : </span>Si toute fois vous avez choisi la codification en ligne,vous serez rediriger sur une page de connexion dont les coordonnes sont les suivantes pour se connécter.
                                            <br>
                                            <span style="font-weight:bold;text-decoration:underline;color:blue">Lien : </span>Cliquer sur <a href="http://localhost:8000/login" target="_blank" rel="noopener noreferrer">Codifier</a>.
                                            <br>
                                            <span style="font-weight:bold;text-decoration:underline;color:blue">Email : </span>{{$user->email}} 
                                            <br>
                                            <span style="font-weight:bold;text-decoration:underline;color:blue">Mot de passe : </span>{{$user->text_dechifre}}
                                        </p>
                                        {{--
                                        <p style="line-height: 24px; margin-bottom:20px;">
                                            @component('mail::button', ['url' => 'https://aeerk.herokuapp.com/codification'])
                                                Codification en ligne
                                            @endcomponent
                                        </p>
                                        --}}
                                        <p style="line-height: 24px;margin-bottom:15px;">
                                           Et si vous n'aviez pas compris la procedure approchez vous au pres du bureau pour effectuer la codification en presentielle.
                                        </p>
                                        @elseif($msg->status == 2 )
                                        <p style="line-height: 24px;margin-bottom:15px;">
                                            Le bureau de l'AEERK vous rémércie de votre compréhesion pour cette attente de vérification. <br>
                                            Nous vous informons que vos documents déposés pour la codification n'ont pas étés accéptés. <br>
                                            
                                        </p>
                                        <h3 style="font-weight:bold;text-decoration:underline;color:blue;text-align:center">Motif du rejet des documents :</h3>
                                        <p style="line-height: 24px;margin-bottom:15px;">
                                            {{$msg->textmail}} <br> <br>
                                            Pour plus d'informations nous contacter sur l'adrésse mail suivante {{$info->email}} ou sur le {{$info->phone}}. 
                                       </p>
                                        @elseif($msg->status == 1 && $msg->codifier == 1 && $msg->prix > 0)
                                            <p style="line-height: 24px;margin-bottom:15px;">
                                                Votre codification à bien été enrégistré, vous êtes à
                                                {{$msg->chambre->immeuble->name}}
                                                {{--
                                                @foreach($msg->chambre->immeubles as $ac_imb)
                                                    {{$ac_imb->name}}
                                                @endforeach
                                                --}}
                                                    à la chambre {{$msg->chambre->nom }},
                                                    @if($msg->position == 1)
                                                        @if($msg->genre == 1)
                                                            vous êtes la  {{$msg->position }}ere à être codifier dans cette chambre
                                                        @elseif($msg->genre == 2)
                                                            vous êtes le  {{$msg->position }}er à être codifier dans cette chambre
                                                        @endif
                                                    @else
                                                        @if($msg->genre == 1)
                                                            vous êtes la  {{$msg->position }}eme à être codifier dans cette chambre
                                                        @elseif($msg->genre == 2)
                                                            vous êtes le  {{$msg->position }}em à être codifier dans cette chambre
                                                        @endif
                                                    @endif
                                            </p>
                                        <table border="0" align="center" style="text-align: justify;" width="180" cellpadding="0" cellspacing="0" bgcolor="5caad2" style="margin-bottom:20px;">

                                            <tr>
                                                <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="color: #ffffff; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 22px; letter-spacing: 2px;">
                                                    <!-- main section button -->

                                                    <div style="line-height: 22px;width: 400px;">
                                                        <a href="http://localhost:8000/createPdf/{{ $msg->id }}/{{ $msg->email }}/{{ $msg->phone }}" style="color: #ffffff; text-decoration: none;">Tèlècharger le règlement</a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                            </tr>

                                        </table>
                                        @endif
                                        <p style="line-height: 24px">
                                            Cordialement,</br>
                                            Le bureau de l'AEERK
                                        </p>

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>





                </table>

            </td>
        </tr>

        <tr>
            <td height="40" style="font-size: 40px; line-height: 40px;">&nbsp;</td>
        </tr>

    </table>

    <!-- end section -->
  </div>


  

</body>

</html>


