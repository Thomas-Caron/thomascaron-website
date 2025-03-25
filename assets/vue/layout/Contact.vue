<template>
    <section id="contact" class="container mx-auto px-3 sm:px-0 py-12" >
        <div class="relative rounded-lg p-12 -mb-24 bg-dark bg-linear-to-t from-gold-lightest from-0% to-dark-lightest to-100%">
            <Fade direction="up">
                <h3 class="text-center text-blue-gray text-lg font-bold uppercase pb-12">Prendre Contact</h3>
            </Fade>

            <Fade direction="up">
                <Title color="light" >Mes coordonées</Title>
            </Fade>
            <Fade direction="up">
                <div class="grid grid-cols-1 md:grid-cols-3 my-6" >
                    <div class="grid grid-cols-[50px_auto] grid-rows-2 mb-5 md:mb-0">
                        <div class="col-span-1 row-span-2 flex justify-center">
                            <svg class="w-6 h-6 text-gold" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m16.556 12.906l-.455.453s-1.083 1.076-4.038-1.862s-1.872-4.014-1.872-4.014l.286-.286c.707-.702.774-1.83.157-2.654L9.374 2.86C8.61 1.84 7.135 1.705 6.26 2.575l-1.57 1.56c-.433.432-.723.99-.688 1.61c.09 1.587.808 5 4.812 8.982c4.247 4.222 8.232 4.39 9.861 4.238c.516-.048.964-.31 1.325-.67l1.42-1.412c.96-.953.69-2.588-.538-3.255l-1.91-1.039c-.806-.437-1.787-.309-2.417.317"/>
                            </svg>
                        </div>
                        <p class="text-blue-gray col-span-1 row-span-1 mb-2">
                            Téléphone
                        </p>
                        <a href="tel:+33647863514" class="text-blue-gray italic font-light hover:underline col-span-1 row-span-1">
                            +33 6 47 86 35 14
                        </a>
                    </div>
                    <div class="grid grid-cols-[50px_auto] grid-rows-2 mb-5 md:mb-0">
                        <div class="col-span-1 row-span-2 flex justify-center">
                            <svg class="w-6 h-6 text-gold" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7m0 9.5a2.5 2.5 0 0 1 0-5a2.5 2.5 0 0 1 0 5"/>
                            </svg>
                        </div>
                        <p class="text-blue-gray col-span-1 row-span-1 mb-2">
                            Adresse
                        </p>
                        <p class="text-blue-gray italic font-light col-span-1 row-span-1">
                            44000 Nantes
                        </p>
                    </div>
                    <div class="grid grid-cols-[50px_auto] grid-rows-2">
                        <div class="col-span-1 row-span-2 flex justify-center">
                            <svg class="w-6 h-6 text-gold" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M4.616 19q-.691 0-1.153-.462T3 17.384V6.616q0-.691.463-1.153T4.615 5h14.77q.69 0 1.152.463T21 6.616v10.769q0 .69-.463 1.153T19.385 19zM12 11.96q.125 0 .234-.038q.108-.038.214-.093l7.229-4.733q.142-.086.185-.235t-.016-.297q-.038-.193-.252-.28q-.213-.086-.413.035L12 11L4.82 6.32q-.2-.122-.404-.052t-.262.276q-.058.154-.015.313t.184.24l7.229 4.732q.106.055.214.093q.109.037.234.037"/>
                            </svg>
                        </div>
                        <p class="text-blue-gray col-span-1 row-span-1 mb-2">
                            Mail
                        </p>
                        <a href="mailto:thomas.caron.dev@gmail.com" class="text-blue-gray italic font-light hover:underline col-span-1 row-span-1">
                            thomas.caron.dev@gmail.com
                        </a>
                    </div>
                </div>
            </Fade>

            <Fade direction="up">
                <Title class="mb-6" color="light" >Premier contact</Title>
            </Fade>
            <Fade direction="up">
                <form @submit.prevent="submitForm" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="col-span-2 md:col-span-1">
                        <div class="relative">
                            <input 
                                type="text" 
                                id="username" 
                                :class="`block px-2.5 pb-2.5 pt-4 w-full text-sm ${ errors.username ? 'text-red-400' : 'text-blue-gray' } bg-transparent rounded-lg border-1 ${ errors.username ? 'border-red-400' : 'border-blue-gray' } appearance-none focus:outline-none focus:ring-0 ${ errors.username ? 'focus-red-400' : 'focus-gold' } peer`"
                                placeholder=" "
                                v-model="formData.username"
                                @blur="validateForm()"
                            />
                            <label 
                                for="username" 
                                :class="`absolute text-sm ${ errors.username ? 'text-red-400' : 'text-blue-gray' } duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-[#25211D] px-2 peer-focus:px-2 ${ errors.username ? 'peer-focus:text-red-400' : 'peer-focus:text-gold' } peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1`"
                            >
                                Nom & Prénom
                            </label>
                        </div>
                        <p v-if="errors.username" class="mt-2 text-xs text-red-400">{{ errors.username }}</p>
                    </div>
                    <div class="col-span-2 md:col-span-1">
                        <div class="relative">
                            <input 
                                type="text"
                                id="mail"
                                :class="`block px-2.5 pb-2.5 pt-4 w-full text-sm ${ errors.mail ? 'text-red-400' : 'text-blue-gray' } bg-transparent rounded-lg border-1 ${ errors.mail ? 'border-red-400' : 'border-blue-gray' } appearance-none focus:outline-none focus:ring-0 ${ errors.mail ? 'focus-red-400' : 'focus-gold' } peer`"
                                placeholder=" "
                                v-model="formData.mail" 
                                @blur="validateForm()"
                            />
                            <label 
                                for="mail"
                                :class="`absolute text-sm ${ errors.mail ? 'text-red-400' : 'text-blue-gray' } duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-[#25211D] px-2 peer-focus:px-2 ${ errors.mail ? 'peer-focus:text-red-400' : 'peer-focus:text-gold' } peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1`"
                            >
                                Adresse mail
                            </label>
                        </div>
                        <p v-if="errors.mail" class="mt-2 text-xs text-red-400">{{ errors.mail }}</p>
                    </div>
                    <div class="col-span-2 md:col-span-1">
                        <div class="relative">
                            <input 
                                type="text" 
                                id="phone" 
                                :class="`block px-2.5 pb-2.5 pt-4 w-full text-sm ${ errors.phone ? 'text-red-400' : 'text-blue-gray' } bg-transparent rounded-lg border-1 ${ errors.phone ? 'border-red-400' : 'border-blue-gray' } appearance-none focus:outline-none focus:ring-0 ${ errors.phone ? 'focus-red-400' : 'focus-gold' } peer`"
                                placeholder=" " 
                                v-model="formData.phone" 
                                @blur="validateForm()"
                            />
                            <label 
                                for="phone"
                                :class="`absolute text-sm ${ errors.phone ? 'text-red-400' : 'text-blue-gray' } duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-[#25211D] px-2 peer-focus:px-2 ${ errors.phone ? 'peer-focus:text-red-400' : 'peer-focus:text-gold' } peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1`"
                            >
                                Téléphone
                            </label>
                        </div>
                        <p v-if="errors.phone" class="mt-2 text-xs text-red-400">{{ errors.phone }}</p>
                    </div>
                    <div class="col-span-2 md:col-span-1">
                        <div class="relative">
                            <input 
                                type="text" 
                                id="subject" 
                                :class="`block px-2.5 pb-2.5 pt-4 w-full text-sm ${ errors.subject ? 'text-red-400' : 'text-blue-gray' } bg-transparent rounded-lg border-1 ${ errors.subject ? 'border-red-400' : 'border-blue-gray' } appearance-none focus:outline-none focus:ring-0 ${ errors.subject ? 'focus-red-400' : 'focus-gold' } peer`"
                                placeholder=" "
                                v-model="formData.subject" 
                                @blur="validateForm()"
                            />
                            <label
                                for="subject"
                                :class="`absolute text-sm ${ errors.subject ? 'text-red-400' : 'text-blue-gray' } duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-[#25211D] px-2 peer-focus:px-2 ${ errors.subject ? 'peer-focus:text-red-400' : 'peer-focus:text-gold' } peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1`"
                            >
                                Sujet
                            </label>
                        </div>
                        <p v-if="errors.subject" class="mt-2 text-xs text-red-400">{{ errors.subject }}</p>
                    </div>
                    <div class="col-span-2">
                        <div class="relative">
                            <textarea
                                rows="4"
                                id="message" 
                                :class="`block px-2.5 pb-2.5 pt-4 w-full text-sm ${ errors.message ? 'text-red-400' : 'text-blue-gray' } bg-transparent rounded-lg border-1 ${ errors.message ? 'border-red-400' : 'border-blue-gray' } appearance-none focus:outline-none focus:ring-0 ${ errors.message ? 'focus-red-400' : 'focus-gold' } peer`"
                                placeholder=" " 
                                v-model="formData.message" 
                                @blur="validateForm()"
                            />
                            <label
                                for="message"
                                :class="`absolute text-sm ${ errors.message ? 'text-red-400' : 'text-blue-gray' } duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-[#2c2720] px-2 peer-focus:px-2 ${ errors.message ? 'peer-focus:text-red-400' : 'peer-focus:text-gold' } peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1`"
                            >
                                Message
                            </label>
                        </div>
                        <p v-if="errors.message" class="mt-2 text-xs text-red-400">{{ errors.message }}</p>
                    </div>
                    <button 
                        type="submit"
                        :class="[
                            loading
                                ? 'bg-gold/40 text-white cursor-not-allowed' 
                                : 'bg-transparent hover:bg-gold hover:text-white focus:bg-gold focus:text-white focus:border-gold cursor-pointer',
                            'col-span-2 text-gold border border-gold rounded-full px-4 py-2 text-center transition duration-500 ease-in-out focus:ring-2 focus:ring-gold focus:ring-offset-2 focus:ring-offset-dark'
                        ]"
                        :disabled="loading"
                    >
                        {{ loading ? 'Envoi en cours' : 'Envoyer la demande' }}
                        <svg v-if="loading" aria-hidden="true" role="status" class="inline w-4 h-4 ms-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#F4BE7E"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                        </svg>
                    </button>
                </form>
            </Fade>
        </div>
    </section>
