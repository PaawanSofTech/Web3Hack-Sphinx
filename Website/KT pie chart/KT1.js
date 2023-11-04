Highcharts.chart('container', {

    title: {
      text: 'Karnataka Legislative Assembly Election (1999)'
    },
  
    xAxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
  
    series: [{
      type: 'pie',
      allowPointSelect: true,
      keys: ['name', 'y', 'selected', 'sliced'],
      data: [
        ['INC',132, false],
        ['BJP',44, false],
        ['JD(U)',18, false],
        ['JD(s)',10, false],
        ['IND',19, false],
        ['OTHERS',1, false],
      ],
      showInLegend: true
    }]
  });