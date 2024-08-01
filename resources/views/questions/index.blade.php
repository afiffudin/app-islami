@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Questions</h1>
    <a href="{{ route('admin.questions.create') }}" class="btn btn-primary">Add New Question</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Question</th>
                <th>Parts</th>
                <th>Answer</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
                <tr>
                    <td>{{ $question->id }}</td>
                    <td>{{ $question->question }}</td>
                    <td>{{ implode(', ', json_decode($question->parts)) }}</td>
                    <td>{{ $question->answer }}</td>
                    <td>
                        <a href="{{ route('admin.questions.edit', $question) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.questions.destroy', $question) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
