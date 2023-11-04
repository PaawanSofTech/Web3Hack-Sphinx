Highcharts.chart('container', {

  title: {
    text: 'Andhra Pradesh Legislative Assembly Election (1999)'
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },

  series: [{
    type: 'pie',
    allowPointSelect: true,
    keys: ['name', 'y', 'selected', 'sliced'],
    data: [
      ['INC',185, false],
      ['TDP',47, false],
      ['TRS',26, false],
      ['CPM',9, false],
      ['IND',11, false],,
      ['OTHERS',16, false],
    ],
    showInLegend: true
  }]
});