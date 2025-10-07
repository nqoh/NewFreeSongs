<template>
    <div>
      <div id="myModal" class="modal" style="display:block">
        <div class="modal-content">
          <span class="close"  @click="$emit('update:modalStyleDisplay','none')">&times;</span>
          <h1 class="title" align="center" style="margin-bottom: 0px;">Update {{ form.type }}</h1>
          <form @submit.prevent="" >
    
            <FormInput name="Title" v-if="form.type !='Music'"
               type="text" 
               v-model="form.title" 
               :error="form.errors.title" />

               <FormInput name="Endpiont" v-if="form.type =='Video'"
               type="text" 
               v-model="form.endpoint" 
               :error="form.errors.endpoint" />

            <div class="form-group" v-if="form.type == 'Music'">
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
                <textarea class="form-control" rows="7" v-model="form.description"></textarea>
                   <p style="color: red" v-if="form.errors.description">
                        {{ form.errors.description }}
                  </p> <br> 
             </div>
                
            <FormInput name="Select Image File" 
                type="file" 
                accept=".jpg,.png"
                @change="props.HadleImage"
                :error="form.errors.image"
                :required="isRequired"
                />   

             <div align="center">
              <img :src="`/images/${form.Displayimage}`"  style="width: 50%;" />
             </div><br/>
            
             <div align="center">
              <button  class="btn btn-primary" @click="$emit('SubmitUpdate')" >
               <span v-if="form.processing">
                <img src="/assets/images/loader.gif" width="25" />
                </span>
                <span v-else>
                    UPDATE
               </span>
             </button>
            </div>

          </form>
        </div>
      </div>
    </div>
 
  </template>
  <script setup lang="ts">
  defineModel('form')
  defineModel('modalStyleDisplay')
  defineEmits(['SubmitUpdate'])
  const props = defineProps({
    HadleImage:{
        type : Function,
    }
  });

  import FormInput from '../FormInput.vue';
  import { ref } from 'vue'
  const isRequired = ref(false)

  </script>
 