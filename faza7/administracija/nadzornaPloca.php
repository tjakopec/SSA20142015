<?php
include_once '../konfiguracija.php';
if (!isset($_SESSION[$ida . "autoriziran"])) {
	header("location: ../index.php");
}
?>
<!doctype html>
<html class="no-js" lang="en">
	<head>
		<?php
		include_once '../head.php';
		?>
		<title><?php echo $naslovAPP; ?>
			ADMINISTRACIJA</title>
	</head>
	<body>
		<?php
		include_once 'izbornik.php';
		?>

		<div class="row">
			<div class="large-12">
				<div id="container" style="height: 400px"></div>
			</div>
		</div>
		<?php
		include_once 'skripte.php';
		?>
		<script src="http://code.highcharts.com/highcharts.js"></script>
		<script src="http://code.highcharts.com/highcharts-3d.js"></script>
		<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script>
	$(function () {
    $('#container').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Omjer izgubljenih i pronađenih'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 55,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Udio',
            data: [
            <?php 
        
        $veza->exec("set names utf8");
        $izraz = $veza->prepare("select vrsta, count(vrsta) as ukupno from neobradene_dojave group by vrsta;");
        $izraz->execute();
        $rezultati =  $izraz->fetchAll(PDO::FETCH_OBJ);
        $s="";
        foreach ($rezultati as $r){
		$s=$s .  "[" . "'" . $r->vrsta . "'," . $r->ukupno . "],";
			}   
        echo $s;
        ?>
               
            ]
        }]
    });
});
</script>

	</body>
</html>
