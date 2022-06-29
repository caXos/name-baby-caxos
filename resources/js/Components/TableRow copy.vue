<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { computed } from 'vue';
import { ref } from 'vue'

const props = defineProps(['name', 'gender', 'creator', 'creator_id', 'likes', 'created_at', 'action', 'likes_user']);

// const localLikes = ref({...props.likes_user})
// const localLikes = ref([...likes_user])
// estes ... transformam copiam o valor da array ou objeto. Se for copiar objeto, usa {...this.objeto} e se for array, usar [...this.array]
//const localLikes = ref(...likes_user);

function curtir(id) {
	localLikes.push(id);
}
function descurtir(id) {
	localLikes.splice(localLikes.findIndex((i) => i === id), 1);
}
// defineProps(['name', 'gender', 'creator', 'creator_id', 'likes', 'created_at', 'action']);
// defineProps({
//     sugestoes: Object,
//     likes_user: Object,
//     name: String,
//     gender: String,
//     creator: String,
//     creator_id: Number,
//     likes: Number,
//     action: Number,
//     created_at: String
// });
/*
{{ route('admin.editIndustry', 1) }}
or
{{ route('admin.editIndustry', ['id'=>1]) }}
or
{{ route('admin.editIndustry', ['id'=>1, 'something'=>42]) }}
*/
/*
function addLike (){
    // this.likes++;
    // console.log("addLike");
    // return route('like', ['id_babyname',this.action]); //talvez colocar um return ou um return redirect()-> nessa lilnha ou talvez até um Inertia::render, mas não sei se aqui é php/laravel
}
function removeLike (id_babyname){
    this.updated = !this.updated;
    console.log("removeLike");
    // return axios.post('/dislike/'+action);
    return axios.post(route('dislike', [id_babyname]));
    // return route('dislike', ['id_babyname',this.action]);
}
*/
// methods: {
//     addLike: (event) => {
//         likes--;
//         console.log("disliked");
//         // route('dislike',[event]);
//         console.log(event);
//     }
//     removeLike: (event) => {
//         likes++;
//         console.log("liked");
//         // route('like',[event]);
//         console.log(event);
//     }
// }
</script>

<template>
    <tr v-if="gender == 'Feminino'" class="bg-pink-100 hover:bg-pink-100 hover:text-pink-900">
        <td>{{ name }}</td>
        <td>{{ gender }}</td>
        <td>{{ creator }}</td>
        <td>{{ new Date(created_at).toLocaleString() }}</td>
        <td>{{ likes }}</td>
        <td v-if="likes_user.includes(action)">
            <Link :href="route('dislike',[action])" method="post" as="button" :click="descurtir">
                <i class="fa-regular fa-thumbs-up text-green-600 font-bold" title="Remover Like"></i>
            </Link>
        </td>
        <td v-else>
            <Link :href="route('like', [action])" method="post" as="button" :click="curtir">
                <i class="fa-regular fa-thumbs-up text-gray-600" title="Adicionar Like"></i>
            </Link>
        </td>
    </tr>
    <tr v-else-if="gender == 'Masculino'" class="bg-blue-100 hover:bg-blue-100 hover:text-blue-900">
        <td>{{ name }}</td>
        <td>{{ gender }}</td>
        <td>{{ creator }}</td>
        <td>{{ new Date(created_at).toLocaleString() }}</td>
        <td>{{ likes }}</td>
        <td v-if="likes_user.includes(action)">
            <Link :href="route('dislike', [action])" method="post" as="button">
                <i class="fa-regular fa-thumbs-up text-green-600 font-bold" title="Remover Like"></i>
            </Link>
        </td>
        <td v-else>
            <Link :href="route('like', [action])" method="post" as="button">
                <i class="fa-regular fa-thumbs-up text-gray-600" title="Adicionar Like"></i>
            </Link>
        </td>
    </tr>
    <tr v-else class="bg-gray-100 hover:bg-gray-200 hover:text-gray-900">
        <td>{{ name }}</td>
        <td>{{ gender }}</td>
        <td>{{ creator }}</td>
        <td>{{ new Date(created_at).toLocaleString() }}</td>
        <td>{{ likes }}</td>
        <td v-if="likes_user.includes(action)">
            <Link :href="route('dislike',[action])" method="post" as="button">
                <i class="fa-regular fa-thumbs-up text-green-600 font-bold" title="Remover Like"></i>
            </Link>
        </td>
        <td v-else>
            <Link :href="route('like', [action])" method="post" as="button">
                <i class="fa-regular fa-thumbs-up text-gray-600" title="Adicionar Like"></i>
            </Link>
        </td>
    </tr>
</template>