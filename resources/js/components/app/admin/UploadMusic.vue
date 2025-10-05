<template>
    <div>
        <form @submit.prevent="submitData('StoreMusic')">
          <h1 class="title" align="center" style="margin-bottom: 0px;">Music</h1>
          <div class="row row-sm-offset">
           <div class="col-xs-12 ">

            <div v-if="flash && !$page.props.musicExists" class="alert alert-success text-center" align="center">
                <strong>Music Uploaded Successfuly</strong>
             </div>

             <div v-if="$page.props.musicExists" class="alert alert-danger text-center" align="center">
                <strong>{{ $page.props.musicExists }}</strong>
             </div>
             
            <div class="form-group">

             <FormInput name="Select Music File" type="file" 
             v-model="form.music" :error="form.errors.music"
             @change="HadleMusic"
             accept=".mp3"  />

             <FormInput name="Select Image File" type="file" 
             v-model="form.image" :error="form.errors.image"
             @change="HadleImage"
             accept=".jpg,.png" />

             <div class="form-group">
              <label class="form-control-label" for="form1-48-name">Select Genre</label>
              <select class="form-control" v-model="form.genre">
                <option value="Hiphop">Hiphop</option>
                <option value="Mix">Mix</option>
                <option value="Gqom">Gqom</option>
                <option value="Gospel">Gospel</option>
                <option value="House">House</option>
                <option value="Afrobeat">Afrobeat </option>
                <option value="Other">Other </option>
               </select>
               <p style="color: red" v-if="form.errors.genre" >{{ form.errors.genre }}</p>
             </div>

             <div class="form-group">
               <label class="form-control-label" for="form1-48-message">Description</label>
                <textarea class="form-control"  rows="7" v-model.trim="form.description"></textarea>
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
  import HandleSubmit from '@/composable/HandleSubmit'

  const form =  useForm({music:null,image:null,genre:'',description:''});
 
  const { flash, submitData, HadleImage, HadleMusic } =  HandleSubmit(form);
  

  

</script>

<style scoped>

</style>