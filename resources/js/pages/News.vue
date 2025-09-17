<template>
    <search />

    <section class="mbr-cards mbr-section mbr-section-nopadding" id="features3-1q">
     <div class="mbr-cards-row row" v-for="i in 3" :key="i">
       <!----Music Card Component-->
       <card title="HEAVY-K ft Mbuso Khoza - Thatha" type="music" description="After Heavy-K aka Drumboss Played his one hour set on LockDownHouseparty hosted by Channel O on DStv. He released a song, that will be on the next EP (KHUSTAEP ). The song is Called Thatha fearing Mbuso Khoza." 
        btnClass="btn-success" image="test.jpg" action="Read More" v-for="i in 3" :key="i" />
     </div>
      <pagination />
   </section>

    <sharePage />

    <Head title="News |" />
</template>

<script setup lang="ts">
import search from      '@/components/app/Search.vue'
import pagination from '@/components/app/pagination.vue';
import sharePage from '@/components/app/sharePage.vue';
import card from '@/components/app/card.vue';
</script>

<style scoped>

</style>