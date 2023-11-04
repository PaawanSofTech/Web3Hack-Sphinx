Highcharts.chart('container', {

  title: {
    text: 'Madhya Pradesh Legislative Assembly Election (2008)'
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },

  series: [{
    type: 'pie',
    allowPointSelect: true,
    keys: ['name', 'y', 'selected', 'sliced'],
    data: [
      ['BJP',143, false],
      ['INC',71, false],
      ['BSP',7, false],
      ['BJSH',5, false],
      ['IND',3, false],
      ['OTHERS',1, false],
    ],
    showInLegend: true
  }]
});