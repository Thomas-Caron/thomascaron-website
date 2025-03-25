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

const props = defineProps({
    direction: {
        type: String,
        default: 'up',
        validator: (value) => ["up", "down", "left", "right"].includes(value),
    }
});

const el = ref(null);

onMounted(() => {
    let from = { opacity: 0 };
    let to = { opacity: 1, duration: 1, ease: "power2.out" };

    if (["up", "down"].includes(props.direction)) {
        from.y = props.direction === "up" ? 100 : -100;
        to.y = 0;
    } else if (["left", "right"].includes(props.direction)) {
        from.x = props.direction === "right" ? 100 : -100;
        to.x = 0;
    }

    to.scrollTrigger = {
        trigger: el.value,
        start: "top 90%",
        end: "top 90%",
        toggleActions: "play none reverse none",
        scrub: 1.5,
    };

    gsap.fromTo(el.value, from, to);
});
</script>