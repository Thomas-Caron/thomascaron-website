<template>
    <section id="about" class="bg-dark px-3 sm:px-0 py-12">
        <div class="container mx-auto flex flex-col md:flex-row gap-4">
            <Fade direction="left">
                <p class="text-blue-gray w-full md:w-4/5 lg:w-3/5 self-center" v-html="about.content"></p>
            </Fade>
            <div class="w-full md:w-1/5 lg:w-2/5 flex justify-center md:justify-end items-center mt-5 md:mt-0">
                <Fade direction="right">
                    <div class="relative w-40 h-40 me-5 mb-5">
                        <img :src="`/build/images/about/${about.image}`" alt="Thomas Caron" width="160px" height="160px" loading="lazy" class="relative z-10 w-full h-full object-cover rounded-3xl border-2 border-gold/30" />
                        <EllipseGroup class="absolute min-w-[165%] scale-60 -left-8 -top-9" :opacity="true" />
                    </div>
                </Fade>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import EllipseGroup from '../components/EllipseGroup.vue';
import Fade from '../components/transitions/Fade.vue';

import useApi from '../composables/useApi.js';
const { get } = useApi();

const props = defineProps({
    api: { type: Object, default: () => ({}) }
});

const about = ref([]);

const getAbout = async () => {
    const response = await get(props.api.getAbout);

    if (response.success) {
        about.value = response.data;
    }
};

onMounted(() => {
    getAbout();
});
</script>