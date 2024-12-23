@extends('admin.layout.layout')
@push('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('public/assets')}}/select2/css/select2.min.css">
<link rel="stylesheet" href="{{asset('public/assets')}}/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- summernote -->
<link rel="stylesheet" href="{{asset('public/assets')}}/summernote/summernote-bs4.min.css">

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
                        <a class="btn btn-primary uppercase text-bold" href="{{ route('package.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {!! Form::open(array('route' => 'package.store','method'=>'POST')) !!}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">title <code>*</code></label>
                            <input type="text" class="form-control" name="short_title" value="{{old('short_title')}}" required placeholder="Short Title">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Subject Select</label>
                            <select name="subject_id[]" class="custom-select">
                                @foreach ($Subject as $Subject)
                                    <option value="{{ $Subject->id }}">{{ $Subject->subject_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Batch Select</label>
                            <select name="batch_id[]" class="custom-select">
                                @foreach ($Batch as $Batch)
                                    <option value="{{ $Batch->id }}">{{ $Batch->batch_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div id="schedule-container">
                            <!-- Row template -->
                            <div class="row schedule-row align-items-center mb-2">

                                <div class="col-md-1 mt-3">
                                    <button type="button" class="btn btn-success btn-sm toggle-row">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                      <textarea id="summernote" name="details"> Details</textarea>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Add Assignment</button>

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

<!-- Summernote -->
<script src="{{asset('public/assets')}}/summernote/summernote-bs4.min.js"></script>
<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed"
            , theme: "monokai"
        });
    })

</script>


<script>
    $(document).ready(function() {
        // Handle the click event for toggling between + and -
        $('#schedule-container').on('click', '.toggle-row', function() {
            let button = $(this);
            let currentRow = button.closest('.schedule-row');

            if (button.text() === '+') {
                // Change + to - for the current row
                button.removeClass('btn-success').addClass('btn-danger').text('-');

                // Clone the current row, reset inputs, and append to the container
                let newRow = currentRow.clone();
                newRow.find('input').val(''); // Clear input fields
                newRow.find('select').val(''); // Reset dropdown

                // Reset button in the cloned row to + (add new)
                newRow.find('.toggle-row').removeClass('btn-danger').addClass('btn-success').text('+');

                $('#schedule-container').append(newRow);
            } else if (button.text() === '-') {
                // Remove the row if it's a - button
                if ($('.schedule-row').length > 1) {
                    currentRow.remove();
                } else {
                    alert('At least one row is required.');
                }
            }
        });
    });

</script>







@endpush

