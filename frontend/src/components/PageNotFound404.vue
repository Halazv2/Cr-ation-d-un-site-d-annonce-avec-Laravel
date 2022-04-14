<template>
  <div>
    <div class="h-screen w-screen bg-gray-100 flex items-center justify-center">
      <div>
        <img
          class="rounded-full"
          src="https://media.istockphoto.com/vectors/error-page-or-file-not-found-icon-vector-id924949200?k=20&m=924949200&s=170667a&w=0&h=-g01ME1udkojlHCZeoa1UnMkWZZppdIFHEKk6wMvxrs="
          alt=""
        />
      </div>
      <div
        class="
          flex flex-col
          md:flex-row
          items-center
          justify-center
          px-5
          text-gray-700
        "
      >
        <div class="max-w-md">
          <div class="text-5xl font-dark font-bold">404</div>
          <p class="text-2xl md:text-3xl font-light leading-normal">
            Sorry we couldn't find this page.
          </p>
          <p class="mb-8">
            But dont worry, you can find plenty of other things on our homepage.
          </p>
          <router-link to="/">
            <button
              class="
                w-full
                py-3
                px-6
                text-center
                transition
                text-gray-100
                font-mono
                bg-gray-700
                shadow-xl
                hover:bg-gray-600
                active:bg-gray-700
                focus:bg-gray-600
                sm:w-max
              "
            >
              Back to Home
            </button>
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "PageNotFound",
};
</script>
