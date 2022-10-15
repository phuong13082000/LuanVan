@extends('welcome')

@section('index')
    @include('pages.nav')
    @php
        $id = Session::get('id');
        $name = Session::get('name');
        $email = Session::get('email');
        $address = Session::get('address');
        $phone = Session::get('phone');
    @endphp
    <div class="container mt-4">

        <form id="profile_setup_frm" action="{{ route('update.profile') }}" method="POST">
            @CSRF
            <div class="row">
                <div class="col-md-4 border-right">

                </div>
                <div class="col-md-8 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row" id="res"></div>
                        <div class="row mt-2">

                            <div class="col-md-6">
                                <label class="labels">Name</label>
                                <input type="hidden" name="id" class="form-control" value="{{ $id }}">
                                <input type="text" name="name" class="form-control" value="{{ $name }}">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Email</label><br>{{$email}}
                                <input type="hidden" name="email" class="form-control" value="{{ $email }}">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ $phone }}">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Address</label>
                                <input type="text" name="address" class="form-control" value="{{ $address }}">
                            </div>
                        </div>

                        <div class="mt-5 text-center"><button id="btn" class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                    </div>
                </div>

            </div>

        </form>
    </div>
@endsection
