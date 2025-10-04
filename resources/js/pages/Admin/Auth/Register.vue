<template>
 <section class="mbr-section main">
    <div class="mbr-section mbr-section__container mbr-section__container--middle ">
    <div class="container "   style="width: 45%;">
        
        <div class="row">
            <div class="col-xs-12 text-xs-center">
                <h3 class="mbr-section-title display-2 title" >Register</h3>
                <small class="mbr-section-subtitle">Once you registered you will become a NewFreeSongs Admin</small>
            </div>
         </div>

         <form @submit.prevent="form.post(route('Register'))">
            
           <FormInput type="text" name="Name" v-model="form.name" :error="form.errors.name" />
           <FormInput type="email" name="Email" v-model="form.email" :error="form.errors.email" />
           <FormInput type="password" name="Password" v-model="form.password" :error="form.errors.password"  />
           <FormInput type="password" name="Confirm Password" v-model="form.password_confirmation" :error="form.errors.password_confirmation"  />
           <button type="submit" class="btn btn-primary">
             <span v-if="form.processing">
               <img src="/assets/images/loader.gif" width="25" />
              </span>
             <span v-else>
               Register
             </span>
            </button>

         </form>
    
      </div>
    </div>
  </section>
  <Head  title="Register |" />
</template>

<script setup lang="ts">
  import AdminLayout from '@/layouts/AdminLayout.vue';
  import FormInput from '@/components/app/FormInput.vue';
  defineOptions({ layout:AdminLayout })

   import { useForm } from '@inertiajs/vue3';
   import { route } from 'ziggy-js';
   const form = useForm({name:'',email:'', password:'',password_confirmation:''})

</script>


<style scoped>

</style>