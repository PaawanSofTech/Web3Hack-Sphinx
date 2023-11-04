Highcharts.chart('container', {

  title: {
    text: 'Karnataka Legislative Assembly Election (2013)'
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },

  series: [{
    type: 'pie',
    allowPointSelect: true,
    keys: ['name', 'y', 'selected', 'sliced'],
    data: [
      ['INC',122, false],
      ['JD(S)',40, false],
      ['BJP',40, false],
      ['KJP',6, false],
      ['IND',9, false],
      ['OTHERS',7, false],

    ],
    showInLegend: true
  }]
});