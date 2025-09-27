<template>
  <section class="mbr-cards mbr-section mbr-section-nopadding" id="features3-1q" style="margin-top: 5%; margin-bottom: 0%;">
    <div class="mbr-cards-row row">
       <!----suggestiuons Card Component-->
     <card title="HEAVY-K ft Mbuso Khoza - Thatha" type="Music" description="After Heavy-K aka Drumboss Played his one hour set on LockDownHouseparty hosted by Channel O on DStv. He released a song, that will be on the next EP (KHUSTAEP ). The song is Called Thatha fearing Mbuso Khoza." 
        btnClass="btn-info" image="test.jpg" action="Download" v-for="i in 3" :key="i" />
     </div>
  </section>
</template>

<script setup lang="ts">
    import card from './card.vue';
</script>

<style scoped>

</style>