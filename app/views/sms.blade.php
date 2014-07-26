@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">SMS Recipients</h1>
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
                    Recipients
            </div>
            {{ Form::open(array('url' => '/sms', 'method' => 'post')) }}
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input class="form-control" type="text" name="contact_number" value="639989764990" />
                            <p class="help-block">Format: 0998xxxxxxx (eg. 09981234567)</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" name="contact_name" value="Myself" />
                            <p class="help-block">(eg. Mom, Dad)</p>
                        </div>
                    </div>

                </div>
                <button type="button" class="btn btn-success btn-xs"><i class="fa fa-plus fa-fw"></i> Add </button> <p class="text-warning"><strong>Note:</strong> You will be charged <strong><u>P1.00</u></strong> for each successful transaction.</p>
                <br/><br/>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop
