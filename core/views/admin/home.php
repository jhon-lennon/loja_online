

<div class="container">
  <div class="row">
    <div class="col-6 mt-5">
      <div id="grafico"></div>
    </div>
    <div class="col-6 mt-5">
      <div id="grafico_total"></div>
    </div>

  </div>
</div>




<script>
  let el = document.getElementById('grafico');
  let options = {
      chart: {
        type: 'bar'
      },
      series: [{
        name: 'Vendas',
        data: [<?="$dia[7],$dia[6],$dia[5],$dia[4],$dia[3],$dia[2],$dia[1]"?>]
      },
      {
        name: 'Aguardando pagamento',
        data: [<?="$agd_pag[6],$agd_pag[5],$agd_pag[4],$agd_pag[3],$agd_pag[2],$agd_pag[1],$agd_pag[0]"?>]
      }
      

    
    ],
      xaxis:{
        categories: ['<?=$data[7]?>', '<?=$data[6]?>', '<?=$data[5]?>', '<?=$data[4]?>', '<?=$data[3]?>', '<?=$data[2]?>','<?=$data[1]?>']
      },
      title:{
    text: 'Vendas dos ultimos 7 dias',
    align: 'center'
  }

      
  };

  let chat = new ApexCharts(el, options);
  chat.render();
</script>

<script>
  let ell = document.getElementById('grafico_total');
  let optionss = {
      chart: {
        type: 'bar'
      },
      series: [{
        name: 'Total em vendas',
        data: ['<?=$totalDia[7]?>','<?=$totalDia[6]?>','<?=$totalDia[5]?>','<?=$totalDia[4]?>','<?=$totalDia[3]?>','<?=$totalDia[2]?>','<?=$totalDia[1]?>'],
      },
      {
        name: 'Valor a receber',
        data: [<?="$valReceber[6],$valReceber[5],$valReceber[4],$valReceber[3],$valReceber[2],$valReceber[1],$valReceber[0]"?>]
      }

    
    ],
      xaxis:{
        categories: ['<?=$data[7]?>', '<?=$data[6]?>', '<?=$data[5]?>', '<?=$data[4]?>', '<?=$data[3]?>', '<?=$data[2]?>','<?=$data[1]?>']
      },
      title:{
    text: 'valores das vendas dos ultimos 7 dias',
    align: 'center'
  }

      
  };

  let chatt = new ApexCharts(ell, optionss);
  chatt.render();
</script>
