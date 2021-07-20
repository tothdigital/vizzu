<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Ramoel Assis, Paulo Henrique e Fabrício Aguilera">
	<meta name="generator" content="Vizzu 0.1.0">
  <title>Vizzu</title>

	<!-- Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="assets/css/main.css" rel="stylesheet">
	<link href="assets/css/signin.css" rel="stylesheet">
	<style>
		.footer {
			position: fixed;
			left: 0;
			bottom: 0;
			width: 100%;
			background-color: #9C27B0;
			color: white;
			text-align: center;
		}
		.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			user-select: none;
		}

		@media (min-width: 768px) {
			.bd-placeholder-img-lg {
			font-size: 3.5rem;
			}
		}
	</style>
</head>

<body class="text-center">
	<main class="form-signin">

		<form>
			<img class="mb-g4" src="assets/img/logo.png" alt="" width="250" height="60">
			<h1 class="h3 mb-3 fw-normal">Please sign in</h1>

			<div class="form-floating">
				<input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
				<label for="floatingInput">Email</label>
			</div>
			@if (Route::has('password.request'))
				<div class="form-floating">
					<input type="password" class="form-control" id="floatingPassword" placeholder="Password">
					<label for="floatingPassword">Password</label>
					<p><a href="">Forgot your password?</a></p>
				</div>
			@endif

			<div class="checkbox mb-3">
				<label>
					<input type="checkbox" value="remember-me">
					<span class="checkmark"></span>
					Remember me
				</label>
			</div>
			<button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
			<p class="mt-5 mb-3 text-muted">&copy; 2021</p>
		</form>
	</main>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</body>
</html>