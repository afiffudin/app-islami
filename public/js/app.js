import { createApp }  from 'vue';
import DashboardComponent  from './components/DashboardComponent.vue';

new Vue({
  render: h => h(DashboardComponent),
}).$mount('#app');
