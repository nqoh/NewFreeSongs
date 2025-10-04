<template>
   <section id="menu-h">
    <nav class="navbar navbar-dropdown bg-color transparent navbar-fixed-top">
      <div class="container">
        <div class="mbr-table">
            <div class="mbr-table-cell">
                <div class="navbar-brand">
                    <Link :href="route('home')" class="navbar-logo">
                        <img src="/assets/images/favCon.png" loading="lazy" alt="NewFreeMusic">
                    </Link>
                    <Link class="navbar-caption text-info" :href="route('home')" >NEWFREESONGS </Link>
                    <span style="margin-left: 50%;">
                       <Link class="nav-link link" >Upload</Link> -
                       <Link class="nav-link link" >Edit</Link>
                       <Link class="nav-link link" :style="[$page.component == 'Admin/Auth/Register' ? active : '']"  :href="route('Register')">Add Admin</Link>
                    </span>
                </div>
            </div>

            <div class="mbr-table-cell">

              <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" >
                   <span v-if="!$page.props.auth.user">
                      <li class="nav-item dropdown" >
                        <Link class="nav-link link" :style="[$page.component == 'Admin/Auth/Login' ? active : '']" :href="route('Login')">Login</Link>
                     </li>
                   </span>

                   <span v-else>
                    <li  class="nav-item">
                     <span class="title">Supper Admin</span>&nbsp;&nbsp; 
                     <span class="title" style="font-size: 30px;">
                        {{ $page.props.auth.user.name.toUpperCase() }}
                    </span>
                    </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    
                    <li class="nav-item">
                       <Link class="btn btn-danger" :href="route('Logout')">Logout</Link>
                    </li>
                   </span>
               </ul>
            </div>
        </div>
    </div>
</nav>
</section>
<slot />
</template>

<script setup lang="ts">
    import { route } from 'ziggy-js'
     const active = 'color:#F1C050; text-decoration:underline'
</script>

<style scoped>

</style>