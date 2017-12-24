@extends('layouts.main')

@section('content')
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">欢迎注册</h3>
                    </div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('user.create') }}">
                         {{ csrf_field() }}
                        <fieldset>
                            <div class="form-group">
                                <input type="text" class='form-control' placeholder='用户名'>
                            </div>
                            <div class="form-group">
                                <input type="text" class='form-control' placeholder='邮箱'>
                            </div>
                            <div class="form-group">
                                <input type="password" class='form-control' placeholder='密码'>
                            </div>
                            <div class="form-group">
                                <input type="submit" class='btn btn-large btn-success btn-block'>
                            </div>
                        </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection