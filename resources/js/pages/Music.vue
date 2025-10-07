<template>
    <FilterLinks :Genre="Genre"/>

    <section class="mbr-cards mbr-section mbr-section-nopadding" id="features3-1q">
     <div class="mbr-cards-row row" v-for="(i, RowIndex) in 3" :key="i">
       <!----Music Card Component-->
       <template v-for="track in Music.data.slice(RowIndex * 3 , (RowIndex + 1)  * 3)" :key="track.id">
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
    <Head>
        <meta name='description' 
              content="Download and Stream New free songs, today at NewFreeSongs" />

        <meta name='keywords' 
              content="Hipop, Piano, House,  Gqom , Afrobeat, Gospel, Maskandi, free mp3, download ,new free songs" />

        <meta property='og:title' 
              content="Download Music | NewFreeSongs" />

       <meta property='og:description' 
             content="Download and Stream the latest music and more at NewFreeSongs" />

       <meta property='og:image' 
             content="https://newfreesongs.com/public/assets/images/log.png" />


       <meta property='og:url' 
             content="https://newfreesongs.com/music" />

       <meta property='og:type' 
             content="website" />

       <meta property='og:site_name' 
             content="NewFreeSongs" />

         <!--- Twitter Card --->
       <meta name='twitter:card' 
             content="https://newfreesongs.com/public/assets/images/log.png" />

       <meta name='twitter:title' 
             content="Download Music | NewFreeSongs" />

       <meta name='twitter:description' 
             content="Download and Stream the latest music and more at NewFreeSongs" />
        
        <title>Music |</title>
</Head>

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