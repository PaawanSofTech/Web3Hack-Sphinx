Highcharts.chart('container', {

  title: {
    text: 'Uttar Pradesh Legislative Assembly Election (2012)'
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },

  series: [{
    type: 'pie',
    allowPointSelect: true,
    keys: ['name', 'y', 'selected', 'sliced'],
    data: [
      ['SP',224, false],
      ['BSP',80, false],
      ['BJP',47, false],
      ['INC',28, false],
      ['RLD',9, false],
      ['IND',6, false],
      ['OTHERS',9, false],
    ],
    showInLegend: true
  }]
});