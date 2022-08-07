<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Send Mails</title>
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			@if(Session::has('success'))
				<div class="alert alert-success">
					{{Session::get('success')}}
				</div>
			@endif
			<h2 class="text-center my-5 text-info">GET IN TOUCH</h2>
			<div class="col-sm-6">
				<form action="send_mail" method="post">
					@csrf
				<div class="form-input mb-3">
					<input type="text" class="form-control" name="name" id="name" placeholder="Your Name">
				</div>
				<div class="form-input mb-3">
					<input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
				</div>
				<div class="form-input mb-3">
					<input type="number" class="form-control" name="contact" id="contact" placeholder="Your Contact">
				</div>
				<div class="form-input mb-3">
					<textarea name="message" class="form-control" rows="5" placeholder="Type Message"></textarea>
				</div>
				<div class="form-input mb-3">
					<button type="submit" class="btn btn-info">Send Mail</button>
				</div>
			</form>
			</div>
		</div>
	</div>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>

</body>
</html>