</template>

<script setup>
import { ref } from "vue";

import Fade from '../components/transitions/Fade.vue';
import Title from '../components/Title.vue';

import api from '../../js/api.js';

const emit = defineEmits(['showToast']);

const formData = ref({
    username: '',
    mail: '',
    phone: '',
    subject: '',
    message: ''
});

const isSubmitted = ref(false);
const errors = ref({});
const loading = ref(false);

const validateForm = () => {
    errors.value = {};

    if (isSubmitted.value) {
        if (!formData.value.username || formData.value.username.trim() === '') errors.value.username = 'Le nom est requis.';
        if (!formData.value.mail || formData.value.mail.trim() === '') {
            errors.value.mail = "Le mail est requis.";
        } else if (!/\S+@\S+\.\S+/.test(formData.value.mail)) {
            errors.value.mail = 'Le mail n\'est pas valide.';
        }
        if (!formData.value.phone || formData.value.phone.trim() === '') {
            errors.value.phone = 'Le téléphone est requis.';
        } else if (formData.value.phone.length < 10) {
            errors.value.phone = 'Le téléphone \'est pas valide.';
        }
        if (!formData.value.subject || formData.value.subject.trim() === '') errors.value.subject = 'Le sujet est requis.';
        if (!formData.value.message || formData.value.message.trim() === '') errors.value.message = 'Le message est requis.';
    }

    return Object.keys(errors.value).length === 0;
};

const submitForm = async () => {
    isSubmitted.value = true;

    if (!validateForm()) return;

    loading.value = true;

    try {
        const response = await api.post("/send-mail", formData.value);

        if (response.success) {
            emit('showToast', {
                message: response.message,
                type: 'success'
            });

            formData.value = { username: '', mail: '', phone: '', subject: '', message: '' };
        }
    } catch (error) {
        emit('showToast', {
            message: error.message,
            type: 'error'
        });
    } finally {
        loading.value = false;
        isSubmitted.value = false;
    }
};
</script>