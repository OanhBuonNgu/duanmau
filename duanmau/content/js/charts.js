  
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     30],
          ['Eat',      30],
          ['Commute',  10],
          ['Watch TV', 20],
          ['Sleep',    10]
        ]);

        var options = {
          title: 'Tổng '
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }