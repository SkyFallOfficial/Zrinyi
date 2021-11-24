<?php
include 'app/require.php';

$user = new UserController;

Session::init();

if (Session::isLogged()) { Util::redirect('/'); }
if ($_SERVER['REQUEST_METHOD'] === 'POST') { $error = $user->passwordReset($_POST); }

Util::head('Reset');
Util::navbar();

?>

<main class="container mt-2">

	<div class="row justify-content-center">

		<div class="col-12 mt-3 mb-2">

			<?php if (isset($error)) : ?>
				<div class="alert alert-primary" role="alert">
					<?php Util::display($error); ?>
				</div>
			<?php endif; ?>

		</div>

		<div class="col-xl-3 col-lg-4 col-md-5 col-sm-7 col-xs-12 my-3">
			<div class="card">
				<div class="card-body">

					<h4 class="card-title text-center">Password reset (W.I.P.)</h4>

					<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

						<div class="form-group">
							<input type="email" class="form-control form-control-sm" placeholder="E-Mail" name="email" required>
						</div>


						<button class="btn btn-outline-primary btn-block" id="submit" type="submit" value="submit">Reset</button>

					</form>
					    

				</div>
			</div>
		</div>

	</div>


</main>

<?php Util::footer(); ?>