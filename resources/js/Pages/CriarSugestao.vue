<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import BreezeDropdown from '@/Components/Dropdown.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    name: '',
    gender: '',
    creator: ''
});

const submit = () => {
    form.post(route('criarsugestao'), {
        onFinish: () => {
            form.reset('name', 'gender');
        },
        // onSuccess: () => {
        //     Swal.fire({
        //         title: 'Sucesso',
        //         text: 'Sugestão criada com sucesso!',
        //         icon: 'success',
        //         confirmButtonText: 'Ok'
        //     })
        // }
    });
};
</script>

<template>

    <Head title="Sugerir nome" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Sugerir nome
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <BreezeValidationErrors class="mb-4" />

                        <form @submit.prevent="submit">
                            <div>
                                <BreezeLabel for="name" value="Nome" />
                                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name"
                                    required autofocus />
                            </div>

                            <div>
                                <BreezeLabel for="gender" value="Gênero" />
                                <select id="gender" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" 
                                    v-model="form.gender" required>
                                    <option value="" disabled selected>-</option>
                                    <option value="Feminino" >Feminino</option>
                                    <option value="Masculino" >Masculino</option>
                                    <option value="Ambos">Ambos</option>
                                </select>
                            </div>                            

                            <div class="flex items-center justify-end mt-4">
                                <span v-on:click="form.reset('name', 'gender')"
                                    class="underline text-sm text-gray-600 hover:text-gray-900" style="cursor: pointer;">
                                Limpar
                                </span>

                                <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">
                                    Sugerir!
                                </BreezeButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </BreezeAuthenticatedLayout>
</template>
