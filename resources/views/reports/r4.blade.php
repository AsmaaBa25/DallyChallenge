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
        ['Project', 'Activity count']
    ];
    const JsDataFromPhp = <?php echo json_encode($data) ?>;
    for (let index = 0; index < JsDataFromPhp.length; index++) {
        const element = JsDataFromPhp[index];
        chartDataArray[index + 1] = [element.project_title, element.c];
    }
    const data = google.visualization.arrayToDataTable(chartDataArray);
    const options = {
        title: 'Activites x projects Chart',
        is3D: true
    };
    const chart = new google.visualization.PieChart(document.getElementById('r1'));
    chart.draw(data, options);
}
</script>
</script>


<p>Below you can find count of Activities within each projects</p>
<div class="row">
    <div class="col-sm-4">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>Projects</th>
                    <th>Activity Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                <tr>
                    <th scope="row">{{ $row->project_title }}</th>
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