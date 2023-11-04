Highcharts.chart('container', {

    title: {
      text: 'Andhra Pradesh Legislative Assembly Election (1999)'
    },
  
    xAxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
  
    series: [{
      type: 'pie',
      allowPointSelect: true,
      keys: ['name', 'y', 'selected', 'sliced'],
      data: [
        ['TDP',180, false],
        ['INC',91, false],
        ['BJP',12, false],
        ['AIMIM',4, false],
        ['IND',5, false],
        ['OTHERS',2, false],
      ],
      showInLegend: true
    }]
  });