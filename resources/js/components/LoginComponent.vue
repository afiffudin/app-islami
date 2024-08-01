<template>
    <div>
      <h1>Login</h1>
      <form @submit.prevent="login">
        <label for="email">Email:</label>
        <input type="email" id="email" v-model="email" />
        <br />
        <label for="password">Password:</label>
        <input type="password" id="password" v-model="password" />
        <br />
        <button type="submit">Login</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        email: '',
        password: '',
      };
    },
    methods: {
      login() {
        axios.post('/api/login', {
          email: this.email,
          password: this.password,
        })
          .then((response) => {
            if (response.data.success) {
              this.$router.push({ name: 'dashboard' });
            } else {
              alert('Login gagal');
            }
          })
          .catch((error) => {
            console.error(error);
          });
      },
    },
  };
  </script>