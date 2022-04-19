<template>
  <div>
    <header class="hero"></header>
    <div class="flex justify-center">
      <div class="w-3/5">
        <form
          class="bg-white p-10 rounded-lg shadow-lg min-w-full"
          @submit.prevent
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
export default {
  name: "AddOffres",
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
      this.image = e.target.files[0];
      console.log(this.image);
    },
    addOffer() {
      var myHeaders = new Headers();
      myHeaders.append("Accept", "application/json");
      myHeaders.append("Content-Type", "multipart/form-data");
      myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

      var urlencoded = new URLSearchParams();
      urlencoded.append("Sujet", this.addOffreForm.Sujet);
      urlencoded.append("Description", this.addOffreForm.Description);
      urlencoded.append("image", this.addOffreForm.image);
      urlencoded.append("user_id", localStorage.getItem("id"));

      var requestOptions = {
        method: "POST",
        headers: myHeaders,
        body: urlencoded,
        // redirect: "follow",
      };

      fetch("http://127.0.0.1:8000/api/Offres", requestOptions)
        .then((response) => response.json())
        .then((result) => console.log(result))
        .catch((error) => console.log("error", error));
    },
  },
};
</script>

<style>
</style>