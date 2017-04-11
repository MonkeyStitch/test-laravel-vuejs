@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit your profile.</div>

                    <div class="panel-body">
                        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group">
                                <label for="avatar">Upload avatar</label>
                                <input type="file" id="avatar" name="avatar" accept="image/*" class="form-control">
                            </div>


                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" id="location" name="location" value="{{ $info->location }}" class="form-control" required>
                            </div>


                            <div class="form-group">
                                <label for="about">About me</label>
                                <textarea id="about" name="about" rows="10" cols="30" class="form-control" required>{{ $info->about }}</textarea>
                            </div>


                            <div class="form-group">
                                <p class="text-center">
                                    <button class="btn btn-primary btn-lg" type="submit">
                                        Save your information
                                    </button>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
