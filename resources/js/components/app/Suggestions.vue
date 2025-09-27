<template>
  <section class="mbr-cards mbr-section mbr-section-nopadding" id="features3-1q" style="margin-top: 5%; margin-bottom: 0%;">
    <div class="mbr-cards-row row">
       <!----suggestiuons Card Component-->
       <template v-for="suggestion in props.suggestions" :key="suggestion.id">
        <card 
         :title="suggestion.title"
         :type="suggestion.genre ? 'Music' : suggestion.endpoint ? 'Video' : 'News'" 
         :description="suggestion.description" 
         :btnClass="suggestion.genre ? 'btn-info' : suggestion.endpoint ? 'btn-black' : 'btn-success'" 
         :image="suggestion.image" 
         :action="suggestion.genre ? 'Dwonload' : suggestion.endpoint ? 'Play' : 'Read More'" />
       </template>

     </div>
  </section>
</template>

<script setup lang="ts">
    import card from './card.vue';
    const props = defineProps({
      suggestions:{
        type:[Object],
        required:true,
      }
    })
</script>

<style scoped>

</style>