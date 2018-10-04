<div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content contact pb-40">
            <div class="container">
                <div class="row mb-30">
                    <div class="col-md-12">
                        <h3>Get in touch!</h3>
                        <p>Consectetur adipiscing elit. commodo, risus quam posuere nulla, in egestas dolor mi eu dolor. Duis erat felis, sollicitudin vulputate interdum nec, venenatis vel felis.</p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2481.106659648882!2d-0.2360802839302193!3d51.54794317964188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761052eb18dd75%3A0x10cdd456501b9400!2s17+Villiers+Rd%2C+London%2C+UK!5e0!3m2!1sen!2sin!4v1459243222696" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <h3>Contact Form</h3>
                        {!!Form::vertical_open()->method('POST')->class('contact-form')->action('contact/sendmail')!!}
                @include('notifications')
                        <p>Please feel free to send us a message if you have any cuestion</p>
                        <div class="well">
                            <form action="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                           {!!Form::text('name','')->forcevalue('')->required()->placeholder('Name')!!}   
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                              {!!Form::text('email','')->forcevalue('')->required()->placeholder('Email')!!} 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!!Form::text('phone','')->forcevalue('')->required()->placeholder('Phone')!!}       
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!!Form::textarea('messages','')->forcevalue('')->required()->placeholder('Message')!!}
                                </div>
                                <button class="btn btn-primary" type="submit">Send Message</button>
                            {!!Form::close()!!}
                        </div>
                    </div>
                    <div class="col-md-5">
                        <h3>Information</h3>
                        <p>Note: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rhoncus rutrum dolor. Nullam augue turpis, auctor at facilisis ac, accumsan eu nibh</p>
                        <hr>
                        <ul class="list-unstyled contact-info">
                            <li><i class="fa fa-home text-primary"></i>Address: PO Box 859, La Corner St, Sanfransisco, CA 52698</li>
                            <li><a href="#"><i class="fa fa-phone text-primary"></i>Phone: 98941-84-604</a></li>
                            <li><a href="#"><i class="fa fa-envelope text-primary"></i>Email: support@classifieds.com</a></li>
                            <li><a href="#"><i class="fa fa-globe text-primary"></i>Website: www.classifieds.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>