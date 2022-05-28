<?php
session_start();

 include('../admin/db/config.php');

  $sql= "select * from user where id=".$_SESSION['id'];
 $rn= mysqli_query($conn,$sql);
  $row= mysqli_fetch_array($rn);

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>A simple, clean, and responsive HTML invoice template</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="vaiso-Recovered.png" style="width: 100%;" />
								</td>

							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							   <?php $sql= mysqli_query($conn,"select * from applications where userid=".$_SESSION['id']);
							    while ($row2= mysqli_fetch_array($sql)) { ?>
							<tr>
								<td>
									Applicants Name: <?php echo $row2['name'] ?><br />
									Parent Name: <?php echo $row2['parentname'] ?><br />
									Address : <?php echo $row2['address1'] ?> <br />
								</td>
								<?php if(empty($row2['attachment'])){?>
	<td>
									<img src="rejected.png" style="width: 20%;" />
							   </td>
							    <?php }else {?>

								<td>
								<img src="../admin/docupload/<?php echo $row2['attachment']; ?>" style="width: 40%;" />
								</td>
							<?php  }	?>
							</tr>
							
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Payment Details</td>

						<td>Status</td>
				
				</tr>

				<tr class="details">
					<td>Paymaent Status</td>
                <?php if($row2['payment_status'] == 1){?>

					<td style="font-weight:bold;color: green; ">Paid</td>
				<?php } else {?>
					<td style="font-weight:bold; color: red;">Not Yet Paid</td>
				 <?php } }	?>
				</tr>

				<tr class="heading">
					<td>Item</td>

					<td>Price</td>
				</tr>

				<tr class="item">
					<td>Website design</td>

					<td>$300.00</td>
				</tr>

				<tr class="item">
					<td>Hosting (3 months)</td>

					<td>$75.00</td>
				</tr>

				<tr class="item last">
					<td>Domain name (1 year)</td>

					<td>$10.00</td>
				</tr>

				<tr class="total">
					<td></td>

					<td>Total: $385.00</td>
				</tr>
               <?php $sql= mysqli_query($conn,"select * from applications where userid=".$_SESSION['id']);
                            while ($row= mysqli_fetch_array($sql)) { 
                                if($row['application_startus'] == 'Approved'){

                                ?>
                          
				<td class="title">
					<img src="download.jpg" style="width: 20%;" />
				</td>
                            <?php } else if($row['application_startus'] == 'Rejected') { 
                    ?>
                     	<td class="title">
					<img src="rejected.png" style="width: 20%;" />
				</td>   
                        
                        <?php } else {?>

                            <td class="title">
					<img src="pending.jpg" style="width: 20%;" />
				</td>      

                     <?php   }
                    
                    }  ?>
			</table>
		</div>
	
		<button id="printPageButton" onclick="window.print()" style="  margin: 0;
		position: absolute;
		left: 50%;
		-ms-transform: translate(-50%, -50%);
		transform: translate(-50%, -50%);">Print Reciept</button>
	</body>

</html>
