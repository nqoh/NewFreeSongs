<template>
<section class="mbr-section mbr-section-md-padding" id="social-buttons1-1o">
  <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-xs-center">
            <h3 class="mbr-section-title display-2 title">SHARE THIS PAGE!</h3>
            <div>
                <div class="mbr-social-likes" data-counters="false">
                    
                  <a :href="`https://www.facebook.com/sharer/sharer.php?u=${url}`" target="_blank">
                    <span class="btn btn-social facebook" title="Share link on Facebook">
                      <i class="socicon socicon-facebook"></i>
                    </span>
                  </a>&nbsp;

                  <a :href="`https://www.twitter.com/intent/tweet?url=${url}`" target="_blank">
                     <span class="btn btn-social twitter" title="Share link on Twitter">
                      <i class="socicon socicon-twitter"></i>
                     </span>
                  </a> &nbsp;

                  <a :href="`https://www.linkedin.com/sharing/share-offsite?url=${url}`" target="_blank">
                    <span class="btn btn-social plusone" title="Share link on Linkedin">
                     <i class="socicon  socicon-linkedin"></i>
                    </span>
                  </a>  

                </div>
            </div>
        </div>
     </div>
   </div>
</section>
</template>

<script setup lang="ts">
 import { usePage  } from '@inertiajs/vue3';
 const page = usePage();
 const url = window.location.origin + page.url
</script>

<style scoped>
.mbr-section{
    padding: 0px;
}
</style>