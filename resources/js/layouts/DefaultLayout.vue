<template>
    <div>
      <appHeader />
        <slot />
       <appFooter />
    </div>
</template>

<script setup lang="ts">
     import appHeader from '@/components/app/AppHeader.vue'
     import appFooter from '@/components/app/AppFooter.vue'
</script>

<style lang="scss" scoped>

</style>