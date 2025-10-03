<template>
   
    <vid />
    <VidoeCard :Video="Video"/>
     <Suggestions :suggestions="suggestions" /> 
    <sharePage />

    <Head>
        <meta name='description'
              content='Stream this video for free and more at NewFreeSongs, enjoy.' />
         <!--- Open Graph --->
        <meta property='og:title' 
              :content='props.Video.title.toUpperCase()' />

        <meta property='og:description'
              content='Stream this video for free and more at NewFreeSongs, enjoy.' />

        <meta property='og:image' 
              :content='`https://newfreesongs.com/public/images/${props.Video.image}`' />

        <meta property='og:url' 
              :content="`https://newfreesongs.com/video/${props.Video.title}`" />

         <meta property='og:type' 
               content="website" />

         <meta property='og:site_name' 
               content="NewFreeSongs" />

         <!--- Twitter Card --->

         <meta name='twitter:card' 
               content="https://newfreesongs.com/public/assets/images/log.png" />

         <meta name='twitter:title' 
               :content='props.Video.title.toUpperCase()' />

         <meta name='twitter:description' 
               content="Stream this video for free and more at NewFreeSongs, enjoy." />

         <meta name='twitter:image' 
               :content='`https://newfreesongs.com/public/images/${props.Video.image}`' />

       <title>Stream Video |</title>
    </Head>  
</template>

<script setup lang="ts">
import sharePage from '@/components/app/sharePage.vue';
import VidoeCard from '@/components/video/VideoCard.vue';
import Suggestions from '@/components/app/Suggestions.vue';
const props = defineProps(['Video','suggestions'])

</script>

<style scoped>

</style>