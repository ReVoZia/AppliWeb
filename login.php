
    <!doctype html>
    <html lang="fr">
    <head>
        <title>EASTMASTER - CONNEXION</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


        <link rel="stylesheet" href="reservation/css/style.css">

    </head>
    <body>

        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <h2 class="heading-section">Réserver votre chambre</h2>
                    </div>
                </div>

                <?php if(isset($_GET['error'])) { ?>
                    <div class="alert alert-dismissible alert-info">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong><?= $_GET['error'] ?></strong>
                    </div>
                <?php } ?>

                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="wrapper">
                            <div class="row no-gutters">
                                <div class="col-md-6">
                                    <div class="contact-wrap w-100 p-lg-5 p-4">
                                        <h3 class="mb-4">Se Connecter :</h3>

                                        <form method="POST" action="app/http/auth.php">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" name="Email" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" name="Pass"  placeholder="Mot de passe">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="submit" value="Valider" class="btn btn-primary">
                                                        <div class="submitting"></div>
                                                        <a href="index.php"> <input type="button" value="Retour" class="btn btn-dark"> </a>
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
    </body>
    </html>


