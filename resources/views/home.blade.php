@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6 mt-5">

                <div class="small-box"
                    style="color: #000;background-color:#fff!important;box-shadow: 0 0 10px rgba(0, 0, 0, 0.125), 0 3px 3px rgba(0, 0, 0, 0.2);">
                    <div class="inner">
                        <h3>{{ $category }}</h3>
                        <p>Total Categories</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6 mt-5">

                <div class="small-box"
                    style="color: #000;background-color:#fff;box-shadow: 0 0 10px rgba(0, 0, 0, 0.125), 0 3px 3px rgba(0, 0, 0, 0.2);">
                    <div class="inner">
                        <h3>{{ $theme }}</h3>
                        <p>Total Themes</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6 mt-5">

                <div class="small-box"
                    style="color: #000;background-color:#fff;box-shadow: 0 0 10px rgba(0, 0, 0, 0.125), 0 3px 3px rgba(0, 0, 0, 0.2);">
                    <div class="inner">
                        <h3>{{ $users }}</h3>
                        <p>User Registrations</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6 mt-5">

                <div class="small-box"
                    style="color: #000;background-color:#fff;box-shadow: 0 0 10px rgba(0, 0, 0, 0.125), 0 3px 3px rgba(0, 0, 0, 0.2);">
                    <div class="inner">
                        <h3>{{ $quote }}</h3>
                        <p>Total Quotes</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
