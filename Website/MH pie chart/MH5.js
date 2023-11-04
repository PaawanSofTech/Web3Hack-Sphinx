Highcharts.chart('container', {

  title: {
    text: 'Maharashtra Legislative Assembly Election (2019)'
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },

  series: [{
    type: 'pie',
    allowPointSelect: true,
    keys: ['name', 'y', 'selected', 'sliced'],
    data: [
      ['BJP',105, false],
      ['SHS',56, false],
      ['NCP',54, false],
      ['INC',44, false],
      ['IND',13, false],
      ['OTHERS',16, false],
    ],
    showInLegend: true
  }]
});