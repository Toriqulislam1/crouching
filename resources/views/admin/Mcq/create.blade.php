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
                        <a class="btn btn-primary uppercase text-bold" href="{{ route('admin.mcq.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form id="subjectForm">
                    @csrf
                    <div class="form-group">

                    <div class="form-group">
                        <label for="question">Question Name</label>
                        <input type="text" name="question" id="question" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="options">Options (comma-separated)</label>
                        <input type="text" name="options[]" id="options" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="correct_answer">Correct Answer</label>
                        <input type="text" name="correct_answer" id="correct_answer" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Question</button>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $(document).ready(function() {
        $('#subjectForm').on('submit', function(e) {

            e.preventDefault(); // Prevent the default form submission

            let question =$('#question').val();
            let options = $('#options').val().split(','); // Split options by comma
            let correct_answer = $('#correct_answer').val();
            $.ajax({
                url: "{{ route('admin.mcq.store') }}", // The route for storing the subject
                type: "POST"
                , data: {
                    question: question,
                    options:options,
                    correct_answer: correct_answer
                    , _token: "{{ csrf_token() }}" // Pass the CSRF token
                }
                , success: function(response) {
                    // Show success toast
                    Swal.fire({
                        icon: 'success'
                        , title: response.success
                        , toast: true
                        , position: 'top-end'
                        , showConfirmButton: false
                        , timer: 3000
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
