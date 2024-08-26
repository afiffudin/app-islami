import { createApp } from 'vue';
import App from './App.vue';
import router from './routes/index.js'; // Assuming your router config will be in routes folder

createApp(App)
  .use(router)
  .mount('#app');