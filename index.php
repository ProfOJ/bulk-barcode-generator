<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Barcode Generator</title>
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/gh/mdbootstrap/Bootstrap-4-templates/admin/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdn.jsdelivr.net/gh/mdbootstrap/Bootstrap-4-templates/admin/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="https://cdn.jsdelivr.net/gh/mdbootstrap/Bootstrap-4-templates/admin/css/style.min.css" rel="stylesheet">
  <link href="css/addons/datatables.min.css" rel="stylesheet">
  <style>

    .map-container{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.map-container iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}
  </style>
</head>

</head>
<body>
<!-- partial:index.partial.html -->
<body class="grey lighten-3">

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      <div class="container-fluid">

        

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link waves-effect" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            
          </ul>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
              <a href="https://www.facebook.com/mdbootstrap" class="nav-link waves-effect" target="_blank">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://twitter.com/MDBootstrap" class="nav-link waves-effect" target="_blank">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://github.com/mdbootstrap/bootstrap-material-design" class="nav-link border border-light rounded waves-effect"
                target="_blank">
                <i class="fab fa-github mr-2"></i>MDB GitHub
              </a>
            </li>
          </ul>

        </div>

      </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">

      <a class="logo-wrapper waves-effect">
        <img src="https://mdbootstrap.com/img/logo/mdb-email.png" class="img-fluid" alt="">
      </a>

      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item active waves-effect">
          <i class="fas fa-chart-pie mr-3"></i>Dashboard
        </a>
        <a href="#" class="list-group-item list-group-item-action waves-effect" onclick="generateToggle();">
          <i class="fas fa-cogs mr-3"></i>Generate</a>
        <a href="#" class="list-group-item list-group-item-action waves-effect" onclick="brandToggle();">
          <i class="fas fa-table mr-3"></i>Brands</a>
        
      </div>

    </div>
    <!-- Sidebar -->

  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h5 class="mb-2 mb-sm-0 pt-1">
            <a href="#!" target="_blank">Home Page</a>
            <span>/</span>
            <span id="page">Dashboard</span>
          </h5>

          <!--<form class="d-flex justify-content-center">
            
            <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
            <button class="btn btn-primary btn-sm my-0 p" type="submit">
              <i class="fas fa-search"></i>
            </button>

          </form>-->

        </div>

      </div>
      <!-- Heading -->

	  <div id="generate">	
      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-10 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <div class="card-body">

           <form class="d-flex justify-content-center" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <!-- Default input -->
			<input list="brands" type="text" class="form-control" name="brand" placeholder="Select brand" value="" style="width:30%;">
            <input type="search" name="product" placeholder="Enter product name" aria-label="Search" class="form-control mx-2" value="" style="width:50%;">
			<input type="number" class="form-control" name="qty" placeholder="No." value="" style="width:10%;">
            <button class="btn btn-success btn-rounded btn-lg py-0 my-0 px-1 p waves-effect waves-light" type="submit" style="width:10%;">
              Generate
            </button>
			
			<datalist id="brands">

			 <?php
			 			
			//Delete this line below with : require 'db_config.php'; if you are using a local server	
			 require 'http://www.copgbawe.org/bulk-barcode/db_config.php';	
				
			$conn = new mysqli($server_name, $user_name, $password , $database);
			$result = $conn->query("SELECT * FROM brands");

			while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
			 echo' <option value="'.$rs['brand_name'].'">'.$rs['brand_name'];   
			}

			$conn->close();
			 
			 
			 ?>
			</datalist>
          </form>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        

      </div>
	  
	  <?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	    include 'barcode128.php';
		//Delete this line below with : require 'db_config.php'; if you are using a local server	
		require 'http://www.copgbawe.org/bulk-barcode/db_config.php';
		
		$brand = $_POST['brand'];
		$product = $_POST['product'];
		$brand_ini = substr($brand,0,2);
		$product_id = $brand_ini.rand(123456789 , 999999999);
		$qty = $_POST['qty'];
		
		
		$conn = new mysqli($server_name, $user_name, $password , $database);
		$result = $conn->query("INSERT INTO `barcodes` (`brand`, `product`, `upc`, `qty`) VALUES ('$brand', '$product', '$product_id', '$qty')");
		
		
		//echo "<div class='row wow fadeIn'><div class='col-md-10 mb-4'><div class='card'><div class='card-body'><div class='row'>";
		
		
		echo '<script>	
			window.open("barcode.php?brand='.$brand.'&product='.$product.'&product_id='.$product_id.'&qty='.$qty.'", "Print Barcode", "width=600,height=800");
			</script>';
		
		//echo "</div></div></div></div></div>&nbsp&nbsp&nbsp&nbsp";

 
 
 
}
?>
	  
      <!--Grid row-->
	  <div class="row wow fadeIn">

        
        <!--Grid column-->
        <div class="col-md-12 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <div class="card-body">
			  <div class='table-responsive'>	
              <!-- Table  -->
              <table class="table table-hover" id="dtBasicExample">
                <!-- Table head -->
                <thead class="blue lighten-4">
                  <tr>
                    <th>#</th>
                    <th>Brand</th>
                    <th>Product name</th>
					<th>UPC</th>
					<th>Qty</th>
					<th>Timestamp</th>
					<th>Action</th>
                  </tr>
                </thead>
                <!-- Table head -->

                <!-- Table body -->
                <tbody>
                  <?php
    
 

 //Delete this line below with : require 'db_config.php'; if you are using a local server	
 require 'http://www.copgbawe.org/bulk-barcode/db_config.php';
 $conn = new mysqli($server_name, $user_name, $password , $database);
 $result = $conn->query("SELECT * FROM barcodes ORDER BY timestamp desc");
    
    // List all records
    if($result->num_rows > 0){
      while($rs = $result->fetch_assoc()){
    ?>
    <tr>
              
      <td><?php echo $rs['id']; ?></td>
      <td><?php echo $rs['brand']; ?></td>
	  <td><?php echo $rs['product']; ?></td>
	  <td><?php echo $rs['upc']; ?></td>
	  <td><?php echo $rs['qty']; ?></td>
	  <td><?php echo $rs['timestamp']; ?></td>
	  <td><a onclick="window.open('barcode.php?brand=<?php echo $rs['brand']; ?>&product=<?php echo $rs['product']; ?>&product_id=<?php echo $rs['upc']; ?>&qty=<?php echo $rs['qty']; ?>', 'Print Barcode', 'width=700,height=800');"><span class="btn btn-primary btn-sm">Print</span></a></td>
	  
    </tr> 

   
    <?php } }else{ ?>
      <tr><td colspan="5">No records found.</td></tr> 
    <?php }  ?>
				  
                 
                </tbody>
                <!-- Table body -->
              </table>
              <!-- Table  -->
			  </div>	
            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

      </div>
	  </div>

	  <div id="brand" style="display:none;">	
      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-9 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <div class="card-body">

           <form class="d-flex justify-content-center" method="post" action="add_brand.php">
            <!-- Default input -->
			<input type="text" class="form-control" name="brand" placeholder="Enter brand name" value="">
			
            <button class="btn btn-success btn-rounded btn-lg my-0 py-0 px-1 p waves-effect waves-light" type="submit" style="width:90px;">
              Save
            </button>

          </form>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->


      </div>
      <!--Grid row-->
	  	

	  
      <!--Grid row-->
      <div class="row wow fadeIn">

        
        <!--Grid column-->
        <div class="col-md-12 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <div class="card-body">

              <!-- Table  -->
              <table class="table table-hover" id="dtBasicExample2">
                <!-- Table head -->
                <thead class="blue lighten-4">
                  <tr>
                    <th>#</th>
                    <th>Brand Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <!-- Table head -->

                <!-- Table body -->
                <tbody>
                  <?php
    
 

 //Delete this line below with : require 'db_config.php'; if you are using a local server	
 require 'http://www.copgbawe.org/bulk-barcode/db_config.php';
 $conn = new mysqli($server_name, $user_name, $password , $database);
 $result = $conn->query("SELECT * FROM brands ORDER BY brand_name asc");
    
    // List all records
    if($result->num_rows > 0){
      while($rs = $result->fetch_assoc()){
    ?>
    <tr>
              
      <td><?php echo $rs['id']; ?></td>
      <td><?php echo $rs['brand_name']; ?></td>
	  <td><a><span class="btn btn-danger btn-sm">Delete</span></a></td>
	  
    </tr> 

   
    <?php } }else{ ?>
      <tr><td colspan="5">No records found.</td></tr> 
    <?php }  ?>
                </tbody>
                <!-- Table body -->
              </table>
              <!-- Table  -->

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->
	  </div>	
      
      

    </div>
  </main>
  <!--Main layout-->


  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/mdbootstrap/Bootstrap-4-templates/admin/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/mdbootstrap/Bootstrap-4-templates/admin/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/mdbootstrap/Bootstrap-4-templates/admin/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/mdbootstrap/Bootstrap-4-templates/admin/js/mdb.min.js"></script>
  <!-- MDBootstrap Datatables  -->
  <script type="text/javascript" src="js/addons/datatables.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>

    <script>
	function brandToggle(){
		
		brand.style.display = "block";
		document.getElementById("page").innerHTML = "Brand";
		
		generate.style.display = "none";
	}
	
	function generateToggle(){
		
		generate.style.display = "block";
		document.getElementById("page").innerHTML = "Generate";
		
		brand.style.display = "none";
		
		
	}
	</script>
	<script>
	$(document).ready(function () {
		$('#dtBasicExample').DataTable();
		$('.dataTables_length').addClass('bs-select');
		});
    </script>

	<script>
	$(document).ready(function () {
		$('#dtBasicExample2').DataTable();
		$('.dataTables_length').addClass('bs-select');
		});
    </script>	
  <!-- Charts -->
  <script>
    // Line
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });

    //pie
    var ctxP = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
      type: 'pie',
      data: {
        labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
        datasets: [{
          data: [300, 50, 100, 40, 120],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
          hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
      },
      options: {
        responsive: true,
        legend: false
      }
    });


    //line
    var ctxL = document.getElementById("lineChart").getContext('2d');
    var myLineChart = new Chart(ctxL, {
      type: 'line',
      data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: "My First dataset",
            backgroundColor: [
              'rgba(105, 0, 132, .2)',
            ],
            borderColor: [
              'rgba(200, 99, 132, .7)',
            ],
            borderWidth: 2,
            data: [65, 59, 80, 81, 56, 55, 40]
          },
          {
            label: "My Second dataset",
            backgroundColor: [
              'rgba(0, 137, 132, .2)',
            ],
            borderColor: [
              'rgba(0, 10, 130, .7)',
            ],
            data: [28, 48, 40, 19, 86, 27, 90]
          }
        ]
      },
      options: {
        responsive: true
      }
    });


    //radar
    var ctxR = document.getElementById("radarChart").getContext('2d');
    var myRadarChart = new Chart(ctxR, {
      type: 'radar',
      data: {
        labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
        datasets: [{
          label: "My First dataset",
          data: [65, 59, 90, 81, 56, 55, 40],
          backgroundColor: [
            'rgba(105, 0, 132, .2)',
          ],
          borderColor: [
            'rgba(200, 99, 132, .7)',
          ],
          borderWidth: 2
        }, {
          label: "My Second dataset",
          data: [28, 48, 40, 19, 96, 27, 100],
          backgroundColor: [
            'rgba(0, 250, 220, .2)',
          ],
          borderColor: [
            'rgba(0, 213, 132, .7)',
          ],
          borderWidth: 2
        }]
      },
      options: {
        responsive: true
      }
    });

    //doughnut
    var ctxD = document.getElementById("doughnutChart").getContext('2d');
    var myLineChart = new Chart(ctxD, {
      type: 'doughnut',
      data: {
        labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
        datasets: [{
          data: [300, 50, 100, 40, 120],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
          hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
      },
      options: {
        responsive: true
      }
    });

  </script>

  <!--Google Maps-->
  <script src="https://maps.google.com/maps/api/js"></script>
  <script>
    // Regular map
    function regular_map() {
      var var_location = new google.maps.LatLng(40.725118, -73.997699);

      var var_mapoptions = {
        center: var_location,
        zoom: 14
      };

      var var_map = new google.maps.Map(document.getElementById("map-container"),
        var_mapoptions);

      var var_marker = new google.maps.Marker({
        position: var_location,
        map: var_map,
        title: "New York"
      });
    }

    new Chart(document.getElementById("horizontalBar"), {
      "type": "horizontalBar",
      "data": {
        "labels": ["Red", "Orange", "Yellow", "Green", "Blue", "Purple", "Grey"],
        "datasets": [{
          "label": "My First Dataset",
          "data": [22, 33, 55, 12, 86, 23, 14],
          "fill": false,
          "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)",
            "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"
          ],
          "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)",
            "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)",
            "rgb(201, 203, 207)"
          ],
          "borderWidth": 1
        }]
      },
      "options": {
        "scales": {
          "xAxes": [{
            "ticks": {
              "beginAtZero": true
            }
          }]
        }
      }
    });

  </script>
</body>
<!-- partial -->
  
</body>
</html>
