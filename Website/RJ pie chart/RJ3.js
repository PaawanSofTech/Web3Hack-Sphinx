Highcharts.chart('container', {

    title: {
      text: 'Rajasthan Legislative Assembly Election (2008)'
    },
  
    xAxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
  
    series: [{
      type: 'pie',
      allowPointSelect: true,
      keys: ['name', 'y', 'selected', 'sliced'],
      data: [
        ['INC',96, false],
        ['BJP',78, false],
        ['BSP',8, false],
        ['CPM',3, false],
        ['IND',14, false],
        ['OTHERS',3, false],
      ],
      showInLegend: true
    }]
  });