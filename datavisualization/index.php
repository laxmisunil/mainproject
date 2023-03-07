<html>
<head>
<title>Google Chart </title>
<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript"
	src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
	$(document).ready(function() {

		$.ajax({
			url : "data.php",
			dataType : "JSON",
			success : function(result) {
				google.charts.load('current', {
					'packages' : [ 'corechart' ]
				});
				google.charts.setOnLoadCallback(function() {
					drawChart(result);
				});
			}
		});

		function drawChart(result) {

			var data = new google.visualization.DataTable();
			data.addColumn('string', 'Name');
			data.addColumn('number', 'Quantity');
			var dataArray = [];
			$.each(result, function(i, obj) {
				dataArray.push([ obj.Country, parseInt(obj.Number) ]);
			});

			data.addRows(dataArray);

			var piechart_options = {
				title : 'Pie Chart: Country wise Participant',
				
				legend: { position: 'bottom' }
			};
			var piechart = new google.visualization.PieChart(document
					.getElementById('piechart_div'));
			piechart.draw(data, piechart_options);

			var barchart_options = {
				title : 'Barchart: Country wise Participant',
				
				legend : 'none'
			};
			var barchart = new google.visualization.BarChart(document
					.getElementById('barchart_div'));
			barchart.draw(data, barchart_options);
			
		

              
			  var column_options = {
				title : 'Column Chart: Country wise Participant',
				
				legend: { position: 'bottom' }
			};
			var columnchart = new google.visualization.ColumnChart(document
					.getElementById('column chart_div'));
			columnchart.draw(data, column_options);
			
			 
			  var area_options = {
				title : 'Donut Chart: Country wise Participant',
								 
				legend: 'none'
			};
			var areachart = new google.visualization.AreaChart(document.getElementById('chart_div'))
			areachart.draw(data, area_options);
		} 

	});
</script>

</head>
<body>
<table class="columns">
	<tr>
		<td>
		<div id="piechart_div" style="border: 1px solid #ccc"></div>
		</td>
		<td>
		<div id="barchart_div" style="border: 1px solid #ccc"></div>
		</td>
		</tr>
		 <tr>
        <td>
		<div id="column chart_div" style="border: 1px solid #ccc"></div>
		</td>
		<td>
		<div id="chart_div" style="border: 1px solid #ccc"></div>
		</td>
		
		
</tr>
</table>
</body>
</html>