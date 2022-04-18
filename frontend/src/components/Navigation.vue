<template>
  <header
    class="
      bg-gray-900
      sm:flex sm:justify-between sm:items-center sm:px-4 sm:py-3
    "
  >
    <span v-if="isLogged">hello</span>
    <div class="flex items-center justify-between px-4 py-3 sm:p-0">
      <div class="flex justify-center align-baseline">
        <img class="h-20 ml-4" src="../assets/img/logo.png" alt="Workcation" />
        <h1
          class="
            flex
            justify-center
            items-center
            ml-2
            font-extrabold
            text-gray-100
            font-mono
            antialiased
            text-xl
          "
        >
          Library Thing
        </h1>
      </div>
      <div class="sm:hidden">
        <button
          @click="isOpen = !isOpen"
          type="button"
          class="
            block
            text-gray-500
            hover:text-white
            focus:text-white focus:outline-none
          "
        >
          <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
            <path
              v-if="isOpen"
              fill-rule="evenodd"
              d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"
            />
            <path
              v-if="!isOpen"
              fill-rule="evenodd"
              d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
            />
          </svg>
        </button>
      </div>
    </div>
    <nav
      :class="isOpen ? 'block' : 'hidden'"
      class="mr-4 px-2 pt-2 pb-4 sm:flex sm:p-0"
    >
      <div class="flex mr-3">
        <router-link
          to="/"
          @click="Home()"
          v-bind:class="{
            'mt-1 block px-2 py-1 text-white border-b-2 font-mono sm:mt-0 sm:ml-2':
              active === 'Home',
            'mt-1 block px-2 py-1 text-white sm:mt-0 font-mono sm:ml-2':
              active != 'Home',
          }"
          >Home</router-link
        >
        <router-link
          to="/Offres"
          v-if="isLogged"
          @click="Offres()"
          v-bind:class="{
            'mt-1 block px-2 py-1 font-mono text-white border-b-2 sm:mt-0 sm:ml-2':
              active === 'Offres',
            'mt-1 block px-2 py-1  font-mono text-white sm:mt-0 sm:ml-2':
              active != 'Offers',
          }"
          >Offres</router-link
        >
        <router-link
          to="/Demandes"
          @click="Demandes()"
          v-if="isLogged"
          v-bind:class="{
            'mt-1 block px-2 py-1 font-mono text-white border-b-2 sm:mt-0 sm:ml-2':
              active === 'Demandes',
            'mt-1 block px-2 py-1 font-mono text-white sm:mt-0 sm:ml-2':
              active != 'Demandes',
          }"
          >Demandes</router-link
        >
        <router-link
          to="/Profile"
          v-if="isLogged"
          @click="Profile()"
          v-bind:class="{
            'mt-1 block px-2 py-1 font-mono text-white border-b-2 sm:mt-0 sm:ml-2':
              active === 'Profile',
            'mt-1 block px-2 py-1 font-mono text-white sm:mt-0 sm:ml-2':
              active != 'Profile',
          }"
          >Profile</router-link
        >
      </div>
      <router-link
        to="/login"
        v-if="!isLogged"
        class="
          mt-1
          block
          px-2
          py-1
          text-white
          border-2
          font-mono
          sm:mt-0 sm:ml-2
          transition
          bg-gray-800
          shadow-xl
          hover:bg-gray-600
          active:bg-gray-700
          focus:bg-gray-600
        "
        >LOGIN</router-link
      >
      <button
        v-if="isLogged"
        @click="logout()"
        class="
          mt-1
          block
          px-2
          py-1
          text-white
          border-2
          font-mono
          sm:mt-0 sm:ml-2
          transition
          bg-gray-800
          shadow-xl
          hover:bg-gray-600
          active:bg-gray-700
          focus:bg-gray-600
        "
      >
        logout
      </button>
    </nav>
  </header>
</template>

<script>
export default {
  name: "NavigationComponent",
  inject: ["setLoggedIn", "isLoggedIn"],
  data() {
    return {
      isOpen: false,
      active: "",
      isLogged: this.isLoggedIn,
    };
  },

  methods: {
    Offres() {
      this.active = "Offres";
    },
    Home() {
      this.active = "Home";
    },
    Demandes() {
      this.active = "Demandes";
    },
    // Login() {
    //   this.active = 'login'
    // },
    Profile() {
      this.active = "Profile";
    },
    logout(){
      localStorage.removeItem('token');
      this.$router.replace("login")
      this.setLoggedIn(false)
    }
  },
};
</script>

<style>
</style>