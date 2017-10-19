<!DOCTYPE html>
<html>
	<head>
		<title>Delete Account</title>
	</head>
	<body>
		<?php $this->load->view('Shared/AdminMaster'); ?>
		<h1>Delete Account</h1>
		<h3><span style="color:red" > Are You Sure to Delete this Account!!!</span></h3>
		<form method="post">
			<table style="border:1px solid lightgray" cellspacing="5" cellpadding="5">
							
				<tr>
					<td>Account No</td>
					<td><input type="hidden" name="accountNo" value="<?php echo $account['accountNo'];?>"/> <?php echo $account['accountNo'];?></td>
				</tr>
				<tr>
					<td>Name</td>
					<td> <?php echo $account['name'];?></td>
				</tr>
				<tr>
					<td>phone</td>
					<td> <?php echo $account['phone'];?></td>
				</tr>
				<tr>
					<td>email</td>
					<td> <?php echo $account['email'];?></td>
				</tr>
				<tr>
					<td>Balance</td>
					<td> <?php echo $balance['balance'];?></td>
				</tr>
				<tr>
					<td><a  href="<?php echo base_url(); ?>Admin/">Back</a></td>
					<td> <input type="submit" name="buttonSubmit" value="confirm"/></td>
				</tr>
			</table><br/>
		</form>	
	</body>

</html>
