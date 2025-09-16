<template>
    <div>
      <appHeader />
        <slot />
       <appFooter />
    </div>
</template>

<script setup lang="ts">
     import appHeader from '@/components/appHeader.vue'
     import appFooter from '@/components/appFooter.vue'
</script>

<style lang="scss" scoped>

</style>