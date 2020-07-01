<?php require_once 'header.php'; ?>

<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">Contact <strong>Us</strong></h2>
                <div id="gmap" class="contact-map">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">Email</h2>
                    <div class="status alert alert-success" style="display: block">email send !</div>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" required="required" placeholder="Nom et Prénoms">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Adresse@email.com">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="subject" class="form-control" required="required" placeholder="Objet">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Taper votre message"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Envoyer">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Nous contacter</h2>
                    <address>
                        <p>E-Ariary Inc.</p>
                        <p>935 Route Melville Tamatave I</p>
                        <p>Toamasina 501 - Madagascar</p>
                    </address>

                    <h2 class="title text-center">Info. CNAM</h2>
                    <address>
                        <p>Projet NFA021 - CNAM Toamasina</p>
                        <p>Mr. RAKOTOARISON Eddy Faniry</p>
                        <p>N° Auditeur : 19328204</p>
                        <p>Email: info@e-ariary.com</p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">Follow us</h2>
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--/#contact-page-->

<?php require_once 'footer.php'; ?>
