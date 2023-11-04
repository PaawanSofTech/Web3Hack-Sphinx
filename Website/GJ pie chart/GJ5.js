Highcharts.chart('container', {

  title: {
    text: 'Gujarat Legislative Assembly Election (2022)'
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },

  series: [{
    type: 'pie',
    allowPointSelect: true,
    keys: ['name', 'y', 'selected', 'sliced'],
    data: [
      ['BJP',156, false],
      ['INC',17, false],
      ['AAP',5, false],
      ['SP',1, false],
      ['IND',3, false],
  
    ],
    showInLegend: true
  }]
});