Highcharts.chart('container', {

    title: {
      text: 'Rajasthan Legislative Assembly Election (1998)'
    },
  
    xAxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
  
    series: [{
      type: 'pie',
      allowPointSelect: true,
      keys: ['name', 'y', 'selected', 'sliced'],
      data: [
        ['INC',153, false],
        ['BJP',33, false],
        ['JD',3, false],
        ['BSP',2, false],
        ['IND',7, false],
        ['OTHERS',2, false],
      ],
      showInLegend: true
    }]
  });