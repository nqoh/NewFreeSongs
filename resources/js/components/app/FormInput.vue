<template>
  <div class="form-group"  >

    <label class="form-control-label" for="form1-48-name">{{ props.name }} 
      </label>

       <input :type="props.type" class="form-control" 
              :accept="accept"
              :value="modelValue"
              @keyup="$emit('update:modelValue',$event.target.value)"
              required="true">

        <p style="color: red" v-if="props.error">{{ props.error}}</p> <br>

      </div>
</template>

<script setup lang="ts">
  defineModel('modelValue')
  const props = defineProps({
       name:{
          type:String,
          default:'',
       },
       error:{
          type:String,
          default:''
       },
       type:{
        type:String,
        default:'text'
       },
       accept:{
          type:String,
          default:''
       },
       
  });
</script>

<style scoped>

</style>