@extends('templates/mainTemplate')

@section('title')
    Admin
@endsection

@section('body')
@extends('templates/navBarAdmin')
<h5>Menú Principal</h5>
    <hr>
    <div class="container">
        <div class="row">
            @foreach ($modules as $module)
            <div class="col-md-4 p-3">
                <div class="ui link card">
                    <a class="image" href="{{ route($module['url']) }}">
                        <img src="{{ asset('img/'.$module['img'].'.jpg') }}" alt="" srcset="">
                    </a>
                    <div class="content">
                        <a class="header" href="#">{{ $module['name'] }}</a>
                        <div class="meta">
                            <a>{{ $module['description'] }}</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


@endsection