@extends('layout')
@section('title', ' Reports')


@section('content')

<div class="row">
    <div class="p-4 col-sm-3">
        <div class="m-4 card" style="width: 18rem;">
            <img src="/images/slid4.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Activities Count</h5>
                <p class="card-text">{{$activitiesCount}}</p>
                <a href="/activities" class="btn btn-primary">All Activities</a>
            </div>
        </div>
    </div>
    <div class="p-4 col-sm-3">
        <div class="m-4 card" style="width: 18rem;">
            <img src="/images/slid3.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Projects Count</h5>
                <p class="card-text">{{$projectsCount}}</p>
                <a href="/projects" class="btn btn-primary">All Projects</a>
            </div>
        </div>
    </div>
    <div class="p-4 col-sm-3">
        <div class="m-4 card" style="width: 18rem;">
            <img src="/images/slid2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Categories Count</h5>
                <p class="card-text">{{$categoriesCount}}</p>
                <a href="/categories" class="btn btn-primary">All Categories</a>
            </div>
        </div>
    </div>
    <div class="p-4 col-sm-3">
        <div class="m-4 card" style="width: 18rem;">
            <img src="/images/slid1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Activities Duration</h5>
                <p class="card-text">{{$activitiesDuration}} m.</p>
                <a href="/activities" class="btn btn-primary">All Activities</a>
            </div>
        </div>
    </div>


    <div class="col-sm-8">
        <div id="r1" style="max-width:700px; height:400px"></div>
    </div>
</div>
@endsection