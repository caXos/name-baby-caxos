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
    <tr v-if="gender == 'Feminino'" class="fundo-rosa">
        <td>{{ name }}</td>
        <td>{{ gender }}</td>
        <td>{{ creator }}</td>
        <td>{{ votes }}</td>
        <td>{{ created_at }}</td>
        <td>{{ action }}</td>
    </tr>
    <tr v-else-if="gender == 'Masculino'" class="fundo-azul">
        <td>{{ name }}</td>
        <td>{{ gender }}</td>
        <td>{{ creator }}</td>
        <td>{{ votes }}</td>
        <td>{{ created_at }}</td>
        <td>{{ action }}</td>
    </tr>
    <tr v-else>
        <td>{{ name }}</td>
        <td>{{ gender }}</td>
        <td>{{ creator }}</td>
        <td>{{ votes }}</td>
        <td>{{ created_at }}</td>
        <td>{{ action }}</td>
    </tr>
</template>