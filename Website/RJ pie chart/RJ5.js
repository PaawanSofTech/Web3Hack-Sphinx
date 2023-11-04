Highcharts.chart('container', {

  title: {
    text: 'Rajasthan Legislative Assembly Election (2018)'
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },

  series: [{
    type: 'pie',
    allowPointSelect: true,
    keys: ['name', 'y', 'selected', 'sliced'],
    data: [
      ['INC',99, false],
      ['BJP',73, false],
      ['BSP',6, false],
      ['RLP',3, false],
      ['IND',13, false],
      ['OTHERS',5, false],
      // ['Peaches', 176.0, false],
      // ['Prunes', 135.6, true, true],
      // ['Avocados', 148.5, false]
    ],
    showInLegend: true
  }]
});

