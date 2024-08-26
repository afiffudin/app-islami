<template>
    <div class="guess-verse">
      <h1>Tebak Tebakan Ayat</h1>
      <div v-if="!showAnswer">
        <p>{{ currentVerse.hint }}</p>
        <input v-model="userAnswer" placeholder="Masukkan jawaban kamu" />
        <button @click="checkAnswer">Submit</button>
      </div>
      <div v-else>
        <div v-if="isCorrect">Jawaban kamu benar!</div>
        <div v-else>Jawaban kamu salah. Ayat yang benar: {{ currentVerse.answer }}</div>
        <button @click="nextVerse">Next</button>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        currentVerse: {
          hint: 'Hint for the verse',
          answer: 'Correct answer',
        },
        userAnswer: '',
        showAnswer: false,
        isCorrect: false,
      };
    },
    methods: {
      checkAnswer() {
        this.showAnswer = true;
        this.isCorrect = this.userAnswer === this.currentVerse.answer;
      },
      nextVerse() {
        // Logic for next verse
        this.showAnswer = false;
        this.userAnswer = '';
        // Update currentVerse with new verse data
      },
    },
  };
  </script>
  
  <style scoped>
  /* Add component specific styles here */
  </style>
  