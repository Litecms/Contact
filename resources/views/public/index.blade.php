<section class="page-banner">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <div class="banner-content">
                    <h2 class="title">Contact Us</h2>
                    <p>Create custom landing pages with Lavalite that converts <br class="d-none d-md-block"> more visitors than any website. </p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="contact-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="contact-widget-wrapper">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="contact-widget-block">
                                <h3 class="title">Call us</h3>
                                <p>{{$contact['phone']}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="contact-widget-block">
                                <h3 class="title">Email us</h3>
                                <p>{{$contact['email']}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-12">
                            <div class="contact-widget-block">
                                <h3 class="title">Address</h3>
                                <p>{{$contact['details']}}</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="contact-form">
                    <h3 class="form-title text-center">Send us a Message</h3>
                    {!!Form::vertical_open()
                    ->id('send-message')
                    ->method('POST')
                    ->action(guard_url('contact/sendmail'))!!} <div class="form-group">
                        <label for="nameput">Your name</label>
                        {!!Form::text('name')
                        ->placeholder('Name')
                        ->raw()!!}
                    </div>
                    <div class="form-group">
                        <label for="emailput">Email address</label>
                        {!!Form::text('email')
                        ->placeholder('Email')
                        ->raw()!!}
                    </div>
                    <div class="form-group">
                        <label for="serviceput">Phone</label>
                        {!!Form::text('phone')
                        ->placeholder('Phone')
                        ->raw()!!}
                    </div>
                    <div class="form-group">
                        <label for="message-area">Message</label>
                        {!!Form::textarea('message')
                        ->placeholder('Message')->rows(6)
                        ->raw()!!}
                    </div>
                    <button class="btn btn-theme d-block w-100" type="submit">Send Message</button>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(function() {
        $("#send-message").submit(function(event) {
            event.preventDefault();
            app.sendmail(this);
        });
    })
</script>