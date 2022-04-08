<?php
include 'conn.php';
include 'chambre.php';

$chambreDispo = getChambreDispo($conn);

?>
<!doctype html>
<html lang="en">
  <head>
  	<title>EASTMASTER - RÉSERVATION</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="reservation/css/style.css">

	</head>
	<body>
	<form method="post" action="verifconn.php">

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Réserver votre chambre</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-10">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-md-6">
								<div class="contact-wrap w-100 p-lg-5 p-4">
									<h3 class="mb-4">Création d'une Réservation :</h3>
									<div id="form-message-warning" class="mb-4"></div> 
				      		<div id="form-message-success" class="mb-4">
				            Votre réservation à bien était pris en compte, merci de votre confiance.
				      		</div>
									<form method="POST" id="contactForm" name="contactForm" class="contactForm">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="Name" id="Name" placeholder="Nom">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="Prenom" id="Prenom" placeholder="Prénom">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="email" class="form-control" name="email" id="email" placeholder="Email">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="tel" class="form-control" name="tel" id="tel" placeholder="Téléphone">
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group">
													<input type="date" class="form-control" name="arriver" id="arriver" placeholder="Date Arrivé">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="date" class="form-control" name="depart" id="depart" placeholder="Date Départ">
												</div>
											</div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select class="form-select" name="numchambre" id="numchambre">
                                                        <?php
                                                        foreach ($chambreDispo as $chambre) { ?>
                                                            <option><?= $chambre['chambreid'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="Valider" class="btn btn-primary">
													<div class="submitting"></div>
												</div>
                                            </div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-md-6 d-flex align-items-stretch">
								<div class="info-wrap w-100 p-lg-5 p-4 img">
									<h3>Besoin d'informations ?</h3>
									<p class="mb-4">Contacter nous pour plus d'informations concernant votre réservation</p>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-map-marker"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Adresse:</span> 30 rue Edmond Rostand-13431 Marseille Cedex 06</p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-phone"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Téléphone:</span> <a href="tel://1234567920">04 05 06 07 08</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-paper-plane"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Email:</span> <a href="mailto:info@yoursite.com">hotel.Eastmaster@gmail.com</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-globe"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Website</span> <a href="#">EASTMASTER.com</a></p>
					          </div>



                            </div>


                                        </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="reservation/js/jquery.min.js"></script>
  <script src="reservation/js/popper.js"></script>
  <script src="reservation/js/bootstrap.min.js"></script>
  <script src="reservation/js/jquery.validate.min.js"></script>
  <script src="reservation/js/main.js"></script>
	</form>
	</body>
</html>

