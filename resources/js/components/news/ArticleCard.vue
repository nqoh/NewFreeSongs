<template>
    <section class="mbr-section mbr-section-hero mbr-section-full header2" id="header6-p">
      <div class="mbr-table" >
         <div class="mbr-table-cell" >
           <div class="container"  >
             <div class="col col-end-2" style="margin-top: 2%;">
                 <div class="col-lg-6 col-md-6 col-sm-12 col-xl-4 col-xs-12" >
                    <div class="card-img" >
                      <img :src="`/images/${props.Article.image}`" style="width: 100%;" >
                    </div>
                   </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-8 col-xs-12" >
                       <h1 class=" title" align="center"><b>{{ props.Article.title }}</b></h1>
                       <p class="card-text">
                        {{ props.Article.description }}
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
     Article:{
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