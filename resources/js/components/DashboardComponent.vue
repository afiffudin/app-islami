<template>
  <div>
    <h1>Dashboard</h1>
    <p>Selamat datang, {{ user.name }}!</p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: {},
    };
  },
  mounted() {
    axios.get('/api/user')
      .then((response) => {
        this.user = response.data;
      })
      .catch((error) => {
        console.error(error);
      });
  },
};
</script>