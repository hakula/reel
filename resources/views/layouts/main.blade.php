@extends('layouts.app')

@section('content')

@yield('header')

<div class="container">
    <div class="row">
        <main class="col-md-12">
            @yield('main')
        </main>
    </div>
</div>

@yield('footer')

@endsection

