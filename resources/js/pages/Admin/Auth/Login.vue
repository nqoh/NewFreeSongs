<template>
    <section class="mbr-section main" style="padding: 100px 0px 0px 0px;" >
    <div class="mbr-section mbr-section__container mbr-section__container--middle ">
    <div class="container "   style="width: 45%; border: 2px solid #d0f0ee;">

        <div class="row">
            <div class="col-xs-12 text-xs-center">
                <h3 class="mbr-section-title display-2 title" >Login</h3>
                <small class="mbr-section-subtitle">Only Admin can login</small>
            </div>
         </div>

         <div class="alert alert-danger" v-if="$page.props.login" id="m-error" style="text-align: center;">
            <strong>{{ $page.props.login }} </strong>
         </div>

         <form @submit.prevent="form.post(route('Login'))">
            
           <FormInput type="email" name="Email" v-model="form.email" :error="form.errors.email" />
           <FormInput type="password" name="Password" v-model="form.password" :error="form.errors.password"  />

           <button type="submit" class="btn btn-primary">
             <span v-if="form.processing">
               <img src="/assets/images/loader.gif" width="25" />
              </span>
             <span v-else>
               LOGIN
             </span>
            </button>

         </form>
      </div>
    </div>
  </section>
  <Head title="Login |" />
</template>

<script setup lang="ts">
  import AdminLayout from '@/layouts/AdminLayout.vue';
  import FormInput from '@/components/app/FormInput.vue';
  import { route } from 'ziggy-js';
  defineOptions({ layout:AdminLayout })

   import { useForm } from '@inertiajs/vue3';
   
   const form = useForm({email:'', password:'',})


</script>


<style scoped>

</style>