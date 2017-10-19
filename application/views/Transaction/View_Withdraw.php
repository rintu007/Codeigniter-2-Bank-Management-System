<!DOCTYPE html>
<html>
	<head>
		<title>withdraw</title>
	</head>
	<body>
		<?php $this->load->view('Shared/AdminMaster'); ?>
		<h1>Withdraw</h1>
		<span style="color:red">
			<?php echo $message;?>
		</span><br/>
		<form method="post">
			<table style="border:1px solid lightgray" cellspacing="5" cellpadding="5">
							
				<tr>
					<td>Account No</td>
					<td> 
						<select name="accountNo" >
							<option value="">Select Account</option>
							<?php
							foreach($accounts as $account){
								echo '<option value="'.$account['accountNo'].'" '.set_select('accountNo',$account['accountNo'] ).'>'.$account['accountNo'].'</option>';
							}
							?>
						</select>
					</td>
				</tr>
				
				<tr>
					<td>Amount</td>
					<td> <input type="text" name="amount" value="<?php echo set_value('amount');?>"/></td>
				</tr>
				<tr>
					<td></td>
					<td> <input type="submit" name="buttonSubmit" value="Withdraw"/></td>
				</tr>
			</table>
			<br/>
		</form>
	</body>

</html>
