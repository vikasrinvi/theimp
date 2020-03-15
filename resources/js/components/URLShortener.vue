<template>
  <div class="container w-full">
    <div class="flex w-full">
      <input
        class="flex-grow border px-5 py-3 rounded-full m-2 -mr-2 rounded-r-none outline-none border-none text-gray-900"
        type="url"
        name="url"
        id="url"
        placeholder="https://google.com"
        v-model="url"
      />
      <input
        class="cursor-pointer border px-5 py-3 rounded-full m-2 bg-blue-400 outline-none border-none text-gray-100 rounded-l-none"
        type="submit"
        :value="canShorten ? 'Shorten' :'Wait'"
        :disabled="!canShorten"
        @click="shorten"
      />
    </div>
    <span v-if="error" v-text="error" class="text-red-500 ml-4 -mt-2 text-xs"></span>

    <copy :data="this.link" v-if="canCopy"></copy>
  </div>
</template>

<script>
import copy from "./copy";
export default {
  components: { copy },
  data() {
    return {
      url: "",
      link: "",
      error: "",
      canShorten: true,
      canCopy: false
    };
  },
  methods: {
    shorten() {
      this.canShorten = false;
      this.canCopy = false;
      this.error = "";
      
      axios
        .post("/links", { url: this.url })
        .then(response => {
          this.link = response.data;
          this.canCopy = true;
          this.canShorten = true;
          this.url = "";
        })
        .catch(error => {
          this.canShorten = true;
          this.error = error.response.data.errors.url[0];
        });
    }
  }
};
</script>
