@extends('admin.layout.layout')


@section('content')

    <section class="content">
        <div class="container-fluid">
            <!-- /.card -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">{{$page_title}}</h3>
                    <div class="pull-right box-tools">
                        <div class="float-right mt-1">
                            <a class="btn btn-primary uppercase text-bold" href="{{ route('package.index') }}"> Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-6 invoice-col">
                            <address>
                                <strong>Title:       {{$package->title}}</strong><br>
                                <strong>Short Title: {{$package->short_title}}</strong><br>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6 invoice-col">
                            <address>
                                <strong>Price:    {{$package->price}}</strong><br>
                                <strong>Discount: {{$package->discount_percent}}</strong><br>
                                <strong>Final Price: {{$package->final_price}}</strong><br>
                            </address>
                        </div>

                    </div>
                    <!-- /.row -->
                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <h3 class="card-title">Features</h3>
                            <table class="table">
                                <tbody>
                                @foreach(json_decode($package->feature)  as $key => $feature)
                                    <tr>
                                        <td>{{$feature}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </section>

@endsection
