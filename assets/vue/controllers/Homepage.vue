<template>
    <div class="noise-filter"></div>
    <Toast 
        ref="toast"
        id="toast"
        :type="toastData.type"
        :message="toastData.message"
    />
    <Header />
    <Hero />
    <Tech />
    <Service />
    <About :api="api" />
    <Project :api="api" />
    <Reference :api="api" />
    <Contact  @showToast="showToast" />
    <Footer />
    <TopReturn />
</template>

<script setup>
import { ref, defineAsyncComponent } from 'vue';

import Header from '../layout/Header.vue';
import Hero from '../layout/Hero.vue';
import Toast from '../components/Toast.vue';

const props = defineProps({
    api: { type: Object, default: () => ({}) }
});

const Tech = defineAsyncComponent(() => import('../layout/Tech.vue'));
const Service = defineAsyncComponent(() => import('../layout/Service.vue'));
const About = defineAsyncComponent(() => import('../layout/About.vue'));
const Project = defineAsyncComponent(() => import('../layout/Project.vue'));
const Reference = defineAsyncComponent(() => import('../layout/Reference.vue'));
const Contact = defineAsyncComponent(() => import('../layout/Contact.vue'));
const Footer = defineAsyncComponent(() => import('../layout/Footer.vue'));
const TopReturn = defineAsyncComponent(() => import('../components/TopReturn.vue'));

const toast = ref(null);
const toastData = ref({
    message: '',
    type: '',
});

const showToast = (data) => {
    toastData.value.message = data.message;
    toastData.value.type = data.type;
    toast.value.showToast();
};
</script>