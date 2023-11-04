Highcharts.chart('container', {

  title: {
    text: 'Uttar Pradesh Legislative Assembly Election (2022)'
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },

  series: [{
    type: 'pie',
    allowPointSelect: true,
    keys: ['name', 'y', 'selected', 'sliced'],
    data: [
      ['BJP',255, false],
      ['SP',111, false],
      ['ADS',12, false],
      ['RLD',8, false],
      ['NINSHAD',6, false],
      ['OTHERS',11, false],
    ],
    showInLegend: true
  }]
});