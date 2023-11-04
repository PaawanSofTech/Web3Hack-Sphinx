Highcharts.chart('container', {

    title: {
      text: 'Andhra Pradesh Legislative Assembly Election (2009)'
    },
  
    xAxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
  
    series: [{
      type: 'pie',
      allowPointSelect: true,
      keys: ['name', 'y', 'selected', 'sliced'],
      data: [
        ['INC',156, false],
        ['TDP',92, false],
        ['PRAP',18, false],
        ['TRS',10, false],
        ['AIMIM',7, false],
        ['IND',3, false],
        ['OTHERS',8, false],
      ],
      showInLegend: true
    }]
  });