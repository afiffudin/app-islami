<?php
namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function show()
    {
        $questions = Question::all();
        // dd($questions);
        return view('quiz', ['questions' => $questions]);
    }

    public function checkAnswer(Request $request)
    {
        $questionId = $request->input('question_id');
        $answer = $request->input('answer');
        $question = Question::find($questionId);

        if ($question && strtolower($question->answer) == strtolower($answer)) {
            return redirect()->back()->with('success', 'Jawaban Anda benar!');
        } else {
            return redirect()->back()->with('error', 'Jawaban Anda salah. Coba lagi.');
        }
    }
    public function submitQuiz(Request $request)
{
    $validatedData = $request->validate([
        'questions.*.id' => 'required|exists:questions,id',
        'questions.*.answer' => 'required',
    ]);

    // $questions = $request->input('questions');
    $questions = $validatedData['questions'];
    $correctAnswers = 0;

    foreach ($questions as $questionData) {
        // $question = Question::find($questionData['id']);
        $userAnswer = $questionData['answer'];
        // Cek apakah pertanyaan dan jawaban ada
        if (isset($questionData['id']) && isset($questionData['answer'])) {
            $question = Question::find($questionData['id']);
            
            // Cek apakah pertanyaan ditemukan di database
            if (!$question) {
                return redirect()->back()->with('error', 'Pertanyaan tidak ditemukan.');
            }

            $userAnswer = $questionData['answer'];

            // Misalnya, kita memeriksa jawaban benar berdasarkan kolom 'correct_answer'
            if ($question->correct_answer == $userAnswer) {
                $correctAnswers++;
                // Simpan jawaban benar ke database
                DB::table('user_answers')->insert([
                    'user_id' => auth()->user()->id, // Pastikan Anda menggunakan autentikasi pengguna
                    'question_id' => $question->id,
                    'answer' => $userAnswer,
                    'is_correct' => true,
                ]);
            } else {
                // Simpan jawaban salah ke database
                DB::table('user_answers')->insert([
                    'user_id' => auth()->user()->id,
                    'question_id' => $question->id,
                    'answer' => $userAnswer,
                    'is_correct' => false,
                ]);
            }
        }
    }

    return redirect()->back()->with('success', "Anda menjawab $correctAnswers pertanyaan dengan benar.");
}
}