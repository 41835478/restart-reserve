@extends('layouts.base')
@section('title', '锐思达预约系统后台管理')

@section('head')
    @parent
@endsection
@section('body')
    <div id="main-sidebar" class="ui inverted vertical thin sidebar menu">
        @role('administrator')
        <a class="item" href="{{ url('/admin/stores') }}">
            <i class="building icon"></i> <b>门店管理</b>
        </a>
        <a class="item" href="{{ url('/admin/classrooms') }}">
            <i class="home icon"></i> <b>教室管理</b>
        </a>
        {{--<a class="item" href="{{ url('/admin/seats') }}">--}}
            {{--<i class="sitemap icon"></i> <b>座位管理</b>--}}
        {{--</a>--}}
        <a class="item" href="{{ url('/admin/coaches') }}">
            <i class="spy icon"></i> <b>教练管理</b>
        </a>
        <a class="item" href="{{ url('/admin/courses') }}">
            <i class="student icon"></i> <b>发布课程</b>
        </a>
        <a class="item" href="{{ url('/admin/courses/list') }}">
            <i class="student icon"></i> <b>课程列表</b>
        </a>
        <a class="item" href="{{ url('/admin/reserves') }}">
            <i class="call icon"></i> <b>预约管理</b>
        </a>
        {{--<a class="item" href="{{ url('/admin/roles') }}">--}}
            {{--<i class="privacy icon"></i> <b>角色管理</b>--}}
        {{--</a>--}}
        {{--<a class="item" href="{{ url('/admin/permissions') }}">--}}
            {{--<i class="privacy icon"></i> <b>权限管理</b>--}}
        {{--</a>--}}

        <a class="item" href="{{ url('/admin/users') }}">
            <i class="user icon"></i> <b>会员管理</b>
        </a>
        @endrole

        @role('assistant')
        <a class="item" href="{{ url('/admin/users') }}">
            <i class="user icon"></i> <b>会员管理</b>
        </a>
        <a class="item" href="{{ url('/admin/reserves') }}">
            <i class="call icon"></i> <b>预约管理</b>
        </a>
        @endrole
        @role('reservemanager')

        @endrole
        {{--<a class="item" href="">--}}
            {{--<i class="database icon"></i> <b>数据管理</b>--}}
        {{--</a>--}}
    </div>
    <div class="ui top fixed inverted menu">
        <a id="sidebar-menu" class="item">
            <i class="sidebar icon"></i> 功能菜单
        </a>
        <div class="logo">
            <img src="{{ asset('assets/images/restart-logo.png') }}" alt="锐思达后台管理系统"/>
        </div>
        <div class="right menu">
            <a id="changePwdBtn" href="#" class="ui item">
                修改密码
            </a>
            <a id="logoutAdminSystemBtn" href="{{ url('/admin/logout') }}" class="ui item">
                登出
            </a>
        </div>
    </div>
    <div class="pusher">
        @yield('content')
    </div>
@endsection

@section('end')
    @parent
    <script>
        $script.ready('bundle', function(){
            $script(['{{ asset('assets/webpack/admin/global.js')  }}'])
        });
    </script>
@endsection