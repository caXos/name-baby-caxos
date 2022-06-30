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
// const localUserLikes = ref(props.likes_user)
const localLikes = ref(props.likes)
// const localUserLikes = ref({...props.likes_user}); //object
// const localUserLikes = ref([...props.likes_user]); //array
const localUserLikes = ref([props.likes_user]); //array
</script>
<script>
function curtirBCKP(id) {
	// localUserLikes.push(id);
    // console.log(id, this.localUserLikes.original[0].id_babyname); //so far so good! falta achar o iterador
    // console.log(this.localUserLikes.split('id_babyname:'));
    console.log(this.localUserLikes[0].original);
    if (this.localUserLikes[0].original.includes('"id_babyname":'+id)) console.log("achei");
    else console.log("não achei");
}

function descurtirBCKP(id) {
	// localUserLikes.splice(localUserLikes.findIndex((i) => i === id), 1);
}

function findLike(id) {
    for (var i=0; i < this.localUserLikes[0].original.length; i++) {
        if (this.localUserLikes[0].original[i].id_babyname === id) {
            // console.log("findLike achou like de id: ",id);
            return true;
        }
    }
    // console.log("findLike NÃO achou like de id: ",id);
    return false;
}

function findLikeIndex(id, localUserLikes) {
    console.log('findLikeIndex', id);
    console.log('this.localUserLikes', localUserLikes);
    for (var i=0; i < localUserLikes[0].original.length; i++) {
        if (localUserLikes[0].original[i].id_babyname === id) {
            // console.log("findLike achou like de id: ",id);
            return i;
        }
    }
    // console.log("findLike NÃO achou like de id: ",id);
    return -1;
}

function curtir(id) {
    // axios.get(route('like',[id]));
    axios.post(route('like',[id]))
    this.localLikes++;
    this.localUserLikes[0].original.push({'id_babyname':id});
}

function descurtir(id) {
    console.log('descurtir');
    axios.post(route('dislike',[id]))
    console.log('locallikes', this.localLikes);
    this.localLikes--;
    console.log('localUserLikes', this.localUserLikes);
    // console.log('index:', findLikeIndex(id, this.localUserLikes));
    this.localUserLikes[0].original.splice(findLikeIndex(id, this.localUserLikes), 1);
    // localUserLikes.splice(localUserLikes.findIndex((i) => i === id), 1)
}
</script>

<template>
    <tr v-if="gender === 'Feminino'" class="bg-pink-100 hover:bg-pink-100 hover:text-pink-900">
        <td>{{ name }}</td>
        <td>{{ gender }}</td>
        <td>{{ creator }}</td>
        <td>{{ new Date(created_at).toLocaleString() }}</td>
        <td>{{ localLikes }}</td>

        <td v-if="findLike(action)"><span style="color: green;" v-on:click="descurtir(action)">Remover Like</span></td>
        <td v-else><span v-on:click="curtir(action)">Dar Like</span></td>
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
    <tr v-else-if="gender === 'Masculino'" class="bg-blue-100 hover:bg-blue-100 hover:text-blue-900">
        <td>{{ name }}</td>
        <td>{{ gender }}</td>
        <td>{{ creator }}</td>
        <td>{{ new Date(created_at).toLocaleString() }}</td>
        <td>{{ localLikes }}</td>
        <td v-if="findLike(action)"><span style="color: green;" v-on:click="descurtir(action)">Remover Like</span></td>
        <td v-else><span v-on:click="curtir(action)">Dar Like</span></td>
    </tr>
    <tr v-else class="bg-gray-100 hover:bg-gray-200 hover:text-gray-900">
        <td>{{ name }}</td>
        <td>{{ gender }}</td>
        <td>{{ creator }}</td>
        <td>{{ new Date(created_at).toLocaleString() }}</td>
        <td>{{ localLikes }}</td>
        <td v-if="findLike(action)"><span style="color: green;" v-on:click="descurtir(action)">Remover Like</span></td>
        <td v-else><span v-on:click="curtir(action)">Dar Like</span></td>
    </tr>
</template>