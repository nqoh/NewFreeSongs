<template>
   <section class="mbr-section mbr-section__container" id="buttons1-1s">
    <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="text-xs-center">
               <template v-if="visiblePages.length > 1" >
                <h2 class="title"  >Page {{ currentPage }} of {{ lastPage }}</h2>
                   <template v-for="page in visiblePages" :key="page">
                     <span v-if="page === '...'" class="btn"  style="color:black; cursor:not-allowed; font-size: 1em; padding: 0%;">
                         <b>...</b>
                      </span>
                      <Link
                        v-else
                         :preserve-scroll="props.preserveScroll"
                         :href="Query ?  meta.path + '?query='+props.Query+'&page='+ page : Genre ?  meta.path + '?genre='+Genre+'&page='+ page : meta.path + '?page='+ page "
                         :class="page === currentPage ? 'btn btn-black' : 'btn btn-black-outline btn-black' "
                         >
                         {{ page }}     
                      </Link>&nbsp;
                    </template>
                  </template>
              </div>
            </div>
        </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { computed } from 'vue';

    const props = defineProps({
         meta:{
          required:true,
          type:Object
         },
         Genre:{
          type:String,
          default:''
         },
         Query:{
           type:String,
           default:''
         },
         preserveScroll:{
           type:Boolean,
           default:false
         }
    })

    const currentPage = computed(()=>props.meta.current_page)
    const lastPage = computed(()=>props.meta.last_page)


    const visiblePages = computed(()=> {

        const pages = []
        const total = lastPage.value
        const current = currentPage.value

        if(total <= 7){
          for(let i= 1; i <= total; i++)
            pages.push(i)
        }else{
          pages.push(1)
        
          if(current >3) pages.push('...') 
          for(let i = current - 1 ; i <= current + 1 ; i++)
           {
             if(i > 1 && i < total)  pages.push(i)
          }
          if(current < total - 2)  pages.push('...')

          pages.push(total)
        }
         return pages;
    })
</script>

<style scoped>
  .mbr-section{
     padding-top: 0px;
     padding-bottom: 2%;

    
  }
</style>