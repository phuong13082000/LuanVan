@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-3">

                @include('admin.include.navbar')
            </div>

            <div class="col-9">

                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">{{ __('Dashboard') }}</div>

                            <div class="card-body">
                                @include('admin.include.alert')

                                {{ __('You are logged in!') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
