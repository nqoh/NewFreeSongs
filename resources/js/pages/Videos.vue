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
   
    <Head>

      <meta name='description' 
            content='Stream new music videos for free and more at NewFreeSongs, enjoy.' />

      <meta name='keywords'
            content='Hipop music video, Stream mp4,Music video, maskandi videos, piano video, download music video ,new free music video ' />
      <!--- Open Graph --->
      <meta property='og:title'
            content='Stream Videos | NewFreeSongs' />

      <meta property='og:description'
            content='Stream new music videos for free and more at NewFreeSongs, enjoy.' />

      <meta property='og:image' 
            content='https://newfreesongs.com/public/assets/images/log.png' />

      <meta property='og:url' 
            content="https://newfreesongs.com/videos" />

      <meta property='og:type' 
            content="website" />

      <meta property='og:site_name' 
            content="NewFreeSongs" />

         <!--- Twitter Card --->
      <meta name='twitter:card' 
            content="https://newfreesongs.com/public/assets/images/log.png" />

      <meta name='twitter:title' 
            content="Stream Videos | NewFreeSongs" />

      <meta name='twitter:description' 
           content="Stream new music videos for free and more at NewFreeSongs, enjoy." />

      <title>Videos |</title>

    </Head>
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