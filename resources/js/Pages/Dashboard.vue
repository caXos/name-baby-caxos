<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>

    <Head title="Nomes Sugeridos" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Nomes sugeridos
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <table id="suggestionTable" class="display">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Gênero</th>
                                    <th>Sugerido por</th>
                                    <th>Votos</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Nome1</th>
                                    <th>Gênero1</th>
                                    <th>Sugerido por1</th>
                                    <th>Votos1</th>
                                    <th>Ações1</th>
                                </tr>
                                <tr>
                                    <th>Nome2</th>
                                    <th>Gênero2</th>
                                    <th>Sugerido por2</th>
                                    <th>Votos2</th>
                                    <th>Ações2</th>
                                </tr>
                                <tr>
                                    <th>Nome3</th>
                                    <th>Gênero3</th>
                                    <th>Sugerido por3</th>
                                    <th>Votos3</th>
                                    <th>Ações3</th>
                                </tr>
                                <tr>
                                    <th>Nome4</th>
                                    <th>Gênero4</th>
                                    <th>Sugerido por4</th>
                                    <th>Votos4</th>
                                    <th>Ações4</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<style scoped>
    tr {
        border: 1px solid black;
        border-radius: 5px;
    }
    th, td {
        margin: 3px;
        padding: 2px;
    }
</style>