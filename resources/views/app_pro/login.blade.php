@extends('app_pro\layouts.app')

@section('content')
	<main class="form-signin">

		<form>
			<img class="mb-g4" src="img/logo.png" alt="" width="250" height="60">
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
@endsection