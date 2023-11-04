Highcharts.chart('container', {

  title: {
    text: 'Maharashtra Legislative Assembly Election (2009)'
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },

  series: [{
    type: 'pie',
    allowPointSelect: true,
    keys: ['name', 'y', 'selected', 'sliced'],
    data: [
      ['INC',82, false],
      ['NCP',62, false],
      ['BJP',46, false],
      ['SHS',44, false],
      ['IND',24, false],
      ['OTHERS',30, false],
    ],
    showInLegend: true
  }]
});