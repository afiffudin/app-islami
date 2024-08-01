<template>
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">{{ title }}</h5>
        <p class="card-text">{{ value }}</p>
      </div>
      <div class="card-body">
        <i :class="icon" aria-hidden="true"></i>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      title: String,
      value: Number,
      icon: String,
      color: String,
    },
  };
  </script>