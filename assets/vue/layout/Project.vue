<template>
    <section id="project" class="container mx-auto px-3 sm:px-0 py-12">
        <Fade direction="up">
            <Title class="mb-6" color="dark">Mes projets</Title>
        </Fade>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            <Card 
                v-for="(card, index) in cards" 
                :key="index"
                class="col-span-1"
                :is-wip="!card.finished"
                :image="card.image"
                time="De janvier 2021 à février 2025"
                :name="card.companyName"
                :type="card.companyType"
                :content="card.content"
                :url="card.link"
            />
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import Card from '../components/Card.vue';
import Fade from '../components/transitions/Fade.vue';
import Title from '../components/Title.vue';

import useApi from '../composables/useApi.js';
const { get } = useApi();

const props = defineProps({
    api: { type: Object, default: () => ({}) }
});

const cards = ref([]);

const getProjects = async () => {
    const response = await get(props.api.getProjects);

    if (response.success) {
        cards.value = response.data;
    }
};

onMounted(() => {
    getProjects();
});
</script>