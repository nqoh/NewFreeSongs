<template>
    <div class="mbr-cards-col col-xs-12 col-lg-3">
          <div class="container" style="padding: 0px;" >
              <div class="card cart-block">
                  <div class="card-img">
                      <Link 
                      :href="
                      props.type === 'Music' ? route('DownloadTrack',props.title) :
                      props.type === 'Video' ? route('viewVideo',props.title) : 
                      route('readNews',props.title) " >

                        <img :src="`/images/${props.image}`" :alt="props.title" />

                      </Link>
                    </div>
                  <div class="card-block">
                      <h4 class="card-title title">{{ props.title }}</h4>
                      <h5 class="card-subtitle">{{ props.type }}</h5>
                         {{ props.description.length > 450 ? props.description.substring(1,450)+ '...' : props.description }}
                      <div class="card-btn"><Link 
                      :href="
                      props.type === 'Music' ? route('DownloadTrack',props.title) :
                      props.type === 'Video' ? route('viewVideo',props.title) : 
                      route('readNews',props.title) "  :class="['btn' ,props.btnClass]">{{ props.action }}
                      </Link></div>
                  </div>
              </div>
          </div>
      </div>
  </template>
  
  <script setup lang="ts">
import { route } from 'ziggy-js';

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