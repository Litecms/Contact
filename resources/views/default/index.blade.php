@include('contact::header')
<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="sidebar">
                    <div class="widget clearfix">
                        <div class="title">
                            <h3>
                                Address
                            </h3>
                            <div class="separator">
                                <span>
                                </span>
                                <span>
                                </span>
                                <span>
                                </span>
                            </div>
                        </div>
                        <div class="icon">
                            <i class="ti-location-pin">
                            </i>
                        </div>
                        <div class="content">
                            <p>
                                {!!$contact['details']!!}
                            </p>
                        </div>
                    </div>
                    <div class="widget clearfix">
                        <div class="title">
                            <h3>
                                Phone
                            </h3>
                            <div class="separator">
                                <span>
                                </span>
                                <span>
                                </span>
                                <span>
                                </span>
                            </div>
                        </div>
                        <div class="icon">
                            <i class="ti-mobile">
                            </i>
                        </div>
                        <div class="content">
                            <p>
                                <br/>
                                {!!$contact['phone']!!}
                            </p>
                        </div>
                    </div>
                    <div class="widget clearfix">
                        <div class="title">
                            <h3>
                                Email
                            </h3>
                            <div class="separator">
                                <span>
                                </span>
                                <span>
                                </span>
                                <span>
                                </span>
                            </div>
                        </div>
                        <div class="icon">
                            <i class="ti-email">
                            </i>
                        </div>
                        <div class="content">
                            <p>
                                <br/>
                                {!!$contact['email']!!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-md-offset-1">
                <div class="form mb30">
                    <div class="title">
                        <h3>
                            Get In Touch
                        </h3>
                        <div class="separator">
                            <span>
                            </span>
                            <span>
                            </span>
                            <span>
                            </span>
                        </div>
                    </div>
                    <div class="mb30" id="success">
                    </div>
            {!!Form::vertical_open()
            ->id('send-message')
            ->method('POST')
            ->action(guard_url('contact/sendmail'))!!}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                {!!Form::text('name')
                                ->placeholder('Name')
                                ->raw()!!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                {!!Form::email('email')
                                ->placeholder('Email')
                                ->raw()!!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                {!!Form::text('phone')
                                ->placeholder('Phone')
                                ->raw()!!}
                              </div>
                            </div>
                            <div class="col-md-12 mb20">
                              <div class="form-group">
                              {!!Form::textarea('message')
                              ->placeholder('Message')->rows(6)
                              ->raw()!!}
                              </div>

                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-round" id="contact-submit" type="submit">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="map">
                            <div id="map" class="ui-map"></div>
                        </div>
                    </div>
                </div>
</section>


<script type="text/javascript">
    $(function(){
      $("#send-message" ).submit(function(event) {
        event.preventDefault();
        app.sendmail(this);
      });

      var map, myLatlng;
      @if(!empty($contact->lat) && !empty($contact->lng))
         myLatlng = new google.maps.LatLng({!! @$contact->lat !!},{!! @$contact->lng !!});
      @else
         myLatlng = new google.maps.LatLng(9.929789275194516,76.27235919804684);
      @endif
      var mapOptions = {
         zoom: 14,
         draggable: false,
         center: myLatlng,
         scrollwheel: false,
         mapTypeId: google.maps.MapTypeId.ROADMAP,
                 styles: [{
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [{
                "color": "#e9e9e9"
            }, {
                "lightness": 17
            }]
        }, {
            "featureType": "landscape",
            "elementType": "geometry",
            "stylers": [{
                "color": "#f5f5f5"
            }, {
                "lightness": 20
            }]
        }, {
            "featureType": "road.highway",
            "elementType": "geometry.fill",
            "stylers": [{
                "color": "#ffffff"
            }, {
                "lightness": 17
            }]
        }, {
            "featureType": "road.highway",
            "elementType": "geometry.stroke",
            "stylers": [{
                "color": "#ffffff"
            }, {
                "lightness": 29
            }, {
                "weight": 0.2
            }]
        }, {
            "featureType": "road.arterial",
            "elementType": "geometry",
            "stylers": [{
                "color": "#ffffff"
            }, {
                "lightness": 18
            }]
        }, {
            "featureType": "road.local",
            "elementType": "geometry",
            "stylers": [{
                "color": "#ffffff"
            }, {
                "lightness": 16
            }]
        }, {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [{
                "color": "#f5f5f5"
            }, {
                "lightness": 21
            }]
        }, {
            "featureType": "poi.park",
            "elementType": "geometry",
            "stylers": [{
                "color": "#dedede"
            }, {
                "lightness": 21
            }]
        }, {
            "elementType": "labels.text.stroke",
            "stylers": [{
                "visibility": "on"
            }, {
                "color": "#ffffff"
            }, {
                "lightness": 16
            }]
        }, {
            "elementType": "labels.text.fill",
            "stylers": [{
                "saturation": 36
            }, {
                "color": "#333333"
            }, {
                "lightness": 40
            }]
        }, {
            "elementType": "labels.icon",
            "stylers": [{
                "visibility": "off"
            }]
        }, {
            "featureType": "transit",
            "elementType": "geometry",
            "stylers": [{
                "color": "#f2f2f2"
            }, {
                "lightness": 19
            }]
        }, {
            "featureType": "administrative",
            "elementType": "geometry.fill",
            "stylers": [{
                "color": "#fefefe"
            }, {
                "lightness": 20
            }]
        }, {
            "featureType": "administrative",
            "elementType": "geometry.stroke",
            "stylers": [{
                "color": "#fefefe"
            }, {
                "lightness": 17
            }, {
                "weight": 1.2
            }]
        }]
      }
      map = new google.maps.Map(document.getElementById("map"), mapOptions);

      var marker = new google.maps.Marker({
      draggable: false,
      position: myLatlng,
      map: map,
      title: "{{$contact['city']}}"
      });

      var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<div id="bodyContent">'+
      '<p><b>{{$contact->name}}</b></p>'+ 
      '<p>{{$contact->address_line1}}</p>'+
      '<p><a href="mailto:{{$contact["email"]}}">'+
      '{{$contact["email"]}}</a> '+
      '</p>'+
      '</div>'+
      '</div>';
      var infowindow = new google.maps.InfoWindow({
        content: contentString
      });
      marker.addListener('click', function() {
        infowindow.open(map, marker);
      });  
  })
</script>