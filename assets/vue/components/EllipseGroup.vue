<template>
    <div class="grid grid-cols-9 gap-4">
        <span 
            v-for="(ellipse, index) in 81" 
            :key="index" 
            :class="`w-4 h-4 ${ opacity ? 'bg-gold/40' : 'bg-gold' } rounded-full`"
        ></span>
    </div>
</template>

<script setup>
const props = defineProps({
    opacity: {
        type: Boolean,
        default: false,
    }
});
</script>