Highcharts.chart('container', {

    title: {
      text: 'Maharashtra Legislative Assembly Election (2014)'
    },
  
    xAxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
  
    series: [{
      type: 'pie',
      allowPointSelect: true,
      keys: ['name', 'y', 'selected', 'sliced'],
      data: [
        ['BJP',122, false],
        ['SHS',63, false],
        ['INC',42, false],
        ['NCP',41, false],
        ['IND',7, false],
        ['OTHERS',13, false],
      ],
      showInLegend: true
    }]
  });