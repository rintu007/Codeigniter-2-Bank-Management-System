<!DOCTYPE html>
<html>
	<head>
		<title>details</title>
	</head>
	<body>
		<?php $this->load->view('Shared/AdminMaster'); ?>
		<h1>Account Details</h1>
		<table style="border:1px solid lightgray" cellspacing="5" cellpadding="5">
						
			<tr>
				<td>Account No</td>
				<td> <?php echo $account['accountNo'];?></td>
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
		</table><br/>
		<a  href="<?php echo base_url(); ?>Transaction/details/<?php echo $account['accountNo'];?>">View Transaction History</a><br/>	
	</body>

</html>
