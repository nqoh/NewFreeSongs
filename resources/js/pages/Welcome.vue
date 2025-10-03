<template>
     <div>
       <Search />
       <index :data="data"/>
       <sharePage />
     </div>
      <Head>
        <meta  name='description' 
               content="Download and Stream new free songs at NewFreeSongs, watch music videos, and read news." />

         <meta  name='keywords' 
                content="download mp3, free mp3, oline music, newfreesongs, free music, 2026 music, stream music"/>
        
         <!--- Open Graph --->
         <meta  property='og:title' 
               content="Home | NewFreeSongs" />

         <meta  property='og:description' 
               content="Download and Stream the latest songs, watch music videos, and read news at NewFreeSongs" />

         <meta  property='og:image' 
                content="https://newfreesongs.com/public/assets/images/log.png" />

         <meta  property='og:url' 
                content="https://newfreesongs.com" />

         <meta  property='og:type' 
                content="website" />

         <meta  property='og:site_name' 
               content="NewFreeSongs" />

         <!--- Twitter Card --->

         <meta  name='twitter:card' 
                content="https://newfreesongs.com/public/assets/images/log.png" />

         <meta  name='twitter:title' 
                content="Home | NewFreeSongs" />

         <meta  name='twitter:description' 
                content="Download and Stream the latest songs, watch music videos, and read news at NewFreeSongs" />
                
         <title>Home |</title>
      </Head>
</template>

<script setup lang="ts">
   import Search from '@/components/app/Search.vue'
   import index from '@/components/home/index.vue'
   import sharePage from '@/components/app/sharePage.vue';
   defineProps(['data']);
</script>

<style scoped>
 
</style>