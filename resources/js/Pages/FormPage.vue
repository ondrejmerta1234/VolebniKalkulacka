<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';

const questions = [
    'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'
];

const answers = ref([]); 
const currentIndex = ref(0); //ref for tracking the current question index (auto updates the UI when changed)
const currentAnswer = ref(0);
const test = ref('test');
function nextQuestion(){
    answers.value[currentIndex.value] = currentAnswer.value;
    currentIndex.value++;
    currentAnswer.value = answers.value[currentIndex.value] ?? 0; //nastavi na 0 pokud neni odpoved
}
function prevQuestion(){
    answers.value[currentIndex.value] = currentAnswer.value;
    currentIndex.value--;
    currentAnswer.value = answers.value[currentIndex.value] ?? 0; //nastavi na
}
function submitForm(){
    answers.value[currentIndex.value] = currentAnswer.value;
    console.log(answers.value);
    router.post('/form', { questions: answers.value })
}
</script>

<style scoped>

</style>



<template>
    <AppLayout>

    <div class="w-full max-w-lg">
      <p class="mb-2 font-semibold">Otázka {{ currentIndex + 1 }} / {{ questions.length }}</p>
      <div class="mb-4">
        {{ questions[currentIndex] }}
        {{ currentAnswer }}
      </div>

      <div class="flex gap-4">
    <label>
      <input type="radio" v-model="currentAnswer" :value="2" />
      Silně souhlasím 
    </label>
    <label>
      <input type="radio" v-model="currentAnswer" :value="1" />
      Souhlasím 
    </label>
    <label>
      <input type="radio" v-model="currentAnswer" :value="0" />
      Neutrální 
    </label>
    <label>
      <input type="radio" v-model="currentAnswer" :value="-1" />
      Nesouhlasím 
    </label>
    <label>
      <input type="radio" v-model="currentAnswer" :value="-2" />
      Silně nesouhlasím
    </label>
  </div>

      <div class="flex justify-between">
        <Button
                    v-if="currentIndex > 0"
                    @click="prevQuestion"
                    variant="secondary"
                >
                    Předchozí
                </Button>

                <Button
                    v-if="currentIndex < questions.length - 1"
                    @click="nextQuestion"
                    variant="primary"
                >
                    Další
                </Button>

                <Button
                    v-else
                    @click="submitForm"
                    variant="success"
                >
                    Odeslat
                </Button>
      </div>
    </div>
    </AppLayout>
</template>
  

  