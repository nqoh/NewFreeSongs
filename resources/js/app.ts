import '../../public/assets/bootstrap/css/bootstrap.min.css'
import '../../public/assets/animate.css/animate.min.css'
import '../../public/assets/dropdown/css/style.css'
import '../../public/assets/theme/css/style.css'
import '../../public/assets/css/mbr-additional.css'
import '../../public/assets/socicon/css/styles.css'


import { createInertiaApp, Head, Link, useForm } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import type { DefineComponent } from 'vue';
import { createApp, h } from 'vue';
import { ZiggyVue } from 'ziggy-js';
import DefaultLayout from './layouts/DefaultLayout.vue';


const appName = import.meta.env.VITE_APP_NAME ;

createInertiaApp({
    title: title => `${title}  ${appName} `, 
      resolve: async (name:string) =>{
        const page = await  resolvePageComponent([`./pages/${name}.vue`]  , import.meta.glob<DefineComponent>('./pages/**/*.vue'));
         page.default.layout ??= DefaultLayout;
         return page;
    },
  
   setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component('Head', Head)
            .component('Link', Link)
            .component('useForm', useForm)
            .mount(el);
    },
    
    progress:{
      color:'#F1C050'
    }
});

