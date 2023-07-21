<template>
  <AuthLayout title="Sign in to your account">
    <form action="#" method="POST" @submit.prevent="login">
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
        <div class="mt-2">
          <input 
            id="email" 
            name="email" 
            type="email" 
            autocomplete="email" 
            required="" 
            v-model="user.email"
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
        </div>
      </div>
      <div class="mt-6">
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
          <div class="text-sm">
            <router-link :to="{name:'request-password'}" class="font-semibold text-indigo-600 hover:text-indigo-500">
              Forgot password?
            </router-link>
          </div>
        </div>
        <div class="mt-2">
          <input 
            id="password" 
            name="password" 
            type="password" 
            autocomplete="current-password"
            required=""
            v-model="user.password"
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" 
          />
        </div>
      </div>
      <button type="submit" class="mt-6 flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
        Sign in
      </button>
    </form>
    <p class="mt-10 text-center text-sm text-gray-500">
      Not a member?
      {{ ' ' }}
      <a href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">
        Start a 14 day free trial
      </a>
    </p>
  </AuthLayout>
</template>

<script setup>
import {ref} from 'vue'
import AuthLayout from '../components/AuthLayout.vue';
import store from "../store/index"

let loading = ref(false);
let errorMsg = ref("");

const user = {
  email: '',
  password: '',
  remember: false
}

function login() {
  loading.value = true;
  store.dispatch('login', user)
    .then(() => {
      loading.value = false;
      router.push({name: 'request-password'})
    })
    .catch(({response}) => {
      loading.value = false;
      // errorMsg.value = response.data.message
    })
}

</script>

<style scoped>

</style>
