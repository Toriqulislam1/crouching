@extends('admin.layout.layout')
@push('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('public/assets')}}/select2/css/select2.min.css">
<link rel="stylesheet" href="{{asset('public/assets')}}/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<style>
    .card-header {
        display: flex; /* Use Flexbox */
        justify-content: space-between; /* Space out elements */
        align-items: center; /* Vertically align elements */
    }

    .selected-count-container {
        flex-grow: 1; /* Allow the center container to take available space */
        text-align: center; /* Center text in the container */
    }

    .float-right {
        margin-left: auto; /* Push the "Back" button to the right */
    }

    .btn-primary.uppercase.text-bold {
        margin: 0; /* Remove default margins */
    }
</style>

@endpush
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary card-outline">
                   <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">{{ $page_title }}</h3>
                    <div class="selected-count-container text-center">
                        <p class="btn btn-primary uppercase text-bold mb-0">
                            Total Selected Question: <span id="selectedCount">0</span>
                        </p>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary uppercase text-bold" href="{{ route('admin.assign.index') }}">
                            Back
                        </a>
                    </div>
                </div>
            <div class="card-body">
                <form id="subjectForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Exam_name">Exam Name <code>*</code></label>
                                <input type="text" class="form-control" value="{{ $AssignExam->name }}" id="ExamName" required placeholder="Exam name">
                                <input type="hidden" class="form-control" value="{{ $AssignExam->id }}" id="Id" required placeholder="Exam name">

                                <span class="text-danger" id="Exam_name"></span>
                            </div>
                        </div>
                 <div class="col-md-6">
                     <div class="form-group">
                         <label for="SubjectId">Subject Name</label>
                         <select name="SubjectId" id="SubjectId" class="form-control">
                             @foreach ($Subject as $subject)
                             <option value="{{ $subject->id }}" {{ $AssignExam->SubjectId == $subject->id ? 'selected' : '' }}>
                                 {{ $subject->subject_name }}
                             </option>
                             @endforeach
                         </select>
                     </div>
                 </div>

                 <!-- Batch Name -->
                 <div class="col-md-6">
                     <div class="form-group">
                         <label for="BatchId">Batch Name</label>
                         <select name="BatchId" id="BatchId" class="form-control">
                             @foreach ($Batch as $batch)
                             <option value="{{ $batch->id }}" {{ $AssignExam->BatchId == $batch->id ? 'selected' : '' }}>
                                 {{ $batch->batch_name }}
                             </option>
                             @endforeach
                         </select>
                     </div>
                 </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ExamTime">Exam Time <code>*</code></label>
                        <input type="" class="form-control" id="ExamTime" required name="examTime" value="{{ $AssignExam->ExamTime }}" placeholder="Enter time Minute">
                        <span class="text-danger" id="ExamTimeError"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ExamDate">Exam Date <code>*</code></label>
                        <input type="datetime-local" class="form-control" name="examDate" id="ExamDate" required value="{{ $AssignExam->examDate  }}" placeholder="Select exam date">


                        <span class="text-danger" id="ExamDateError"></span>
                    </div>
                </div>
                </div>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" id="select-all" />
                            </th>
                            <th>Question</th>
                            <th>
                                <input type="checkbox" id="select-all-right" />
                            </th>
                            <th>Question</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Mcq->chunk(2) as $chunk)
                            <tr>
                                @foreach ($chunk as $mcq)
                                    <td>
                                        <input type="checkbox"
                                               class="question-checkbox"
                                               data-question-name="{{ $mcq->question }}"
                                               value="{{ $mcq->id }}"
                                               name="question[]"
                                               @if(in_array($mcq->id, $IdsForAfterSelected)) checked @endif />
                                    </td>
                                    <td>{{ $mcq->question }}</td>
                                @endforeach

                                @if ($chunk->count() < 2)
                                    <td></td>
                                    <td></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <!-- Render pagination links -->
                {{ $Mcq->links() }}

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Update Assign Exam</button>
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
$(function () {
    // Initialize Select2
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    });

    // Handle form submission
    $('#subjectForm').on('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

        // Collect form data
        let formData = {
            ExamName: $('#ExamName').val(),
            Id: $('#Id').val(),
            SubjectId: $('#SubjectId').val(),
            BatchId: $('#BatchId').val(),
            exam_time: $('#ExamTime').val(),
            exam_date: $('#ExamDate').val(),
            questions: $("input[name='question[]']:checked")
                .map(function () {
                    return $(this).val();
                }).get(),
            _token: '{{ csrf_token() }}', // CSRF token for Laravel
        };

        // Clear previous validation error messages
        // $('#Exam_name').text('');
        // $('#ExamTimeError').text('');
        // $('#ExamDateError').text('');

        // AJAX call
        $.ajax({
            url: '{{ route("admin.assign.update") }}', // Replace with your route name or URL
            type: 'POST',
            data: formData,
            success: function (response) {
                // Show success toast
                Swal.fire({
                    icon: 'success',
                    // title: response.success,
                    text: 'Update successfuly',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                // Redirect to the index page after delay
                setTimeout(() => {
                    window.location.href = "{{ route('admin.assign.index') }}";
                }, 3000);
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    // Handle validation errors
                    let errors = xhr.responseJSON.errors;

                    // Display new validation errors
                    if (errors.ExamName) {
                        $('#Exam_name').text(errors.ExamName[0]);
                    }
                    if (errors.exam_time) {
                        $('#ExamTimeError').text(errors.exam_time[0]);
                    }
                    if (errors.exam_date) {
                        $('#ExamDateError').text(errors.exam_date[0]);
                    }
                } else {
                    // Handle unexpected errors
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Something went wrong. Please try again.',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            }
        });
    });
});

</script>
  <script>
      $(function() {
          $('#example1').DataTable({
              "paging": false, // Disable DataTable's pagination
              "ordering": true
              , "info": true
              , "searching": true
          , });
      });

  </script>
  <script>
      $(document).ready(function() {
          // Function to update the count of selected checkboxes
          function updateSelectedCount() {
              let selectedCount = $('.question-checkbox:checked').length; // Count checked checkboxes
              $('#selectedCount').text(selectedCount); // Update the count display
          }

          // Event listener for checkbox state change
          $('.question-checkbox').on('change', function() {
              updateSelectedCount();
          });

          // Initialize the count on page load
          updateSelectedCount();
      });

  </script>


@endpush

