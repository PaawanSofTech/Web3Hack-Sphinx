Highcharts.chart('container', {

    title: {
      text: 'Andhra Pradesh Legislative Assembly Election (2014)'
    },
  
    xAxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
  
    series: [{
      type: 'pie',
      allowPointSelect: true,
      keys: ['name', 'y', 'selected', 'sliced'],
      data: [
        ['TDP',102, false],
        ['YSRCP',67, false],
        ['BJP',4, false],
        ['NPT',1, false],
        ['IND',1, false],
      ],
      showInLegend: true
    }]
  });