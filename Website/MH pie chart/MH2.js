Highcharts.chart('container', {

  title: {
    text: 'Maharashtra Legislative Assembly Election (2004)'
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },

  series: [{
    type: 'pie',
    allowPointSelect: true,
    keys: ['name', 'y', 'selected', 'sliced'],
    data: [
      ['NCP',71, false],
      ['INC',69, false],
      ['SHS',62, false],
      ['BJP',54, false],
      ['IND',19, false],
      ['OTHERS',13, false],
    ],
    showInLegend: true
  }]
});