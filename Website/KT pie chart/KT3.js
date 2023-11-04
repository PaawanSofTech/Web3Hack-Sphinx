Highcharts.chart('container', {

  title: {
    text: 'Karnataka Legislative Assembly Election (2008)'
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },

  series: [{
    type: 'pie',
    allowPointSelect: true,
    keys: ['name', 'y', 'selected', 'sliced'],
    data: [
      ['BJP',110, false],
      ['INC',80, false],
      ['JD(S)',28, false],
      ['IND',6, false],

    ],
    showInLegend: true
  }]
});