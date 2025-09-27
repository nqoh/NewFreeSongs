<template>
    <search />

    <section class="mbr-cards mbr-section mbr-section-nopadding" id="features3-1q">
     <div class="mbr-cards-row row" v-for="(i,RowIndex) in 3" :key="i">
       <!----Music Card Component-->
       <template v-for="video in Videos.data.slice(RowIndex , RowIndex + 1  * 3)" :key="video.id">
        <card 
         :title="video.title"
         type="Video" 
         :description="video.description" 
         btnClass="btn-black"
         :image="video.image" action="Play" />
       </template>

     </div>
      <pagination :meta="Videos.meta" />
   </section>

    <sharePage />
   
    <Head title="Video |" />
</template>

<script setup lang="ts">
import search from      '@/components/app/Search.vue'
import pagination from '@/components/app/pagination.vue';
import sharePage from '@/components/app/sharePage.vue';
import card from '@/components/app/card.vue';

defineProps(['Videos']);
</script>

<style scoped>

</style>