<template>
  <div>
    <header class="hero"></header>
    <div class="flex justify-center">
      <div class="w-3/5">
        <form
          class="bg-white p-10 rounded-lg shadow-lg min-w-full"
          @submit.prevent
          enctype="multipart/form-data"
        >
          <h1
            class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans"
          >
            Add an offre
          </h1>
          <div>
            <label
              class="text-left text-gray-800 font-semibold block my-3"
              for="Sujet"
              >Sujet :</label
            >
            <input
              class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none"
              type="textarea"
              name="Sujet"
              v-model="addOffreForm.Sujet"
              id="Sujet"
              placeholder="Sujet"
            />
          </div>
          <div>
            <label
              class="text-left text-gray-800 font-semibold block my-3"
              for="Sujet"
              >Description :</label
            >
            <input
              class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none"
              type="textarea"
              v-model="addOffreForm.Description"
              name="Sujet"
              id="Sujet"
              placeholder="Sujet"
            />
          </div>
          <div>
            <label
              class="text-left text-gray-800 font-semibold block my-3"
              for="Sujet"
              >Description :</label
            >
            <input
              class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none"
              type="file"
              v-on:change="uploadImg"
              name="Sujet"
              id="Sujet"
              placeholder="Sujet"
            />
          </div>

          <div class="mt-4 flex gap-4 justify-center">
            <input
              type="submit"
              @click="addOffer()"
              value="Confirmer"
              class="bg-sky-600 hover:bg-sky-700 p-2"
            />
            <input
              type="submit"
              value="Cancel"
              @click="$emit('close')"
              class="bg-red-600 hover:bg-red-700 text-white-400/0 p-2"
            />
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "AddOffres",
  props: {
    getOffres: {
      type: Function,
    },
  },
  data() {
    return {
      addOffreForm: {
        Description: "",
        Sujet: "",
        image: "",
      },
    };
  },
  methods: {
    uploadImg(e) {
      this.addOffreForm.image = e.target.files[0];
    },
    addOffer() {
      var formData = new FormData();
      formData.append("Sujet", this.addOffreForm.Sujet);
      formData.append("Description", this.addOffreForm.Description);
      formData.append("image", this.addOffreForm.image);
      formData.append("user_id", localStorage.getItem("id"));
      console.log(this.addOffreForm.image);
      axios
        .post("http://localhost:8000/api/Offres", formData)
        .then((result) => {
          if (result) {
            console.log(result.data);
            this.getOffres();
            this.$emit("close");
          }
        });
    },
  },
};
</script>

<style>
</style>