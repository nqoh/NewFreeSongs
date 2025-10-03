<template>
   
    <ArticleCard :Article="Article"/>
     <CommentsCard :comments="Article.comments" :id="Article.id" /> 
    <sharePage />

    <Head>

      <meta name='description' 
            content="Read this article for free and more at NewFreeSongs, enjoy" />
      <!--- Open Graph --->
      <meta property='og:title' 
            :content="props.Article.title.toUpperCase()" />

      <meta property='og:description'  
            content="Read this article and comment's for free and more at NewFreeSongs, enjoy." />

      <meta property='og:image' 
            :content='`https://newfreesongs.com/public/images/${props.Article.image}`' />

      <meta property='og:url' 
            :content="`https://newfreesongs.com/news/${props.Article.title}`" />

     <meta property='og:type' 
           content="website" />

    <meta property='og:site_name' 
          content="NewFreeSongs" />

         <!--- Twitter Card --->
    <meta name='twitter:card' 
          content="https://newfreesongs.com/public/assets/images/log.png" />

    <meta name='twitter:title' 
          :content="`${props.Article.title.toUpperCase()}`" />

    <meta name='twitter:description' 
          content="Read this article and comment's for free and more at NewFreeSongs, enjoy." />
         
    <title>Read Article |</title>

    </Head>
</template>

<script setup lang="ts">
import sharePage from '@/components/app/sharePage.vue';
import ArticleCard from '@/components/news/ArticleCard.vue';
import CommentsCard from '@/components/news/CommentsCard.vue';
const props = defineProps(['Article']);
</script>

<style scoped>

</style>