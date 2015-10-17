@extends('layouts.mobile')
@section('title', '锐思达预约')

@section('head')
@parent

@endsection
@section('body')
    <header class="head">
        <a class="back" href="javascript:history.back();"></a>
        <div class="logo">
            <img src="{{ asset('/assets/images/restart-logo.png') }}" title="锐思达健身">
        </div>
        <a class="home" href="/"></a>
    </header>
    <nav class="nav">
        <div class="title">我的预约</div>
    </nav>
@endsection

@section('end')
@parent
@endsection