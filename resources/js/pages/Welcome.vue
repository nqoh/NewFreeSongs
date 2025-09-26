<template>
     <div>
       <Search />
       <index :data="data"/>
     </div>
</template>

<script setup lang="ts">
   import Search from '@/components/app/Search.vue'
   import index from '@/components/home/index.vue'
   defineProps(['data']);
</script>

<style scoped>
 
</style>