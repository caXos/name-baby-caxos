<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { computed } from 'vue';
import { ref } from 'vue'

// const props = defineProps(['name', 'gender', 'creator', 'creator_id', 'likes', 'created_at', 'action', 'likes_user']);
const props = defineProps({
    name: String,
    gender: String,
    creator: String,
    creator_id: Number,
    likes: Number,
    created_at: String,
    action: Number,
    likes_user: Object
});

// const localLikes = ref(...likes)
const localUserLikes = ref(props.likes_user)
const localLikes = ref(props.likes)
// const localUserLikes = ref({...props.likes_user});
</script>
<script>
function curtir(id) {
	// localUserLikes.push(id);
    console.log(id, this.localUserLikes.original[0].id_babyname); //so far so good! falta achar o iterador
}
function descurtir(id) {
	// localUserLikes.splice(localUserLikes.findIndex((i) => i === id), 1);
}
</script>

<template>
    <tr v-if="gender == 'Feminino'" class="bg-pink-100 hover:bg-pink-100 hover:text-pink-900">
        <td>{{ name }}</td>
        <td>{{ gender }}</td>
        <td>{{ creator }}</td>
        <td>{{ new Date(created_at).toLocaleString() }}</td>
        <td>{{ localLikes }}</td>

        <td>{{ action }} <span v-on:click="curtir(action)">&#10084;</span></td>

        <!-- "localUserLikes.0.id_babyname"
        data.filter(x => x.name === "Blofeld"); -->
        <!-- <td v-if="localUserLikes.includes(action)">
            <Link :href="route('dislike',[action])" method="post" as="button" :click="descurtir(action)">
                <i class="fa-regular fa-thumbs-up text-green-600 font-bold" title="Remover Like"></i>
            </Link>
        </td>
        <td v-else>
            <Link :href="route('like', [action])" method="post" as="button" :click="curtir">
                <i class="fa-regular fa-thumbs-up text-gray-600" title="Adicionar Like"></i>
            </Link>
        </td> -->
    </tr>
    <tr v-else-if="gender == 'Masculino'" class="bg-blue-100 hover:bg-blue-100 hover:text-blue-900">
        <td>{{ name }}</td>
        <td>{{ gender }}</td>
        <td>{{ creator }}</td>
        <td>{{ new Date(created_at).toLocaleString() }}</td>
        <td>{{ localLikes }}</td>
        <td>{{ action }}</td>
    </tr>
    <tr v-else class="bg-gray-100 hover:bg-gray-200 hover:text-gray-900">
        <td>{{ name }}</td>
        <td>{{ gender }}</td>
        <td>{{ creator }}</td>
        <td>{{ new Date(created_at).toLocaleString() }}</td>
        <td>{{ localLikes }}</td>
        <td>{{ action }}</td>
    </tr>
</template>