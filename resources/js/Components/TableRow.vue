<script setup>
defineProps(['name', 'gender', 'creator', 'votes', 'created_at', 'action']);

</script>
<script>
/*import { defineComponent } from '@vue/composition-api'

export default defineComponent({
    setup() {
        users:Array,
        title:String
    },
})*/
</script>


<template>
    <tr v-if="gender == 'Feminino'" class="bg-pink-100 hover:bg-pink-100 hover:text-pink-900">
        <td>{{ name }}</td>
        <td>{{ gender }}</td>
        <td>{{ creator }}</td>
        <td>{{ new Date(created_at).toLocaleString() }}</td>
        <td>{{ votes }}</td>
        <td>{{ action }}</td>
    </tr>
    <tr v-else-if="gender == 'Masculino'" class="bg-blue-100 hover:bg-blue-100 hover:text-blue-900">
        <td>{{ name }}</td>
        <td>{{ gender }}</td>
        <td>{{ creator }}</td>
        <td>{{ new Date(created_at).toLocaleString() }}</td>
        <td>{{ votes }}</td>
        <td>{{ action }}</td>
    </tr>
    <tr v-else class="bg-gray-100 hover:bg-gray-200 hover:text-gray-900">
        <td>{{ name }}</td>
        <td>{{ gender }}</td>
        <td>{{ creator }}</td>
        <td>{{ new Date(created_at).toLocaleString() }}</td>
        <td>{{ votes }}</td>
        <td>{{ action }}</td>
    </tr>
</template>