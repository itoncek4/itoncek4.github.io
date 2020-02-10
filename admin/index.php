<?php include( 'src/header.php' );
?>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo $background_img;
?>');background-size:<?php echo $background_size;
?>;">
			<div class="wrap-login100">
				<?php if ( $_SESSION['realname'] AND $_SESSION['password'] ) {
				?>
					<form action="" method="POST" class="login100-form validate-form">
						<span class="login100-form-title p-b-26">
							<?php echo $Title_logout;
				?>
						</span>
						<b>Your nick:</b> <?php echo $_SESSION['realname'];
				?><br>
						<b>Your email:</b> <?php echo $_SESSION['email'];
				?>
						<div class="container-login100-form-btn">
							<div class="wrap-login100-form-btn">
								<div class="login100-form-bgbtn"></div>
								<a href="?logout=1" class="login100-form-btn">
									<?php echo $Form_logout_btn;
				?>
								</a>
							</div>
						</div>
						<div class="text-center p-t-115">
							<span class="txt1">
								Coder
							</span>
							<a class="txt2" href="https://facebook.com/jakub.sarm">
								Jakub "JakSar77" Šarm
							</a>
						</div>
					</form>
				<?php } else {;
				?>
					<form action="" method="POST" class="login100-form validate-form">
						<span class="login100-form-title p-b-26">
							<?php echo $Title_login;
				?>
						</span>
						<?php if ( count( $error ) > 0 ) {
								error_reporting( -1 );
								ini_set( 'display_errors', 'On' );
								?>
							<div class="alert alert-danger" role="alert">
								<?php foreach( $error as $error_text ) {
												?>
									<p><?php echo $error_text;
												?></p>
								<?php } ;
								?>
							</div>
						<?php } ;
				?>
						<div class="wrap-input100 validate-input" data-validate = "<?php echo $Form_user_placeholder ?>">
							<input class="input100" type="text" name="player" required>
							<span class="focus-input100" data-placeholder="<?php echo $Form_user_placeholder ?>"></span>
						</div>
						<div class="wrap-input100 validate-input" data-validate="<?php echo $Form_pass_placeholder ?>">
							<span class="btn-show-pass">
								<i class="zmdi zmdi-eye"></i>
							</span>
							<input class="input100" type="password" name="password" required>
							<span class="focus-input100" data-placeholder="<?php echo $Form_pass_placeholder ?>"></span>
						</div>
						<div class="container-login100-form-btn">
							<div class="wrap-login100-form-btn">
								<div class="login100-form-bgbtn"></div>
								<button type="submit"  name="login" class="login100-form-btn">
									<?php echo $Form_login_btn;
				?>
								</button>
							</div>
						</div>
						<div class="text-center p-t-115">
							<span class="txt1">
								<?php echo $Form_dont_have_account_text;
				?>
							</span>
							<a class="txt2" href="<?php echo $Form_dont_have_account_link_url;
				?>">
								<?php echo $Form_dont_have_account_link_text;
				?>
							</a>
						</div>
					</form>
				<?php } ;
?>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
<?php include( 'src/footer.php' );
?>