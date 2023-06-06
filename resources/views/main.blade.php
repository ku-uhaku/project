@extends('layout.layout')

@section('title', 'Auto-école')

@section('content')
    <!-- Carousel -->
    <section class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('images/carousel-1.jpg') }}" alt="Image" />
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <h1 class="display-2 text-light mb-5 animated slideInDown">
                                        Apprenez à conduire en toute
                                        confiance
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('images/carousel-2.jpg') }}" alt="Image" />
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <h1 class="display-2 text-light mb-5 animated slideInDown">
                                        La sécurité au volant est notre
                                        priorité absolue
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Summary section -->
    <section class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4">
                    <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square bg-primary">
                                <i class="fa fa-car text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5>Apprentissage facile</h5>
                                <span>Vous pouvez apprendre à conduire tout
                                    en vous amusant</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square bg-primary">
                                <i class="fa fa-users text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5>Professeurs qualifiés</h5>
                                <span>Notre équipe de professeurs est
                                    qualifiée et expérimentée</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square bg-primary">
                                <i class="fa fa-file-alt text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5>Formation complète</h5>
                                <span>Notre formation est complète et vous
                                    permet d'obtenir votre permis de
                                    conduire</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About section -->
    <section class="container-xxl py-6" id="about-section">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="position-relative overflow-hidden ps-5 pt-5 h-100" style="min-height: 400px">
                        <img class="position-absolute w-100 h-100" src="{{ asset('images/about-1.jpg') }}" alt=""
                            style="object-fit: cover" />
                        <img class="position-absolute top-0 start-0 bg-white pe-3 pb-3"
                            src="{{ asset('images/about-2.jpg') }}" alt="" style="width: 200px; height: 200px" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="h-100">
                        <h6 class="text-primary text-uppercase mb-2">
                            A propos de nous
                        </h6>
                        <h1 class="display-6 mb-4">
                            Nous sommes une école de conduite, nous vous
                            apprenons à conduire en toute sécurité et en
                            toute confiance
                        </h1>
                        <div class="row g-4">
                            {{-- <div class="col-sm-6">
                                <a class="btn btn-primary py-3 px-5" href="">Read More</a>
                            </div> --}}
                            <div class="col-sm-6">
                                <a class="d-inline-flex align-items-center btn btn-outline-primary border-2 p-2"
                                    href="">
                                    <span class="flex-shrink-0 btn-square bg-primary">
                                        <i class="fa fa-phone-alt text-white"></i>
                                    </span>
                                    <span class="px-3">000-000-0000</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="container-xxl py-6">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <h6 class="text-primary text-uppercase mb-2">
                        Pourquoi nous choisir ?
                    </h6>

                    <div>
                        <div class="col-sm-6 d-flex flex-row">
                            <div>
                                <i class="fa fa-check-circle text-primary fs-3"></i>
                            </div>
                            <div class="d-flex flex-column p-2">
                                <h6 class="mb-0">
                                    Des voitures récentes
                                </h6>
                                <p>
                                    Des voitures récentes et confortables pour vous permettre de vous concentrer sur la
                                    conduite.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6 d-flex flex-row">
                            <div>
                                <i class="fa fa-check-circle text-primary fs-3"></i>
                            </div>
                            <div class="d-flex flex-column p-2">
                                <h6 class="mb-0">
                                    Des moniteurs professionnels
                                </h6>
                                <p>
                                    Des moniteurs professionnels qui vous apprendront à conduire en toute sécurité.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6 d-flex flex-row">
                            <div>
                                <i class="fa fa-check-circle text-primary fs-3"></i>
                            </div>
                            <div class="d-flex flex-column p-2">
                                <h6 class="mb-0">
                                    Des prix compétitifs
                                </h6>
                                <p>
                                    Des prix compétitifs pour vous permettre de vous former à la conduite.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative overflow-hidden pe-5 pt-5 h-100" style="min-height: 400px">
                        <img class="position-absolute w-100 h-100" src="{{ asset('images/about-1.jpg') }}" alt=""
                            style="object-fit: cover" />
                        <img class="position-absolute top-0 end-0 bg-white ps-3 pb-3"
                            src="{{ asset('images/about-2.jpg') }}" alt="" style="width: 200px; height: 200px" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-xxl py-6">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h6 class="text-primary text-uppercase mb-2">RENCONTRER L'ÉQUIPE</h6>
                <h1 class="display-6 mb-4">Nous avons une grande expérience de conduite</h1>
            </div>
            <div class="row g-0 team-items">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative">
                        <div class="position-relative">
                            <img class="img-fluid" src="{{ asset('images/team-1.jpg') }}" alt="">
                            <div class="team-social text-center">
                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="mt-2">Full Name</h5>
                            <span>Trainer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item position-relative">
                        <div class="position-relative">
                            <img class="img-fluid" src="{{ asset('images/team-2.jpg') }}" alt="">
                            <div class="team-social text-center">
                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="mt-2">Full Name</h5>
                            <span>Trainer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item position-relative">
                        <div class="position-relative">
                            <img class="img-fluid" src="{{ asset('images/team-3.jpg') }}" alt="">
                            <div class="team-social text-center">
                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="mt-2">Full Name</h5>
                            <span>Trainer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item position-relative">
                        <div class="position-relative">
                            <img class="img-fluid" src="{{ asset('images/team-4.jpg') }}" alt="">
                            <div class="team-social text-center">
                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="mt-2">Full Name</h5>
                            <span>Trainer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Testimonials section -->

    <section class="container-xxl py-6">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <h6 class="text-primary text-uppercase mb-2">
                        inscription
                    </h6>
                    <h1 class="display-6 mb-4">
                        Documents administratifs à fournir
                    </h1>

                    <div>
                        <div class=" d-flex flex-row">
                            <ul>
                                <li> Copie carte d’identité nationale ou passeport </li>
                                <li> Timbre fiscal </li>
                                <li> Certificat médical de moins de 3 mois réalisé par un médecin agrée .</li>
                                <li> 2 photos d’identités récentes et conformes aux normes en vigueur.</li>
                                <li> Demande de passage d’examen du permis de conduire.</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative overflow-hidden pe-5 pt-5 h-100" style="min-height: 400px">
                        <img class="position-absolute w-100 h-100" src="{{ asset('images/carousel-1.jpg') }}"
                            alt="" style="object-fit: cover" />
                        <img class="position-absolute top-0 end-0 bg-white ps-3 pb-3"
                            src="{{ asset('images/carousel-2.jpg') }}" alt=""
                            style="width: 200px; height: 200px  object-fit: cover ;" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="contact">
        <section class="container-xxl py-6" id="contact-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center">
                            <h2 class="text-light text-uppercase mb-2">Contactez-nous</h2>
                            <p class="lead">Nous sommes à votre écoute, n'hésitez pas à nous contacter</p>
                        </div>

                        <form action="{{ route('contact') }}" method="post">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Votre nom" name="name" required>
                                        <label for="name">Votre nom</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Votre email" name="email" required>
                                        <label for="email">Votre email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" placeholder="Sujet"
                                            name="subject" required>
                                        <label for="subject">Sujet</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Laissez votre message ici" id="message" style="height: 150px"
                                            name="message" required></textarea>
                                        <label for="message">Votre message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-light py-3 px-5" type="submit">Envoyer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>


    {{-- <!-- Contact section -->
    <section class="container-xxl py-6" id="contact-section">
        <div class="container">
            <div class="col-lg-6">
                <h6 class="text-primary text-uppercase mb-2">
                    Contactez nous
                </h6>
                <h1 class="display-6 mb-4">
                    Nous sommes à votre écoute, n'hésitez pas à nous
                    contacter
                </h1>

                <form action="{{ route('contact') }}" method="post">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control border-0 bg-light" id="name"
                                    placeholder="Your Name" name="name" />
                                <label for="name">Votre Nom</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control border-0 bg-light" id="email"
                                    placeholder="Your Email" name="email" />
                                <label for="email">Votre Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control border-0 bg-light" id="subject"
                                    placeholder="Subject" name="subject" />
                                <label for="subject">Le sujet</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control border-0 bg-light" placeholder="Leave a message here" id="message"
                                    style="height: 150px" name="message"></textarea>
                                <label for="message">Votre message</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary py-3 px-5" type="submit">
                                Envoyer
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section> --}}

    <div class="container-fluid bg-dark text-light footer my-6 mb-0 py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Get In Touch</h4>
                    <h2 class="text-primary mb-4"><i class="fa fa-car text-white me-2"></i>Drivin</h2>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Popular Links</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control p-3 border-0" placeholder="Your Email Address">
                            <button class="btn btn-primary">Sign Up</button>
                        </div>
                    </form>
                    <h6 class="text-white mt-4 mb-3">Follow Us</h6>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light me-1" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light me-1" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light me-1" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light me-0" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
