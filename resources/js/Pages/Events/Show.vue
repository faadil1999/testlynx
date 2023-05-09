<script setup>
import AppLayout from './../../Layouts/AppLayout.vue'

import { router } from '@inertiajs/vue3'
const props = defineProps(['evenement'])

function submit(id) {

    if(confirm("Etes vous sûr ?")){
        router.delete(route('evenement.delete',id))
    }
}


</script>

<template>
    <app-layout>
        <template slot="header">
            Liste des evenements
        </template>
        <h1>Events</h1>
        <div>
            <div class="mx-8 bg-gray rounded shadow">
                <div class="text-4xl" >{{ evenement.title }}</div>
                <div class="text-sm text-gray-700" >{{ evenement.description }}</div>
                <div class="text-sm text-purple-700" >{{ evenement.date_start }}</div>
                <div class="text-sm text-yellow-700" >{{ evenement.time_start }}</div>
                <a :href="'edit/'+ evenement.id" class="bg-green-500 text-white px-2 py-1 text-sm mt-3 inline-block rounded hover:bg-green-700 mx-3">Modifier</a>
             
                <button @click="submit(evenement.id)" class="bg-red-500 text-white px-2 py-1 text-sm mt-3 inline-block rounded hover:bg-red-700">Supprimer</button>
            
            </div>
        </div>
    </app-layout>
</template>
