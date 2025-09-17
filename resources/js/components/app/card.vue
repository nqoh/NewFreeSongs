<template>
    <div class="mbr-cards-col col-xs-12 col-lg-3">
          <div class="container">
              <div class="card cart-block">
                  <div class="card-img">
                      <a href="" >
                        <img src="images/test.jpg" loading="lazy" alt="" class="card-img-top" />
                      </a>
                    </div>
                  <div class="card-block">
                      <h4 class="card-title">{{ props.title }}</h4>
                      <h5 class="card-subtitle">{{ props.type }}</h5>
                         {{ props.description }}
                      <div class="card-btn"><a href="" :class="['btn' ,props.btnClass]">{{ props.action }}</a></div>
                  </div>
              </div>
          </div>
      </div>
  </template>
  
  <script setup lang="ts">
     import { defineProps } from 'vue'
    const props = defineProps({
        title:{
              required:true,
              type:String
           },

        type:{
            type:String,
            required:true,
         },

         description:{
            type:String,
            required:true,
         },

         btnClass:{
            type:String,
            required:true
         },

        image:{
            type:String,
            required:true
        },

        action:{
            required:true,
            type:String
        }

     });
       
  </script>
  
  <style scoped>
    .card-img-top{
        max-width: 450px; max-height: 350px
    }
    .mbr-cards-col{
        padding-top: 0px; padding-bottom: 80px;
    }
  </style>