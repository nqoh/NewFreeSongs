<template>
   
    <vid />
    <VidoeCard :Video="Video"/>
     <Suggestions /> 
    <sharePage />

    <Head title="Video |" />
</template>

<script setup lang="ts">
import sharePage from '@/components/app/sharePage.vue';
import VidoeCard from '@/components/video/VideoCard.vue';
import Suggestions from '@/components/app/Suggestions.vue';
defineProps(['Video'])
</script>

<style scoped>

</style>