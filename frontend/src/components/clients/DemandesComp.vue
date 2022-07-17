<template>
  <div>
    <!-- <h1>This is an offres page</h1> -->
    <div class="py-16 flex flex-col justify-center items-center">
      <button v-on:click="sendUserID(id)" class="btn ">Add an demandes</button>
      <div v-if="AddDemande" class="mb-5">
        <AddDemandes @close="close" :getDemands="getDemands" />
      </div>
      <div v-if="UpdatedemandeF" class="mb-5">
        <UpdateDemandes
          @close="closeUpdate"
          :demandeID="demandeID"
          @getDemands="getDemands"
        />
      </div>
      <div v-if="demandesInfos.length === 0">There is no demande yet</div>
      <div
        v-for="demandeInfo in demandesInfos"
        :key="demandeInfo.id"
        class="container z-0 m-auto px-6 py-6 text-gray-500 md:px-12 xl:px-0"
      >
        <div class="mx-auto flex col gap-6 md:w-3/5 justify-center ">
          <div
            class="bg-white rounded-2xl shadow-xl px-8 py-12 sm:px-12 lg:px-8"
          >
            <div class="mb-12 space-y-4 flex flex-col ">
              <div class="flex items-center">
                <div class="flex">
                  <img
                    class="w-16 h-16 mx-auto rounded-full"
                    src="https://tailus.io/sources/blocks/grid-cards/preview/images/avatars/second_user.webp"
                    alt="user avatar"
                    height="220"
                    width="220"
                    loading="lazy"
                  />
                  <h3 class="flex items-center px-2 text-black">
                    {{demandeInfo.firstName}} {{demandeInfo.lastName}} {{ demandeInfo.id }}
                  </h3>
                  <!-- <p>{{offreInfo.created_at}}</p> -->
                </div>
                <div
                  class="flex relative justify-end"
                  v-if="demandeInfo.user_id == id"
                >
                  <button
                    v-on:click="dropdownOpen = !dropdownOpen"
                    class="
                      z-10
                      block
                      rounded-md
                      bg-white
                      p-2
                      focus:outline-none
                    "
                  >
                    <svg
                      class="h-5 w-5 text-gray-800"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"
                      />
                    </svg>
                  </button>

                  <div v-if="dropdownOpen">
                    <div
                      class="
                        absolute
                        right-0
                        top-9
                        mt-2
                        py-2
                        w-48
                        bg-white
                        rounded-md
                        shadow-xl
                        z-10
                      "
                    >
                      <!-- Update -->
                      <!-- Update -->
                      <!-- Update -->
                      <label
                        class="
                          block
                          px-4
                          py-2
                          text-sm
                          capitalize
                          text-blue-700
                          cursor-pointer
                        "
                        @click="getPostID(demandeInfo.id)"
                      >
                        Edit
                      </label>

                      <!-- Delete -->
                      <!-- Delete -->
                      <!-- Delete -->
                      <label
                        class="
                          block
                          px-4
                          py-2
                          text-sm
                          capitalize
                          text-red-700
                          cursor-pointer
                        "
                        for="my-modal"
                        @click="demandeID=demandeInfo.id"
                      >
                        Delete
                      </label>
                      <input
                        type="checkbox"
                        id="my-modal"
                        class="modal-toggle"
                      />
                      <div class="modal z-50">
                        <div class="modal-box">
                          <!-- <label
                            for="my-modal"
                            class="btn btn-sm btn-circle absolute right-2 top-2"
                            >✕</label
                          > -->
                          <h3 class="font-bold text-lg">
                            Are you sure you want to delete this post?
                          </h3>
                          <div class="modal-action">
                            <label for="my-modal" class="btn btn-outline"
                              >No</label
                            >
                            <label
                              @click="Deletedemande()"
                              class="btn btn-error"
                              >Yes</label
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div>
                <div>
                <h3 class="text-2xl font-semibold text-left text-blue-700">
                  {{ demandeInfo.Sujet }}
                </h3>
                <p class="mb-6 text-left">
                  {{ demandeInfo.Description }}
                </p>
                </div>
                <div>
                <img
                  :src="'http://127.0.0.1:8000/images/Demands/' + demandeInfo.image"
                  class="rounded "
                  alt=""
                />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import AddDemandes from "./upload/AddDemandes.vue";
import UpdateDemandes from "./update/UpdateDemandes.vue";
export default {
  components: { AddDemandes, UpdateDemandes },
  name: "OffresComp",

  data() {
    return {
      dropdownOpen: false,
      AddDemande: false,
      UpdatedemandeF: false,
      demandesInfos: [],
      demandeID: "",
      id: localStorage.getItem("id"),
    };
  },
  mounted() {
    this.getDemands();
  },
  methods: {
    close() {
      this.AddDemande = !this.AddDemande;
    },
    closeUpdate() {
      this.UpdatedemandeF = !this.UpdatedemandeF;
    },
    sendUserID(id) {
      this.AddDemande = !this.AddDemande;
    },
    // getDeleteID(id) {
    //   this.OffreID = id;
    // },
    getPostID(id) {
      console.log(id);
      this.UpdatedemandeF = !this.UpdatedemandeF;
      this.demandeID = id;
    },
    getDemands() {
      fetch(`http://127.0.0.1:8000/api/Demandes`, {
        method: "GET",
      })
        .then((result) => {
          return result.json();
        })
        .then((reponse) => {
          // console.log(reponse);
          //spread operater (...push)
          this.demandesInfos = reponse.reverse();
        });
    },
    Deletedemande() {
      fetch(`http://localhost:8000/api/Demandes/${this.demandeID}`, {
        method: "DELETE",
      })
        .then((response) => response.json())
        .then((result) => {
          if (result) {
            this.getDemands();
            return (this.dropdownOpen = false);
          }
        });
    },
  },
};
</script>

<style>
</style>