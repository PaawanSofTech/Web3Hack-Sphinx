Highcharts.chart('container', {

    title: {
      text: 'Gujarat Legislative Assembly Election (2002)'
    },
  
    xAxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
  
    series: [{
      type: 'pie',
      allowPointSelect: true,
      keys: ['name', 'y', 'selected', 'sliced'],
      data: [
        ['BJP',127, false],
        ['INC',51, false],
        ['JD(U)',2, false],
        ['IND',2, false],
      ],
      showInLegend: true
    }]
  });