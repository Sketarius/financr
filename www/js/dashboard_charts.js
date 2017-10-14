google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Month', 'Income', 'Expenses'],
    ['Jan',  1000,      400],
    ['Feb',  1170,      460],
    ['Mar',  660,       1120],
    ['Apr',  1030,      540],
    ['May',  660,       1120],
    ['Jun',  660,       1120],
    ['Jul',  660,       1120],
    ['Aug',  660,       1120],
    ['Sep',  660,       1120],
    ['Oct',  660,       1120],
    ['Nov',  660,       1120],
    ['Dec',  660,       1120]
  ]);

  var options = {
    title: 'Personal Financial Performance',
    hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
    vAxis: {minValue: 0},
    animation: {duration: 400, startup: true}
  };

  var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
  chart.draw(data, options);
}