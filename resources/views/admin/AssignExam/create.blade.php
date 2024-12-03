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
                        <a class="btn btn-primary uppercase text-bold" href="{{ route('admin.assign.index') }}"> Back</a>
                    </div>
                </div>
            </div>
                <div class="card-body">
                    <form id="subjectForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Exam_name">Exam Name <code>*</code></label>
                                    <input type="text" class="form-control" value="" id="ExamName" required placeholder="Exam name">
                                    <span class="text-danger" id="Exam_name"></span>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Course">Course Name</label>
                                    <select name="Course_id" id="CourseId" class="form-control">
                                        @foreach ($Course as $course)
                                          <option value="{{ $course->id }}">{{ $course->Course_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject">Subject Name</label>
                                    <select name="Subject_id" id="SubjectId" class="form-control">
                                        @foreach ($Subject as $Subject)
                                          <option value="{{ $Subject->id }}">{{ $Subject->subject_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject">Batch Name</label>
                                    <select name="Batch_id" id="BatchId" class="form-control">
                                        @foreach ($Batch as $Batch)
                                          <option value="{{ $Batch->id }}">{{ $Batch->batch_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject">Exam Time</label>
                                    <select name="Batch_id" id="BatchId" class="form-control">
                                        @foreach ($Batch as $Batch)
                                          <option value="{{ $Batch->id }}">{{ $Batch->batch_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Add Assign Exam</button>
                        </div>
                    </form>
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

<script>
    $(document).ready(function () {
        $('#subjectForm').on('submit', function (e) {
            e.preventDefault(); // Prevent default form submission
            let formData = {
                ExamName: $('#ExamName').val(),
                CourseId: $('#CourseId').val(),
                SubjectId: $('#SubjectId').val(),
                BatchId: $('#BatchId').val(),
                _token: '{{ csrf_token() }}', // CSRF token for Laravel
            };

            $.ajax({
                url: '{{ route("admin.assign.store") }}', // Replace with your route name or URL
                type: 'POST',
                data: formData,
                success: function (response) {
                  // Show success toast
                  Swal.fire({
                     icon: 'success',
                     title: response.success,
                     toast: true,
                     position: 'top-end',
                     showConfirmButton: false,
                     timer: 3000
                     });

                    $('#subjectForm')[0].reset();
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        // Handle validation errors
                        let errors = xhr.responseJSON.errors;
                        if (errors.ExamName) {
                            $('#Exam_name').text(errors.ExamName[0]);
                        }
                    } else {
                        alert('Something went wrong! Please try again.');
                    }
                }
            });
        });
    });
</script>
@endpush

