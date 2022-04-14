<template>
  <div>
    <header-comp />
    <hero-comp />
    <commments-comp />
    <Footer />
  </div>
</template>

<script>
import HeaderComp from "./HeaderComp.vue";
import HeroComp from "./HeroComp.vue";
import CommmentsComp from "./CommentsComp.vue";
import Footer from "../Footer.vue";

export default {
  components: { HeaderComp, HeroComp, CommmentsComp, Footer},
  name: "HomePage",
};
</script>

<style scoped>
</style>
