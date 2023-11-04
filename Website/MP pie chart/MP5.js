Highcharts.chart('container', {

  title: {
    text: 'Madhya Pradesh Legislative Assembly Election (2018)'
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },

  series: [{
    type: 'pie',
    allowPointSelect: true,
    keys: ['name', 'y', 'selected', 'sliced'],
    data: [
      ['INC',114, false],
      ['BJP',109, false],
      ['BSP',2, false],
      ['SP',1, false],
      ['IND',4, false],
    ],
    showInLegend: true
  }]
});