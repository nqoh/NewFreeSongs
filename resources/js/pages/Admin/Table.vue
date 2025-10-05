<template>
    <section class="mbr-section main" style="padding: 100px 0px 0px 0px;">
       <div class="mbr-section mbr-section__container mbr-section__container--middle  " >
       <div class="container "   style="width: 100%;">
        <div class="form-group" style=" border: 1px solid #d0f0ee;"  >
         <input type="text"  v-model="query" class="form-control" 
          placeholder="Search..." ref="searchInput"  />  
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
            <img src="/assets/images/bin.png" style="width: 20px; cursor: pointer;" />
           </td>
          </tr>
         </tbody>
        </table>
         </div>
        </div>

       </div>
       </div>
       <pagination  :meta="meta" :Query="Query" />
       <modal v-model:modalType="modalType" v-model:form="form" :style="{ display: modalType }" />
    </section>
   </template>
   
   <script setup lang="ts">
     import AdminLayout from '@/layouts/AdminLayout.vue';
     import pagination from '@/components/app/pagination.vue';
     import {  reactive , ref, watch , onMounted} from 'vue';
     import { router   } from '@inertiajs/vue3';
     import { route } from 'ziggy-js';
     import modal from '@/components/app/admin/modal.vue';
     import { useForm } from '@inertiajs/vue3';
     defineOptions({ layout : AdminLayout})


     const form =  useForm({title:'', type:'',description:'',genre:'',endpoint:'', Displayimage:'',image:null});
     const props = defineProps(['Data','Query']);


     const modalType = ref('none')
     const toogleModal =  (data: any)=>{
        form.title = data.title;
        form.type = data.type;
        form.description = data.description;
        form.genre = data.genre;
        form.endpoint = data.endpoint
        form.Displayimage = data.image
        form.image = null
        modalType.value = 'block'
     }

     const meta = reactive({
       current_page: props.Data.current_page,
       last_page: props.Data.last_page,
       path: props.Data.path
     })

     const query = ref(props.Query)
     
     let debounceTimeout = null as any;
     const searchInput = ref<HTMLInputElement | null>(null);

    watch(query, (newVal) => {
       if (debounceTimeout) {
        clearTimeout(debounceTimeout)
      }
    debounceTimeout = setTimeout(() => {
        router.get(route('Edit'),{query: newVal })
        searchInput.value?.focus()
       }, 1000)
    })

    onMounted(() => {
     searchInput.value?.focus()
     })
   </script>
   
   <style scoped>
   
   </style>