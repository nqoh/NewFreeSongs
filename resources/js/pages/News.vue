<template>
    <search />

    <section class="mbr-cards mbr-section mbr-section-nopadding" id="features3-1q">
     <div class="mbr-cards-row row" v-for="(i,RowIndex) in 3" :key="i">
       <!----Music Card Component-->
       <template v-for="article in News.data.slice(RowIndex, RowIndex + 1 * 3)" :key="article.id">
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

    <Head title="News |" />

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