
<?php
$nis = "hesun";
$password= "092700Jimmy";
$que = "SELECT G.A AS \"SURVIVED\", G.F AS \"DEATHS\", D.D_MONTH, D.D_YEAR
FROM \"G.AGRAWAL\".\"DATEVALUES\" D,
(SELECT (SUM(C.CASES_TOTAL)-SUM(D.DEATHS_TOTAL)) AS A, SUM(D.DEATHS_TOTAL) AS F, T.D_ID AS B
FROM \"G.AGRAWAL\".\"COVID_CASES\" C, \"G.AGRAWAL\".\"COVID_DEATHS\" D, \"G.AGRAWAL\".\"DATEVALUES\" T
WHERE C.D_ID=T.D_ID
AND D.D_ID=T.D_ID
GROUP BY T.D_ID)G
WHERE G.B=D.D_ID";
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
$data=array();
$death=array();
while (($row = oci_fetch_array($result, OCI_NUM)) != false) {
    $temp=$row[3] . $row[2];
    $arrayName = array("label" =>"$temp" ,"y"=>$row[0]);
    $arrayName1 = array("label" =>"$temp" ,"y"=>$row[1]);
    array_push($data,$arrayName);
    array_push($death,$arrayName1);
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

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
  zoonEnabled:true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Survive VS Death Cases"
	},
  axisX:{
    title: "Year/Month"
  }
  ,
	axisY: {
		title: "Survived Cases",
    titleFontColor: "#4F81BC",
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC"
	},
  axisY2:{
    title:"Death cases",
    titleFontColor: "#C0504E",
		lineColor: "#C0504E",
		labelFontColor: "#C0504E",
		tickColor: "#C0504E"
  },
	data: [{
		type: "line",
    name:"Survived",
    markerSize:0,
		showInLegend: true,
		dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
	},{
    type: "line",
		axisYType: "secondary",
    name:"Death",
		markerSize: 0,
		showInLegend: true,
		dataPoints: <?php echo json_encode($death, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
<div align="center">
<form method="get" action="homePage.php">
    <button type="submit">HomePage</button>
</form>
</div>
</html>
