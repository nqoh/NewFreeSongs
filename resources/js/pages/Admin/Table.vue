<template>
    <section class="mbr-section main" style="padding: 100px 0px 0px 0px;">
       <div class="mbr-section mbr-section__container mbr-section__container--middle  " >
       <div class="container "   style="width: 100%;">
        <TableSearch :Query="Query" />
        <div v-if="flash" class="alert alert-success text-center" align="center">
          <strong>Updated Successfuly</strong>
        </div>
        <div class="table-wrapper">
          <div class="table-container">
          <table>
            <thead>
              <tr>
               <th>No</th>
               <th>Id</th>
               <th>Type</th>
               <th>Title</th>
               <th>Description</th>
               <th>Image</th>
               <th>Actions</th>
              </tr>
           </thead>
         <tbody>
        
          <tr v-for="(data, i) in Data.data" :key="data.id">
           <td>{{ i + 1 }}</td>
           <td>{{ data.id }}</td>
           <td>{{ data.type }}</td>
           <td>{{ data.title }}</td>
           <td>
            {{ data.description.substring(0,30) }}
           </td>
           <td>
            <img :src="`/images/${data.image}`" style="width: 40px; border-radius: 100%;" />
           </td>
           <td>
            <img src="/assets/images/edit.png" @click="toogleModal(data)"
             style="width: 20px; cursor: pointer;" />
            &nbsp; &nbsp; 
            <img src="/assets/images/bin.png" @click="Delete(data)" style="width: 20px; cursor: pointer;" />
           </td>
          </tr>
         </tbody>
        </table>
         </div>
        </div>
       </div> 
       </div>
       <pagination  :meta="meta" :Query="Query" />

       <modal  v-if="modalStyleDisplay === 'block'"
        v-model:modalStyleDisplay="modalStyleDisplay" 
        :HadleImage="HadleImage" v-model:form="form"
        @SubmitUpdate="UpdateFrom" 
        :style="{ display: modalStyleDisplay }" 
        />
    </section>
   </template>
   
   <script setup lang="ts">
     import TableSearch from '@/components/app/admin/TableSearch.vue';
     import AdminLayout from '@/layouts/AdminLayout.vue';
     import pagination from '@/components/app/pagination.vue';
     import {  reactive , ref, watch} from 'vue';
     import modal from '@/components/app/admin/modal.vue';
     import { useForm } from '@inertiajs/vue3';
     import HandleSubmit from '@/composable/HandleSubmit'
     defineOptions({ layout : AdminLayout})
   
     const modalStyleDisplay = ref('none')
     const form =  useForm({title:'', type:'',description:null,genre:'',endpoint:'', Displayimage:'',image:null,id:null});
     const props = defineProps(['Data','Query']);

     const { submitData, HadleImage, flash, DeleteData,  } = HandleSubmit(form,false) 
      
     watch(flash, ()=>{
           if(flash){
            modalStyleDisplay.value = 'none'
        }
     })
   
     const UpdateFrom = ()=>{ 
          if(form.type  === "Music"){
            submitData('music.update')
          }else if(form.type === "Video"){
            submitData('video.update')
          }else if(form.type === "News"){
            submitData('news.update')
          }
     }

     const Delete = (data:any)=>{
         if(confirm('Are you sure you want to delete this  '+ data.type +' '+ data.title)){
          if(data.type  === "Music"){
            DeleteData('music.destroy', data.id);
          }else if(data.type === "Video"){
            DeleteData('video.destroy', data.id);
          }else if(data.type === "News"){
            DeleteData('news.destroy', data.id);
          }
         }
      }
        
     const toogleModal =  (data: any)=>{
        form.title = data.title;
        form.type = data.type;
        form.description = data.description;
        form.genre = data.genre;
        form.endpoint = data.endpoint
        form.Displayimage = data.image
        form.image = null
        form.id= data.id
        modalStyleDisplay.value = 'block'
     }

     const meta = reactive({
       current_page: props.Data.current_page,
       last_page: props.Data.last_page,
       path: props.Data.path
     })

     
   </script>
   
   <style scoped>
   
   </style>