<?php
// var_dump($warna);
// die();
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'PRB | Jawa Timur';
?>
<head>
  <h3>Peta Risiko Bencana Menggunakan Metode AHP</h3>
</head>
<div id="map" style="height: 500px; width: 100%"></div>



<script>
  var prev_infowindow =false;
  var infoWindow;
  var map;

  function getData() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        fillMap(JSON.parse(this.responseText));
      }
    };

    xhttp.open("GET", "http://127.0.0.1/PetaRisiko/frontend/web/api/jatimapi.php", true);
    xhttp.send();
  }

  function fillMap(data) {
      let datas = data.data;
      
      initMap(datas);
  }

  function initMap(data=[]) {
        map = new google.maps.Map(document.getElementById('map'), {
        zoom: 8,
        center: {lat: -7.634941, lng: 113.154761},
        mapTypeId: 'terrain'
      });
      var warna = [];
      <?php foreach ($warna as $val) {?>
        warna.push('<?php echo $val; ?>');
      <?php } ?>
      var i=0;
      data.forEach(function(kab) {
        if(kab.koordinat != null){
          var tepi = kab.koordinat.replace("POLYGON((","").replace("))","").split(",");
          let batas = [];
          // console.log(tepi);
          // console.log(warna);

          tepi.forEach(function(koordinat) {
              let latLng = koordinat.split(" ");
              // console.log(latLng);

              batas.push({
                  lat: parseFloat(latLng[0]),
                  lng: parseFloat(latLng[1])
              });
              
          });
          // console.log(batas);

          let vilagesPoly = new google.maps.Polygon({
            paths: batas,
            strokeColor: '#000000',
            strokeOpacity: 1,
            strokeWeight: 0.5,
            fillOpacity: 0.6,
            fillColor: warna[i]
          });
          i++

          google.maps.event.addListener(vilagesPoly,'click',function() {
              // console.log(desa.nama_desa);
              infoWindow.setContent('<b>' + kab.nama_kab + '</b>');
              infoWindow.setPosition(batas[0]);
              infoWindow.open(map);
              
          });

          vilagesPoly.setMap(map);
        }
      });

  infoWindow = new google.maps.InfoWindow;

  }

  getData();
</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDptF_CzjptPxkpETDJUFVMlQGB_y4ptmY&callback=initMap"
async defer></script>



<div class="col-md-12" style="padding-top: 10px; padding-bottom: 10px;">
  <h4>Legend</h4>
  <img class="img" src="http://127.0.0.1/PetaRisiko/frontend/web/assets/2d0fde4f/img/rendah.png" style="width: 40px;"> Rendah</br>
  <img class="img" src="http://127.0.0.1/PetaRisiko/frontend/web/assets/2d0fde4f/img/sedang.png" style="width: 40px;"> Sedang</br>
  <img class="img" src="http://127.0.0.1/PetaRisiko/frontend/web/assets/2d0fde4f/img/tinggi.png" style="width: 40px;"> Tinggi</br>
</div>