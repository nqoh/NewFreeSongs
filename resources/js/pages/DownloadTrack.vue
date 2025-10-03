<template>
   
    <TrackCard :Track="Track" />
     <Suggestions :suggestions="suggestions" /> 
    <sharePage />

    <Head>

      <meta name='description' 
           content='Download and Stream this song for free and more at NewFreeSongs, enjoy.' />
        <!--- Open Graph --->
      <meta property='og:title' 
            :content='props.Track.title.toUpperCase()' />

      <meta property='og:description' 
            content='Download and Stream this song for free and more at NewFreeSongs, enjoy.' />

      <meta property='og:image' 
           :content='`https://newfreesongs.com/public/images/${props.Track.image}`' />

      <meta  property='og:url' 
             :content="`https://newfreesongs.com/music/${props.Track.title}`" />

      <meta  property='og:type' 
             content="website" />

      <meta  property='og:site_name' 
             content="NewFreeSongs" />

         <!--- Twitter Card --->
      <meta name='twitter:card' 
            content="https://newfreesongs.com/public/assets/images/log.png" />

      <meta name='twitter:title' 
            :content='props.Track.title.toUpperCase()' />

     <meta name='twitter:description' 
           content="Download and Stream this song for free and more at NewFreeSongs, enjoy." />

      <title>Download |</title>

    </Head>
</template>

<script setup lang="ts">
import sharePage from '@/components/app/sharePage.vue';
import TrackCard from '@/components/music/TrackCard.vue';
import Suggestions from '@/components/app/Suggestions.vue';
const props = defineProps(['Track','suggestions'])
</script>

<style scoped>

</style>