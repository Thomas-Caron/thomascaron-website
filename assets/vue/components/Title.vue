<template>
    <div class="relative">
        <EllipseGroup class="absolute -translate-x-28 -translate-y-33 scale-10" />
        <h3 :class="`text-xl text-${computedColor} font-bold ml-6 relative z-10`"><slot /></h3>
    </div>
</template>

<script setup>
import { computed } from 'vue';
import EllipseGroup from './EllipseGroup.vue';

const props = defineProps({
    color: {
        type: String,
        default: 'dark'
    }
});

const computedColor = computed(() => {
    return props.color === 'dark' ? 'dark' : 'blue-gray';
});
</script>