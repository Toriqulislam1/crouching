@extends('admin.layout.layout')
@push('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('public/assets')}}/select2/css/select2.min.css">
<link rel="stylesheet" href="{{asset('public/assets')}}/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">{{ $page_title }}</h3>
                <div class="pull-right box-tools">
                    <div class="float-right mt-1">
                        <a class="btn btn-primary uppercase text-bold" href="{{ route('admin.mcq.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form id="subjectForm">
                    @csrf
                    <input type="hidden" id="id" name="" value="{{ $Mcq->id }}">
                    <div class="form-group">
                        <label for="question">Question Name</label>
                        <input type="text" name="question" value="{{ $Mcq->question }}" id="question" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="options">Options (comma-separated)</label>
                        <input type="text" name="options[]" value="{{ $Mcq->options->pluck('option_text')->implode(', ') }}" id="options" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="correct_answer">Correct Answer</label>
                        <input type="text" name="correct_answer" value="{{ $Mcq->options->firstWhere('is_correct', true)->option_text ?? 'No correct answer set' }}" id="correct_answer" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Question</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<!-- Include Select2 JS -->
<script src="{{asset('public/assets')}}/select2/js/select2.full.min.js"></script>
<script>
    $(function() {
        // Initialize Select2
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
    });


    $(document).ready(function() {
    $('#subjectForm').on('submit', function(e) {

    e.preventDefault(); // Prevent the default form submission

    let id =$('#id').val();

    let question =$('#question').val();
    let options = $('#options').val().split(','); // Split options by comma
    let correct_answer = $('#correct_answer').val();
    $.ajax({
    url: "{{ route('admin.mcq.update') }}", // The route for storing the subject
    type: "POST"
    , data: {
    id: id,
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

