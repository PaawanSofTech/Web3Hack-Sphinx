Highcharts.chart('container', {

  title: {
    text: 'Gujarat Legislative Assembly Election (2012)'
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },

  series: [{
    type: 'pie',
    allowPointSelect: true,
    keys: ['name', 'y', 'selected', 'sliced'],
    data: [
      ['BJP',115, false],
      ['INC',61, false],
      ['GPP',2, false],
      ['NCP',2, false],
      ['IND',1, false],
      ['OTHERS',1, false],
    ],
    showInLegend: true
  }]
});