<template>
    <section id="service" class="container mx-auto px-3 md:px-0 py-12">
        <Fade direction="up">
            <Title class="mb-6" color="dark">Mes services</Title>
        </Fade>
        <Fade direction="up">
            <ol class="md:flex">
                <li class="relative mb-3 md:mb-0 group">
                    <div class="flex items-center">
                        <div class="z-10 flex items-center justify-center w-10 h-10 rounded-full text-dark/80 group-hover:text-gold ring-2 ring-dark/80 group-hover:ring-gold shrink-0 transition duration-500 ease-in-out">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                <path fill="currentColor" d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m32 32h-64c-17.6 0-33.5 7.1-45.1 18.6c40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64m-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32S208 82.1 208 144s50.1 112 112 112m76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2m-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4"/>
                            </svg>
                        </div>
                        <div class="hidden md:flex w-full mx-4 bg-dark/80 group-hover:bg-gold h-0.5 transition duration-500 ease-in-out"></div>
                    </div>
                    <div class="ms-5 ps-5 md:ms-0 md:ps-0 mt-3 md:pe-8 border-s-2 border-dark/80 group-hover:border-gold md:border-none transition duration-500 ease-in-out">
                        <h4 class="font-semibold text-dark">Analyse & Planification</h4>
                        <p class=" h-10 font-light leading-none text-dark">Comprendre vos besoins et définir une stratégie</p>
                        <p class="text-dark">Chaque projet est unique. L’objectif est d’analyser vos besoins et vos contraintes techniques afin de poser des bases solides pour le développement de votre solution.</p>
                    </div>
                </li>
                <li class="relative mb-3 md:mb-0  group">
                    <div class="flex items-center">
                        <div class="z-10 flex items-center justify-center w-10 h-10 rounded-full text-dark/80 group-hover:text-gold ring-2 ring-dark/80 group-hover:ring-gold shrink-0 transition duration-500 ease-in-out">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                <path fill="currentColor" d="M64 96c0-35.3 28.7-64 64-64h384c35.3 0 64 28.7 64 64v256h-64V96H128v256H64zM0 403.2C0 392.6 8.6 384 19.2 384h601.6c10.6 0 19.2 8.6 19.2 19.2c0 42.4-34.4 76.8-76.8 76.8H76.8C34.4 480 0 445.6 0 403.2M281 209l-31 31l31 31c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-48-48c-9.4-9.4-9.4-24.6 0-33.9l48-48c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9zm112-34l48 48c9.4 9.4 9.4 24.6 0 33.9l-48 48c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l31-31l-31-31c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0z"/>
                            </svg>
                        </div>
                        <div class="hidden md:flex w-full mx-4 bg-dark/80 group-hover:bg-gold h-0.5 transition duration-500 ease-in-out"></div>
                    </div>
                    <div class="ms-5 ps-5 md:ms-0 md:ps-0 mt-3 md:pe-8 border-s-2 border-dark/80 group-hover:border-gold md:border-none transition duration-500 ease-in-out">
                        <h4 class="font-semibold text-dark">Développement & Intégration</h4>
                        <p class="h-10 font-light leading-none text-dark">Du concept à la réalité</p>
                        <p class="text-dark">Une fois la structure définie, place à la construction ! J’utilise des technologies modernes et adaptées à votre projet pour garantir performance, sécurité et évolutivité.</p>
                    </div>
                </li>
                <li class="relative mb-3 md:mb-0 group">
                    <div class="flex items-center">
                        <div class="z-10 flex items-center justify-center w-10 h-10 rounded-full text-dark/80 group-hover:text-gold ring-2 ring-dark/80 group-hover:ring-gold shrink-0 transition duration-500 ease-in-out">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="currentColor" d="M32 0c17.7 0 32 14.3 32 32v16l69-17.2c38.1-9.5 78.3-5.1 113.5 12.5c46.3 23.2 100.8 23.2 147.1 0l9.6-4.8c20.6-10.4 44.8 4.6 44.8 27.6v279.7c0 13.3-8.3 25.3-20.8 30l-34.7 13c-46.2 17.3-97.6 14.6-141.7-7.4c-37.9-19-81.3-23.7-122.5-13.4L64 384v96c0 17.7-14.3 32-32 32S0 497.7 0 480V32C0 14.3 14.3 0 32 0m32 187.1l64-13.9v65.5l-64 13.9V318l48.8-12.2c5.1-1.3 10.1-2.4 15.2-3.3v-63.9l38.9-8.4c8.3-1.8 16.7-2.5 25.1-2.1v-64c13.6.4 27.2 2.6 40.4 6.4l23.6 6.9v66.7l-41.7-12.3c-7.3-2.1-14.8-3.4-22.3-3.8v71.4c21.8 1.9 43.3 6.7 64 14.4V244l22.7 6.7c13.5 4 27.3 6.4 41.3 7.4v-64.2c-7.8-.8-15.6-2.3-23.2-4.5l-40.8-12v-62c-13-3.8-25.8-8.8-38.2-15c-8.2-4.1-16.9-7-25.8-8.8V164c-13-.4-26 .8-38.7 3.6l-25.3 5.6V98l-64 16zm256 148.6c16.8 1.5 33.9-.7 50-6.8l14-5.2V252l-7.9 1.8c-18.4 4.3-37.3 5.7-56.1 4.5zm64-149.4v-70.8c-20.9 6.1-42.4 9.1-64 9.1V194c13.9 1.4 28 .5 41.7-2.6l22.3-5.2z"/>
                            </svg>
                        </div>
                        <div class="hidden md:flex w-full mx-4 bg-dark/80 group-hover:bg-gold h-0.5 transition duration-500 ease-in-out"></div>
                    </div>
                    <div class="ms-5 ps-5 md:ms-0 md:ps-0 mt-3 md:pe-8 border-s-2 border-dark/80 group-hover:border-gold md:border-none transition duration-500 ease-in-out">
                        <h4 class="font-semibold text-dark">Livraison & Optimisation</h4>
                        <p class="h-10 font-light leading-none text-dark">Un produit final fiable et performant</p>
                        <p class="text-dark">Le projet est mis en ligne après une phase de tests rigoureuse. Selon vos besoins, des ajustements et optimisations sont réalisés pour assurer une solution efficace et durable.</p>
                    </div>
                </li>
            </ol>
        </Fade>
    </section>
</template>

<script setup>
import Fade from '../components/transitions/Fade.vue';
import Title from '../components/Title.vue';
</script>