@extends('admin.layout.layout')
@push('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('public/assets')}}/select2/css/select2.min.css">
<link rel="stylesheet" href="{{asset('public/assets')}}/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- summernote -->
<link rel="stylesheet" href="{{asset('public/assets')}}/summernote/summernote-bs4.min.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="SubjectId">Subject Name</label>
                                <select name="Subject_id" id="SubjectId" class="form-control">
                                    @foreach ($Subject as $Subject)
                                    <option value="{{ $Subject->id }}">{{ $Subject->subject_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="BatchId">Batch Name</label>
                                <select name="Batch_id" id="BatchId" class="form-control">
                                    @foreach ($Batch as $Batch)
                                    <option value="{{ $Batch->id }}">{{ $Batch->batch_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ExamTime">Exam Time <code>*</code></label>
                                <input type="text" class="form-control" id="ExamTime" required placeholder="Select exam time">
                                <span class="text-danger" id="ExamTimeError"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ExamDate">Exam Date <code>*</code></label>
                                <input type="datetime-local" class="form-control" id="ExamDate" required placeholder="Select exam date">
                                <span class="text-danger" id="ExamDateError"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-bold text-uppercase">#SL</th>
                                        <th class="text-bold text-uppercase">Select</th>
                                        <th class="text-bold text-uppercase">MCQ Name</th>
                                        <th class="text-bold text-uppercase">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Mcq as $key => $Mcq)
                                    <tr>
                                        <td>{{ $Mcq->id }}</td>
                                        <td>
                                            <input type="checkbox" name="questions[]" value="{{ $Mcq->id }}">
                                        </td>
                                        <td>{{ $Mcq->question }}</td>
                                        <td>
                                            @foreach ($Mcq->options as $option)
                                            {{ $option->option_text }}
                                            @if ($option->is_correct)
                                            <strong>(Correct)</strong>
                                            @endif
                                            <br>
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

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
                                    <input type="checkbox" class="question-checkbox" data-question-name="{{ $mcq->question }}" value="{{ $mcq->id }}" />
                                </td>
                                <td>{{ $mcq->question }}</td>
                                @endforeach
                                @if ($chunk->count() < 2) <td>
                                    </td>
                                    <td></td>
                                    @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                {{ $Mcq->links() }}
                    <!-- Render pagination links -->
                    {{ $Mcq->links() }}



                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Add Exam</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
<script src="{{asset('public/assets')}}/select2/js/select2.full.min.js"></script>
<script>
    $(function() {
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
    });

    $('#subjectForm').on('submit', function(event) {
        event.preventDefault();
        let formData = $(this).serialize();
        $.ajax({
            // url: ""
            , method: 'POST'
            , data: formData
            , success: function(response) {
                alert('Exam added successfully!');
                location.reload();
            }
            , error: function(xhr) {
                let errors = xhr.responseJSON.errors;
                if (errors) {
                    for (let key in errors) {
                        $(`#${key}Error`).text(errors[key][0]);
                    }
                }
            }
        });
    });

</script>
<script>
    $(function() {
    $('#example1').DataTable({
    "paging": false, // Disable DataTable's pagination
    "ordering": true,
    "info": true,
    "searching": true,
    });
    });
</script>
@endpush

