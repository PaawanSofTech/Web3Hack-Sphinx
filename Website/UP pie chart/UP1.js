Highcharts.chart('container', {

  title: {
    text: 'Uttar Pradesh Legislative Assembly Election (2002)'
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },

  series: [{
    type: 'pie',
    allowPointSelect: true,
    keys: ['name', 'y', 'selected', 'sliced'],
    data: [
      ['SP',143, false],
      ['BSP',98, false],
      ['BJP',88, false],
      ['INC',25, false],
      ['IND',16, false],
      ['OTHERS',3, false],
    ],
    showInLegend: true
  }]
});