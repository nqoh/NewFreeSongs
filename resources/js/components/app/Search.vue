<template>
  <section class="mbr-section mbr-after-navbar" id="form2-4m">
   <div class="mbr-section mbr-section-nopadding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-10 col-lg-offset-1" data-form-type="formoid">
              <div data-form-alert="true"><div hidden="" data-form-alert-success="true">Thanks for your querry...</div></div>
                
              <form @submit.prevent="submitSearch" class="mbr-form" style="border: 1px solid #7e9b9f"  data-form-title="SUBSCRIBE FORM">
                    <div class="mbr-subscribe mbr-subscribe-dark input-group">
                        <input type="text" required v-model.trim="form.query" class="form-control" style="color: #7e9b9f; font-weight: bold;" data-form-field="Email" placeholder="Search...">
                        <span class="input-group-btn">
                          <button  class="btn btn-primary" >
                            <span v-if="form.processing">
                              <img src="/assets/images/loader.gif" width="25" />
                            </span>
                           <span v-else >
                               SEARCH
                           </span>
                          </button>
                        </span>
                    </div>
                </form>

            </div>
        </div>
    </div>
  </div>
</section>
</template>

<script setup lang="ts">
   import { useForm } from '@inertiajs/vue3';
   const props = defineProps({
       Query:{
        type:String,
        default:''
       }
   })

   const form =  useForm({query:''})
   form.query = props.Query

   const submitSearch = ()=>{
    if(form.query)
       form.get('/search', {
       preserveScroll:true,
      },)
   }

</script>

<style scoped>
 .mbr-after-navbar{
    background-color: rgb(255, 255, 255); padding-top: 80px; padding-bottom: 30px;
  }
</style>