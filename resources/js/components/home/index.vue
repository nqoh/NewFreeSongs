<template>
 <section class="mbr-cards mbr-section mbr-section-nopadding" id="features3-1u">
  
    <div class="mbr-cards-row row" v-for="i in 3" :key="i" >
     
        <!----Music Card Component-->
      <card title="HEAVY-K ft Mbuso Khoza - Thatha" type="music" description="After Heavy-K aka Drumboss Played his one hour set on LockDownHouseparty hosted by Channel O on DStv. He released a song, that will be on the next EP (KHUSTAEP ). The song is Called Thatha fearing Mbuso Khoza." 
        btnClass="btn-info" image="test.jpg" action="Download" />

        <!----News Card Component-->
        <card title="HEAVY-K ft Mbuso Khoza - Thatha" type="News" description="After Heavy-K aka Drumboss Played his one hour set on LockDownHouseparty hosted by Channel O on DStv. He released a song, that will be on the next EP (KHUSTAEP ). The song is Called Thatha fearing Mbuso Khoza." 
        btnClass="btn-success" image="test.jpg" action="Read More" />

         <!----Video Card Component-->
        <card title="HEAVY-K ft Mbuso Khoza - Thatha" type="Video" description="After Heavy-K aka Drumboss Played his one hour set on LockDownHouseparty hosted by Channel O on DStv. He released a song, that will be on the next EP (KHUSTAEP ). The song is Called Thatha fearing Mbuso Khoza." 
        btnClass="btn-black" image="test.jpg" action="Play" />

    </div>

</section>
</template>

<script setup lang="ts">
  import card from '@/composables/card.vue'
</script>

<style scoped>

</style>