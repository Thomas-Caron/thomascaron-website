<template>
    <div 
        v-if="isVisible"
        :id="id"
        :class="[
            { 'text-green-100 border-green-900': isSuccess, 'text-red-100 border-red-900': isError },
            'fixed z-50 top-25 right-5 flex items-center w-full max-w-xs p-4 mb-4 bg-dark rounded-lg shadow-sm border'
        ]"
        role="alert"
    >
        <div :class="[
                {'text-green-500 bg-green-100': isSuccess, 'text-red-500 bg-red-100': isError },
                'inline-flex items-center justify-center shrink-0 w-8 h-8 rounded-lg'
            ]"
        >
            <svg v-if="isSuccess" class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <svg v-if="isError" class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </div>
        <div class="ms-3 text-sm font-normal">{{ message }}</div>
        <button @click="hideToast" type="button" class="ms-auto -mx-1.5 -my-1.5 text-blue-gray hover:bg-blue-gray/10 rounded-lg focus:ring-1 focus:ring-blue-gray p-1.5  inline-flex items-center justify-center h-8 w-8" :data-dismiss-target="`#${id}`" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
</template>

<script setup>
import { ref, computed } from "vue";

const isVisible = ref(false);

const props = defineProps({
    id: {
        type: String,
        required: true
    },
    type: {
        type: String,
        default: 'success'
    },
    message: {
        type: String,
        default: ''
    }
});

const isSuccess = computed(() => {
    return props.type === 'success';
});
const isError = computed(() => {
    return props.type === 'error';
});

const showToast = () => {
  isVisible.value = true;
};
const hideToast = () => {
    isVisible.value = false;
};

defineExpose({ showToast, hideToast });
</script>