Highcharts.chart('container', {

  title: {
    text: 'Karnataka Legislative Assembly Election (2004)'
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },

  series: [{
    type: 'pie',
    allowPointSelect: true,
    keys: ['name', 'y', 'selected', 'sliced'],
    data: [
      ['BJP',79, false],
      ['INC',65, false],
      ['JD(S)',58, false],
      ['JD(U)',5, false],

    ],
    showInLegend: true
  }]
});