@extends('frontend.layouts.master')
@section('custom-css')
<style>
.container-map {
height: 600px;
width:1000px;
margin:auto;
padding-top: 100px;
}
#map{
width:100%;
height:100%;
}
</style>
@endsection
@section('content')
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li class="active">Contact us</li>
            </ul>
        </div>
    </div>
</div>
{{-- MAP API --}}
<div class="container-map">
    <div id="map">  </div>
</div>
{{-- MAP API --}}
<div class="contact-area pt-100 pb-100">
    <div class="container">
        <div class="contact-map mb-10">
            
        </div>
        <div class="custom-row-2">
            <div class="col-lg-4 col-md-5">
                <div class="contact-info-wrap">
                    <div class="single-contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="contact-info-dec">
                            <p>{{ CONTACT_PAGE_PHONE_NUMBER }}</p>
                            <p>{{CONTACT_PAGE_PHONE_NUMBER}}</p>
                        </div>
                    </div>
                    <div class="single-contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="contact-info-dec">
                            <p><a href="#">{{CONTACT_PAGE_MANAGER_EMAIL}}</a></p>
                            <p><a href="#">urwebsitenaem.com</a></p>
                        </div>
                    </div>
                    <div class="single-contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="contact-info-dec">
                            <p>Address goes here, </p>
                            <p>street, Crossroad 123.</p>
                        </div>
                    </div>
                    <div class="contact-social text-center">
                        <h3>Follow Us</h3>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="contact-form">
                    <div class="contact-title mb-30">
                        <h2>Get In Touch</h2>
                    </div>
                    <form class="contact-form-style" id="contact-form" action="assets/php/mail.php" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <input name="name" placeholder="Name*" type="text">
                            </div>
                            <div class="col-lg-6">
                                <input name="email" placeholder="Email*" type="email">
                            </div>
                            <div class="col-lg-12">
                                <input name="subject" placeholder="Subject*" type="text">
                            </div>
                            <div class="col-lg-12">
                                <textarea name="message" placeholder="Your Massege*"></textarea>
                                <button class="submit" type="submit">SEND</button>
                            </div>
                        </div>
                    </form>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-javascript')
<script  src="{{asset('front/assets/API/js/googlemap.js')}}"></script>

<script>
function initMap(){
//map options
var options={
zoom:14,
center:{lat:31.6639704,lng:-8.029472599999963}
}
// New map
var map= new google.maps.Map(document.getElementById('map'),options);
// Add marker
var marker= new google.maps.Marker({
position:{lat:{{ SITE_ADDRESS_LNG }},lng:{{ SITE_ADDRESS_LNG }}},
map:map,
icon:'{{ asset('images/icons-map/euro.png') }}'
});
// infoWindow
var infoWindow = new google.maps.InfoWindow({
content:'<h1>{{CONTACT_PAGE_COMPANY_NAME}} </h1>'
});
marker.addListener('click',function(){
infoWindow.open(map, marker);
});
// Add marker function
/* addMarker({coords:{lat:42.4668,lng:-70.9495}});
addMarker({coords:{lat:42.8584, lng:-70.9300}});
addMarker({coords:{lat:42.7762, lng:-71.0773}});
function addMarker(props){
var marker=new google.maps.Marker({
position :props.coords,
map:map,
icon:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
})
}*/
}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDebAMQ2oe6eiBRR5YWBJqKY5KyQxsSbKc&callback=initMap">
</script>
@endsection