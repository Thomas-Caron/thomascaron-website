<template>
    <section class="bg-dark py-12">
        <div class="container mx-auto px-3 sm:px-0">
            <div class="relative w-full overflow-hidden">
                <Fade direction="up">
                    <div class="flex items-center transition-transform duration-500 ease-in-out" :style="translateStyle">
                        <div v-for="(slide, index) in slides" :key="index" class="min-w-full px-15 md:px-40 lg:px-60 xl:px-80 pb-12">
                            <p class="text-blue-gray text-lg font-semibold">{{ slide.firstname  }} {{ slide.lastname  }}</p>
                            <p class="text-blue-gray text-sm font-light italic">{{ slide.company  }}</p>
                            <p class="text-blue-gray mt-5" v-html="slide.content"></p>
                        </div>
                    </div>

                    <div class="absolute z-30 flex -translate-x-1/2 bottom-1 left-1/2 space-x-2">
                        <button 
                            v-for="(slide, index) in slides"
                            :key="index"
                            :class="[
                                currentIndex === index
                                    ? 'bg-gold w-5'
                                    : 'bg-blue-gray/40 w-3',
                                'h-3 rounded-full cursor-pointer transition-all duration-500 ease-in-out'
                            ]"
                            :aria-label="`Slide ${index + 1}`"
                            @click="goToSlide(index)"
                        />
                    </div>

                    <button @click="prevSlide" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group">
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-blue-gray/20 hover:bg-blue-gray/40 group-focus:ring-2 group-focus:ring-blue-gray/50">
                            <svg class="w-4 h-4 text-blue-gray" viewBox="0 0 6 10" fill="none">
                                <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 1 1 5l4 4"/>
                            </svg>
                        </span>
                    </button>

                    <button @click="nextSlide" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group">
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-blue-gray/20 hover:bg-blue-gray/40 group-focus:ring-2 group-focus:ring-blue-gray/50">
                            <svg class="w-4 h-4 text-blue-gray" viewBox="0 0 6 10" fill="none">
                                <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="m1 9 4-4-4-4"/>
                            </svg>
                        </span>
                    </button>
                </Fade>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, computed, onMounted, onUnmounted } from 'vue';
import Fade from '../components/transitions/Fade.vue';

import useApi from '../composables/useApi.js';
const { get } = useApi();

const props = defineProps({
    api: { type: Object, default: () => ({}) }
});

const slides = ref([]);

const currentIndex = ref(0);
let interval = null;

const nextSlide = () => {
  currentIndex.value = (currentIndex.value + 1) % slides.value.length;
};

const prevSlide = () => {
  currentIndex.value = (currentIndex.value - 1 + slides.value.length) % slides.value.length;
};

const goToSlide = (index) => {
  currentIndex.value = index;
};

const startAutoSlide = () => {
  interval = setInterval(nextSlide, 8000);
};

const translateStyle = computed(() => `transform: translateX(-${currentIndex.value * 100}%);`);

const getReferences = async () => {
    const response = await get(props.api.getReferences);

    if (response.success) {
        slides.value = response.data;
    }
};

onMounted(() => {
    getReferences();
    startAutoSlide();
});

onUnmounted(() => clearInterval(interval));
</script>