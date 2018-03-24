@extends('general.master')

@section('title')
Contact Us
@endsection

@section('body')
<div class="contact-header-section padding-bottom padding-top"></div>
<div class="contact-page padding-bottom">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="contact-form">
					<div class="contact-box">
						@if (session('message'))
						<div class="alert alert-success">
							<strong>{{ session('message') }}</strong>
						</div>
						@endif
						<h2>Contact Us</h2>
						<form action="/contact" method="POST">
							{{ csrf_field() }}
							<div class="{{ $errors->has('name') ? ' has-error' : '' }}">
								<input type="text" name="name" value="{{ old('name') }}" required>
								<label>Full Name</label>
								@if ($errors->has('name'))
								<span class="text-danger">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
								@endif
							</div>
							<div class="{{ $errors->has('name') ? ' has-error' : '' }}">
								<input type="email" name="email" value="{{ old('email') }}" required>
								<label>Email</label>
								@if ($errors->has('email'))
								<span class="text-danger">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
								@endif
							</div>
							<div class="{{ $errors->has('name') ? ' has-error' : '' }}">
								<input type="text" name="subject" value="{{ old('subject') }}" required>
								<label>Subject</label>
								@if ($errors->has('subject'))
								<span class="text-danger">
									<strong>{{ $errors->first('subject') }}</strong>
								</span>
								@endif
							</div>
							<div>
								<textarea name="text" class="{{ $errors->has('name') ? ' has-error' : '' }}" required>{{ old('text') }}</textarea>
								<label>Notes</label>
								@if ($errors->has('text'))
								<span class="text-danger">
									<strong>{{ $errors->first('text') }}</strong>
								</span>
								@endif
							</div>
							<div>
								<input type="submit" value="submit">
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-md-offset-1">
				<div class="our_address">
					<div class="support_contact">
						<h4>Location</h4>
						<span>Nikunja-2, Khilket, Dhaka-1229, Bangladesh</span>
					</div>
					<div class="support_contact">
						<h4>Tech Support</h4>
						<p>support@opcodespace.com</p>
					</div>
					<div class="support_contact">
						<h4>Tech Support</h4>
						<p>support@opcodespace.com</p>
					</div>
					<div class="support_contact">
						<h4>Contact Info</h4>
						<p>info@opcodespace.com</p>
						<p><span>Phone :</span> 9968565</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Footer area markup end-->
@endsection