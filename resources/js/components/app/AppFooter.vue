<template>
    <footer class="mbr-small-footer mbr-section mbr-section-nopadding"  id="footer1-i">
     <section class="mbr-section section" id="form2-4a">
       <div class="mbr-section mbr-section__container mbr-section__container--middle">
          <div class="col-xs-12 text-xs-center">
            <h3 class="mbr-section-title display-2 title">Subscribe to our Newsletter</h3>
           </div>
        </div>
      <div class="mbr-section mbr-section-nopadding">
          <div class="container">
              <div class="row">
                  <div class="col-xs-12 col-lg-10 col-lg-offset-1" data-form-type="formoid">
                      <div class="alert alert-success" v-if="flash" style="text-align: center">
                          <strong>Thanks </strong> for subscribing
                      </div>
                      <div class="alert alert-danger" v-if="form.errors.email" id="m-error" style="text-align: center;">
                          <strong>{{ form.errors.email }} </strong>
                      </div>
                      <form @submit.prevent="submitForm" class="mbr-form"  data-form-title="Subscribe to our Newsletter">
                          <input type="hidden"  data-form-email="true">
                          <div class="mbr-subscribe mbr-subscribe-dark input-group">
                              <input type="email"  v-model="form.email" required class="form-control"  placeholder="Enter Your Email Address...">
                              <span class="input-group-btn">
                                <button type="submit"  id="sub" class="btn btn-primary">
                                   <span v-if="form.processing">
                                     PLEASE WAIT...
                                   </span>
                                   <span v-else>
                                    SUBSCRIBE
                                    </span>
                                </button></span>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
   </section>
   <div class="container">
     <p class="text-sm-center">Copyright (c) 2025 NewFreeSongs. &nbsp;
     <Link :style="$page.component == 'Aboutus' ? active : ''" :href="route('aboutus')"><b>About us</b></Link> - 
     <Link :style="$page.component == 'Disclaimer' ? active : ''" :href="route('disclaimer')"><b>Disclaimer</b>&nbsp;</Link></p>
   </div>
</footer>
</template>

<script setup lang="ts">
    import { route } from 'ziggy-js'
    import { useForm } from '@inertiajs/vue3';
    import { ref } from 'vue';


    const active = 'color:#F1C050; text-decoration:underline'
    
    const form  = useForm({email:''})

    const flash  = ref(false)

    const submitForm = ()=>{
        form.post('/subscribe',{
            preserveScroll:true,
            onSuccess(){
            form.clearErrors()
            form.reset()
            flash.value = true
            setTimeout(()=>{
            flash.value = false
             }, 2000)
          }
        });
    }

</script>

<style scoped>
 .section{
  padding-top: 0px; padding-bottom: 5px;
 }
</style>