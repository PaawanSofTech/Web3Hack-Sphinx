Highcharts.chart('container', {

  title: {
    text: 'Uttar Pradesh Legislative Assembly Election (2017)'
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },

  series: [{
    type: 'pie',
    allowPointSelect: true,
    keys: ['name', 'y', 'selected', 'sliced'],
    data: [
      ['BJP',312, false],
      ['SP',47, false],
      ['BSP',19, false],
      ['ADS',9, false],
      ['INC',7, false],
      ['IND',3, false],
      ['OTHERS',6, false],
    ],
    showInLegend: true
  }]
});