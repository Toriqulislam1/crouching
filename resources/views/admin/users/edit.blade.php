@extends('admin.layout.layout')
@push('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('public/assets')}}/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('public/assets')}}/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- /.card -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">{{$page_title}}</h3>
                    <div class="pull-right box-tools">
                        <div class="float-right mt-1">
                            <a class="btn btn-primary uppercase text-bold" href="{{ route('users.index') }}"> Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control"  name="name" value="{{$user->name}}" required  placeholder="User Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" class="form-control"  name="phone" value="{{$user->phone}}" required  placeholder="User Phone Number">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control"  name="email" value="{{$user->email}}" required  placeholder="User Email">
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail1">Password</label>--}}
{{--                                <input type="password" class="form-control"  name="password" required  placeholder="Password">--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label class="text-uppercase text-bold">User Role</label><br>
                                @foreach ($roles as $role)
                                    {{ Form::checkbox('roles[]',  $role->id, $user->roles) }}
                                    {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.card -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
@push('js')
    <script src="{{asset('public/assets')}}/select2/js/select2.full.min.js"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
        });

    </script>
@endpush
