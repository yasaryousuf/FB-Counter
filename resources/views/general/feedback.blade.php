@extends('general.master')

@section('title')
Feedback
@endsection

@section('body')
<div class="contact-header-section padding-bottom padding-top"></div>
<div class="contact-page padding-bottom">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="contact-form">
					<div class="contact-box">
						<h2>Feedback</h2>

						<div class="feedback-form">
							<form action="">
								<div>
									<input type="text" name="" required="">
									<label>Name</label>
								</div>
								<div>
									<input type="email" name="" required="">
									<label>Email</label>
								</div>
								<div>
									<textarea required="" cols="30" rows="8"></textarea>
									<label>Your Feedback</label>
								</div>

								<div>
									<input type="submit" value="submit">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Footer area markup end-->
@endsection