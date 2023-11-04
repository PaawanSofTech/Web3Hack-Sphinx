Highcharts.chart('container', {

    title: {
      text: 'Maharashtra Legislative Assembly Election (1999)'
    },
  
    xAxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
  
    series: [{
      type: 'pie',
      allowPointSelect: true,
      keys: ['name', 'y', 'selected', 'sliced'],
      data: [
        ['INC',75, false],
        ['SHS',69, false],
        ['NCP',58, false],
        ['BJP',56, false],
        ['IND',12, false],
        ['OTHERS',18, false],
      ],
      showInLegend: true
    }]
  });