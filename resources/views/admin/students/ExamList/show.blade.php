@extends('admin.layout.layout')


@section('content')

    <section class="content">
        <div class="container-fluid">
            <!-- /.card -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">{{$page_title}}</h3>
                    <div class="pull-right box-tools">
                        <div class="float-right mt-1">
                            <a class="btn btn-primary uppercase text-bold" href="{{ route('package.index') }}"> Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- info row -->
                    <h2>Results</h2>
                    <p>Correct Answers: {{ $correctCount }} / {{ $totalCount }}</p>
                    <ul>
                        @foreach ($answers as $answer)
                        <li>
                            Question: {{ $answer->question->question_text }} <br>
                            Your Answer: {{ $answer->option->option_text }} <br>
                            @if ($answer->option->is_correct)
                            <span style="color: green;">Correct</span>
                            @else
                            <span style="color: red;">Wrong</span>
                            @endif
                        </li>
                        @endforeach
                    </ul>


                    <!-- /.row -->
                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <h3 class="card-title">Features</h3>
                            <table class="table">
                                <tbody>
                                @foreach(json_decode($package->feature)  as $key => $feature)
                                    <tr>
                                        <td>{{$feature}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </section>

@endsection
