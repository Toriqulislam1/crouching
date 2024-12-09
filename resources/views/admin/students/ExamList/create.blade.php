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


<h4 id="countdown">
    Time remaining: <span id="timer">{{$exam->ExamTime}}:00</span>
</h4>







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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get the timer element
        const timerElement = document.getElementById("timer");

        // Initialize time remaining in minutes (provided from Laravel)
        let timeRemaining = parseInt("{{$exam->ExamTime}}");

        // Function to disable all radio buttons
        function disableAllOptions() {
            const radioButtons = document.querySelectorAll('input[type="radio"]');
            radioButtons.forEach((radio) => {
                radio.disabled = true;
            });
        }

        // Countdown function to update every minute
        function updateTimer() {
            if (timeRemaining <= 0) {
                timerElement.textContent = "0:00"; // Display 0:00 when time is up
                clearInterval(interval); // Stop the timer
                alert("Time is up!"); // Notify the user
                disableAllOptions(); // Disable all radio buttons
                return;
            }

            timeRemaining--; // Decrease the remaining time by 1 minute
            timerElement.textContent = `${timeRemaining}:00`; // Update the UI
        }

        // Run the countdown every 60 seconds (1 minute)
        const interval = setInterval(updateTimer, 60000);

        // Display initial countdown and start immediately
        updateTimer();
    });

</script>








@endpush

