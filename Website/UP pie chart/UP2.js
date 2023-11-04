Highcharts.chart('container', {

  title: {
    text: 'Uttar Pradesh Legislative Assembly Election (2007)'
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },

  series: [{
    type: 'pie',
    allowPointSelect: true,
    keys: ['name', 'y', 'selected', 'sliced'],
    data: [
      ['SP',206, false],
      ['BSP',97, false],
      ['BJP',51, false],
      ['INC',22, false],
      ['RLD',10, false],
      ['IND',9, false],
      ['OTHERS',8, false],
    ],
    showInLegend: true
  }]
});