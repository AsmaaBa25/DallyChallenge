@extends('layout')
@section('title', ' Reports')


@section('content')

<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
google.charts.load('current', {
    packages: ['corechart']
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var chartDataArray = [
        ['Priority', 'Projects count']
    ];
    const JsDataFromPhp = <?php echo json_encode($data) ?>;
    for (let index = 0; index < JsDataFromPhp.length; index++) {
        const element = JsDataFromPhp[index];
        chartDataArray[index + 1] = [element.priority == 1 ? 'Highest' : element.priority == 2 ? 'High' : element
            .priority == 3 ? 'Medium' : element.priority == 4 ? 'Low' : 'Lowest', element.c
        ];
    }
    const data = google.visualization.arrayToDataTable(chartDataArray);
    const options = {
        title: 'Projects x Priority Chart'
    };
    const chart = new google.visualization.PieChart(document.getElementById('r1'));
    chart.draw(data, options);
}
</script>
</script>


<p>Below you can find count of projects within each category</p>
<div class="row">
    <div class="col-sm-4">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>Priority</th>
                    <th>Projects Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                <tr>
                    <th scope="row">
                        {{ $row->priority == 1 ? 'Highest' : ($row->priority == 2 ? 'High': ($row->priority == 3 ? 'Medium' : ($row->priority == 4 ? 'Low' : 'Lowest'))) }}
                    </th>
                    <th scope="row">{{ $row->c }}</th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-sm-8">
        <div id="r1" style="max-width:700px; height:400px"></div>
    </div>
</div>
@endsection