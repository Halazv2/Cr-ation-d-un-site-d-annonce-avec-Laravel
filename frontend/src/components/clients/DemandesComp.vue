<template>
  <div>
    <!-- <h1>This is an demande page</h1> -->
    <div class="py-16">
      <div class="container m-auto px-6 text-gray-500 md:px-12 xl:px-0">
        <div class="mx-auto flex col gap-6 md:w-3/5">
          <div
            class="bg-white rounded-2xl shadow-xl px-8 py-12 sm:px-12 lg:px-8"
          >
            <div class="mb-12 space-y-4 flex flex-wrap">
              <div class="flex items-center">
                <div class="flex ">
                  <img
                    class="w-16 h-16 mx-auto rounded-full"
                    src="https://tailus.io/sources/blocks/grid-cards/preview/images/avatars/second_user.webp"
                    alt="user avatar"
                    height="220"
                    width="220"
                    loading="lazy"
                  />
                  <h3 class="flex items-center px-2 text-black">Joe Biden</h3>
                </div>
                <div class="flex relative justify-end ">
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
                        z-20
                      "
                    >
                      <a
                        href="#"
                        class="
                          block
                          px-4
                          py-2
                          text-sm
                          capitalize
                          text-blue-700
                        "
                      >
                        Edit 
                      </a>
                      <a
                        href="#"
                        class="
                          block
                          px-4
                          py-2
                          text-sm
                          capitalize
                          text-red-700
                          
                        "
                      >
                        Delete
                      </a>
                    </div>
                  </div>
                </div>
              </div>  
              <div>
                <h3 class="text-2xl font-semibold text-left text-blue-700">
                  I need this book "Sapiens"
                </h3>
                <p class="mb-6 text-left">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Voluptatum quae vitae accusantium quisquam enim, ullam culpa
                  dolor magni itaque neque.
                </p>
                <img
                  src="../../assets/img/sapiens.jpg"
                  class="rounded"
                  alt=""
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "DemandsComp",
};
</script>

<style>
</style>