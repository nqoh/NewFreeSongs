<template>
    <FilterLinks :Genre="Genre"/>

    <section class="mbr-cards mbr-section mbr-section-nopadding" id="features3-1q">
     <div class="mbr-cards-row row" v-for="(i, RowIndex) in 3" :key="i">
       <!----Music Card Component-->
       <template v-for="track in Music.data.slice(RowIndex,RowIndex + 1  * 3)" :key="track.id">
        <card 
        :title="track.title" 
        type="Music" 
        :description="track.description" 
        btnClass="btn-info"
        :image="track.image"
        action="Download"
        />
       </template>

     </div>
      <pagination  :meta="Music.meta" :Genre="Genre" />
   </section>

    <sharePage />   
    <Head title="Music |" />
</template>

<script setup lang="ts">
import FilterLinks from '@/components/music/filterLinks.vue'
import pagination from '@/components/app/pagination.vue';
import sharePage from '@/components/app/sharePage.vue';
import card from '@/components/app/card.vue';
defineProps(['Music','Genre']);
</script>

<style scoped>

</style>