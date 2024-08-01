@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Question</h1>
    <form action="{{ route('admin.questions.update', $question) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="question">Question</label>
            <input type="text" name="question" class="form-control" value="{{ $question->question }}" required>
        </div>
        <div class="form-group">
            <label for="parts">Parts (separated by comma)</label>
            <input type="text" name="parts" class="form-control" value="{{ implode(', ', json_decode($question->parts)) }}" required>
        </div>
        <div class="form-group">
            <label for="answer">Answer</label>
            <input type="text" name="answer" class="form-control" value="{{ $question->answer }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
