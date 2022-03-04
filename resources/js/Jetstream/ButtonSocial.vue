<template>
  <a
    class="flex items-center justify-center p-3 space-x-4 border rounded hover:border-gray-300 hover:bg-gray-100"
    :href="link"
  >
    <google v-if="type == 'google'"></google>
    <facebook v-if="type == 'facebook'"></facebook>
    <twitter v-if="type == 'twitter'"></twitter>
    <div class="font-semibold">{{ text }}</div>
  </a>
</template>

<script>
import Google from "@/Components/Svgs/Google.vue";
import Facebook from "@/Components/Svgs/Facebook.vue";
import Twitter from "@/Components/Svgs/Twitter.vue";
export default {
  components: {
    Google,
    Facebook,
    Twitter,
  },
  props: {
    text: {
      type: String,
      default: "Login with",
    },
    link: {
      type: String,
      default: "#",
    },
    type: {
      type: String,
      default: "google",
    },
  },
};
</script>

<style lang="scss" scoped></style>
