<template>
  <section class="mbr-section mbr-section-hero mbr-section-full header2" id="header6-13" style="margin-top: 7%;">
    <div class="mbr-table mbr-table-full">
       <div class="mbr-table-cell">
        <div class="container">
            <div class="row" style="padding: 0px;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-xs-12">
                    <div class="mbr-figure" style="width: 100%; height: 8%;">
                        <iframe class="mbr-embedded-video" 
                          :src="`https://www.youtube.com/embed/${props.Video.endpoint}?rel=0&amp;amp;showinfo=0&amp;autoplay=0&amp;loop=0`"  
                         frameborder="0" allowfullscreen></iframe>
                      </div>
                    </div><br>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-xs-12" style="margin-top: 3%">
                    <h4 class="card-title" align="center"  style="color: gray; font-variant-caps: all-petite-caps;"><b>{{ props.Video.title }}</b></h4>
                    <p class="card-text" align="center">
                      {{ props.Video.description }}
                    <br></p>
                 </div>
            </div>
        </div>
    </div>
</div>


</section>
</template>

<script setup lang="ts">
   const props = defineProps({
      Video:{
        type:Object,
        required:true,
      }
   })
</script>

<style scoped>

</style>