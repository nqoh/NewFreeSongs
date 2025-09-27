<template>
<section class="mbr-section articlexx" id="testimonials4-4p">

   <div class="mbr-section mbr-section-nopadding">
     <div class="col-xs-12 text-xs-center">
        <h3 class="mbr-section-title display-2" style="color: #7e9b9f !important;">
            <u>WHAT OUR READERS SAY</u>
          </h3>
       </div>
    <div class="container" style="margin-top: 25px; ">
        <div class="row">
            <div class="col-xs-12">

               <div class="mbr-testimonial card" v-for="comment in props.comments.data" :key="comment.id">
                <div class="card-block" style="background-color:#acacac; border-radius: 5px;">
                    <p><strong style="color: white;">
                      {{ comment.message }}
                    </strong></p></div>
                 <div class="mbr-author card-footer">
                   <div class="mbr-author-name" style="color: gray; margin-top: 0px;">
                     {{  comment.name }}
                   </div>
                  </div>
               </div>

            </div>
        </div>
    </div>

    <div style="margin-top: 5%">
        <Pagination />
    </div> 
</div>
</section>
  <CommentForm :id="props.id" />

</template>

<script setup lang="ts">
   import Pagination from '../app/pagination.vue';
   import CommentForm from './CommentForm.vue';
   const props = defineProps({
        comments:{
          type:[Object],
          required:true,
        },
        id:{
          required:true,
          type:Number
        }
   })
</script>

<style scoped>
  .articlexx{
    background-color: white; 
    padding-top: 1%;
    margin-bottom: -20%;
  }
</style>