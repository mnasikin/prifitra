<?php
require './parts/login/header.php';
?> 

<!-- Your login content here -->
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('./inc/img/login/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="post" action="login">
					<span class="login100-form-title p-b-49">
						<?php echo BASE_NAME; ?>
					</span>
    
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<input class="input100" type="text" id="username" name="username" placeholder="Type your username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" id="password" type="password" name="password" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class=" p-t-8 p-b-3 ">
						<!-- Add notice if login failed -->
						<div class="txt1 text-center p-t-5 p-b-5" id="notice"></div>
					</div>
					<br>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<!-- end login content -->

<?php
require './parts/login/sess.php';
require 'parts/login/footer.php';
?> 