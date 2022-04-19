<template>
  <div>
    <Navigation />
    <router-view />
  </div>
</template>
<script>
import Navigation from "./components/Navigation.vue";
import { computed } from "vue";

export default {
  name: "App",
  components: { Navigation },
  data() {
    return {
      isLoggedIn: false,
    };
  },
  methods: {
    setLoggedIn(isLoggedIn) {
      this.isLoggedIn = isLoggedIn;
    },
  },
  provide() {
    return {
      isLoggedIn: computed(() => this.isLoggedIn),
      setLoggedIn: this.setLoggedIn,
    };
  },
  mounted() {
    this.isLoggedIn = !!localStorage.getItem("token");
  },
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
