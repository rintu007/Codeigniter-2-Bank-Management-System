<!DOCTYPE html>
<html>
	<head>
		<title>Dashboard</title>
	</head>
	<body>
		<?php $this->load->view('Shared/AdminMaster'); ?>
		<h1>Accounts</h1>
		<a  href="<?php echo base_url(); ?>Account/create">Create New Account</a><br/><br/>
		<table style="border:1px solid lightgray" cellspacing="5" cellpadding="5">
						
			<tr style="background-color:#b3b3b3">
				<th>Account No</th>
				<th>Name</th>
				<th>phone</th>
				<th>email</th>
				<th colspan="3">Action</th>
			</tr>
			
			
			{accounts}
			<tr>
				<td>{accountNo}</td>
				<td>{name}</td>
				<td>{phone}</td>
				<td>{email}</td>
				<td>
					<a  href="<?php echo base_url(); ?>Account/details/{accountNo}">Details</a>
				</td>
				<td>
					<a  href="<?php echo base_url(); ?>Account/edit/{accountNo}">Edit</a>
				</td>
				<td>
					<a style="color:red" href="<?php echo base_url(); ?>Account/deleteAccount/{accountNo}">Delete</a>
				</td>
				
			</tr>
			{/accounts}
			
		</table>
	</body>

</html>
