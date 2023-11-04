Highcharts.chart('container', {

  title: {
    text: 'Madhya Pradesh Legislative Assembly Election (2003)'
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },

  series: [{
    type: 'pie',
    allowPointSelect: true,
    keys: ['name', 'y', 'selected', 'sliced'],
    data: [
      ['BJP',173, false],
      ['INC',38, false],
      ['SP',7, false],
      ['GGP',3, false],
      ['BSP',2, false],
      ['IND',2, false],
      ['OTHERS',5, false],
    ],
    showInLegend: true
  }]
});