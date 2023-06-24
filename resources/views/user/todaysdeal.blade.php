@extends('user.lyouts.templete')
@section('main-content')

    <!-- End Breadcrumbs -->

    <!-- Start Contact -->



    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="form-main">
                            <div class="title">
                                @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                                @endif


                                <h4>Get in touch</h4>
                                <h3>Write us a message @auth @else<span style="font-size:12px;" class="text-danger">[You need to login first]</span>@endauth</h3>
                            </div>
                            <form class="form-contact form contact_form" method="post"  action="{{route('todaysdealmessage')}}" id="contactForm" novalidate="novalidate">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Your Name<span>*</span></label>
                                            <input name="name" id="name" type="text" placeholder="Enter your name">
                                            @if ($errors->has('name'))
                                            <div class="alert ">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Your Subjects<span>*</span></label>
                                            <input name="subject" type="text" id="subject" placeholder="Enter Subject">
                                            @if ($errors->has('subject'))
                                            <div class="alert ">
                                                {{ $errors->first('subject') }}
                                            </div>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Your Email<span>*</span></label>
                                            <input name="email" type="email" id="email" placeholder="Enter email address">
                                            @if ($errors->has('email'))
                                            <div class="alert ">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Your Phone<span>*</span></label>
                                            <input id="phone" name="phone" type="number" placeholder="Enter your phone">
                                            @if ($errors->has('phone'))
                                            <div class="alert ">
                                                {{ $errors->first('phone') }}
                                            </div>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group message">
                                            <label>your message<span>*</span></label>
                                            <textarea name="message" id="message" cols="30" rows="9" placeholder="Enter Message"></textarea>
                                            @if ($errors->has('message'))
                                            <div class="alert ">
                                                {{ $errors->first('message') }}
                                            </div>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group button">
                                            <button type="submit" class="btn ">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="single-head">
                            <div class="single-info">
                                <i class="fa fa-phone"></i>
                                <h4 class="title">Call us Now:</h4>
                                <ul>
                                </ul>
                            </div>
                            <div class="single-info">
                                <i class="fa fa-envelope-open"></i>
                                <h4 class="title">Email:</h4>
                                <ul>
                                </ul>
                            </div>
                            <div class="single-info">
                                <i class="fa fa-location-arrow"></i>
                                <h4 class="title">Our Address:</h4>
                                <ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Contact -->

    <!-- Map Section -->
    <div class="map-section">
        <div id="myMap">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14130.857353934944!2d85.36529494999999!3d27.6952226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sne!2snp!4v1595323330171!5m2!1sne!2snp" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
    <div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="text-success">Thank you!</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-success">Your message is successfully sent...</p>
                </div>
            </div>
        </div>
    </div>

    <section class="shop-newsletter section">
        <div class="container">
            <div class="inner-top">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-12">
                        <!-- Start Newsletter Inner -->
                        <div class="inner">
                            <h4>Newsletter</h4>
                            <p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
                            <form  method="post" class="newsletter-inner">
                                @csrf
                                <input name="email" placeholder="Your email address" required="" type="email">
                                <button class="btn" type="submit">Subscribe</button>
                            </form>
                        </div>
                        <!-- End Newsletter Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection



@push('styles')
    <style>
        .modal-dialog .modal-content .modal-header{
            position:initial;
            padding: 10px 20px;
            border-bottom: 1px solid #e9ecef;
        }
        .modal-dialog .modal-content .modal-body{
            height:100px;
            padding:10px 20px;
        }
        .modal-dialog .modal-content {
            width: 50%;
            border-radius: 0;
            margin: auto;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('frontend/js/jquery.form.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('frontend/js/contact.js') }}"></script>
@endpush
