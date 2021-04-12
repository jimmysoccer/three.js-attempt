<?php
$nis = "hesun";
$password= "092700Jimmy";
$que = "SELECT * FROM \"G.AGRAWAL\".\"LABOR_DATA\"";
$conn=oci_connect($nis,$password,
'oracle.cise.ufl.edu:1521/orcl');
if(empty($nis) or empty($password)){
    echo "UserID atau Password is empty<br>\n";}

if(!$conn){
    echo 'connection error';
}
?>
<html>
<body>
<h2>Query result</h2>
<?php
$result=oci_parse($conn,$que);
oci_execute($result);
$i=1;
$unemployment=array();
$laborForce=array();
$employment=array();
$unemploymentRate=array();
while (($row = oci_fetch_array($result, OCI_NUM)) != false) {
  // Use the uppercase column names for the associative array indices
  $arrayName1 = array("x" =>$i ,"y"=>$row[1]);
  $arrayName2 = array("x" =>$i ,"y"=>$row[2]);
  $arrayName3 = array("x" =>$i ,"y"=>$row[3]);
  $arrayName4 = array("x" =>$i ,"y"=>$row[4]);
  array_push($unemployment,$arrayName1);
  array_push($laborForce,$arrayName2);
  array_push($employment,$arrayName3);
  array_push($unemploymentRate,$arrayName4);
  $i++;
}
oci_free_statement($result);
oci_close($conn);
?>
</body>
</html>
<html>
<head>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	exportEnabled: true,
  zoonEnabled:true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Unemployment"
	},
	axisY:{
		includeZero: true,
    title:"population"
	},
  axisX:{
    title:"Labor ID"
  },
	data: [{
		type: "line",
    indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",
		dataPoints: <?php echo json_encode($unemployment, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
var chart2 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	exportEnabled: true,
  zoonEnabled:true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Labor Force"
	},
	axisY:{
		includeZero: true,
    title:"population"
	},
  axisX:{
    title:"Labor ID"
  },
	data: [{
		type: "line",
    indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",
		dataPoints: <?php echo json_encode($laborForce, JSON_NUMERIC_CHECK); ?>
	}]
});
chart2.render();

var chart3 = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
	exportEnabled: true,
  zoonEnabled:true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Employment"
	},
	axisY:{
		includeZero: true,
    title:"population"
	},
  axisX:{
    title:"Labor ID"
  },
	data: [{
		type: "line",
    indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",
		dataPoints: <?php echo json_encode($employment, JSON_NUMERIC_CHECK); ?>
	}]
});
chart3.render();

var chart4 = new CanvasJS.Chart("chartContainer4", {
	animationEnabled: true,
	exportEnabled: true,
  zoonEnabled:true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Unemployment Rate"
	},
	axisY:{
		includeZero: true,
    title:"Rate"
	},
  axisX:{
    title:"Labor ID"
  },
	data: [{
		type: "line",
    indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",
		dataPoints: <?php echo json_encode($unemploymentRate, JSON_NUMERIC_CHECK); ?>
	}]
});
chart4.render();

}

</script>
</head>
<body>
<div id="chartContainer1" style="height: 370px; width: 100%;"></div>
<div id="chartContainer2" style="height: 370px; width: 100%;"></div>
<div id="chartContainer3" style="height: 370px; width: 100%;"></div>
<div id="chartContainer4" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
<div align="center">
<form method="get" action="homePage.php">
    <button type="submit">HomePage</button>
</form>
</div>
</html>
