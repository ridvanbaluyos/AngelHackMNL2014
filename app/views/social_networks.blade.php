@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Authorized Applications</h1>
    </div>
</div>
@if(Session::has('message'))
<div class="alert alert-{{ Session::get('type') }} alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    {{ Session::get('message') }}
</div>

@endif
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                    Applications
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <a class="btn btn-block btn-social btn-facebook">
                            <i class="fa fa-facebook"></i> Add Facebook
                        </a>
                        <a class="btn btn-block btn-social btn-twitter">
                            <i class="fa fa-twitter"></i> Add Twitter
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
