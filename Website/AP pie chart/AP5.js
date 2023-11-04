Highcharts.chart('container', {

  title: {
    text: 'Andhra Pradesh Legislative Assembly Election (2019)'
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },

  series: [{
    type: 'pie',
    allowPointSelect: true,
    keys: ['name', 'y', 'selected', 'sliced'],
    data: [
      ['YSRCP',151, false],
      ['TDP',23, false],
      ['JNP',1, false],
    ],
    showInLegend: true
  }]
});

