<template>
<section class="mbr-section main" id="form1-48">

<div class="mbr-section mbr-section__container mbr-section__container--middle" style="padding: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-xs-center">
                <h3 class="mbr-section-title display-2 title" >CONTACT FORM</h3>
                <small class="mbr-section-subtitle">Let us know how much you love our work, Thanks.</small>
            </div>
        </div>
    </div>
</div>

<div class="mbr-section mbr-section-nopadding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-10 col-lg-offset-1" data-form-type="formoid">

              <div v-if="flash">
                <div data-form-alert="true">
                    <div hidden="" data-form-alert-success="true" class="alert alert-form alert-success text-xs-center">Thanks for contacting us!</div>
                </div>
               <div class="alert alert-success" align="center">
                    <strong>Thanks for contacting us !</strong> We will be in touch with you shortly.
                </div>
             </div>

                <form @submit.prevent="submitData('contact.store')"  data-form-title="CONTACT FORM">
                    <div class="row row-sm-offset">

                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="form1-48-name">Name 
                                    <span style="color: red" class="form-asterisk">*</span></label>
                                <input type="text" class="form-control" name="name" 
                                 v-model="form.name"
                                required="true" data-form-field="Name" id="form1-48-name">
                                <p style="color: red" v-if="form.errors.name">{{ form.errors.name }}</p> <br>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="form1-48-email">Email
                                    <span style="color: red" class="form-asterisk">*</span></label>
                                <input type="email" class="form-control" name="email"
                                  v-model="form.email"
                                 required="true" data-form-field="Email" id="form1-48-email">
                                <p style="color: red" v-if="form.errors.email">{{ form.errors.email }}</p> <br> 
                            </div>
                        </div>

                    </div>
                    
                    <div class="form-group">
                        <label class="form-control-label" for="form1-48-message">Message </label>
                        <textarea class="form-control" name="message" rows="7"
                         v-model="form.message"
                         data-form-field="Message" id="form1-48-message"></textarea>
                       <p style="color: red" v-if="form.errors.message">
                        {{ form.errors.message }}
                       </p> <br> 
                    </div>
             

                   <div>
                     <button type="submit" class="btn btn-primary">
                       <span v-if="form.processing">
                        <img src="/assets/images/loader.gif" width="25" />
                       </span>
                     <span v-else>
                       CONTACT US
                     </span>
                    </button>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
        <Head title="Contact us|" />
</template>

<script setup lang="ts">
 import { useForm } from '@inertiajs/vue3';
 import HandleSubmits from '@/composable/HandleSubmit'
 const form = useForm({name:'', email:'', message:''})
 const { submitData , flash } = HandleSubmits(form,false);
</script>

 <style scoped>
  .main{
    padding-top: 100px; padding-bottom: 20px;
  }
  </style>