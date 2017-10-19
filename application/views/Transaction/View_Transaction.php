<!DOCTYPE html>
<html>
	<head>
		<title>transaction</title>
	</head>
	<body>
		<?php $this->load->view('Shared/AdminMaster'); ?>
		<h1>Transaction History</h1>
		<table style="border:1px solid lightgray" cellspacing="5" cellpadding="5">
						
			<tr style="background-color:#b3b3b3">
				<th>Account No</th>
				<th>Deposit</th>
				<th>Withdraw</th>
				<th>Date</th>
			</tr>
			
			
			{transaction}
			<tr>
				<td>{accountNo}</td>
				<td>{deposit}</td>
				<td>{withdraw}</td>
				<td>{date}</td>
				
			</tr>
			{/transaction}
			
		</table>
	</body>

</html>
