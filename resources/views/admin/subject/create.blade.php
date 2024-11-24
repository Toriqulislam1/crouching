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
                        <a class="btn btn-primary uppercase text-bold" href="{{ route('admin.subject.index') }}"> Back</a>
                    </div>
                </div>
            </div>
                <div class="card-body">
                    <form id="subjectForm">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="subject_name">Subject Name<code>*</code></label>
                                    <input type="text" class="form-control" id="subject_name" name="subject_name" value="{{ old('subject_name') }}" required placeholder="Subject Name">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Add Subject</button>
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
    $(document).ready(function() {
        $('#subjectForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            let subjectName = $('#subject_name').val(); // Get the subject name

            $.ajax({
                url: "{{ route('admin.subject.store') }}", // The route for storing the subject
                type: "POST"
                , data: {
                    subject_name: subjectName
                    , _token: "{{ csrf_token() }}" // Pass the CSRF token
                }
                , success: function(response) {
                     // Show success toast
                     Swal.fire({
                     icon: 'success',
                     title: response.success,
                     toast: true,
                     position: 'top-end',
                     showConfirmButton: false,
                     timer: 3000
                     });

                    $('#subjectForm')[0].reset(); // Reset the form
                }
                , error: function(xhr) {
                    // Handle error response
                    let errors = xhr.responseJSON.errors;
                    if (errors) {
                        let errorMessage = '';
                        for (let field in errors) {
                            errorMessage += errors[field][0] + '\n';
                        }
                        alert(errorMessage);
                    } else {
                        alert('Something went wrong. Please try again.');
                    }
                }
            });
        });
    });

</script>
@endpush

