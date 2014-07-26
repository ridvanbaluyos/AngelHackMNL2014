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
                    Add Recipient
            </div>
            {{ Form::open(array('url' => '/sms', 'method' => 'post')) }}
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input class="form-control" type="text" name="contact_number" />
                            <p class="help-block">Format: 0998xxxxxxx (eg. 09981234567)</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" name="contact_name" />
                            <p class="help-block">(eg. Mom, Dad)</p>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            {{ Form::close() }}
        </div>
        <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Recipients
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Mobile Number</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($templateData['recipients'] as $ctr=>$recipient)
                                         <tr>
                                            <td>{{ $ctr+1 }}</td>
                                            <td>{{ $recipient->mobile_number }}</td>
                                            <td>{{ $recipient->name }}</td>
                                            <td>
                                                <a href="#">delete</a>
                                            </td>
                                        </tr>
                                         @endforeach
                                    </tbody>
                                </table>
                                <p class="text-warning"><strong>Note:</strong> You will be charged <strong><u>P1.00</u></strong> for each successful transaction per recipient.</p>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
    </div>
</div>
@stop
