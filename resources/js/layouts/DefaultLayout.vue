<template>
    <div>
       <topNav></topNav>
        <slot />

    </div>
</template>

<script setup lang="ts">
     import topNav from '@/components/navs.vue'
</script>

<style lang="scss" scoped>

</style>