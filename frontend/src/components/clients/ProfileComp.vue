<template>
  <div>
    <div class="h-60 bg-[#111827] flex justify-center items-end">
      <img
        class="
          w-50
          absolute
          mx-auto
          rounded-full
          mt-[90px]
          border-8 border-gray-50
        "
        src="https://tailus.io/sources/blocks/grid-cards/preview/images/avatars/third_user.webp"
        alt="user avatar"
        loading="lazy"
      />
    </div>
    <div class="mt-[90px] flex flex-wrap justify-evenly gap-4">
      <!-- <div class="border-b-2 border-gray-900"></div> -->
      <div>
        <h1 class="py-4">
          <span class="font-bold">Full name :</span>
          {{ userInformation.firstName }} {{ userInformation.lastName }}
        </h1>
        <h1 class="py-4">
          <span class="font-bold">Email :</span> {{ userInformation.email }}
        </h1>
      </div>
      <div class="border-l-2 border-gray-900"></div>
      <div class="flex-col mt-3">
        <div
          class="tooltip"
          data-tip="you can't get your account back after delete it"
        >
          <button @click="deleteAccount()" class="btn btn btn-error">
            Delete Account
          </button>
        </div>
        <div>
          <button class="btn btn-outline btn mt-3">Log Out</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ProfileComp",
  data() {
    return {
      userInformation: {
        firstName: "",
        lastName: "",
        Email: "",
      },
    };
  },
  methods: {
    getUser() {
      // console.log(localStorage.getItem("id"))
      fetch(`http://127.0.0.1:8000/api/Profile/${localStorage.getItem("id")}`, {
        method: "GET",
      })
        .then((result) => {
          return result.json();
        })
        .then((reponse) => {
          // console.log(reponse);
          this.userInformation = reponse;
        });
    },
    deleteAccount() {
      fetch(`http://127.0.0.1:8000/api/Account/${localStorage.getItem("id")}`, {
        method: "delete",
      }).then(() => {
        localStorage.removeItem("token");
        localStorage.removeItem("id");
        this.$router.push("login");
      });
    },
  },
  mounted() {
    this.getUser();
  },
};
</script>

<style>
</style>