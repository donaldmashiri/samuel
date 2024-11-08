@extends('layouts.header')

@extends('layouts.topbar')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-10 col-lg-10">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header bg-gradient-secondary py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-white">Mineral Detection - Video Detection</h6>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        @if($vehicles->count() > 0)
                        @include('partials.errors')
                        <h1>Video Detection</h1>
                        <ul class="list-group">
                            <li class="list-group-item">

                                    <table class="table table-bordered table-sm">
                                        <thead class="bg-gradient-light">
                                        <tr>
                                            <th scope="col">Land #</th>
                                            <th scope="col">longitude</th>
                                            <th scope="col">latitude</th>
                                            <th scope="col">Date</th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($vehicles as $vehicle)
                                            <tr>
                                                <th>{{ $vehicle->plate_number }}</th>
                                                <td>{{ $vehicle->make}}</td>
                                                <td>{{ $vehicle->model}}</td>

                                                <td>{{ $vehicle->created_at}}</td>
                                                <td>
                                                    <a href="{{ $vehicle->plate_number }}" class="btn btn-info btn-sm" onclick="setPlateNumber(event)">select</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                            </li>
                        </ul>


                        <div class="container">

                            <form action="{{route('videodetects.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label>Selected Land </label>
                                <input type="text" id="plateNumberInput" name="plate_number" value="" required>

                                <div class="form-group">
                                    <label for="">Upload Video</label> <br>
                                    <input type="file" class="form-control" name="upload_video">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Upload</button>

                                <script>
                                    function setPlateNumber(event) {
                                        event.preventDefault();

                                        var plateNumber = event.target.getAttribute('href');
                                        document.getElementById('plateNumberInput').value = plateNumber;
                                        checkPlateNumber();
                                    }

                                    function checkPlateNumber() {
                                        var plateNumberInput = document.getElementById('plateNumberInput');
                                        var startDetectionButton = document.getElementById('startDetectionButton');

                                        if (plateNumberInput.value.trim() === '') {
                                            startDetectionButton.disabled = true;
                                        } else {
                                            startDetectionButton.disabled = false;
                                        }
                                    }
                                </script>

                            </form>

                            <div class="row">
                                <div class="col-md-6">
                                    @if (session('success'))
                                        <div class="alert alert-success" role="alert">
                                            <div class="card">
                                                <div class="card-header bg-gradient-danger text-white">Detection Results</div>
                                                <div class="card-body">
                                                    <table class="table table-striped table-bordered">

                                                        @if(session()->has('videodetect'))
                                                            @php
                                                                $videodetect = session('videodetect');
                                                            @endphp

                                                            <h2>Video Detection Details</h2>
                                                            <p>User ID: {{ $videodetect->user_id }}</p>
                                                            <p>Plate Number: {{ $videodetect->plate_number }}</p>
                                                            <p>Detection Type: {{ $videodetect->detection_type }}</p>
                                                            <!-- Output other properties as needed -->

                                                            <tr>
                                                                <th scope="col">Status</th>
                                                                <td class="text-info fw-bolder"> {{ $videodetect->status }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col">Signal Type</th>
                                                                <td class="bg-success text-white"> {{ $videodetect->signal_type }} </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col">Lane Position</th>
                                                                <td class="text-success fw-bolder">{{ $videodetect->lane_position  }} </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col">Wheel Crossed Over</th>
                                                                <td>{{ $videodetect->wheel_crossed  }}</td>
                                                            </tr>

                                                        @endif

                                                        <thead>

                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <th scope="row">Road Marking Color</th>
                                                            <td id="road-marking-color"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Lane Crossing Alert</th>
                                                            <td id="lane-crossing-alert"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Driver's Tendencies</th>
                                                            <td id="driver-tendencies"></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>


                                                    <script>
                                                        // Function to generate a random road marking color
                                                        function generateRoadMarkingColor() {
                                                            var colors = ["Yellow", "White", "Red", "Blue"];
                                                            var randomIndex = Math.floor(Math.random() * colors.length);
                                                            return colors[randomIndex];
                                                        }

                                                        // Function to check if a wheel has crossed over into another lane
                                                        function hasCrossedOver() {
                                                            // Dummy logic, always returns true
                                                            return true;
                                                        }

                                                        // Function to generate random driver's tendencies
                                                        function generateDriverTendencies() {
                                                            var tendencies = ["Frequent Lane Crossings", "Occasional Lane Crossings", "Rare Lane Crossings"];
                                                            var randomIndex = Math.floor(Math.random() * tendencies.length);
                                                            return tendencies[randomIndex];
                                                        }

                                                        // Generate dummy data and populate the table
                                                        document.getElementById("road-marking-color").innerText = generateRoadMarkingColor();
                                                        document.getElementById("lane-crossing-alert").innerText = hasCrossedOver() ? "Yes" : "No";
                                                        document.getElementById("driver-tendencies").innerText = generateDriverTendencies();
                                                    </script>

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @else
                            <h4 class="alert alert-danger">You do not have Vehicles Registered</h4>
                        @endif

                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection
