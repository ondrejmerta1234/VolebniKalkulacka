<template>
    <div class="min-h-screen bg-gray-100">
      <header class="bg-blue-600 text-white p-4">
        <h1>Volebni kalkulacka</h1>
      </header>
  
      <main class="main_container">
        <slot /> <!-- Zde bude obsah -->
      </main>
  
      <footer class="bg-gray-800 text-white p-4 text-center">
        &copy; 2025
      </footer>
    </div>
  </template>