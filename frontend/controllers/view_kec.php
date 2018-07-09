<?php
	include 'connectmysql.php';

	$sql = "SELECT nama_kec, warna, AsText(poligon_kec) as koordinat
	from data_kecamatan";
	// $sql = "SELECT ST_AsGeoJSON(koordinat) as koordinat from map";

	if(!$conn){
		echo "Koneksi Gagal";
	}
	else{
		$geojson = mysqli_query($conn, $sql);

		$data = array();
  		$content = array();

		while($datas = mysqli_fetch_array($geojson)) {
	      	array_push($content, array(
	      		"nama_kec" => $datas['nama_kec'],
	      		"koordinat" => $datas['koordinat'],
	      		"warna" => $datas['warna'],
	    	));
	    }

	    $data = array(
			"data" => $content
		);

		header('Content-Type: application/json');
  		echo json_encode($data);
	}
?>