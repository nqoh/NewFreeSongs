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
     <p class="text-xs-center">Copyright (c) 2025 NewFreeSongs. &nbsp;
     <a href="aboutus">About us</a> - <a href="disclaimer">Disclaimer&nbsp;</a></p>
   </div>
</footer>
</template>

<script setup lang="ts">

</script>

<style scoped>
 .section{
  padding-top: 0px; padding-bottom: 5px;
 }
</style>