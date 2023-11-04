Highcharts.chart('container', {

  title: {
    text: 'Gujarat Legislative Assembly Election (2017)'
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },

  series: [{
    type: 'pie',
    allowPointSelect: true,
    keys: ['name', 'y', 'selected', 'sliced'],
    data: [
      ['BJP',99, false],
      ['INC',77, false],
      ['BTP',2, false],
      ['NCP',1, false],
      ['IND',3, false],
  
    ],
    showInLegend: true
  }]
});