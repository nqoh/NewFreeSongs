<template>
 <section class="mbr-cards mbr-section mbr-section-nopadding" id="features3-1u">
  
    <div class="mbr-cards-row row" v-for="(i, RowIndex) in 3" :key="i" >
        <!----Card Component-->
        <template v-for="item in props.data[RowIndex]" :key="item.id">
          <card
               :title="item.title" 
               :type="item.genre ? 'Music' : item.endpoint ? 'Video' : 'News'" 
               :description="item.description.substr(1,450)+ '...'" 
               :btnClass="item.genre ? 'btn-info' : item.endpoint ? 'btn-black' : 'btn-success'" 
               :image="item.image" :action="item.genre ? 'Dwonload' : item.endpoint ? 'Play' : 'Read More'"
           />
        </template>
    </div>

</section>
</template>

<script setup lang="ts">

import card from '../app/card.vue'
  const props = defineProps({
      data:{
      required:true,
      type: [Object]
    }
  })

</script>

<style scoped>

</style>