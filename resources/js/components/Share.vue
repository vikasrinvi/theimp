<template>
  <div>
    <!--  Share fallback -->
    <div
      class="share-dialog w-full bottom-0 left-0 bg-gray-100 text-gray-900 fixed pin z-50 overflow-auto rounded border px-8">
      <header class="flex justify-between">
        <h3 class="dialog-title text-lg font-semibold">Share this link</h3>
        <button class="close-button" @click="$emit('close')">
          <svg class="w-5 h-5 mr-8">
            <use href="#close" />
          </svg>
        </button>
      </header>
      <div class="targets flex flex-col md:flex-row">
        <a
          class="button inline-block border rounded mt-4 w-full md:ml-2"
          target="_blank"
          :href="'https://www.facebook.com/sharer/sharer.php?u='+url"
        >
          <div class="flex p-2 items-center justify-center">
            <svg class="w-5 h-5 mr-8">
              <use href="#facebook" />
            </svg>
            <span>Facebook</span>
          </div>
        </a>

        <a
          class="button inline-block border rounded mt-4 w-full md:ml-2"
          target="_blank"
          :href="'https://twitter.com/intent/tweet?text=Check%20out%20'+url"
        >
          <div class="flex p-2 items-center justify-center">
            <svg class="w-5 h-5 mr-8">
              <use href="#twitter" />
            </svg>
            <span>Twitter</span>
          </div>
        </a>

        <a
          class="button inline-block border rounded mt-4 w-full md:ml-2"
          target="_blank"
          :href="'https://www.linkedin.com/shareArticle?mini=true&url='+url+'&title=Check%20out%20this&summary=&source='"
        >
          <div class="flex p-2 items-center justify-center">
            <svg class="w-5 h-5 mr-8">
              <use href="#linkedin" />
            </svg>
            <span>LinkedIn</span>
          </div>
        </a>

        <a
          class="button inline-block border rounded mt-4 w-full md:ml-2"
          target="_blank"
          :href="'mailto:?subject=Check%20out%20this&body='+url"
        >
          <div class="flex p-2 items-center justify-center">
            <svg class="w-5 h-5 mr-8">
              <use href="#email" />
            </svg>
            <span>Email</span>
          </div>
        </a>
      </div>
      <div class="link mt-4 md:flex md:items-baseline">
        <div class="pen-url text-sm md:text-lg" v-text="url"></div>
        <button
          class="copy-link mb-2 inline-block bg-blue-400 text-gray-100 border rounded mt-2 md:ml-3 px-1"
          @click="$emit('copy')"
        >Copy Link</button>
      </div>
    </div>
    <svg class="w-5 h-5 mr-8 hidden">
      <defs>
        <symbol
          id="share-icon"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="feather feather-share"
        >
          <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8" />
          <polyline points="16 6 12 2 8 6" />
          <line x1="12" y1="2" x2="12" y2="15" />
        </symbol>

        <symbol
          id="facebook"
          viewBox="0 0 24 24"
          fill="#3b5998"
          stroke="#3b5998"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="feather feather-facebook"
        >
          <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
        </symbol>

        <symbol
          id="twitter"
          viewBox="0 0 24 24"
          fill="#1da1f2"
          stroke="#1da1f2"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="feather feather-twitter"
        >
          <path
            d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"
          />
        </symbol>

        <symbol
          id="email"
          viewBox="0 0 24 24"
          fill="#777"
          stroke="#fafafa"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="feather feather-mail"
        >
          <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
          <polyline points="22,6 12,13 2,6" />
        </symbol>

        <symbol
          id="linkedin"
          viewBox="0 0 24 24"
          fill="#0077B5"
          stroke="#0077B5"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="feather feather-linkedin"
        >
          <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
          <rect x="2" y="9" width="4" height="12" />
          <circle cx="4" cy="4" r="2" />
        </symbol>

        <symbol
          id="close"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="feather feather-x-square"
        >
          <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
          <line x1="9" y1="9" x2="15" y2="15" />
          <line x1="15" y1="9" x2="9" y2="15" />
        </symbol>
      </defs>
    </svg>
  </div>
</template>
<script>
export default {
  props: ["data"],
  data() {
    return {
      link: this.data,
      url:this.data.shortenLink
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
    share() {
      if (navigator.share) {
        navigator
          .share({
            title: "web.dev",
            text: "Check out " + this.domain,
            url: this.link.shortenLink
          })
          .then(() => console.log("Successful share"))
          .catch(error => {
            console.log("Error sharing", error);
          });
      } else {
        this.$refs.share.classList.remove("hidden");
      }
    }
  }
};
</script>