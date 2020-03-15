<template>
  <div>
    <div class="flex w-full">
      <input
        class="border flex-grow px-5 py-3 rounded-full m-2 -mr-2 rounded-r-none outline-none border-none text-gray-900"
        type="url"
        name="url"
        id="url"
        ref="copy"
        v-model="link.shortenLink"
      />
      <input
        class="cursor-pointer border px-5 py-3 rounded-full m-2 bg-blue-400 outline-none border-none text-gray-100 rounded-l-none"
        type="submit"
        value="Copy"
        ref="btncopy"
        @click="copy"
      />
    </div>
    <div class="w-full border rounded border-gray-600">
        <p class="text-gray-100 mb-2 px-5 font-semibold" v-text="domain"></p>
        <a :href="link.url" class="px-5 text-blue-400 mb-2" v-text="link.url"></a>
        <div class="flex flex-grow items-baseline">
          <a :href="link.code" class="px-5 text-blue-400 mb-2" v-text="link.shortenLink"></a>
          <button
            class="cursor-pointer border p-1 pt-0 rounded m-2 bg-blue-400 outline-none border-none text-gray-100"
            @click="copy"
          >Copy</button>
          <button
            class="cursor-pointer border p-1 pt-0 rounded m-2 bg-blue-400 outline-none border-none text-gray-100"
            @click="share = true"
          >Share</button>
        </div>
    </div>
    <share v-if="share" @close="share=false" :data="link" @copy="copy"></share>
  </div>
</template>
<script>
import share from "./Share";
export default {
  props: ["data"],
  components: { share },
  data() {
    return {
      link: this.data,
      share: false
    };
  },
  computed: {
    domain() {
      if (!this.link.url) {
        return;
      }
      return new URL(this.link.url).hostname;
    }
  },
  methods: {
    copy() {
      this.$refs.copy.select();
      if (document.execCommand("copy")) {
        this.$refs.btncopy.value = "Copied";
        window.navigator.vibrate(200);
      }
    }
  }
};
</script>