@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1 class="m-0 text-dark">
                        <?php
                            // Setting getting time sone
                            date_default_timezone_set('Africa/Nairobi');
                            // 24-hour format of an hour without leading zeros (0 through 23)
                            $Hour = date('G');
                            if ( $Hour >= 5 && $Hour <= 11 ) {
                                echo "Good Morning <span style='color: #36b9cc; text-transform: capitalize;' ><strong>" . Auth::user()->name . "</strong></span>";
                            } else if ( $Hour >= 12 && $Hour <= 18 ) {
                                echo "Good Afternoon <span style='color: #36b9cc; text-transform: capitalize;' ><strong>" . Auth::user()->name  . "</strong></span>";
                            } else if ( $Hour >= 19 || $Hour <= 4 ) {
                                echo "Good Evening <span style='color: #36b9cc; text-transform: capitalize;' ><strong>" . Auth::user()->name  . "</strong></span>";
                            }
                        ?>
                        .
                        Welcome back!
                        </h1>

                    {{-- You are logged in!! --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection
