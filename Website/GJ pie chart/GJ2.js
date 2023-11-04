Highcharts.chart('container', {

  title: {
    text: 'Gujarat Legislative Assembly Election (2007)'
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },

  series: [{
    type: 'pie',
    allowPointSelect: true,
    keys: ['name', 'y', 'selected', 'sliced'],
    data: [
      ['BJP',117, false],
      ['INC',59, false],
      ['NCP',3, false],
      ['JD(U)',1, false],
      ['IND',2, false],
    ],
    showInLegend: true
  }]
});