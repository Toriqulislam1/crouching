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
                        <a class="btn btn-primary uppercase text-bold" href="{{ route('admin.subject.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form id="subjectForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subject_name">Subject Name <code>*</code></label>
                                <input type="text" class="form-control" name="subject_name" value="{{ $subject->subject_name }}" id="subject_name" required placeholder="Subject name">
                                <span class="text-danger" id="subject_name_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
            let subjectName = $('#subject_name').val();
            
            $.ajax({
                url: "{{ route('admin.subject.update') }}", // The route for updating the subject
                type: "POST"
                , data: {
                    subject_name: subjectName
                    , _token: "{{ csrf_token() }}"
                }
                , success: function(response) {
                    console.log(response);
                    // Show success toast
                    Swal.fire({
                        icon: 'success'
                        , title: response.success
                        , toast: true
                        , position: 'top-end'
                        , showConfirmButton: false
                        , timer: 3000
                    });

                    // Reset the form
                    $('#subjectForm')[0].reset();
                }
                , error: function(xhr) {
                    // Display validation errors
                    let errors = xhr.responseJSON.errors;
                    if (errors && errors.subject_name) {
                        $('#subject_name_error').text(errors.subject_name[0]);
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

</script>
@endpush

