<template>
    <footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-i">
     <section class="mbr-section section" id="form2-4a">
       <div class="mbr-section mbr-section__container mbr-section__container--middle">
          <div class="col-xs-12 text-xs-center">
            <h3 class="mbr-section-title display-2">Subscribe to our Newsletter</h3>
           </div>
        </div>
      <div class="mbr-section mbr-section-nopadding">
          <div class="container">
              <div class="row">
                  <div class="col-xs-12 col-lg-10 col-lg-offset-1" data-form-type="formoid">
                      <div class="alert alert-success" id="sucess" style="text-align: center; display: none">
                          <strong>Thanks </strong> for subscribing
                      </div>
                      <div class="alert alert-danger" id="m-error" style="text-align: center; display: none">
                          <strong>Invalid </strong> Email address
                      </div>
                      <form class="mbr-form"  method="post" data-form-title="Subscribe to our Newsletter">
                          <input type="hidden"  data-form-email="true">
                          <div class="mbr-subscribe mbr-subscribe-dark input-group">
                              <input type="email"  required class="form-control" id="email" name="email"  data-form-field="Email" placeholder="Enter Your Email Address...">
                              <span class="input-group-btn"><button type="button" onclick="subs()" id="sub" class="btn btn-primary">SUBSCRIBE</button></span>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
   </section>
   <div class="container">
     <p class="text-sm-center">Copyright (c) 2025 NewFreeSongs. &nbsp;
     <Link :style="$page.component == 'Aboutus' ? active : ''" :href="route('aboutus')">About us</Link> - 
     <Link :style="$page.component == 'Disclaimer' ? active : ''" :href="route('disclaimer')">Disclaimer&nbsp;</Link></p>
   </div>
</footer>
</template>

<script setup lang="ts">
    import { route } from 'ziggy-js'
    const active = 'color:#F1C050; text-decoration:underline'
</script>

<style scoped>
 .section{
  padding-top: 0px; padding-bottom: 5px;
 }
</style>