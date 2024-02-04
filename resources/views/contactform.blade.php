@extends("layouts.master")
@section("contenu")
   
<section class="mb-4">
    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contactez nous</h2>
    <!--Section description-->
    <h4 class="text-center font-weight-bold w-responsive mx-auto mb-5">Avez-vous des questions?
     N'hésitez pas à nous contacter directement. 
    Notre équipe reviendra vers vous dans une question d'heures pour vous aider.</h4>
    <div class="row">
        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact" name="contact" action="{{ route('contactform.create') }}" method="POST">
                 @csrf
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="name" name="name" class="form-control">
                            <label for="name" class="">Votre nom</label>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="email" id="email" name="email" class="form-control">
                            <label for="email" class="">Votre email</label>
                        </div>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" id="subject" name="subject" class="form-control">
                            <label for="subject" class="">Sujet du message</label>
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-12">
                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            <label for="message">Votre message</label>
                        </div>
                    </div>
                </div>
                <!--Grid row-->
                     <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>      
            </form>

            <div class="status"></div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 text-center">
             <ul class="list-unstyled mb-0">
              <div class="font-weight-bold">
                    <p>ASSOCIATION MEZA</p>
               </div>
                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                    <p>Paris, CA 94126, France</p>
                </li>
                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                    <p>+ 01 23 56 23 89</p>
                </li>
                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                    <p>contact@meza.com</p>
                </li>
            </ul>
        </div>
        <!--Grid column-->
    </div>
</section>
@endsection