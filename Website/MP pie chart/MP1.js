Highcharts.chart('container', {

  title: {
    text: 'Madhya Pradesh Legislative Assembly Election (1998)'
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },

  series: [{
    type: 'pie',
    allowPointSelect: true,
    keys: ['name', 'y', 'selected', 'sliced'],
    data: [
      ['INC',172, false],
      ['BJP',119, false],
      ['BSP',11, false],
      ['SP',4, false],
      ['IND',9, false],
      ['OTHERS',5, false],
    ],
    showInLegend: true
  }]
});