<?php
	if(!empty($_COOKIE["token"])) {
		header("location: page_securise.php");
	}
?>

<html>
	<head>
	<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="style.css">
	</head>
<body>
		<div class="panda">
				<div class="ear"></div>
				<div class="face">
				  <div class="eye-shade"></div>
				  <div class="eye-white">
					<div class="eye-ball"></div>
				  </div>
				  <div class="eye-shade rgt"></div>
				  <div class="eye-white rgt">
					<div class="eye-ball"></div>
				  </div>
				  <div class="nose"></div>
				  <div class="mouth"></div>
				</div>
				<div class="body"> </div>
				<div class="foot">
				  <div class="finger"></div>
				</div>
				<div class="foot rgt">
				  <div class="finger"></div>
				</div>
			  </div>
			  <form action="page_securise.php" method="POST" class="form-example">
				<div class="hand"></div>
				<div class="hand rgt"></div>
				<h1>Panda Login</h1>
				<div class="form-group">
				  <input type="text" name="username" id="username" required="required" class="form-control" />
				  <label class="form-label">Username    </label>
				</div>
				<div class="form-group">
				  <input id="password" name="password" type="password" required="required" class="form-control" />
				  <label class="form-label">Password</label>
				  <button class="btn">Login </button>
				</div>
			  </form>
			  
</body>
</html>


