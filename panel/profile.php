<?php

require_once 'app/require.php';

$user = new UserController;

Session::init();

if (!Session::isLogged()) { Util::redirect('/login.php'); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	if (isset($_POST["updatePassword"])) {
		$error = $user->updateUserPass($_POST);
	}


	if (isset($_POST["activateSub"])) {
		$error = $user->activateSub($_POST);
	}
}

$uid = Session::get("uid");
$username = Session::get("username");
$admin = Session::get("admin");
$email = Session::get("email");
$supportpin = Session::get("supportpin");

$sub = $user->getSubStatus();

Util::banCheck();
Util::head($username);
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

					<h4 class="card-title text-center">Update password</h4>

					<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

						<div class="form-group">
							<input type="password" class="form-control form-control-sm" placeholder="Current Password" name="currentPassword" required>
						</div>

						<div class="form-group">
							<input type="password" class="form-control form-control-sm" placeholder="New Password" name="newPassword" required>
						</div>

						<div class="form-group">
							<input type="password" class="form-control form-control-sm" placeholder="Confirm password" name="confirmPassword" required>
						</div>

						<button class="btn btn-outline-primary btn-block" name="updatePassword" type="submit" value="submit">Update</button>

					</form>

				</div>
			</div>
		</div>


		<div class="col-xl-3 col-lg-4 col-md-5 col-sm-7 col-xs-12 my-3">
			<div class="row">


				<div class="col-12 mb-4">
					<div class="card">
						<div class="card-body">
							<div class="h5 border-bottom border-secondary pb-1"><?php Util::display($username); ?></div>
							<div class="row">
								<div class="col-12 clearfix">
									User ID: <p class="float-right mb-0"><?php Util::display($uid); ?></p> <br>
									E-Mail address: <p class="float-right mb-0"><?php Util::display($email); ?></p> <br>
									Support pin: <p class="float-right mb-0"><?php Util::display($supportpin); ?></p>
								</div>

								<div class="col-12 clearfix">


									Sub:
									<p class="float-right mb-0">
										<?php 
										if ($sub > 0) { 
											Util::display($sub . ' days'); 
										} else {
											Util::display('0 days'); 
										} ?>
									</p>
									
									<br>
									
									<button class="btn btn-outline-primary btn-block" id="joinserver">Discord</button>

								</div>
							</div>
						</div>
					</div>
				</div>

<script type="text/javascript">
    document.getElementById("joinserver").onclick = function () {
        location.href = "https://discord.gg/invite"
    }
</script>

				<?php if ($sub <= 0) : ?>
					<div class="col-12 mb-4">
						<div class="card">
							<div class="card-body">

								<h4 class="card-title text-center">Activate Sub</h4>

								<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

									<div class="form-group">
										<input type="password" class="form-control form-control-sm" placeholder="Subscription Code" name="subCode" required>
									</div>

									<button class="btn btn-outline-primary btn-block" name="activateSub" type="submit" value="submit">Activate Sub</button>

								</form>

							</div>
						</div>
					</div>
				<?php endif; ?>

			</div>
		</div>

	</div>

</main>
<?php Util::footer(); ?>
