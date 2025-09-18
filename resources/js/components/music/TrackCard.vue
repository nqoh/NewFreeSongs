<template>
   <section class="mbr-section mbr-section-hero mbr-section-full header2" id="header6-p">
     <div class="mbr-table" >
        <div class="mbr-table-cell" >
          <div class="container"  >
            <div class="col col-end-2" style="padding: 0px;">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-4 col-xs-12" >
                   <div class="card-img"><img src="../../../../public/images/test.jpg" class="card-img-top"></div>
                  </div>
                   <div class="col-lg-6 col-md-6 col-sm-12 col-xl-8 col-xs-12" >
                      <h4 class="card-title">Name Of The Track</h4>
                      <p class="card-text">
                          After Heavy-K aka Drumboss Played his one hour set on 
                          LockDownHouseparty hosted by Channel O on DStv. He released 
                          a song, that will be on the next EP (KHUSTAEP ). The song is Called Thatha fearing Mbuso Khoza.<br></p>
                   
                      <form action="../../download.php" method="POST" >
                       <div class="mbr-section-btn">
                          <button type="submit" id="btn-download" class="btn btn-info" > 
                                 DOWNLOAD 
                             </button>
                          </div>
                      </form>
          
                      <audio  controls style="margin-top: 5%;">
                       <source src="/assets/music/zola.mp3" type="audio/mpeg" />
                      </audio>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

</template>

<script setup lang="ts">
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