<template>
  <div class="home">
    <home-page />
  </div>
</template>

<script>
// @ is an alias to /src
import HomePage from "@/components/home/HomeComp.vue";

export default {
  name: "HomeView",
  components: { HomePage },
};
</script>
