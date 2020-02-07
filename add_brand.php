	  <?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	    include 'db_config.php';
		
		$brand = $_POST['brand'];
		
		
		$conn = new mysqli($server_name, $user_name, $password , $database);
		$result = $conn->query("INSERT INTO `brands` (`brand_name`) VALUES ('$brand')");
		
			
		
		echo '<script>	
				window.location.href="index.php"
			</script>';
		
		

 
 
 
}
else {
	echo 'Error';
}
?>