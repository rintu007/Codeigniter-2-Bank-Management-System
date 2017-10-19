<!DOCTYPE html>
<html>
	<head>
		<title>Edit</title>
	</head>
	<body>
		<?php $this->load->view('Shared/AdminMaster'); ?>
		<h1>Edit Account</h1>
		<span style="color:red">
			<?php echo $message;?>
		</span><br/>
		<form method="post">
			<table style="border:1px solid lightgray" cellspacing="5" cellpadding="5">
							
				<tr>
					<td>Account No</td>
					<td> <?php echo $account['accountNo'];?>
					<input type="hidden" name="accountNo" value="<?php echo $account['accountNo'];?>"/></td>
				</tr>
				<tr>
					<td>Name</td>
					<td> <input type="text" name="name" value="<?php echo set_value('name');if(set_value('name')==''){echo $account['name'];} ?>"/></td>
				</tr>
				<tr>
					<td>phone</td>
					<td> <input type="text" name="phone" value="<?php echo set_value('phone');if(set_value('phone')==''){echo $account['phone'];}?>"/></td>
				</tr>
				<tr>
					<td>email</td>
					<td> <input type="text" name="email" value="<?php echo set_value('email');if(set_value('email')==''){echo $account['email'];}?>"/></td>
				</tr>
				<tr>
					<td><a  href="<?php echo base_url(); ?>Admin/">Back</a></td>
					<td> <input type="submit" name="buttonSubmit" value="Edit"/></td>
				</tr>
			</table>
			<br/>
		</form>
	</body>

</html>
