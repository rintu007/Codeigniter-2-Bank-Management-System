<!DOCTYPE html>
<html>
	<head>
		<title>transaction</title>
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
		<h1>Transaction History </h1>
		Account No:<?php echo $accountNo; ?><br/>
		Balance:<?php echo $balance['balance']; ?><br/><br/>
		<table style="border:1px solid lightgray" cellspacing="5" cellpadding="5">
						
			<tr style="background-color:#b3b3b3">
				<th>Date</th>
				<th>Deposit</th>
				<th>Withdraw</th>
				
			</tr>
			
			
			{transaction}
			<tr>
				<td>{date}</td>
				<td>{deposit}</td>
				<td>{withdraw}</td>
				
				
			</tr>
			{/transaction}
			
		</table><br/>
		
		
	</body>

</html>
