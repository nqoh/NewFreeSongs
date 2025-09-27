<template>
   
    <TrackCard :Track="Track" />
     <Suggestions :suggestions="suggestions" /> 
    <sharePage />

    <Head title="Download |" />
</template>

<script setup lang="ts">
import sharePage from '@/components/app/sharePage.vue';
import TrackCard from '@/components/music/TrackCard.vue';
import Suggestions from '@/components/app/Suggestions.vue';
defineProps(['Track','suggestions'])
</script>

<style scoped>

</style>