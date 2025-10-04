<template>
 <section class="mbr-section main">
    <div class="mbr-section mbr-section__container mbr-section__container--middle ">
    <div class="container "   style="width: 45%;">

      <div class="card-body" >
         <h1 class="title">Upload Content</h1>
         <select class="form-control" v-model="selectedUpload"  name="genre">
             <option :value="UploadMusic">Music</option>
             <option :value="UploadVideo">Video</option>
             <option :value="UploadNews">News</option>                        
           </select>
        </div>   

       <component :is="selectedUpload" />
        
    </div>
    </div>
 </section>
</template>

<script setup lang="ts">
  import AdminLayout from '@/layouts/AdminLayout.vue';
  import UploadMusic from '@/components/app/admin/UploadMusic.vue';
  import UploadVideo from '@/components/app/admin/UploadVideo.vue';
  import UploadNews from '@/components/app/admin/UploadNews.vue';
  import { ref } from 'vue'
  defineOptions({ layout : AdminLayout})

  const selectedUpload = ref(UploadMusic)
</script>

<style scoped>

</style>