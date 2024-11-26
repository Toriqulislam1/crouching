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
                        <a class="btn btn-primary uppercase text-bold" href="{{ route('admin.moduleMcq.index') }}"> Back</a>

                    </div>
                </div>
            </div>
            <div class="card-body">
                <form id="subjectForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subject_name">module Name <code>*</code></label>
                                <input type="text" class="form-control" value="{{ $moduleMcq->moduleName }}" id="moduleName" required placeholder="module name">
                                <input type="hidden" class="form-control" name="" value="{{ $moduleMcq->id }}" id="Id" required placeholder="batch name">
                                <span class="text-danger" id="subject_name_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update module</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<!-- Include Select2 JS -->
<script src="{{asset('public/assets')}}/select2/js/select2.full.min.js"></script>
{{-- <script>
    $(function() {
        // Initialize Select2
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });

        // Handle form submission
        $('#subjectForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            // Clear previous errors
            $('#moduleName').text('');
            // Get form data
            let Course_name = $('#moduleName').val();
            let Id = $('#Id').val();
            $.ajax({
                url: "{{ route('admin.moduleMcq.update') }}", // The route for updating the subject
                type: "POST"
                , data: {
                moduleName: moduleName,
                Id: Id
                , _token: "{{ csrf_token() }}"
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

                    setTimeout(() => {
                    window.location.href = "{{ route('admin.moduleMcq.index') }}";
                    }, 3000); // Red

                }
                , error: function(xhr) {
                    // Display validation errors
                    let errors = xhr.responseJSON.errors;
                    if (errors && errors.subject_name) {
                        $('#subject_name_error').text(errors.Course_name[0]);

                    } else {
                        Swal.fire({
                            icon: 'error'
                            , title: 'Oops...'
                            , text: 'Something went wrong. Please try again.'
                        , });
                    }
                }
            });
        });
    });

</script> --}}
<script>

$(function() {
// Initialize Select2
$('.select2bs4').select2({
theme: 'bootstrap4'
});

// Handle form submission
$('#subjectForm').on('submit', function(e) {
e.preventDefault(); // Prevent default form submission

// Clear previous errors
$('#subject_name_error').text('');

// Get form data
let moduleName = $('#moduleName').val(); // Correct variable name
let Id = $('#Id').val();

$.ajax({
url: "{{ route('admin.moduleMcq.update') }}", // Ensure this route exists
type: "POST",
data: {
moduleName: moduleName, // Pass correct variable
Id: Id,
_token: "{{ csrf_token() }}" // CSRF token for security
},
success: function(response) {
// Show success toast
Swal.fire({
icon: 'success',
title: response.success,
toast: true,
position: 'top-end',
showConfirmButton: false,
timer: 3000
});

// Redirect to index page
setTimeout(() => {
window.location.href = "{{ route('admin.moduleMcq.index') }}";
}, 3000);
},
error: function(xhr) {
// Handle validation errors
let errors = xhr.responseJSON.errors;
if (errors && errors.moduleName) {
$('#subject_name_error').text(errors.moduleName[0]); // Correct error field
} else {
Swal.fire({
icon: 'error',
title: 'Oops...',
text: 'Something went wrong. Please try again.'
});
}
}
});
});
});

</script>
@endpush

