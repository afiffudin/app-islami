<script setup lang="ts">
import { values } from 'lodash';
</script>

<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav-bar />
            </div>
        </div>
        <main class="mt-0 main-content">
            <section>
                <div class="page-header min-vh-100">
                    <div class="container">
                        <div class="row">
                            <div class="mx-auto col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0">
                                <div class="card card-plain">
                                    <div class="pb-0 card-header text-start">
                                        <h4 class="font-weight-bolder"> Dashboard</h4>
                                        <p> Dashboard </p>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                        <div class="col-6">
                                            <argon-card
                                            title="Total users"
                                            :value="totalusers"
                                            icon="ni ni-circle-08"
                                            color="bg-gradient-success"
                                            />
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</template>

<script>
export default {
    data() {
        return {
            totalusers: 0,
        };
    },
    //ini ketika ada data nya
    // mounted() {
    // // Call API to fetch data
    // axios.get('/api/dashboard')
    //   .then(response => {
    //     this.totalUsers = response.data.total_users;
    //     this.totalOrders = response.data.total_orders;
    //   })
    //   .catch(error => {
    //     console.error(error);
    //   });
//   },
}
</script>