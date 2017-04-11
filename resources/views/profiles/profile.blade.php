@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $user->name }} 's Profile.
                </div>

                <div class="panel-body">
                    <center>
                        <img src="{{ Storage::url($user->avatar) }}" width="70px" height="70px" alt="">
                    </center>
                    <br>
                    <p class="text-center">
                        @if($user->profile)
                            {{ $user->profile->location }}
                        @endif
                    </p>
                    <br>
                    <p class="text-center">
                        @if(Auth::id() == $user->id)
                            <a href="{{ route('profile.edit') }}" class="btn btn-lg btn-info">Edit your profile</a>
                        @endif
                    </p>
                </div>
            </div>


            @if(Auth::id() !== $user->id)
                <div class="panel panel-default">
                    <div class="body">
                        <friend :profile_user_id="{{ $user->id }}"></friend>
                    </div>
                </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    About me .
                </div>

                <div class="panel-body">
                    <p class="text-center">
                        @if($user->profile)
                            {{ $user->profile->about }}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection