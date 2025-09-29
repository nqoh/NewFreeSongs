<template>
   <section class="mbr-section mbr-section-hero mbr-section-full header2" id="header6-p">
     <div class="mbr-table" >
        <div class="mbr-table-cell" >
          <div class="container"  >
            <div class="col col-end-2" style="margin-top: 2%">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-4 col-xs-12" >

                   <div class="card-img">
                    <img :src="`/images/${props.Track.image}`" style="width: 100%;">
                  </div>

                  </div>
                   <div class="col-lg-6 col-md-6 col-sm-12 col-xl-8 col-xs-12" >
                      <h1 class=" title" align="center"><b>{{ props.Track.title }}</b></h1>
                      <p class="card-text">
                        {{ props.Track.description }}
                        <br></p>
                   
                      <form action="../../download.php" method="POST" >
                       <div class="mbr-section-btn">
                          <button type="submit" id="btn-download" class="btn btn-info" > 
                                 DOWNLOAD 
                             </button>
                          </div>
                      </form>
          
                      <audio  controls style="margin-top: 5%;">
                       <source :src="`/assets/music/${ props.Track.title }.mp3`" type="audio/mpeg" />
                      </audio>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

</template>

<script setup lang="ts">
const props = defineProps({
     Track:{
      type:Object,
      required:true
     }
})
</script>

<style scoped>
  .header2{
    height:auto; 
    margin-top: 15%;
    margin-bottom: 2%;
  }
  .card-title{
    font-weight: bold;
    font-size:xx-large;
  }
</style>