@extends('general.master')

@section('title')
Facebook Counter
@endsection

@section('body')

<!-- Here banner MarkUp Start-->
<div class="hero-banner">
    <div class="hero-banner-table">
        <div class="hero-banner-table-cell">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Lorem ipsum dolor</h3>
                        <h1>Lorem ipsum dolor sit amet consectetur</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit cumque perspiciatis est possimus fugit culpa. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit cumque perspiciatis est possimus fugit culpa.</p>
                        @if (!Auth::check()) 
                            <a href="" class="free-display-btn" data-toggle="modal" data-target="#registration-Modal">Free Register Now</a>
                        @endif  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="registation-modal">
	<div class="modal fade" id="registration-Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">				
					<h4 class="modal-title" id="myModalLabel">Registation</h4> 
				</div>
				<div class="modal-body">
                    {{-- <form method="POST" action="{{ route('register') }}" id="reg-form"> --}}
                    <form method="POST" action="/registration" id="reg-form">
                        {{ csrf_field() }}
						<div class="modal-form-padding">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group {{ $errors->has('first_name') ? 'has-error' :'' }}">
                                        <span class="help-block text-danger">
                                            <strong class="error-first_name"></strong>
                                        </span> 
										<input type="text" class="modal-input-control" placeholder="First Name" name="first_name" id="first_name" value="{{ old('first_name') }}" required>
                                         @if ($errors->has('first_name'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group {{ $errors->has('last_name') ? 'has-error' :'' }}">
                                        <span class="help-block text-danger">
                                            <strong class="error-last_name"></strong>
                                        </span> 
										<input type="text" class="modal-input-control" placeholder="Last Name" name="last_name" id="last_name" value="{{ old('last_name') }}" required>
                                        @if ($errors->has('last_name'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
									</div>
								</div>
							</div>
							<div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">
                                <span class="help-block text-danger">
                                    <strong class="error-email"></strong>
                                </span>                            
								<input type="email" id="email" class="modal-input-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
							</div>
							<div class="form-group {{ $errors->has('password') ? 'has-error' :'' }}">
                                <span class="help-block text-danger">
                                    <strong class="error-password"></strong>
                                </span>  
								<input type="password" class="modal-input-control" placeholder="Password" name="password" id="password" value="{{ old('password') }}" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif                                
							</div>
						</div>

						<div class="modal-login-btn register-btn-group">
							<button class="common-sing-btn register-btn" type="submit" id="reg-submit">REGISTER</button>
							<button class="common-sing-btn signin-btn" type="button" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">SIGN IN</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Here banner MarkUp End-->

<div id="feature" class="feature-area padding-top">
    <div class="container">
        <div class="row">
            <div class="title text-center">
                <h2>Our Feature</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="single-feature">
                    <h4><span><i class="fa fa-facebook"></i></span>Business Consulting</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam posuere est in viverra bibendum our in Vestibulum vel semper odioing to</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="single-feature">
                    <h4><span><i class="fa fa-facebook"></i></span>Business Consulting</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam posuere est in viverra bibendum our in Vestibulum vel semper odioing to</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="single-feature">
                    <h4><span><i class="fa fa-facebook"></i></span>Business Consulting</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam posuere est in viverra bibendum our in Vestibulum vel semper odioing to</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="single-feature">
                    <h4><span><i class="fa fa-facebook"></i></span>Business Consulting</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam posuere est in viverra bibendum our in Vestibulum vel semper odioing to</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="single-feature">
                    <h4><span><i class="fa fa-facebook"></i></span>Business Consulting</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam posuere est in viverra bibendum our in Vestibulum vel semper odioing to</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="single-feature">
                    <h4><span><i class="fa fa-facebook"></i></span>Business Consulting</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam posuere est in viverra bibendum our in Vestibulum vel semper odioing to</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Get-a-code Area MarkUp Start-->
<div class="get-code-area">
    <div class="get-container">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="get-content wow slideInLeft" data-wow-duration="3s" data-wow-delay="0.01s">
                        <h2>Lorem ipsum dolor sit amet, <span>consectetur adipisicing</span> elit. Autem, saepe?</h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="get-btn text-center wow slideInRight" data-wow-duration="3s" data-wow-delay="0.01s">
                        <a href="" class="buy-btn" data-toggle="modal" data-target="#registration-Modal">Free Register Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Get-a-code Area MarkUp End-->

<!-- Pricing Area MarkUp Start-->
<div id="pricing" class="pricing-area padding-top">
    <div class="container">
        <div class="row">
            <div class="title text-center">
                <h2>Pricing</h2>
            </div>
        </div>
        <div class="pricing-section">
            <div class="row">
                 <div class="col-md-4 col-sm-6">
                    <div class="single-pricing hidden-display free wow fadeInUp" data-wow-duration="3s" data-wow-delay="0.5s">
                        <div class="pricing-title-box">
                            <div class="pricing-title">
                                <h1>Free</h1>
                            </div>
                            <div class="price">
                                <i>$</i>200 <span>/month</span>
                            </div>
                        </div>
                        <div class="price-details">
                            <li><span>2GB </span>Bandwidth</li>
                            <li><span>2GB </span>Bandwidth</li>
                            <li><span>2GB </span>Bandwidth</li>
                            <li><span>2GB </span>Bandwidth</li>
                            <li><span>2GB </span>Bandwidth</li>
                        </div>
                        <div class="buy-btn">Buy Now</div>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3">
                    <div class="single-pricing pro wow fadeInUp" data-wow-duration="3s" data-wow-delay="0.1s">
                        <div class="pricing-title-box">
                            <div class="pricing-title">
                                <h1>Pro</h1>
                            </div>
                            <div class="price">
                                <i>$</i>1 <span>/month</span>
                            </div>
                        </div>
                        <div class="price-details">
                            <li><span>$12</span> Annual Payment</li>
                        </div>
                        <div class="buy-btn" data-toggle="modal" data-target="#registration-Modal">Free Register Now</div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-pricing hidden-display free wow fadeInUp" data-wow-duration="3s" data-wow-delay="0.5s">
                        <div class="pricing-title-box">
                            <div class="pricing-title">
                                <h1>Free</h1>
                            </div>
                            <div class="price">
                                <i>$</i>200 <span>Annual Payment</span>
                            </div>
                        </div>
                        <div class="price-details">
                            <li><span>2GB </span>Bandwidth</li>
                            <li><span>2GB </span>Bandwidth</li>
                            <li><span>2GB </span>Bandwidth</li>
                            <li><span>2GB </span>Bandwidth</li>
                            <li><span>2GB </span>Bandwidth</li>
                        </div>
                        <div class="buy-btn">Buy Now</div>
                    </div>
                </div>
                <!-- <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3">
                    <div class="single-pricing offer wow fadeInUp" data-wow-duration="3s" data-wow-delay="0.5s">
                        <div class="pricing-title-box">
                            <div class="pricing-title">
                                <h1>Offer</h1>
                            </div>
                            <div class="price">
                                <i>$</i>200 <span>/month</span>
                            </div>
                        </div>
                        <div class="price-details">
                            <li><span>2GB </span>Bandwidth</li>
                            <li><span>2GB </span>Bandwidth</li>
                            <li><span>2GB </span>Bandwidth</li>
                            <li><span>2GB </span>Bandwidth</li>
                            <li><span>2GB </span>Bandwidth</li>
                        </div>
                        <div class="buy-btn">Buy Now</div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
<!-- Pricing Area MarkUp End-->

<!-- portfolio testimonial start-->
<div class="portfolio-testimonal padding-bottom padding-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12"> 
                <div class="testimonal-item-carouse-active owl-carousel"> 
                    <div class="single-testimonial">
                        <div class="row">
                            <div class="col-md-3 col-sm-4">
                                <img src="{{asset('/general/images/author.jpg')}}" alt="" class="img-fluid img-circle">
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.”</p>

                                <div class="testimonial-autho">
                                    <h4>Joshua Earle</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial">
                        <div class="row">
                            <div class="col-md-3 col-sm-4">
                                <img src="{{asset('/general/images/author.jpg')}}" alt="" class="img-fluid img-circle">
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.”</p>

                                <div class="testimonial-autho">
                                    <h4>Joshua Earle</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial">
                        <div class="row">
                            <div class="col-md-3 col-sm-4">
                                <img src="{{asset('/general/images/author.jpg')}}" alt="" class="img-fluid img-circle">
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.”</p>

                                <div class="testimonial-autho">
                                    <h4>Joshua Earle</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial">
                        <div class="row">
                            <div class="col-md-3 col-sm-4">
                                <img src="{{asset('/general/images/author.jpg')}}" alt="" class="img-fluid img-circle">
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.”</p>

                                <div class="testimonial-autho">
                                    <h4>Joshua Earle</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- portfolio testimonial end-->

<!-- FAQ Markup Statr-->
<div id="support" class="faq-area padding-bottom padding-top">
    <div class="container">
        <div class="row">
            <div class="title text-center">
                <h2>FAQ's</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="faq-collapse">
                    <h2>General Question</h2>
                    <div class="panel-group" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="question1">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" href="#faqone" aria-expanded="true" aria-controls="faqone">
                                        Why you choose Us ? <span class="minus"><i class="fa fa-minus"></i></span> <span class="plus"><i class="fa fa-plus"></i></span></a>
                                    </h4>
                                </div>
                                <div id="faqone" class="panel-collapse collapse" role="tabpanel" aria-labelledby="question1">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="question2">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" href="#faqtwo" aria-expanded="false" aria-controls="faqtwo">
                                            Why you choose Us ? <span class="minus"><i class="fa fa-minus"></i></span> <span class="plus"><i class="fa fa-plus"></i></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="faqtwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="question2">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="question3">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" href="#faqthree" aria-expanded="false" aria-controls="faqthree">
                                            Why you choose Us ? <span class="minus"><i class="fa fa-minus"></i></span> <span class="plus"><i class="fa fa-plus"></i></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="faqthree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="question3">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="faq-collapse">
                        <h2>Other Question</h2>
                        <div class="panel-group" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="question4">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" href="#faqfour" aria-expanded="true" aria-controls="faqfour">
                                            Why you choose Us ? <span class="minus"><i class="fa fa-minus"></i></span> <span class="plus"><i class="fa fa-plus"></i></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="faqfour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="question4">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="question5">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" href="#faqfive" aria-expanded="false" aria-controls="faqfive">
                                            How away you get us? <span class="minus"><i class="fa fa-minus"></i></span> <span class="plus"><i class="fa fa-plus"></i></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="faqfive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="question5">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="question6">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" href="#faqsix" aria-expanded="false" aria-controls="faqsix">
                                            How away you get us? <span class="minus"><i class="fa fa-minus"></i></span> <span class="plus"><i class="fa fa-plus"></i></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="faqsix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="question6">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ Markup End-->

    <!-- Subscriber Page MarkUp Start-->
    <div class="subcriber-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="subcribe-content text-center">
                        <h2>Join to Get Latest Features</h2>
                        <p>Get our free Paleo 101 video series, plus exclusive content, discounts, and top health tips from our expert speakers.</p>
                        <div class="subcribe-form wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="0s">
                            <form action="/mailchimp-subscribe" method="POST">
                            {{csrf_field()}}
                                <input type="email" class="input-control" placeholder="Your Email Address" name="email" value="{{ old('email') }}" required>
                                <input class="subscribe-btn" type="submit" value="Subscribe"><br>
                                <span class="text-danger"> {{ $errors->has('email') ? $errors->first('email') : '' }} </span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Subscriber Page MarkUp End-->
<!-- Modal -->
<div class="login-modal">
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">                  
                    <h4 class="modal-title" id="myModalLabel">Login</h4>
                </div>
                <div class="modal-body">
                    <div id="error-message">
                    </div>
                    <form method="POST" action="/signin" id="login-form">
                        {{ csrf_field() }}
                        <div class="modal-form-padding">
                            <input class="modal-input-control" type="email" placeholder="EMAIL" name="email" id="login-email" required>
                            <input class="modal-input-control" type="password" placeholder="PASSWORD" name="password" id="login-password"  required>
                            <a class="forgot-link" href="">FORGOT YOUR PASSWORD</a>
                        </div>
                        <div class="modal-login-btn">
                            <button class="common-sing-btn register-btn" type="button" data-dismiss="modal" data-toggle="modal" data-target="#registration-Modal">REGISTER</button>
                            <button class="common-sing-btn signin-btn" type="submit" id="login-submit">SIGN IN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



    @endsection