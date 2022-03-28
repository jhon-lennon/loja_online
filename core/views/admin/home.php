

<div class="container">
  <div class="row">
    <div class="col-6 offset-3">
      <div id="grafico"></div>
    </div>
  </div>
</div>







<pre>
<?php 

//print_r($compras);

$dia1 = 0;
$dia2 = 0;
$dia3 = 0;
$dia4 = 0;
$dia5 = 0;
$dia6 = 0;
$dia7 = 0;

$data1 = date('d/m'); 
$data2 =  date('d/m', strtotime('now - 1 day')); 
$data3 =  date('d/m', strtotime('now - 2 day')); 
$data4 =  date('d/m', strtotime('now - 3 day')); 
$data5 =  date('d/m', strtotime('now - 4 day')); 
$data6 =  date('d/m', strtotime('now - 5 day')); 
$data7 =  date('d/m', strtotime('now - 6 day')); 


foreach($compras as $compra){

if(date('d',strtotime($compra->data_compra)) == date('d')){
  $dia1++;
}
if(date('d',strtotime($compra->data_compra)) == date('d') - 1){
  $dia2++;
}
if(date('d',strtotime($compra->data_compra)) == date('d') - 2){
  $dia3++;

}
if(date('d',strtotime($compra->data_compra)) == date('d') - 3){
  $dia4++;

}
if(date('d',strtotime($compra->data_compra)) == date('d') - 4){
  $dia5++;

}
if(date('d',strtotime($compra->data_compra)) == date('d') - 5){
  $dia6++;

}
if(date('d',strtotime($compra->data_compra)) == date('d') - 6){
  $dia7++;
  
}









}





echo $data1;
echo "<br>$data2 <br>";
echo "<br". date('d/m')." <br>";









?>
<script>
  let el = document.getElementById('grafico');
  let options = {
      chart: {
        type: 'bar'
      },
      series: [{
        name: 'Vendas',
        data: [<?="$dia7,$dia6,$dia5,$dia4,$dia3,$dia2,$dia1"?>],
      }
     
    
    
    ],
      xaxis:{
        categories: ['<?=$data7?>', '<?=$data6?>', '<?=$data5?>', '<?=$data4?>', '<?=$data3?>', '<?=$data2?>','<?=$data1?>']
      }

      
  };

  let chat = new ApexCharts(el, options);
  chat.render();
</script>









<br>
<br>

<br>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<p>fffff</p>






<div class="container">
    <div class="row">
        <div class="col-6">
                grafico 1
        </div>

        <div class="col-6">
                grafico 2
        </div>
    </div>
</div>