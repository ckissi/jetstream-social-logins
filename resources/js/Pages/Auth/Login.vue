<template>
  <Head title="Log in" />

  <jet-authentication-card>
    <template #logo>
      <jet-authentication-card-logo />
    </template>

    <jet-validation-errors class="mb-4" />

    <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
      {{ status }}
    </div>
    <div
      v-if="
        $page.props.show_login.google ||
        $page.props.show_login.twitter ||
        $page.props.show_login.facebook
      "
    >
      <div class="flex flex-col my-6 mb-8 space-y-3">
        <button-social
          v-if="$page.props.show_login.google"
          text="Login With Google"
          link="/login/google"
        ></button-social>
        <button-social
          v-if="$page.props.show_login.twitter"
          text="Login With Twitter"
          type="twitter"
          link="/login/twitter"
        ></button-social>
        <button-social
          v-if="$page.props.show_login.facebook"
          text="Login With Facebook"
          type="facebook"
          link="/login/facebook"
        ></button-social>
      </div>
      <div
        class="block w-full mb-20 bg-gray-500 border-t"
        v-if="$page.props.show_login.email_pass"
      ></div>
      <div
        class="block w-10 pt-1 mx-auto mb-2 -mt-24 font-medium text-center text-gray-400 bg-white"
        v-if="$page.props.show_login.email_pass"
      >
        OR
      </div>
    </div>
    <form @submit.prevent="submit" v-if="$page.props.show_login.email_pass">
      <div>
        <jet-label for="email" value="Email" />
        <jet-input
          id="email"
          type="email"
          class="block w-full mt-1"
          v-model="form.email"
          required
          autofocus
        />
      </div>

      <div class="mt-4">
        <jet-label for="password" value="Password" />
        <jet-input
          id="password"
          type="password"
          class="block w-full mt-1"
          v-model="form.password"
          required
          autocomplete="current-password"
        />
      </div>

      <div class="flex justify-between mt-4">
        <label class="flex items-center">
          <jet-checkbox name="remember" v-model:checked="form.remember" />
          <span class="ml-2 text-sm text-gray-600">Remember me</span>
        </label>
        <Link
          v-if="canResetPassword"
          :href="route('password.request')"
          class="text-sm text-gray-600 underline hover:text-gray-900"
        >
          Forgot your password?
        </Link>
      </div>

      <div class="flex items-center justify-center mt-4">
        <jet-button
          class="justify-center w-full"
          :class="{ 'opacity-25': form.processing, 'py-4': true }"
          :disabled="form.processing"
        >
          Log in
        </jet-button>
      </div>
      <div class="flex items-center justify-center mt-8 mb-4 space-x-2">
        <span>Not registered yet?</span>
        <Link
          :href="route('register')"
          class="text-sm text-gray-600 underline hover:text-gray-900"
        >
          Create account an Account.
        </Link>
      </div>
    </form>
  </jet-authentication-card>
</template>

<script>
import { defineComponent } from "vue";
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard.vue";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetCheckbox from "@/Jetstream/Checkbox.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import ButtonSocial from "@/Jetstream/ButtonSocial.vue";

export default defineComponent({
  components: {
    Head,
    JetAuthenticationCard,
    JetAuthenticationCardLogo,
    JetButton,
    JetInput,
    JetCheckbox,
    JetLabel,
    JetValidationErrors,
    Link,
    ButtonSocial,
  },

  props: {
    canResetPassword: Boolean,
    status: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        email: "",
        password: "",
        remember: false,
      }),
    };
  },

  methods: {
    submit() {
      this.form
        .transform((data) => ({
          ...data,
          remember: this.form.remember ? "on" : "",
        }))
        .post(this.route("login"), {
          onFinish: () => this.form.reset("password"),
        });
    },
  },
});
</script>
