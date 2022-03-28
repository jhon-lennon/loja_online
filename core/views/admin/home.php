

<div class="container">
  <div class="row">
    <div class="col-6 offset-3">
      <div id="grafico"></div>
    </div>
  </div>
</div>



<script>
  let el = document.getElementById('grafico');
  let options = {
      chart: {
        type: 'line'
      },
      series: [{
        name: 'Vendas',
        data: [10,20,40],
      },
      {
        name: 'Valores',
        data: [5,15,30]
      }
    
    
    ],
      xaxis:{
        categories: ['dia 26', 'dia 27', 'dia 28']
      }

      
  };

  let chat = new ApexCharts(el, options);
  chat.render();
</script>




<pre>
<?php 

print_r($compras);

?>








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