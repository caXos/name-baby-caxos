<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import BreezeNavLink from '@/Components/NavLink.vue';
import BreezeButton from '@/Components/Button.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    gender: String,
    suggestionName: String
})

// const submit = () => {
//     return route('register');
// };
</script>

<template>

    <Head title="Sugestão criada" />

    <div id='back'
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0" :class="{ 'fundo-azul': gender === 'Masculino', 'fundo-rosa': gender==='Feminino' }">
        <!-- :class="{'fundo-rosa':gender==='Feminino', 'fundo-azul':gender==='Masculino'} -->
        <div
            class="flex flex-col p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l bg-white rounded-md border-2 border-gray-400 drop-shadow">
            <div class="flex items-center justify-center">
                <img src="/images/cutebaby.svg" alt="Sugestão criada" class="welcome-img" title="Sugestão criada" />
            </div>
            <div class="flex items-center justify-center" :class="{ 'text-pink-600': gender==='Feminino', 'text-blue-600': gender === 'Masculino', 'text-gray-600': gender==='Ambos' }">
                <div class="ml-4 text-lg leading-7 font-semibold">
                    {{suggestionName}}
                </div>
            </div>
            <div class="flex items-center justify-center">
                <div class="ml-4 text-lg leading-7 font-semibold">
                    Sugestão criada com sucesso!
                </div>
            </div>
            <div class="flex items-center justify-center">
                <Link class='p-2 rounded-full' :class="{ 'fundo-rosa': gender==='Feminino', 'fundo-azul': gender === 'Masculino', 'bg-gray-100': gender==='Ambos' }" :href="route('sugerir')">
                    Voltar
                </Link>
            </div>
        </div>
    </div>
</template>

<style scoped>
.welcome-img {
    width: 200px;
    height: 200px;
}

.bg-gray-100 {
    background-color: #f7fafc;
    background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
}

.border-gray-200 {
    border-color: #edf2f7;
    border-color: rgba(237, 242, 247, var(--tw-border-opacity));
}

.text-gray-400 {
    color: #cbd5e0;
    color: rgba(203, 213, 224, var(--tw-text-opacity));
}

.text-gray-500 {
    color: #a0aec0;
    color: rgba(160, 174, 192, var(--tw-text-opacity));
}

.text-gray-600 {
    color: #718096;
    color: rgba(113, 128, 150, var(--tw-text-opacity));
}

.text-gray-700 {
    color: #4a5568;
    color: rgba(74, 85, 104, var(--tw-text-opacity));
}

.text-gray-900 {
    color: #1a202c;
    color: rgba(26, 32, 44, var(--tw-text-opacity));
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-gray-800 {
        background-color: #2d3748;
        background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
    }

    .dark\:bg-gray-900 {
        background-color: #1a202c;
        background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
    }

    .dark\:border-gray-700 {
        border-color: #4a5568;
        border-color: rgba(74, 85, 104, var(--tw-border-opacity));
    }

    .dark\:text-white {
        color: #fff;
        color: rgba(255, 255, 255, var(--tw-text-opacity));
    }

    .dark\:text-gray-400 {
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--tw-text-opacity));
    }
}
</style>
