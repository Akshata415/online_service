<?php session_start();
if(isset($_SESSION['uid']))
{

include "header.php"; ?>
<div style="background-color: white; width: 98%; margin: 0 auto; ">
	<br>
	<?php	include "connect.php";
	$pid = $_GET['pid'];
	$uid = $_GET['uid'];
		?>

	<table border=1 align="center" width=90% cellspacing="10" cellpadding="12">
		<tr>
			<th>NO</th>
			<th>UserID</th>
			<th>Product ID</th>
			<th>Price</th>
			<th>Qty</th>
			<th>Total</th>
			<th>IMAGE</th>
			
			
		</tr>
		<?php 

		$s = mysqli_query($con,"SELECT addlist.price, addlist.p_id, addlist.qty, addlist.total,addlist.id, checkout.name, addlist.u_id, menu.image
FROM addlist
INNER JOIN checkout ON addlist.p_id=checkout.p_id INNER JOIN menu on menu.id=checkout.p_id  where addlist.u_id='$uid' and checkout.p_id='$pid'");


		while($r = mysqli_fetch_array($s))
		{
		?>
		<tr>
				<td><?php echo $r['id']; ?></td>
				<td><?php echo $r['u_id']; ?></td>
				<td><?php echo $r['p_id']; ?></td>
				<td><?php echo $r['price']; ?></td>
				<td><?php echo $r['qty']; ?></td>
				<td><?php echo $r['total']; ?></td>
				<td><img src="<?php echo $r['image']; ?>" width=100 height=100></td>
			
		</tr>
		<?php
			}
		?>

	</table>
</div>

<?php include "footer.php"; ?>

<?php
}
else
{
     header("location:index.php");
}
?>
