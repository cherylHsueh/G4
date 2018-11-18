
	<tr class="member_orderSearch_block_lightbox_title">
		<th></th>
		<th>產品名稱</th>
		<th>單價</th>
		<th>數量</th>
		<th>小計</th>
	</tr>

<?php 
	require_once("../connectBooks.php");

	$orderNo=$_REQUEST["orderNo"];	
	$sql2="select * from orderdetails where orderNo=:orderNo";

		$order2 = $pdo->prepare($sql2);
		$order2->bindValue(":orderNo",$orderNo);
		$order2 -> execute();
		// $orderRow = $order->fetchObject();
		if( $order2->rowCount() !== 0)
		while ($orderRow2 = $order2->fetchObject()) {
?>
		
		<tr class="member_orderSearch_block_lightbox_content">
			<td class="member_orderSearch_block_lightbox_picture">
				<img src="images/pd/<?php echo $orderRow2 ->custorImg ?>">
				
			</td>
			<td class="member_orderSearch_block_lightbox_content_pdName">
				<?php echo $orderRow2 ->offPdName ?>
			</td>
			<td class="member_orderSearch_block_lightbox_unitPrice">
				<?php echo $orderRow2 ->pdPrice ?>
			</td>
			<td class="member_orderSearch_block_lightbox_quantity">
				<?php echo $orderRow2 ->orderQty ?>	
			</td>
			<td class="member_orderSearch_block_lightbox_total">
				<?php echo $orderRow2 ->subTotal ?>
			</td>
		</tr>

<?php 
	} 
?>