<!DOCTYPE html>
<html>
	<head>
		<title>Create New</title>
	</head>
	<body>
		<?php $this->load->view('Shared/AdminMaster'); ?>
		<h1>Create New Account</h1>
		<span style="color:red">
			<?php echo $message;?>
		</span><br/>
		<form method="post">
			<table style="border:1px solid lightgray" cellspacing="5" cellpadding="5">
							
				<tr>
					<td>Account No</td>
					<td> <input type="text" name="accountNo" value="<?php echo set_value('accoutnNo');?>"/></td>
				</tr>
				<tr>
					<td>Name</td>
					<td> <input type="text" name="name" value="<?php echo set_value('name');?>"/></td>
				</tr>
				<tr>
					<td>phone</td>
					<td> <input type="text" name="phone" value="<?php echo set_value('phone');?>"/></td>
				</tr>
				<tr>
					<td>email</td>
					<td> <input type="text" name="email" value="<?php echo set_value('email');?>"/></td>
				</tr>
				<tr>
					<td></td>
					<td> <input type="submit" name="buttonSubmit" value="Create"/></td>
				</tr>
			</table>
			<br/>
		</form>
	</body>

</html>
