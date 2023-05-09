<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
 import { reactive,onMounted } from 'vue'
import { router } from '@inertiajs/vue3'
const props = defineProps(['evenement'])

const form = reactive({
  title: props.evenement.title,
  description: props.evenement.description,
  date_start: props.evenement.date_start,
  time_start: props.evenement.time_start,

});

function submit() {
  router.put(''+props.evenement.id, form)
}
</script>


<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Modifier evenement {{ this.evenement.title }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- <div class="bg-green-200 text-green-500 p-3" v-if="$page.props.flash.success"> {{ $page.props.flash.success }}</div> -->
                <div class="w-full max-w-xs">
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"  @submit.prevent="submit">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                Event Title
                            </label>
                            <input v-model="form.title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" placeholder="Title">
                          <div class="text-red-500" v-if="$page.props.errors.title"> {{ $page.props.errors.title }} </div>
                        </div>
                         <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                Event description
                            </label>
                            <textarea v-model="form.description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" type="text" placeholder="Description">
                            </textarea>
                            <div class="text-red-500" v-if="$page.props.errors.description"> {{ $page.props.errors.description }} </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="date">
                                Event date start
                            </label>
                           
                            <input v-model="form.date_start" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="date" type="date" >
                            <div class="text-red-500" v-if="$page.props.errors.date_start"> {{ $page.props.errors.date_start }} </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="time">
                                Event time start
                            </label>
                            <input v-model="form.time_start" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="time" type="time" >
                            <div class="text-red-500" v-if="$page.props.errors.time_start"> {{ $page.props.errors.time_start }} </div>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Modifier
                            </button>
                        
                        </div>
                    </form>
              
       
            <p class="text-center text-gray-500 text-xs">
                &copy;2020 Acme Corp. All rights reserved.
            </p>
             </div>
        </div>
        </div>
    </AppLayout>
</template>