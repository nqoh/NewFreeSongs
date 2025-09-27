<template>
   
    <ArticleCard :Article="Article"/>
     <CommentsCard /> 
    <sharePage />

    <Head title="Article |" />
</template>

<script setup lang="ts">
import sharePage from '@/components/app/sharePage.vue';
import ArticleCard from '@/components/news/ArticleCard.vue';
import CommentsCard from '@/components/news/CommentsCard.vue';
defineProps(['Article']);
</script>

<style scoped>

</style>