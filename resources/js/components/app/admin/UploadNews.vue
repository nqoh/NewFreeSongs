<template>
    <div>
        <form @submit.prevent="submitData('StoreNews')">
         <h1 class="title" align="center" style="margin-bottom: 0px;">News</h1>
          <div class="row row-sm-offset">

            <div v-if="flash" class="alert alert-success text-center" align="center">
                <strong>Video Uploaded Successfuly</strong>
             </div>

           <div class="col-xs-12 ">
            <div class="form-group">

              <FormInput name="Select Image File" 
                type="file" v-model="form.image"
                accept=".jpg,.png"
                @change="HadleImage"
                :error="form.errors.image" />

             <FormInput name="Title" 
               type="text" 
               v-model="form.title" 
               :error="form.errors.title" />

             <div class="form-group">
               <label class="form-control-label" for="form1-48-message">Description</label>
                <textarea class="form-control"  rows="7" v-model="form.description"></textarea>
                   <p style="color: red" v-if="form.errors.description">
                        {{ form.errors.description }}
                  </p> <br> 
             </div>

             <button type="submit" class="btn btn-primary">
               <span v-if="form.processing">
                <img src="/assets/images/loader.gif" width="25" />
                </span>
                <span v-else>
                     SUBMIT
                </span>
               </button>
           </div>
          </div>
         </div>
        </form>
    </div>
</template>

<script setup lang="ts">
  import FormInput from '../FormInput.vue';
  import { useForm } from '@inertiajs/vue3';
  import HandleSubmit from '@/composable/HandleSubmit'

  const form =  useForm({image:'',title:'',description:''});

  const { flash, submitData, HadleImage } =  HandleSubmit(form);

</script>

<style scoped>

</style>