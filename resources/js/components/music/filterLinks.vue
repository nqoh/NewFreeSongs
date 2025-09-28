<template>
<br><br><br>
<section class="mbr-section mbr-section__container article" id="header3-1p">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="mbr-section-title display-5">
                    <p>
                        <Link :href="route('music')" :style="Genre ? '':' text-decoration: underline'" >All</Link> -
                        <Link href="?genre=Hiphop" class="text-info" :style="Genre === 'Hiphop' ? 'text-decoration: underline' : ''">Hiphop </Link> -
                        <Link href="?genre=Mix" :style="Genre === 'Mix' ? 'text-decoration: underline' : ''">Mix</Link> -
                        <Link href="?genre=Gqom" class="text-info" :style="Genre === 'Gqom' ? 'text-decoration: underline' : ''">Gqom</Link> -
                        <Link href="?genre=Gospel" :style="Genre === 'Gospel' ? 'text-decoration: underline' : ''">Gospel</Link> -
                        <Link href="?genre=House" class="text-info" :style="Genre === 'House' ? 'text-decoration: underline' : ''">House</Link> -
                        <Link href="?genre=Afrobeat" :style="Genre === 'Afrobeat' ? 'text-decoration: underline' : ''">Afrobeat</Link> -
                        <Link href="?genre=Piano" class="text-info" :style="Genre === 'Piano' ? 'text-decoration: underline' : ''">Piano</Link> -
                        <Link href="?genre=Other" :style="Genre === 'Other' ? 'text-decoration: underline' : ''">Other</Link>
                    </p>
                </h3>
            </div>
        </div>
    </div>
</section>
</template>

<script setup lang="ts">
import { route } from 'ziggy-js'
defineProps(['Genre'])
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