<template>
    <Fade direction="up">
        <div 
            class="bg-white relative border border-gray-200 rounded-lg shadow-sm overflow-hidden"
            @mouseenter="hovering = true"
            @mouseleave="hovering = false"
        >

            <div 
                :class="[
                    { 'opacity-0': !computedIsWip, 'opacity-100': computedIsWip, 'pointer-events-none': !computedIsWip },
                    'z-10 absolute bg-dark/30 backdrop-blur-xs flex flex-col justify-center items-center h-full w-full rounded-lg p-20 transition-opacity duration-300 ease-in-out'
                ]"
            >
                <svg class="w-10 h-10 text-white animate-spin mb-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12 15.5A3.5 3.5 0 0 1 8.5 12A3.5 3.5 0 0 1 12 8.5a3.5 3.5 0 0 1 3.5 3.5a3.5 3.5 0 0 1-3.5 3.5m7.43-2.53c.04-.32.07-.64.07-.97s-.03-.66-.07-1l2.11-1.63c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.31-.61-.22l-2.49 1c-.52-.39-1.06-.73-1.69-.98l-.37-2.65A.506.506 0 0 0 14 2h-4c-.25 0-.46.18-.5.42l-.37 2.65c-.63.25-1.17.59-1.69.98l-2.49-1c-.22-.09-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64L4.57 11c-.04.34-.07.67-.07 1s.03.65.07.97l-2.11 1.66c-.19.15-.25.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1.01c.52.4 1.06.74 1.69.99l.37 2.65c.04.24.25.42.5.42h4c.25 0 .46-.18.5-.42l.37-2.65c.63-.26 1.17-.59 1.69-.99l2.49 1.01c.22.08.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64z"/>
                </svg>
                <p class="text-white text-lg text-center font-bold mt-3">En cours de développement</p>
            </div>

            <img class="w-full h-50 object-cover" :src="image.path" :alt="image.alt" width="400px" height="200px" loading="lazy" />
            <div class="p-5">
                <time class="block text-dark text-right text-sm font-extralight mb-3">{{ time }}</time>

                <h5 class="uppercase text-dark text-lg font-bold">{{ name }}</h5>
                <p class="text-dark font-light leading-none mb-3">{{ type }}</p>

                <div class="relative mb-8">
                    <ul 
                        ref="el"
                        :class="[{ 'overflow-hidden': !expanded, 'h-48': !expanded,},
                            'text-dark'
                        ]"
                    >
                        <li v-for="(content, index) in contents" :key="index">▸ {{ content }}</li>
                    </ul>

                    <button 
                        v-if="isOverflowing" 
                        @click="expanded = !expanded" 
                        class="absolute -bottom-5 right-0 italic text-gold/60 flex items-center hover:underline cursor-pointer"
                    >
                        {{ expanded ? 'Voir moins' : 'Voir plus' }}
                        <svg v-if="expanded" class="w-4 h-4 ms-2 text-gold/60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1280">
                            <path fill="currentColor" d="M1024 960q0 26-19 45t-45 19H64q-26 0-45-19T0 960t19-45l448-448q19-19 45-19t45 19l448 448q19 19 19 45"/>
                        </svg>
                        <svg v-if="!expanded" class="w-4 h-4 ms-2 text-gold/60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1280">
                            <path fill="currentColor" d="M1024 448q0 26-19 45L557 941q-19 19-45 19t-45-19L19 493Q0 474 0 448t19-45t45-19h896q26 0 45 19t19 45"/>
                        </svg>
                    </button>
                </div>

                <span class="flex">
                    <svg class="text-gold w-5 h-5 me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0-18 0m.6-3h16.8M3.6 15h16.8"/>
                            <path d="M11.5 3a17 17 0 0 0 0 18m1-18a17 17 0 0 1 0 18"/>
                        </g>
                    </svg>
                    <a class="italic hover:underline" :href="url" target="_blank">
                        {{ url }}
                    </a>
                </span>

            </div>
        </div>
    </Fade>
</template>

<script setup>
import { ref, computed, onMounted, nextTick } from 'vue';
import Fade from './transitions/Fade.vue';

const el = ref(null);
const expanded = ref(false);
const hovering = ref(false);
const isOverflowing = ref(false);

const prop = defineProps({
    isWip: {
        type: Boolean,
        default: false
    },
    image: {
        type: Object,
        default: {
            path: '',
            alt: ''
        }
    },
    time: {
        type: String,
        default: ''
    },
    name: {
        type: String,
        default: ''
    },
    type: {
        type: String,
        default: ''
    },
    contents: {
        type: Array,
        default: []
    },
    url: {
        type: String,
        default: ''
    }
});

onMounted(async () => {
    await nextTick();
    if (el.value) {
        isOverflowing.value = el.value.scrollHeight > el.value.clientHeight;
    }
});

const computedIsWip = computed(() => {
    return prop.isWip && !hovering.value;
});
</script>