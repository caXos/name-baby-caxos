<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})

setInterval(function () {
    if ($('#back').hasClass('fundo-rosa')) {
        $('#back').removeClass('fundo-rosa');
        $('#back').addClass('fundo-azul');
    } else {
        $('#back').removeClass('fundo-azul');
        $('#back').addClass('fundo-rosa');
    }
}, 5000);
</script>

<template>

    <Head title="Welcome" />

    <div id='back'
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0 fundo-rosa">
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-sm text-gray-700 underline">
            Dashboard
            </Link>

            <template v-else>
                <Link :href="route('login')" class="text-sm text-gray-700 underline">
                Log in
                </Link>

                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                Register
                </Link>
            </template>
        </div>

        <div
            class="flex flex-col p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l bg-white rounded-md border-2 border-gray-400 drop-shadow">
            <div class="flex items-center justify-center">
                <img src="/images/cutebaby.svg" alt="Name Baby caXos" class="welcome-img" title="Name Baby caXos" />
            </div>
            <div class="flex items-center justify-center">
                <div class="ml-4 text-lg leading-7 font-semibold">
                    Name Baby caXos
                </div>
            </div>
            <div class="flex items-center justify-center">
                <div class="ml-4 text-lg leading-7 font-semibold">
                    Vamos dar nome ao bebê caXos?
                </div>
            </div>
            <div class="ml-12">
                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                    <div>
                        <ol type="1">
                            <li>Clique em "Registrar" e preencha seus dados para criar uma conta</li>
                            <li>Já logado, acesse a página "Sugerir Nome"</li>
                            <li>Pronto! Sua sugestão aparecerá no "Dashboard", <br />onde também é possíve visualizar as
                                demais sugestões, bem como votar nas sugestões que você acha interessante</li>
                            <li>Você pode fazer quantas sugestões quiser, <br />mas só pode dar um voto (a favor ou
                                contra)
                                por sugestão</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* .fundo-rosa {
    background-color: #fecaca !important;
}

.fundo-azul {
    background-color: #cffafe !important;
} */
/* 
div {
    transition: background-color 1000ms ease;
} */

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
