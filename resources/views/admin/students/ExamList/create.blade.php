@extends('admin.layout.layout')

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('public/assets')}}/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('public/assets')}}/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('public/assets')}}/datatables-buttons/css/buttons.bootstrap4.min.css">
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }

    .question-container {
        margin-bottom: 20px;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .question {
        font-weight: bold;
        font-size: 18px;
        margin-bottom: 10px;
        color: #333;
    }

    .options {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .option {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .option label {
        font-size: 16px;
        color: #555;
    }

</style>

@endpush
@section('content')

{{-- <div class="container mt-5">
    <h3 class="mb-4">Questionnaire</h3>

        <!-- Question 1 -->
        <div class="question-container">
            <div class="question-title">What is your favorite color?</div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="question_1[]" value="red" id="red">
                <label class="form-check-label" for="red">Red</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="question_1[]" value="blue" id="blue">
                <label class="form-check-label" for="blue">Blue</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="question_1[]" value="green" id="green">
                <label class="form-check-label" for="green">Green</label>
            </div>
        </div>
        <!-- Question 2 -->
        <div class="question-container">
            <div class="question-title">What is your favorite animal?</div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="question_2[]" value="dog" id="dog">
                <label class="form-check-label" for="dog">Dog</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="question_2[]" value="cat" id="cat">
                <label class="form-check-label" for="cat">Cat</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="question_2[]" value="rabbit" id="rabbit">
                <label class="form-check-label" for="rabbit">Rabbit</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div> --}}
{{-- <form action="/submit" method="POST">
@foreach ($exam as $exam)
<div class="question-container">
    <div class="question">What is your favorite color?</div>
    <div class="options">
        <div class="option">
            <input type="radio" name="question1" id="option1" value="Red">
            <label for="option1">Red</label>
        </div>
        <div class="option">
            <input type="radio" name="question1" id="option2" value="Blue">
            <label for="option2">Blue</label>
        </div>
        <div class="option">
            <input type="radio" name="question1" id="option3" value="Green">
            <label for="option3">Green</label>
        </div>
        <div class="option">
            <input type="radio" name="question1" id="option4" value="Yellow">
            <label for="option4">Yellow</label>
        </div>
    </div>
</div>
@endforeach


  <button type="submit" class="btn btn-primary">Submit</button>
</form> --}}

<form action="/submit" method="POST">
    @csrf
    @foreach ($questions as $question)
    <div class="question-container">
        <!-- Display the question -->
        <div class="question">{{ $question->question }}</div>

        <div class="options">
            @if (isset($groupedOptions[$question->id]))
            @foreach ($groupedOptions[$question->id] as $option)
            <div class="option">
                <input type="radio" name="question_{{ $question->id }}" id="option_{{ $option->id }}" value="{{ $option->id }}">
                <label for="option_{{ $option->id }}">{{ $option->option_text }}</label>
            </div>
            @endforeach
            @else
            <div class="no-options">No options available for this question.</div>
            @endif
        </div>
    </div>
    @endforeach
   <button type="submit" class="btn btn-primary">Submit</button>

</form>



@endsection

@push('js')
<!-- DataTables  & Plugins -->
<script src="{{asset('public/assets')}}/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public/assets')}}/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('public/assets')}}/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('public/assets')}}/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('public/assets')}}/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('public/assets')}}/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('public/assets')}}/jszip/jszip.min.js"></script>
<script src="{{asset('public/assets')}}/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('public/assets')}}/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('public/assets')}}/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('public/assets')}}/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true
            , "lengthChange": false
            , "autoWidth": false
            , "buttons": ["excel", "pdf", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

</script>
@endpush

