<template>
    <search />

    <section class="mbr-cards mbr-section mbr-section-nopadding" id="features3-1q">
     <div class="mbr-cards-row row" v-for="(i,RowIndex) in 3" :key="i">
       <!----Music Card Component-->
       <template v-for="article in News.data.slice(RowIndex * 3 , (RowIndex + 1)  * 3)" :key="article.id">
       <card 
         :title="article.title"
         type="Article" 
         :description="article.description" 
         btnClass="btn-success" 
         :image="article.image" 
         action="Read More" 
          />
        </template>
     </div>
      <pagination :meta="News.meta" />
   </section>

    <sharePage />

    <Head>
      <meta name="description"
            content="Read news for new music and artist At NewFreeSongs, enjoy." />

      <meta name="keywords"
            content="music news,piano news, house news, read music articles " />
        <!--- Open Graph --->
      <meta property="og:title"
            content="Music News | NewFreeSongs" /> 

      <meta property="og:description"
            content="Read new news for music and artist At NewFreeSongs, enjoy." /> 

      <meta  property='og:image' 
             content="https://newfreesongs.com/public/assets/images/log.png" />  

      <meta  property='og:url' 
             content="https://newfreesongs.com/news" />

      <meta  property='og:type' 
             content="website" />

      <meta  property='og:site_name' 
             content="NewFreeSongs" />

         <!--- Twitter Card --->
      <meta  name='twitter:card' 
             content="https://newfreesongs.com/public/assets/images/log.png" />

      <meta  name='twitter:title' 
             content="Music News | NewFreeSongs" />

     <meta  name='twitter:description' 
            content="Read new news for music and artist At NewFreeSongs, enjoy." />
     
     <title>News | </title>
    </Head> 

</template>

<script setup lang="ts">
import search from      '@/components/app/Search.vue'
import pagination from '@/components/app/pagination.vue';
import sharePage from '@/components/app/sharePage.vue';
import card from '@/components/app/card.vue';

defineProps(['News']);
</script>

<style scoped>

</style>