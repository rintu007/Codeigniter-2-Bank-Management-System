<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
	</head>
	<body>
		<div align="center" >
			<div align="left" style="padding:10px;border:1px solid black; width:250px">
				<br/><font size="6">Login Panel</font><hr/>
				<form method="post" action="<?php echo base_url(); ?>User/login">
					<input type="text" name="username" id="username" size="35" value="<?php echo $username; ?>" placeholder="Username" /><br/><br/>
					<input type="password"  name="password" id="password" size="35" value="" placeholder="Password"/><br/>
					<br/>
					<input type="submit" name="buttonSubmit"  value="Login"/>
					<br/>
					<span style="color:#990000"><?php echo $message; ?></span>
					<br/>
				</form>
			</div>
		</div>
	</body>
</html>