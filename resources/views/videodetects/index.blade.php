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

{{--                        @include('partials.errors')--}}
                        <h1>Video Detection</h1>




                        <div class="container">


                            <form action="{{ route('videodetects.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="">Upload Video</label> <br>
                                    <input type="file" class="form-control" name="upload_video">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                            </form>

                            <div class="row">
                                <div class="col-md-9">
                                    @if (session('success'))
                                        <div class="alert alert-success" role="alert">
                                            <div class="card">
                                                <div class="card-header bg-gradient-danger text-white">Detection Results</div>
                                                <div class="card-body">


                                                    @if(session()->has('videodetect'))
                                                    @php
                                                        $videodetect = session('videodetect');
                                                        $mineralColor = [
                                                            'Quartz' => 'lightgray',
                                                            'Feldspar' => 'pink',
                                                            'Mica' => 'silver',
                                                            'Amethyst' => 'purple',
                                                            'Calcite' => 'yellow',
                                                            'Fluorite' => 'green',
                                                            'Gypsum' => 'white',
                                                            'Halite' => 'blue',
                                                        ];
                                                        $mineral = $videodetect->mineral;
                                                        $color = $mineralColor[$mineral] ?? 'black';
                                                    @endphp

                                                    <div style="padding: 10px; background-color: {{ $color }}; color: white;">
                                                        <h3>Detected Mineral: {{ $mineral }}</h3>
                                                        <p>Detection Type: {{ $videodetect->detection_type }}</p>
                                                        <p>Status: {{ $videodetect->status }}</p>
                                                        <p>Signal Type: {{ $videodetect->signal_type }}</p>

                                                    </div>
                                                @endif

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection
