<template>
    <section class="h-svh bg-dark bg-linear-to-b from-dark-lightest from-0% via-gold-lightest via-10% to-dark-lightest to-100%">
        <div class="container mx-auto px-3 sm:px-0 flex flex-col h-full relative overflow-hidden">

            <Parallax class="flex justify-end">
                <EllipseGroup class="w-70 translate-y-30 translate-x-7 lg:translate-x-0 scale-80 lg:scale-100" :opacity="true" />
            </Parallax>

            <Parallax class="z-10 w-full">
                <h1 class="text-white uppercase font-extrabold tracking-widest text-5xl">Thomas Caron</h1>
                <h2 class="text-gold font-light text-5xl">Développeur web</h2>
            </Parallax>

            <div class="h-full w-full absolute translate-x-20 md:translate-x-50 xl:translate-x-70">
                <ThreeScene />
            </div>
        </div>
    </section>
</template>

<script setup>
import EllipseGroup from '../components/EllipseGroup.vue';
import Parallax from '../components/transitions/Parallax.vue';
import ThreeScene from '../components/ThreeScene.vue';
</script>