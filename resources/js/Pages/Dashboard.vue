<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import TableRow from '@/Components/TableRow.vue';
import { Head } from '@inertiajs/inertia-vue3';

defineProps({
    sugestoes: Object,
    likes_user: Object
    // name: String,
    // gender: String,
    // creator: String,
    // creator_id: Number,
    // likes: Number,
    // action: String
});

$(document).ready(function () {
    $('#suggestionTable').DataTable(
        {
            language: {
                processing: "Processando...",
                search: "Pesquisar:",
                lengthMenu: "Quantos elementos mostrar _MENU_",
                info: "Mostrando os elementos de _START_ a _END_ de um total de _TOTAL_ ",
                infoEmpty: "Mostrando os elementos de 0 a 0 de um total de 0",
                infoFiltered: "(filtrados de um total de _MAX_ elementos)",
                infoPostFix: "",
                loadingRecords: "Carregando...",
                zeroRecords: "Nada para sugestões paramostrar",
                emptyTable: "Não há nenhuma sugestão nesta tabela!",
                paginate: {
                    first: "Primeira",
                    previous: "Anterior",
                    next: "Próxima",
                    last: "Última"
                },
                aria: {
                    sortAscending: ": Ordem crescente",
                    sortDescending: ": Ordem decrescente"
                }
            }
        }
    );
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
                        <table id="suggestionTable" class="display w-full justify-items-center">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Gênero</th>
                                    <th>Sugerido por</th>
                                    <th>Criada em</th>
                                    <th>Likes</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <TableRow v-for="sugestao in sugestoes" :key="sugestao.id" :name="sugestao.name"
                                    :gender="sugestao.gender" :creator="sugestao.creator" :likes="sugestao.likes"
                                    :created_at="sugestao.created_at" :action="sugestao.id" :likes_user="likes_user" />
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

th,
td {
    margin: 3px;
    padding: 2px;
}
</style>

