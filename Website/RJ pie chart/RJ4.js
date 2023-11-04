Highcharts.chart('container', {

    title: {
      text: 'Rajasthan Legislative Assembly Election (2013)'
    },
  
    xAxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
  
    series: [{
      type: 'pie',
      allowPointSelect: true,
      keys: ['name', 'y', 'selected', 'sliced'],
      data: [
      
        ['BJP',163, false],
        ['INC',21, false],
        ['NPEP',4, false],
        ['BSP',3, false],
        ['IND',7, false],
        ['OTHERS',2, false],
      ],
      showInLegend: true
    }]
  });