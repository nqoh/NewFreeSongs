<template>
    <div>
        <form>
         <h1 class="title" align="center">News</h1>
          <div class="row row-sm-offset">
           <div class="col-xs-12 ">
            <div class="form-group">
             <FormInput name="Select Image File" type="file" v-model="form.image" :error="form.errors.image" />
             <FormInput name="Title" type="text" v-model="form.title" :error="form.errors.title" />
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
                     UPLOAD
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

  const form =  useForm({image:'',title:'',description:''});

</script>

<style scoped>

</style>