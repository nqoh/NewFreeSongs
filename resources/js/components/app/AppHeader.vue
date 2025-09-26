<template>
<section id="menu-h">

<nav class="navbar navbar-dropdown bg-color transparent navbar-fixed-top">
    <div class="container">

        <div class="mbr-table">
            <div class="mbr-table-cell">
                <div class="navbar-brand">
                    <a href="home" class="navbar-logo">
                        <img src="/assets/images/favCon.png" loading="lazy" alt="NewFreeMusic"></a>
                    <a class="navbar-caption text-info" href="home">NEWFREESONGS</a>
                </div>
            </div>

            <div class="mbr-table-cell">
                <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                    <div class="hamburger-icon"></div>
                </button>
                <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
                    <li class="nav-item dropdown">
                        <Link class="nav-link link" :style="$page.component == 'Welcome' ? active : ''" :href="route('home')">HOME</Link></li><li class="nav-item">
                        <Link class="nav-link link" :style="[$page.component == 'Music' ? active : '', $page.component == 'DownloadTrack' ? active : '']" :href="route('music')">MUSIC</Link></li><li class="nav-item">
                        <Link class="nav-link link" :style="[$page.component == 'Videos' ? active : '', $page.component == 'ViewVideo' ? active : '']" :href="route('videos')">VIDEOS</Link></li><li class="nav-item">
                        <Link class="nav-link link" :style="[$page.component == 'News' ? active : '',$page.component == 'ReadArticle' ? active : '']"  :href="route('news')">NEWS</Link></li><li class="nav-item dropdown">
                        <a class="nav-link link dropdown-toggle" :style="[$page.component == 'Terms' ? active : '', $page.component == 'Privacy' ? active : '', $page.component == 'Contactus' ? active : '']"  data-toggle="dropdown-submenu"  aria-expanded="false">
                            HELP</a><div class="dropdown-menu">
                            <Link class="dropdown-item" :style="$page.component == 'Terms' ? active : ''" :href="route('terms')">TERMS</Link>
                            <Link class="dropdown-item" :style="$page.component == 'Privacy' ? active : ''" :href="route('privacy')">PRIVACY POLICY</Link>
                            <Link class="dropdown-item" :style="$page.component == 'Contactus' ? active : ''" :href="route('contactus')">CONTACT US</Link></div></li></ul>

                <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                    <div class="close-icon"></div>
                </button>

            </div>

        </div>

    </div>
</nav>

</section>
</template>

<script setup lang="ts">
    import { route } from 'ziggy-js'
    const active = 'color:#F1C050; text-decoration:underline'
</script>
