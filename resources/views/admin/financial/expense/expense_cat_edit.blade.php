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
                        <a class="btn btn-primary uppercase text-bold" href="{{ route('expense-category-list') }}"> Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{-- {!! Form::model($package, ['method' => 'PATCH','route' => ['package.update', $package->id]]) !!} --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Course name<code>*</code></label>
                            <input type="text" class="form-control" name="course_name" value="{{$category->name }}" required placeholder="Catagory name">
                        </div>
                    </div>
                </div>

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
<script>
    (function($) {
        $(function() {

            var addFormGroup = function(event) {
                event.preventDefault();

                var $formGroup = $(this).closest('.form-group');
                var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
                var $formGroupClone = $formGroup.clone();

                $(this)
                    .toggleClass('btn-default btn-add btn-danger btn-remove')
                    .html('–');

                $formGroupClone.find('input').val('');

                var labelNumber = countFormGroup($multipleFormGroup) + 1;
                $formGroupClone.find('label').text('Feature ' + labelNumber);
                console.log($formGroupClone)

                $formGroupClone.insertAfter($formGroup);
            };

            var removeFormGroup = function(event) {
                event.preventDefault();

                var $formGroup = $(this).closest('.form-group');
                $formGroup.remove();
            };

            var countFormGroup = function($form) {
                return $form.find('.form-group').length;
            };

            $(document).on('click', '.btn-add', addFormGroup);
            $(document).on('click', '.btn-remove', removeFormGroup);

        });
    })(jQuery);

</script>
<script src="{{asset('public/assets')}}/select2/js/select2.full.min.js"></script>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
    });

</script>
@endpush

