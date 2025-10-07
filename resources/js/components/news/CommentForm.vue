<template>
  <section style="margin-top: 12%;">
      <div class="col-xs-12 text-xs-center">
        <h3 class="mbr-section-title display-2" style="color: rgb(83, 83, 83);">COMMENT</h3>
        <small class="mbr-section-subtitle">Post your oponion on this article.</small>
      </div>
 <div class="mbr-section mbr-section-nopadding">
   <div class="container">
    <div class="row">
      <div class="col-xs-12 col-lg-10  col-lg-offset-1">
        
        <div class="alert alert-form alert-success text-xs-center" v-if="flash">
          {{ $page.props.comment }}
        </div>

          <form @submit.prevent="submitData('comment.store')" >
            <div class="form-group">
                <label class="form-control-label" for="name">
                    Name <span  style="color: red;">*</span></label>
                <input type="text" class="form-control" v-model.trim="form.name" required="true" >
                <p style="color: red" v-if="form.errors.name">{{ form.errors.name }}</p> <br>
               </div>

                <div class="form-group">
                 <label class="form-control-label" for="message" >Message <span  style="color: red;">*</span></label>
                 <textarea class="form-control" name="message" rows="7" v-model.trim="form.message"></textarea>
                 <p style="color: red" v-if="form.errors.message">{{ form.errors.message }}</p> <br>
                </div>

              <button type="submit" class="btn btn-primary" :disabled="form.processing">
                <span v-if="form.processing">
                  <img src="/assets/images/loader.gif" width="25" />
                </span>
                <span v-else>
                  COMMENT
                </span>
              </button>

           </form>

         </div>
       </div>
    </div>         
  </div>
</section>
</template>

<script setup lang="ts">

import { useForm } from '@inertiajs/vue3';
import HandleSubmits from '@/composable/HandleSubmit'
const props = defineProps({id:{required:true, type:Number}})
const form = useForm({ name:'', message:'',id:props.id, })
const { submitData , flash } = HandleSubmits(form, true);

</script>

<style scoped>

</style>