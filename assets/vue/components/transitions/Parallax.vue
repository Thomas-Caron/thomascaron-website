<template>
    <div ref="el" class="will-change-transform">
        <slot />
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

const el = ref(null);
const hasScrolled = ref(false);

onMounted(() => {
    gsap.fromTo(
        el.value,
        { y: -400, opacity: 0 },
        { 
            y: 0,
            opacity: 1, 
            duration: 1, 
            ease: "power2.out", 
            onComplete: () => {
                window.addEventListener("scroll", detectFirstScroll, { passive: true });
            },
        },
    );
});

function detectFirstScroll() {
    if (!hasScrolled.value) {
        hasScrolled.value = true;
        setupParallax();
        window.removeEventListener("scroll", detectFirstScroll);
    }
};

const setupParallax = () => {
    if (!el.value) return;
    
    gsap.from(el.value, {
        y: 0,
    });
    gsap.to(el.value, {
        y: 200,
        ease: "none",
        scrollTrigger: {
            trigger: el.value,
            start: "top center",
            end: "bottom top",
            toggleActions: "play none reverse none",
            scrub: 1.2,
        },
    });
};
</script>