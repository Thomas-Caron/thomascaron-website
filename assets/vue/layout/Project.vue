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
                :is-wip="card.isWip"
                :image="card.image"
                :time="card.time"
                :name="card.name"
                :type="card.type"
                :contents="card.contents"
                :url="card.url"
            />
        </div>
    </section>
</template>

<script setup>
import { ref } from 'vue';
import Card from '../components/Card.vue';
import Fade from '../components/transitions/Fade.vue';
import Title from '../components/Title.vue';

const cards = ref([
    {
        isWip: true,
        image: {
            path: '/build/images/comunloup.webp',
            alt: 'Logo Com\'Un Loup'
        },
        time: 'De mars 2025 à aujourd\'hui',
        name: 'Com\'un loup',
        type: 'Communication',
        contents: [
            'Wireframe',
            'Intégration des maquettes',
        ],
        url: 'https://comunloup.com',
    },
    {
        isWip: true,
        image: {
            path: '/build/images/finaro.webp',
            alt: 'Logo Finaro'
        },
        time: 'De novembre 2024 à aujourd\'hui',
        name: 'Finaro',
        type: 'Finance (projet perso)',
        contents: [
            'Authentification',
            'Architecture des données pour la base de donnée',
            'Création d\'un simulateur d\'intérêts composés',
            'Création d\'un simulateur de crédit immobilier',
        ],
        url: 'https://thomascaron.finaro.com',
    },
    {
        isWip: false,
        image: {
            path: '/build/images/yoonest.webp',
            alt: 'Logo Yoonest'
        },
        time: 'De janvier 2021 à février 2025',
        name: 'Yoonest',
        type: 'Immobilier',
        contents: [
            'Maintenir et faire évoluer l\'application',
            'Participer à la création d\’un nouveau CRM',
            'Intégrer les maquettes',
            'Participer à la mise en place d\'un Design System',
            'Intégration des composants du Desgin System',
            'Concevoir des API',
            'Migration de Symfony 4 vers Symfony 6',
            'Migration de Vue2 vers Vue3',
            'Réaliser des tests automatisés (unitaire - end-to-end)',
            'Participer à la création du service de facturation',
            'Importation et transformation des données (récupération des lots via API - XML - FTP - crawler)',
        ],
        url: 'https://yoonest.com',
    }
]);
</script>