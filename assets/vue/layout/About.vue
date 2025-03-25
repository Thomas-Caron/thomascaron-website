<template>
    <section id="about" class="bg-dark px-3 sm:px-0 py-12">
        <div class="container mx-auto flex flex-col md:flex-row gap-4">
            <Fade direction="left">
                <p class="text-blue-gray w-full md:w-4/5 lg:w-3/5 self-center">Passionné par le développement d’applications métiers, je suis développeur FullStack avec plus de <span class="font-extrabold">4 années d'expérience</span> dans la création de plateformes web et d’applications sur mesure. Je maîtrise toutes les étapes d’un projet, de la conception au déploiement et à la maintenance, et je m’engage à fournir des solutions performantes, évolutives et parfaitement adaptées aux besoins spécifiques de chaque client.</p>
            </Fade>
            <div class="w-full md:w-1/5 lg:w-2/5 flex justify-center md:justify-end items-center mt-5 md:mt-0">
                <Fade direction="right">
                    <div class="relative w-40 h-40 me-5 mb-5">
                        <img src="build/images/about.webp" alt="Thomas Caron" class="relative z-10 w-full h-full object-cover rounded-3xl border-2 border-gold/30" />
                        <EllipseGroup class="absolute min-w-[165%] scale-60 -left-8 -top-9" :opacity="true" />
                    </div>
                </Fade>
            </div>
        </div>
    </section>
</template>

<script setup>
import EllipseGroup from '../components/EllipseGroup.vue';
import Fade from '../components/transitions/Fade.vue';
</script>