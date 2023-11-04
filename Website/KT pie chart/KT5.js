Highcharts.chart('container', {

  title: {
    text: 'Karnataka Legislative Assembly Election (2018)'
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },

  series: [{
    type: 'pie',
    allowPointSelect: true,
    keys: ['name', 'y', 'selected', 'sliced'],
    data: [
      ['BJP',104, false],
      ['INC',80, false],
      ['JD(S)',37, false],
      ['KPJP',1, false],
      ['IND',1, false],
      ['OTHERS',1, false],

    ],
    showInLegend: true
  }]
});