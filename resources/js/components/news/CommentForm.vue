<template>
  <section>
      <div class="col-xs-12 text-xs-center">
        <h3 class="mbr-section-title display-2" style="color: rgb(83, 83, 83);">COMMENT</h3>
        <small class="mbr-section-subtitle">Post your oponion on this article.</small>
      </div>
 <div class="mbr-section mbr-section-nopadding">
   <div class="container">
    <div class="row">
      <div class="col-xs-12 col-lg-10  col-lg-offset-1">
        
        <div class="alert alert-form alert-success text-xs-center">Thanks for contacting us!</div>

          <form action="../../../comment_article" method="post" >
            <div class="form-group">
                <label class="form-control-label" for="name">
                    Name <span  style="color: red;">*</span></label>
                <input type="text" class="form-control" name="name" required="true" >
                <p style="color: red">Error</p> <br>
               </div>

                <div class="form-group">
                 <label class="form-control-label" for="message">Message</label>
                 <textarea class="form-control" name="message" rows="7"></textarea>
                 <p style="color: red">Error</p> <br>
                </div>
              <button type="submit" class="btn btn-primary">COMMENT</button>
           </form>
         </div>
       </div>
    </div>         
  </div>
</section>
</template>

<script setup lang="ts">

</script>

<style scoped>

</style>