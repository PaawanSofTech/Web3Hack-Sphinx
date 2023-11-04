Highcharts.chart('container', {

    title: {
      text: 'Rajasthan Legislative Assembly Election (2003)'
    },
  
    xAxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
  
    series: [{
      type: 'pie',
      allowPointSelect: true,
      keys: ['name', 'y', 'selected', 'sliced'],
      data: [
        ['BJP',120, false],
        ['INC',56, false],
        ['INLD',4, false],
        ['BSP',2, false],
        ['IND',13, false],
        ['OTHERS',5, false],
        // ['Peaches', 176.0, false],
        // ['Prunes', 135.6, true, true],
        // ['Avocados', 148.5, false]
      ],
      showInLegend: true
    }]
  });