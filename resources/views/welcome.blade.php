@extends('layouts.app')

@section('content')
    <div class="row pb-5">
        <div class="col-sm-6 mt-5">
            <img src="images/topimage.jpg" alt="トップページイメージ" class="w-100">
        </div>
        
        <div class="col-sm-6 mt-5 pt-5">
            <div class="title">
                <h1>Image-post</h1>
                <h2>Let's enjoy</h2>
            </div>
            
            <div class="mt-3">
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>

@endsection