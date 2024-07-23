<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis Tebak Ayat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Kuis Tebak Ayat</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(isset($questions) && count($questions) > 0)
        {{-- <form action="{{ route('submit.quiz') }}" method="POST"> --}}
        <form action="{{ url('quiz/submit') }}" method="POST">
            @csrf
            @foreach($questions as $question)
                <div class="card mb-3">
                    <div class="card-body">
                        <p>{{ $question->question }}</p>
                         <input type="hidden" name="questions[{{ $question->id }}][id]" value="{{ $question->id }}">
                            <div>
                                <input type="radio" name="questions[{{ $question->id }}][answer]" value="option1"> Option 1
                                <input type="radio" name="questions[{{ $question->id }}][answer]" value="option2"> Option 2
                                <input type="radio" name="questions[{{ $question->id }}][answer]" value="option3"> Option 3
                            </div>
                        </div>
                    </div>
                      
                    </div>
                </div>
            @endforeach
             <button type="submit" class="btn btn-primary">Submit</button>
        @else
            <p>Tidak ada pertanyaan tersedia.</p>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
