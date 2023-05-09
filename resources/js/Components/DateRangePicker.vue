<script setup>
import moment from 'moment'
import { router } from '@inertiajs/vue3'
import { reactive } from 'vue'
var ele = moment().format('L')
const form = reactive({
    range_start : null,
    range_end : null
}) 

function submit(){

    var arrayRange = [ form.range_start , form.range_end ] 
    router.post(route('evenement.scope'), arrayRange )
 
}

</script>

<template>
    <div>
        <form @submit.prevent="submit">
            <div class="px-5">
                <input type="date" v-model="form.range_start" name="range_start" id="">
                <input type="date" v-model="form.range_end" name="range_end" id="">
                {{ ele }}
            <button type="submit" class="bg-red-500 text-white px-2 py-1 text-sm mx-4 mt-3 inline-block rounded hover:bg-red-700">Filtrer</button>
            </div>
            
           
        </form>
        
    </div>
</template>