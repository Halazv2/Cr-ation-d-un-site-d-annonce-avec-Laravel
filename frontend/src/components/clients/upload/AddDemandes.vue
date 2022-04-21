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
            Add an demandes
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
              v-model="addDemandForm.Sujet"
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
              v-model="addDemandForm.Description"
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
              @click="AddDemande()"
              value="Confirmer"
              class="bg-sky-600 rounded hover:bg-sky-700 p-2"
            />
            <input
              type="submit"
              value="Cancel"
              @click="$emit('close')"
              class="bg-red-600 hover:bg-red-700 rounded text-white-400/0 p-2"
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
  name: "addDemand",
  props: {
    getDemands: {
      type: Function,
    },
  },
  data() {
    return {
      addDemandForm: {
        Description: "",
        Sujet: "",
        image: "",
      },
    };
  },
  methods: {
    uploadImg(e) {
      this.addDemandForm.image = e.target.files[0];
    },
    AddDemande() {
      var formData = new FormData();
      formData.append("Sujet", this.addDemandForm.Sujet);
      formData.append("Description", this.addDemandForm.Description);
      formData.append("image", this.addDemandForm.image);
      formData.append("user_id", localStorage.getItem("id"));
      // console.log(this.addDemandForm.image);
      axios
        .post("http://localhost:8000/api/Demandes", formData)
        .then((result) => {
          if (result) {
            // console.log(result.data);
            this.getDemands();
            this.$emit("close");
          }
        });
    },
  },
};
</script>

<style>
</style>