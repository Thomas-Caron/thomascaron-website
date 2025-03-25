<template>
    <header ref="el" class="absolute w-full bg-transparent border-none z-50 transition-all">
        <nav class="container flex flex-wrap items-center justify-between mx-auto px-3 sm:px-0 py-5">
            <a href="/" class="flex items-center">
                <img src="build/images/logo.svg" class="h-10" alt="Thomas Caron Logo" />
            </a>

            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button @click="scroll.toSection('contact')" type="button" class="text-gold border border-gold bg-transparent hover:bg-gold hover:text-white cursor-pointer focus:bg-gold focus:text-white focus:border-gold focus:ring-2 focus:ring-gold focus:ring-offset-2 focus:ring-offset-dark font-medium rounded-full text-sm px-4 py-2 text-center transition duration-500 ease-in-out">
                    Me contacter
                </button>

                <button 
                    data-collapse-toggle="navbar-sticky" 
                    type="button" 
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-blue-gray rounded-lg md:hidden hover:bg-blue-gray/10 focus:outline-none focus:ring-1 focus:ring-blue-gray" 
                    aria-controls="navbar-sticky" 
                    aria-expanded="false"
                    @click="isMenuOpen = !isMenuOpen"
                >
                    <span class="sr-only">Open main menu</span>
                    <svg v-if="!isMenuOpen" class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>

                    <svg v-else class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M1 1l12 12M13 1L1 13"/>
                    </svg>
                </button>
            </div>

            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 md:space-x-6 rtl:space-x-reverse md:flex-row md:mt-0">
                    <li>
                        <button @click="scroll.toSection('service')" type="button" class="block text-sm py-2 px-3 text-blue-gray hover:text-gold cursor-pointer transition duration-500 ease-in-out">Services</button>
                    </li>
                    <li>
                        <button @click="scroll.toSection('about')" type="button" class="block text-sm py-2 px-3 text-blue-gray hover:text-gold cursor-pointer transition duration-500 ease-in-out">À propos</button>
                    </li>
                    <li>
                        <button @click="scroll.toSection('project')" type="button" class="block text-sm py-2 px-3 text-blue-gray hover:text-gold cursor-pointer transition duration-500 ease-in-out">Projets</button>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import gsap from 'gsap';
import { ScrollTrigger } from "gsap/ScrollTrigger";

import scroll from '../../js/scroll.js';

gsap.registerPlugin(ScrollTrigger);

const el = ref(null);
const isMenuOpen = ref(false);

onMounted(() => {
    gsap.fromTo(el.value, {},
        { 
            duration: 1, 
            ease: "power2.out",
            scrollTrigger: {
                trigger: el.value,
                start: "900px top",
                end: "900px top",
                toggleActions: "play none reverse none",
                scrub: true,
                onEnter: (data) => {
                    gsap.fromTo(data.trigger, { y: -400 }, { 
                        y: 0, 
                        onComplete: ()=> {
                            data.trigger.classList.add("bg-dark", "border-b", "border-white/10", "fixed");
                            data.trigger.classList.remove("bg-transparent", "border-none", "absolute");
                        }
                    });
                },
                onLeaveBack: (data) => {
                    data.trigger.classList.add("bg-transparent", "border-none", "absolute");
                    data.trigger.classList.remove("bg-dark", "border-b", "border-white/10", "fixed");
                },
            },
        }
    );
});
</script>