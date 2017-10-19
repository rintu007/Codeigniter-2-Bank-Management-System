<!DOCTYPE html>
<html>
	<head>
		<title>Change Password</title>
	</head>
	<body>
		<?php 
			$usertype=$this->session->userdata('usertype');
			if($usertype=='admin'){
				$this->load->view('Shared/AdminMaster');
			}
			else if($usertype=='account'){
				$this->load->view('Shared/Master');
			}
		?>
		<h1>Change Password</h1>
		<span style="color:red">
			<?php echo $message;?>
		</span><br/>
		<form method="post" >
			<table style="border:1px solid lightgray" cellspacing="5" cellpadding="5">
				<tr>
					<td>Current Password</td>
					<td>
						<input type="password"  name="cp" value="<?php echo set_value('cp'); ?>" />
					</td>
				</tr>
				<tr>
					<td>New Password</td>
					<td>
						<input type="password" name="np" value="<?php echo set_value('np'); ?>"/>
					</td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td>
						<input type="password" name="cnp" value="<?php echo set_value('cnp'); ?>"/>
					</td>
				</tr>
				
				<tr>
					<td><input type="hidden" name="username" value="<?php echo $username;?>"</td>
					<td><input type="submit" name="buttonSubmit" value="change password" class="btn btn-primary"/></td>
				</tr>
			</table>
		</form>
	
	</body>
</html>	