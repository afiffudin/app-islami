<!DOCTYPE html>
<html>
<head>
    <title>Buat Soal Baru</title>
</head>
<body>
    <h1>Buat Soal Baru</h1>
    <form action="{{ route('questions.store') }}" method="POST">
        @csrf
        <label for="question">Soal:</label><br>
        <input type="text" id="question" name="question"><br><br>
        <label for="option_a">Pilihan A:</label><br>
        <input type="text" id="option_a" name="option_a"><br><br>
        <label for="option_b">Pilihan B:</label><br>
        <input type="text" id="option_b" name="option_b"><br><br>
        <label for="option_c">Pilihan C:</label><br>
        <input type="text" id="option_c" name="option_c"><br><br>
        <label for="option_d">Pilihan D:</label><br>
        <input type="text" id="option_d" name="option_d"><br><br>
        <label for="correct_answer">Jawaban Benar:</label><br>
        <input type="text" id="correct_answer" name="correct_answer"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
