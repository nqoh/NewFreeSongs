<template>
<br><br><br>
<section class="mbr-section mbr-section__container article" id="header3-1p">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="mbr-section-title display-4">
                    <p>
                        <Link @click.prevent="filterMusic('')" >All</Link> -
                        <Link @click.prevent="filterMusic('Hiphop')" class="text-info">Hiphop</Link> -
                        <Link @click.prevent="filterMusic('Mix')">Mix</Link> -
                        <Link @click.prevent="filterMusic('Gqom')" class="text-info">Gqom</Link> -
                        <Link @click.prevent="filterMusic('Gospel')">Gospel</Link> -
                        <Link @click.prevent="filterMusic('House')" class="text-info">House</Link> -
                        <Link @click.prevent="filterMusic('Afrobeat')">Afrobeat</Link> -
                        <Link @click.prevent="filterMusic('Piano')" class="text-info">Piano</Link> -
                        <Link @click.prevent="filterMusic('Other')" >Other</Link>
                    </p>
                </h3>
            </div>
        </div>
    </div>
</section>
</template>

<script setup lang="ts">
import {  router  } from '@inertiajs/vue3';

const filterMusic = (selectedFilter:string)=>{
    router.post("music", {genre: selectedFilter});
}

</script>

<style scoped>
 .article {
    background-color: rgb(255, 255, 255);
    margin-top: 0px;
    margin-bottom: 0px;
    padding-top: 20px;
    padding-bottom: 0px;
 }
</style>