<template>
    <button ref="el" @click="scroll.toTop()" class="fixed bottom-3 sm:bottom-5 right-0 z-50 px-4 cursor-pointer group">
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-dark hover:bg-stone-800 border-2 border-gold">
            <svg class="w-6 h-6 text-gold animate-bounce" viewBox="0 0 24 24" fill="none">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15l7-7l7 7"/>
            </svg>
        </span>
        <span class="sr-only">Back to top</span>
    </button>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import gsap from 'gsap';
import { ScrollTrigger } from "gsap/ScrollTrigger";

import scroll from '../../js/scroll';

gsap.registerPlugin(ScrollTrigger);

const el = ref(null);

onMounted(() => {
    gsap.fromTo(el.value,
        { y: -50, opacity: 0 },
        {
            y: 0,
            opacity: 1,
            duration: 1,
            ease: "power2.out",
            scrollTrigger: {
                start: "300px top",
                end: "300px top",
                toggleActions: "play none reverse none",
                scrub: 1.2,
            },
        }
    );
});
</script>