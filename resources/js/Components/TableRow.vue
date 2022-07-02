<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { computed } from 'vue';
import { ref } from 'vue'

const props = defineProps({
    name: String,
    gender: String,
    creator: String,
    creator_id: Number,
    likes: Number,
    created_at: String,
    action: Number,
    likes_user: Object,
    loggedUser: Number
});

const localLikes = ref(props.likes)
const localUserLikes = ref([props.likes_user]); //array
</script>
<script>
function findLike(id) {
    for (var i=0; i < this.localUserLikes[0].original.length; i++) {
        if (this.localUserLikes[0].original[i].id_babyname === id) {
            return true;
        }
    }
    return false;
}

function findLikeIndex(id, localUserLikes) {
    for (var i=0; i < localUserLikes[0].original.length; i++) {
        if (localUserLikes[0].original[i].id_babyname === id) {
            return i;
        }
    }
    return -1;
}

function curtir(id) {
    axios.post(route('like',[id]))
    this.localLikes++;
    this.localUserLikes[0].original.push({'id_babyname':id});
}

function descurtir(id) {
    axios.post(route('dislike',[id]))
    this.localLikes--;
    this.localUserLikes[0].original.splice(findLikeIndex(id, this.localUserLikes), 1);
}

function deleteSuggestion(id) {
    alert('delete');
}
</script>

<template>
    <tr  :class="{
        'bg-pink-100 hover:bg-pink-100 hover:text-pink-900': gender === 'Feminino'
        ,'bg-blue-100 hover:bg-blue-100 hover:text-blue-900': gender === 'Masculino'
        ,'bg-gray-100 hover:bg-gray-200 hover:text-gray-900': gender === 'Ambos'
        }">
        <td>{{ name }}</td>
        <td>{{ gender }}</td>
        <td>{{ creator }}</td>
        <td>{{ new Date(created_at).toLocaleString() }}</td>
        <td>{{ parseInt(localLikes) }}</td>
        <td>
            <i v-if="findLike(action)" class="fa-solid fa-thumbs-up text-green-600" style="cursor:pointer;" v-on:click="descurtir(action)" title="Remover Like"></i>
            <i v-else class="fa-solid fa-thumbs-up text-gray-600" style="cursor:pointer;" v-on:click="curtir(action)" title="Adicionar Like"></i>
            <i v-if="loggedUser === 1" class="fa-solid fa-trash text-red-600 mx-5" style="cursor:pointer;" v-on:click="deletar(action)" title="Deletar sugestão"></i>
        </td>
    </tr>
</template>