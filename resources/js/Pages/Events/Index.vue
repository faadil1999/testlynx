<script setup>
import AppLayout from './../../Layouts/AppLayout.vue';
import DateRangePicker from '../../Components/DateRangePicker.vue';
import { ref } from 'vue';
const props = defineProps(['evenements']);

</script>

<template>
    <app-layout>
        <template #calendar>
            
                <DateRangePicker></DateRangePicker>
         
        </template>
        <div class="bg-green-200 text-green-500 p-3" v-if="$page.props.flash.success"> {{ $page.props.flash.success }}</div>
        <h1 class="px-4">Events</h1>
        
        <div class="py-6" v-for="evenement in this.evenements" v-bind:key="evenement.id">
            <div class="mx-8 bg-white rounded shadow p-4">
                <div class="text-4xl" >{{ evenement.title }}</div>
                <div class="text-sm text-gray-700" >{{ evenement.description }}</div>
                <div class="text-sm text-gray-700">{{ evenement.date_start }}</div>
                <a :href="route('evenement.show',evenement.id)" class="bg-blue-500 text-white px-2 py-1 text-sm mt-3 inline-block rounded hover:bg-blue-700">Voir evenement</a>
            </div>
        </div>
    </app-layout>
</template>

