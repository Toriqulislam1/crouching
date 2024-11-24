@extends('admin.layout.layout')

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('public/assets')}}/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('public/assets')}}/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('public/assets')}}/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush
@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">{{$page_title}}</h3>
                        <div class="pull-right box-tools">
                            <div class="float-right mt-1">
                                {{-- <a class="btn btn-primary uppercase text-bold" href="{{ route('package.create') }}"> New Package Add</a>--}}
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-bold text-uppercase">#Order ID</th>
                                        <th class="text-bold text-uppercase">Name</th>
                                        <th class="text-bold text-uppercase">Phone</th>
                                        <th class="text-bold text-uppercase">payment method</th>
                                        <th class="text-bold text-uppercase">transaction number </th>
                                        <th class="text-bold text-uppercase">Price</th>
                                        <th class="text-bold text-uppercase">Status</th>
                                        <th class="text-bold text-uppercase">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $key => $order)
                                    <tr>
                                        <td>{{ $order->order_id }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->payment_method }}</td>
                                        <td>{{ $order->transaction_id }}</td>
                                        <td>{{ $basic->currency }} {{ $order->total_amount }}</td>
                                        <td>{{ $order->payment_status}}</td>

                                        <td>
                                            <a class="btn btn-sm btn-info fa fa-eye" href="{{ route('order-pdf',$order->id) }}" title="Show"></a>
                                            <select name="statusPayment" class="form-select pl-4" aria-label="Default select example" data-order-id="{{ $order->id }}">
                                                <option selected>Status</option>
                                                <option value="unpaid">unpaid</option>
                                                <option value="confirm">confirm</option>

                                            </select>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<div class="modal fade" id="DelModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to Delete ?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <form action="{{route('package.destroy',0)}}" method="post" id="deleteForm">
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}
                    <input type="hidden" name="id" id="delete_id" class="delete_id" value="0">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger deleteButton float-right">Delete!</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection

@push('js')
<!-- DataTables  & Plugins -->
<script src="{{asset('public/assets')}}/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public/assets')}}/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('public/assets')}}/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('public/assets')}}/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('public/assets')}}/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('public/assets')}}/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('public/assets')}}/jszip/jszip.min.js"></script>
<script src="{{asset('public/assets')}}/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('public/assets')}}/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('public/assets')}}/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('public/assets')}}/datatables-buttons/js/buttons.colVis.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="statusPayment"]').on('change', function() {
            var status = $(this).val();
            var orderId = $(this).data('order-id'); // Get the order ID associated with the select element
            if (orderId) {
                // Now you can use orderId in your AJAX request
                $.ajax({
                    url: "{{  url('/update-order-payment-status') }}/" + orderId
                    , type: "GET"
                    , dataType: "json"
                    , data: {
                        status: status
                    }
                    , success: function(data) {
                        console.log(data);
                        // Handle success response
                        window.location.reload();
                    }
                    , error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        // Handle error response
                    }
                });
            } else {
                console.error('No order ID associated with select element');
            }
        });
    });

</script>













<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true
            , "lengthChange": false
            , "autoWidth": false
            , "buttons": ["excel", "pdf", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

</script>
<script>
    $(document).ready(function() {
        $(document).on("click", '.delete_button', function(e) {
            var id = $(this).data('id');
            var url = '{{ route("package.destroy",":id") }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr("action", url);
            $("#delete_id").val(id);
        });
    });

</script>
@endpush

