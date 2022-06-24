<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import TableRow from '@/Components/TableRow.vue';
import { Head } from '@inertiajs/inertia-vue3';

defineProps({
    sugestoes: Object,
    name: String,
    gender: String,
    creator: String,
    votes: Number,
    action: String
});
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
                                    <th>Criada em</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr v-for="sugestao in sugestoes" :key="sugestao.id">
                                    <td>{{ sugestao.name }}</td>
                                    <td>{{ sugestao.gender }}</td>
                                    <td>{{ sugestao.creator }}</td>
                                    <td>{{ sugestao.votes }}</td>
                                    <td>{{ sugestao.created_at }}</td>
                                    <td>Ação {{ sugestao.id }}</td>
                                </tr> -->
                                <TableRow v-for="sugestao in sugestoes" 
                                :key="sugestao.id" 
                                :name="sugestao.name" :gender="sugestao.gender" 
                                :creator="sugestao.creator" 
                                :votes="sugestao.votes"
                                :created_at="sugestao.created_at" 
                                :action="sugestao.id" />
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

