<template>
   
    <vid />
    <VidoeCard :Video="Video"/>
     <Suggestions :suggestions="suggestions" /> 
    <sharePage />

    <Head title="Video |" />
</template>

<script setup lang="ts">
import sharePage from '@/components/app/sharePage.vue';
import VidoeCard from '@/components/video/VideoCard.vue';
import Suggestions from '@/components/app/Suggestions.vue';
defineProps(['Video','suggestions'])
</script>

<style scoped>

</style>