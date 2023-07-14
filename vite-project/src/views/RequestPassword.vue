<template>
  <AuthLayout title="Request new password" >
    <form action="#" method="POST" @submit.prevent="requestPassword">
      <label for="email" class="block text-sm font-medium leading-6 text-gray-900"></label>
      <div class="mt-2">
        <input 
          id="email" 
          name="email" 
          type="email" 
          placeholder="Email address" 
          autocomplete="email" 
          required="" 
          class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
      </div>
      <button type="submit" class="mt-6 flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
        Send
      </button>
    </form>
    <p class="mt-10 text-center text-sm text-gray-500">
      <router-link :to="{name:'login'}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">
        Back to Login
      </router-link>
    </p>    
  </AuthLayout>
</template>
  
<script setup>
import AuthLayout from '../components/AuthLayout.vue';

function requestPassword() {
  console.log("Request Password")
}

</script>
  
<style scoped>
  
</style>