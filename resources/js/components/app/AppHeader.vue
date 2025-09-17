<template>
<section id="menu-h">

<nav class="navbar navbar-dropdown bg-color transparent navbar-fixed-top">
    <div class="container">

        <div class="mbr-table">
            <div class="mbr-table-cell">
                <div class="navbar-brand">
                    <a href="home" class="navbar-logo">
                        <img src="assets/images/favCon.png" loading="lazy" alt="NewFreeMusic"></a>
                    <a class="navbar-caption text-info" href="home">NEWFREESONGS</a>
                </div>
            </div>

            <div class="mbr-table-cell">
                
                <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                    <div class="hamburger-icon"></div>
                </button>

                <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
                    <li class="nav-item dropdown"><a class="nav-link link" href="home">HOME</a></li><li class="nav-item">
                        <a class="nav-link link" href="music">MUSIC</a></li><li class="nav-item">
                        <a class="nav-link link" href="videos">VIDEOS</a></li><li class="nav-item">
                        <a class="nav-link link" href="news">NEWS</a></li><li class="nav-item dropdown">
                        <a class="nav-link link dropdown-toggle" data-toggle="dropdown-submenu"  aria-expanded="false">
                            HELP</a><div class="dropdown-menu"><a class="dropdown-item" href="terms">Terms</a>
                            <a class="dropdown-item" href="privacy">Privacy policy</a>
                            <a class="dropdown-item" href="contactus">Contact us</a></div></li></ul>

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
</script>