<template>
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
    <About />
    <Project />
    <Reference />
    <Contact  @showToast="showToast" />
    <Footer />
    <Back />
</template>

<script setup>
import { ref } from 'vue';

import Back from '../components/Back.vue';
import Toast from '../components/Toast.vue';
import Header from '../layout/Header.vue';
import Hero from '../layout/Hero.vue';
import Tech from '../layout/Tech.vue';
import Service from '../layout/Service.vue';
import About from '../layout/About.vue';
import Project from '../layout/Project.vue';
import Reference from '../layout/Reference.vue';
import Contact from '../layout/Contact.vue';
import Footer from '../layout/Footer.vue';

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