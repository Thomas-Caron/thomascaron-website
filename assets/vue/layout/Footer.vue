<template>
    <footer class="bg-dark border-t border-white/10">
        <div class="container mx-auto px-3 sm:px-0 pt-12">
            <div class="flex justify-between py-5">
                <a href="/" class="flex items-center">
                    <img src="build/images/logo.svg" class="h-10" alt="Thomas Caron Logo" width="40px" height="40px" />
                </a>
                <ul class="flex flex-col font-medium">
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
            <div class="border-t border-white/10 py-5">
                <div class="flex flex-row justify-center space-x-6">
                    <a href="https://www.linkedin.com/in/thomas-caron-dev/" target="_blank">
                        <svg class="w-8 h-8 fill-blue-gray hover:fill-gold transition duration-500 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M6.94 5a2 2 0 1 1-4-.002a2 2 0 0 1 4 .002M7 8.48H3V21h4zm6.32 0H9.34V21h3.94v-6.57c0-3.66 4.77-4 4.77 0V21H22v-7.93c0-6.17-7.06-5.94-8.72-2.91z"/>
                        </svg>
                    </a>

                    <a href="https://www.malt.fr/profile/thomascaron" target="_blank">
                        <svg class="w-8 h-8 fill-blue-gray hover:fill-gold transition duration-500 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="-1 8.3 8 8">
                            <path d="M20.195 8.581c-.069 0-.285.026-.484.113c-.432.181-.597.311-.597.58v5.023c0 .277.26.355.735.355c.467 0 .649-.087.649-.355V8.858c0-.173-.113-.277-.303-.277m3.502 4.903c-.345.087-.45.113-.57.113c-.147 0-.2-.044-.2-.2v-2.161h.788c.207 0 .285-.078.285-.285c0-.173-.078-.26-.285-.26h-.787v-.839c0-.259-.087-.363-.268-.363c-.173 0-.415.156-.934.597c-.528.45-.83.744-.83.951c0 .121.086.199.224.199h.424v2.335c0 .683.337 1.08.925 1.08c.39 0 .675-.146 1.012-.406c.311-.242.51-.432.51-.596c0-.139-.103-.217-.294-.165m-15.21-3.078c-.13 0-.285.026-.484.112c-.433.19-.597.312-.597.58v3.2c0 .276.26.354.735.354c.467 0 .649-.087.649-.355v-3.614c0-.173-.113-.277-.303-.277m1.816 0c-.355 0-.675.121-.986.363c-.173.138-.32.294-.32.424c0 .112.078.173.19.173c.19 0 .251-.078.416-.078s.25.173.25.476v2.533c0 .277.26.355.735.355c.467 0 .649-.087.649-.355v-2.776c0-.657-.39-1.115-.934-1.115m2.43 0c-.337 0-.692.121-1.003.363c-.173.138-.32.294-.32.424c0 .112.078.173.19.173c.19 0 .25-.078.432-.078s.268.173.268.476v2.533c0 .277.26.355.735.355c.467 0 .649-.087.649-.355v-2.776c0-.657-.39-1.115-.951-1.115m5.335 0a1.3 1.3 0 0 0-.484.112c-.26.113-.398.2-.467.312c-.26-.303-.597-.398-.977-.398c-1.116 0-1.911.942-1.911 2.283c0 1.124.605 1.954 1.461 1.954c.26 0 .493-.104.77-.363c.216-.2.32-.329.32-.45a.14.14 0 0 0-.147-.147c-.121 0-.251.104-.416.104c-.354 0-.596-.545-.596-1.35c0-.803.32-1.348.804-1.348c.32 0 .562.242.562.657v2.525c0 .277.26.355.735.355c.467 0 .649-.087.649-.355v-3.614c0-.173-.113-.277-.303-.277M3.499 13.563l-.21.21l.619.618c.304.304.79.598 1.244.144c.339-.34.26-.695.073-.98c-.06.004-1.726.008-1.726.008m-.963-2.325l.21-.21l-.608-.607c-.304-.303-.765-.621-1.243-.143c-.351.35-.273.692-.087.97Zm2.86.416a384 384 0 0 1-1.511 1.524h1.154c.43 0 .981-.101.981-.777c0-.496-.296-.683-.624-.747m-3.244-.031H.981c-.43 0-.981.135-.981.778c0 .479.307.676.641.745c.04-.046 1.511-1.523 1.511-1.523m1.484 3.04l-.618-.618l-.608.607a3 3 0 0 1-.137.128c.07.333.266.639.745.639s.676-.307.745-.641q-.064-.054-.127-.115M2.41 10.15l.608.607l.618-.618a2 2 0 0 1 .128-.118c-.065-.327-.251-.623-.747-.623s-.682.297-.746.625q.068.058.14.127zm2.742.117c-.455-.454-.94-.16-1.244.144l-2.87 2.87c-.303.303-.621.765-.143 1.243s.94.16 1.243-.143l2.87-2.87c.304-.304.598-.79.144-1.244"/>
                        </svg>
                    </a>

                    <a href="https://github.com/Thomas-Caron" target="_blank">
                        <svg class="w-8 h-8 fill-blue-gray hover:fill-gold transition duration-500 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M12 2A10 10 0 0 0 2 12c0 4.42 2.87 8.17 6.84 9.5c.5.08.66-.23.66-.5v-1.69c-2.77.6-3.36-1.34-3.36-1.34c-.46-1.16-1.11-1.47-1.11-1.47c-.91-.62.07-.6.07-.6c1 .07 1.53 1.03 1.53 1.03c.87 1.52 2.34 1.07 2.91.83c.09-.65.35-1.09.63-1.34c-2.22-.25-4.55-1.11-4.55-4.92c0-1.11.38-2 1.03-2.71c-.1-.25-.45-1.29.1-2.64c0 0 .84-.27 2.75 1.02c.79-.22 1.65-.33 2.5-.33s1.71.11 2.5.33c1.91-1.29 2.75-1.02 2.75-1.02c.55 1.35.2 2.39.1 2.64c.65.71 1.03 1.6 1.03 2.71c0 3.82-2.34 4.66-4.57 4.91c.36.31.69.92.69 1.85V21c0 .27.16.59.67.5C19.14 20.16 22 16.42 22 12A10 10 0 0 0 12 2"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="border-t border-white/10 py-5">
                <p class="text-sm text-center text-blue-gray">© {{ new Date().getFullYear() }} - Thomas CARON. Made with ❤️</p>
            </div>
        </div>
    </footer>
</template>

<script setup>
import scroll from '../../js/scroll.js';
</script>