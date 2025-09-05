<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
defineProps({
  results: {
    type: Object,
    required: true,
  },
});
</script>

<style scoped>


</style>


<template>
    <AppLayout>
    <div class="min-h-screen flex flex-col justify-center items-center" >
      <h1 class="text-4xl font-bold mb-4">Výsledky</h1>
      <p class="text-lg">Volby 2025</p>
      <div class="mt-6 w-full overflow-hidden bg-white px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg">
        <ul>
          <li v-for="(result, index) in results" :key="index">
            {{ index }}: {{ result + '%' }}
          </li>
        </ul>
      </div>
    </div>
    </AppLayout>
</template>
  

  