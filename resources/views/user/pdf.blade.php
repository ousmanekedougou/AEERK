	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>pdf</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="{{asset('user/css/dropzone/dropzone.css')}}">
			<link rel="stylesheet" href="{{asset('user/css/linearicons.css')}}">
			<link rel="stylesheet" href="{{asset('user/css/font-awesome.min.css')}}">
			<link rel="stylesheet" href="{{asset('user/css/bootstrap.css')}}">
			<link rel="stylesheet" href="{{asset('user/css/magnific-popup.css')}}">
			<link rel="stylesheet" href="{{asset('user/css/nice-select.css')}}">							
			<link rel="stylesheet" href="{{asset('user/css/animate.min.css')}}">
			<link rel="stylesheet" href="{{asset('user/css/owl.carousel.css')}}">			
			<link rel="stylesheet" href="{{asset('user/css/jquery-ui.css')}}">			
			<link rel="stylesheet" href="{{asset('user/style.css')}}"> 
			<link rel="stylesheet" href="{{asset('user/css/main.css')}}">
            <style>
                .sample-text{
                    margin-top: 5px;
                    text-align: justify;
                }
                .content{
                   box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;
                    padding: 20px;
                    margin: 5px;
                    width: 100%;
                }
                table{
                    width: 100%;
                }
                .header-info{
                    padding: 8px;
                   box-shadow: rgba(33, 35, 38, 0.1) 0px 10px 10px -10px;
                    color: black;
                    font-weight: 400;
                }
                .header-info img{
                    width: 90%;
                }
            </style>
		</head>
		<body>	
	

			<!-- Start Sample Area -->
			<section class="sample-text-area">
				<div class="container">
					<div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8 content">
                            <div class="row header-info" >
                                <div class="col-md-4">
                                    <img src="{{ Storage::url($codifier_nouveau->image) }}" alt="" class="img-fluid">
                                </div>
                                <div class="col-md-8 mt-sm-20 left-align-p">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>Trante un mille</td>
                                                <td class="pull-right">{{$codifier_nouveau->prix}}</td>
                                            </tr>
                                             <tr>
                                                <td>Nom</td>
                                                <td class="pull-right">{{$codifier_nouveau->nom}}</td>
                                            </tr>
                                             <tr>
                                                <td>Prenom</td>
                                                <td class="pull-right">{{$codifier_nouveau->prenom}}</td>
                                            </tr>
                                             <tr>
                                                <td>Telephone</td>
                                                <td class="pull-right">{{$codifier_nouveau->phone}}</td>
                                            </tr>
                                             <tr>
                                                <td>{{$codifier_nouveau->immeuble->name}}</td>
                                                <td class="pull-right">{{$codifier_nouveau->chambre->name}}</td>
                                            </tr>
                                             <tr>
                                                <td>
                                                @if($codifier_nouveau->ancienete == 1)
                                                    Nouveau
                                                @else 
                                                    Ancien
                                                @endif
                                                </td>
                                                <td class="pull-right">{{$codifier_nouveau->created_at}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br>
                            <h4 class="text-heading">Reglement interieure</h4>
                            <p class="sample-text">
                                Every avid independent filmmaker has <b>Bold</b> about making that <i>Italic</i> interest documentary, or short film to show off their creative prowess. Many have great ideas and want to “wow” the<sup>Superscript</sup> scene, or video renters with their big project.  But once you have the<sub>Subscript</sub> “in the can” (no easy feat), how do you move from a <del>Strike</del> through of master DVDs with the <u>“Underline”</u> marked hand-written title inside a secondhand CD case, to a pile of cardboard boxes full of shiny new, retail-ready DVDs, with UPC barcodes and polywrap sitting on your doorstep?  You need to create eye-popping artwork and have your project replicated. Using a reputable full service DVD Replication company like PacificDisc, Inc. to partner with is certainly a helpful option to ensure a professional end result, but to help with your DVD replication project, here are 4 easy steps to follow for good DVD replication results: 

                            </p>
                             <p class="sample-text">
                                Every avid independent filmmaker has <b>Bold</b> about making that <i>Italic</i> interest documentary, or short film to show off their creative prowess. Many have great ideas and want to “wow” the<sup>Superscript</sup> scene, or video renters with their big project.  But once you have the<sub>Subscript</sub> “in the can” (no easy feat), how do you move from a <del>Strike</del> through of master DVDs with the <u>“Underline”</u> marked hand-written title inside a secondhand CD case, to a pile of cardboard boxes full of shiny new, retail-ready DVDs, with UPC barcodes and polywrap sitting on your doorstep?  You need to create eye-popping artwork and have your project replicated. Using a reputable full service DVD Replication company like PacificDisc, Inc. to partner with is certainly a helpful option to ensure a professional end result, but to help with your DVD replication project, here are 4 easy steps to follow for good DVD replication results: 
                            </p>
                             <p class="sample-text">
                                Every avid independent filmmaker has <b>Bold</b> about making that <i>Italic</i> interest documentary, or short film to show off their creative prowess. Many have great ideas and want to “wow” the<sup>Superscript</sup> scene, or video renters with their big project.  But once you have the<sub>Subscript</sub> “in the can” (no easy feat), how do you move from a <del>Strike</del> through of master DVDs with the <u>“Underline”</u> marked hand-written title inside a secondhand CD case, to a pile of cardboard boxes full of shiny new, retail-ready DVDs, with UPC barcodes and polywrap sitting on your doorstep?  You need to create eye-popping artwork and have your project replicated. Using a reputable full service DVD Replication company like PacificDisc, Inc. to partner with is certainly a helpful option to ensure a professional end result, but to help with your DVD replication project, here are 4 easy steps to follow for good DVD replication results: 

                            </p>
                             <p class="sample-text">
                                Every avid independent filmmaker has <b>Bold</b> about making that <i>Italic</i> interest documentary, or short film to show off their creative prowess. Many have great ideas and want to “wow” the<sup>Superscript</sup> scene, or video renters with their big project.  But once you have the<sub>Subscript</sub> “in the can” (no easy feat), how do you move from a <del>Strike</del> through of master DVDs with the <u>“Underline”</u> marked hand-written title inside a secondhand CD case, to a pile of cardboard boxes full of shiny new, retail-ready DVDs, with UPC barcodes and polywrap sitting on your doorstep?  You need to create eye-popping artwork and have your project replicated. Using a reputable full service DVD Replication company like PacificDisc, Inc. to partner with is certainly a helpful option to ensure a professional end result, but to help with your DVD replication project, here are 4 easy steps to follow for good DVD replication results: 

                            </p>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
				</div>
			</section>
	

		


			<script src="{{asset('user/js/vendor/jquery-2.2.4.min.js')}}"></script>
			<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
  			<script src="{{asset('user/js/pooper.js')}}"></script>			
			<script src="{{asset('user/js/vendor/bootstrap.min.js')}}"></script>			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="{{asset('user/js/easing.min.js')}}"></script>			
			<script src="{{asset('user/js/hoverIntent.js')}}"></script>
			<script src="{{asset('user/js/superfish.min.js')}}"></script>	
			<script src="{{asset('user/js/jquery.ajaxchimp.min.js')}}"></script>
			<script src="{{asset('user/js/jquery.magnific-popup.min.js')}}"></script>	
    		<script src="{{asset('user/js/jquery.tabs.min.js')}}"></script>						
			<script src="{{asset('user/js/jquery.nice-select.min.js')}}"></script>	
			<script src="{{asset('user/js/owl.carousel.min.js')}}"></script>									
			<script src="{{asset('user/js/mail-script.js')}}"></script>	
			<script src="{{asset('user/js/main.js')}}"></script>
			<script src="{{asset('user/js/dropzone/dropzone.js')}}"></script>
			<script src="{{asset('user/js/social.js')}}"></script>
		</body>
	</html>