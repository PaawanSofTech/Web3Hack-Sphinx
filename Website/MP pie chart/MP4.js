Highcharts.chart('container', {

  title: {
    text: 'Madhya Pradesh Legislative Assembly Election (2013)'
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },

  series: [{
    type: 'pie',
    allowPointSelect: true,
    keys: ['name', 'y', 'selected', 'sliced'],
    data: [
      ['BJP',165, false],
      ['INC',58, false],
      ['BSP',4, false],
      ['IND',3, false],
    ],
    showInLegend: true
  }]
});