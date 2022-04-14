<template>
  <header class=" py-28">
    <div
      class="container m-auto px-6 space-y-8 text-gray-500 md:px-12 lg:px-20"
    >
      <div
        class="
          justify-center
          text-center
          gap-6
          md:text-center md:flex
          lg:items-center lg:gap-16
        "
      >
        <div class="order-last mb-6 space-y-6 md:mb-0 2">
          <h1 class="text-4xl text-gray-100 font-bold md:text-5xl">
            Place where you can share books with other
            <span class="text-blue-500">book lovers</span>
          </h1>
          <p class="text-lg text-gray-100">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam,
            fuga.
          </p>
          <div
            class="
              flex flex-row-reverse flex-wrap
              justify-center
              gap-4
              md:gap-6 
            "
          >
            <button
              type="button"
              title="Start sharing"
              class="
                w-full
                py-3
                px-6
                text-center
                transition
                bg-gray-700
                shadow-xl
                hover:bg-gray-600
                active:bg-gray-700
                focus:bg-gray-600
                sm:w-max
              "
            >
              <span class="block text-white font-semibold">
                Start sharing
              </span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  name: "HeaderComp",
};
</script>
<style scoped>
header{
    background-image: url('https://images.pexels.com/photos/1122865/pexels-photo-1122865.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
