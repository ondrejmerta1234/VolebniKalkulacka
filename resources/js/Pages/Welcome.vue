<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
</script>

<style scoped>
</style>


<template>
    <AppLayout>
    <div class="min-h-screen flex flex-col justify-center items-center" >
      <h1 class="text-4xl font-bold mb-4">Volební Kalkulačka</h1>
      <p class="text-lg">Volby 2025</p>
      <Link href="/form" class="mt-6 w-full overflow-hidden bg-white px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg text-center">
        Vyplnit
      </Link>
    </div>
    </AppLayout>
</template>
  

  