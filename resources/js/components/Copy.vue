<template>
  <div>
    <div class="flex w-full">
      <input
        class="border flex-grow pl-4 pr-2 md:px-5 py-3 rounded-full m-2 -mr-2 rounded-r-none outline-none border-none text-gray-900"
        type="url"
        name="url"
        id="url"
        ref="copy"
        v-model="link.shortenLink"
      />
      <input
        class="cursor-pointer borde px-2 md:px-5 py-3 rounded-full m-2 bg-blue-400 outline-none border-none text-gray-100 rounded-l-none"
        type="submit"
        value="Copy"
        ref="btncopy"
        @click="copy"
      />
    </div>
    <div class="w-full flex flex-col border rounded border-gray-600">
      <p class="text-gray-100 mb-2 px-5 font-semibold" v-text="domain"></p>
      <a :href="link.url" class="px-5 text-blue-400 mb-2" v-text="link.url"></a>
      <a :href="link.shortenLink" class="px-5 text-blue-400 mb-2" v-text="link.shortenLink"></a>
      <div class="flex px-5 flex-grow items-baseline">
        <button
          class="bg-blue-100 active:bg-blue-200 text-blue-800 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md font-bold text-xs"
          @click="copy"
        >Copy</button>
        <button
          class="bg-blue-100 active:bg-blue-200 text-blue-800 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md font-bold text-xs"
          @click="shareLink"
        >Share</button>
      </div>
    </div>
    <share v-if="sharefallback" @close="sharefallback=false" :data="link" @copy="copy"></share>
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
      sharefallback: false
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
    },
    shareLink() {
      if (navigator.share) {
        navigator
          .share({
            title: "theImp URL Shortener",
            text: "Check out " + this.domain,
            url: this.link.shortenLink
          })
          .then(() => console.log("Successful share"))
          .catch(error => {
            console.log("Error sharing", error);
          });
      } else {
        this.sharefallback = true;
      }
    }
  }
};
</script>