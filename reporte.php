<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	  <link rel="stylesheet" type="text/css" href="morris.css">
</head>
<body>
<?php
require_once 'helperPDO.php';
$driver=new driverBD();
$sql="SELECT producto,precio FROM producto where estado=1";
$stm=$driver->getProcedure($sql);
$valor=$stm->execute();
if($valor){
$chart='';	
   while($row=$stm->fetch(PDO::FETCH_ASSOC)){
      $chart.="{producto:'".$row["producto"]."',precio:'".$row["precio"]."'}, ";
   }
   $chart=substr($chart,0,-2);
}

?>


<div id="chart"></div>

 <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
 <script type="text/javascript" src="morris.js"></script>
 <script type="text/javascript" src="raphel.js"></script>
 <script type="text/javascript">
	
Morris.Line({
element:'chart',
data:[<?php  echo $chart; ?>],
xkey:'precio',
ykeys:['producto'],
labels:['producto'],
hideHower:'auto'
});


</script>


</body>
</html>



 -->







