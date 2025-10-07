<template>
  <div class="form-group" style=" border: 1px solid #d0f0ee;"  >
     <input type="text"  v-model="query" class="form-control" 
         placeholder="Search..." ref="searchInput"  />  
  </div>
</template>

<script setup lang="ts">
 import {  ref, watch , onMounted} from 'vue';
 import { router   } from '@inertiajs/vue3';
 import { route } from 'ziggy-js';

  const props = defineProps({
      Query:{
        type:String 
      }
  })

    const query = ref(props.Query)
     
     let debounceTimeout = null as any;
     const searchInput = ref<HTMLInputElement | null>(null);

    watch(query, (newVal) => {
       if (debounceTimeout) {
        clearTimeout(debounceTimeout)
      }
    debounceTimeout = setTimeout(() => {
        router.get(route('Edit'),{query: newVal })
        searchInput.value?.focus()
       }, 1000)
    })

    onMounted(() => {
     searchInput.value?.focus()
     })
</script>

<style scoped>

</style>