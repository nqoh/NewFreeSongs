<template>
    <search :Query="Query"/>
    <div align="center"  v-if="Data.total">
        <h1 class="title"  style="margin-top: -1%; "> {{ Data.total }} Results</h1>
    </div>
   
    <section class="mbr-cards mbr-section mbr-section-nopadding" id="features3-1q">
        <div class="mbr-cards-row row" v-for="(i,RowIndex) in 3" :key="i">
            <template v-for="data in Data.data.slice(RowIndex , RowIndex + 1  * 3)" :key="data.id">
                <card
               :title="data.title" 
               :type="data.genre ? 'Music' : data.endpoint ? 'Video' : 'News'" 
               :description="data.description" 
               :btnClass="data.genre ? 'btn-info' : data.endpoint ? 'btn-black' : 'btn-success'" 
               :image="data.image" :action="data.genre ? 'Dwonload' : data.endpoint ? 'Play' : 'Read More'"
               />
            </template>
        </div>
     </section>

     <div v-if="!Data.total" align="center" >
        <h1 class="title display-1">No Results Found</h1>
        <h2 class="title">{{ Query }}</h2>
     </div>
    
     <pagination  :meta="meta" :Query="Query" />
</template>

<script setup lang="ts">
import search from      '@/components/app/Search.vue'
import card from '@/components/app/card.vue';
import pagination from '@/components/app/pagination.vue';
import { reactive  } from 'vue';

const props = defineProps(['Data','Query']);

const meta = reactive({
    current_page: props.Data.current_page,
    last_page: props.Data.last_page,
    path: props.Data.path
})


</script>

<style scoped>

</style>