<html>
<head>
<style>
p.inline {display: inline-block;}
span { font-size: 13px;}
</style>
<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */

    }
</style>
</head>
<body onload="window.print();">
	<div style="margin-left: 5%">
		<?php
		include 'barcode128.php';
		$product = $_GET['product'];
		$product_id = $_GET['product_id'];
		$qty = $_GET['qty'];
		

		for($i=1;$i<=$_GET['qty'];$i++){
			echo "<p class='inline'><span ><b>$product</b></span>".bar128(stripcslashes($_GET['product_id']))."</p>";
		}
		

		?>
	</div>
</body>
</html>