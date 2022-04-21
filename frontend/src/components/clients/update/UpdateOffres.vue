<template>
  <div class="flex justify-center">
    <div class="w-3/5">
      <form
        class="bg-white p-10 rounded-lg shadow-lg min-w-full"
        @submit.prevent
        enctype="multipart/form-data"
      >
        <h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans">
          Update Offer {{ OffreID }}
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
            v-model="UpdateOffreForm.Sujet"
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
            v-model="UpdateOffreForm.Description"
            name="Sujet"
            id="Sujet"
            placeholder="Description"
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
            @click="UpdateOffre(UpdateOffreForm.id)"
            value="Confirmer"
            class="bg-sky-600 rounded hover:bg-sky-700 p-2"
          />
          <input
            type="submit"
            value="Cancel"
            @click="$emit('close')"
            class="bg-red-600 rounded hover:bg-red-700 text-white-400/0 p-2"
          />
        </div>
      </form>
    </div>
  </div>
</template>
<script>
import axios from "axios";

export default {
  name: "UpdateOffre",
  props: {
    OffreID: Number,
  },
  data() {
    return {
      id_utilisateur: localStorage.getItem("id"),
      UpdateOffreForm: {
        Description: "",
        Sujet: "",
        image: "",
      },
    };
  },

  methods: {
    uploadImg(e) {
      this.UpdateOffreForm.image = e.target.files[0];
    },
    UpdateOffre(id) {
      var formData = new FormData();
      formData.append("Sujet", this.UpdateOffreForm.Sujet);
      formData.append("Description", this.UpdateOffreForm.Description);
      formData.append("image", this.UpdateOffreForm.image);
      formData.append("user_id", localStorage.getItem("id"));
      // console.log(this.UpdateOffreForm);
      axios
        .post(`http://localhost:8000/api/Offres/${id}`, formData)
        .then((result) => {
          console.log(result);
          this.$emit("getOffres");
          this.$emit("close");
        });
    },
  },
  mounted() {
    fetch(`http://127.0.0.1:8000/api/Offres/${this.OffreID}`, {
      method: "GET",
    })
      .then((result) => result.json())
      .then((res) => {
        this.UpdateOffreForm = res;
      });
  },
};
</script>
