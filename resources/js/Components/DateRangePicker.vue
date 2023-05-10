<script setup>
import moment from 'moment'
import { router } from '@inertiajs/vue3'
import { reactive ,ref } from 'vue'
var today = moment().format('YYYY-MM-DD')

const year =ref(parseInt(moment().year()));
const months = moment.months();
const currMonth = ref(parseInt(moment().format('M')));

const days = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat' ,'sun' ];


//Map pour le decalage des dates
const decalMap = {
    "Sun" : 6,
    "Mon" : 0,
    "Tue" : 1,
    "Wed" : 2,
    "Thu" : 3,
    "Fri" : 4,
    "Sat" : 5

}

const form = reactive({
    range_start : null,
    range_end : null
}) 
/*----------------------------------------------------------------DOCUMENTATION------------------------------------------------------------ */
/*
. La fonction "getDecal" permet de trouver le décalage nécessaire pour mettre la fin des dates précédentes dans le nouveau mois.
. La fonction "getDaysInMonth" permet de prendre le nombre de jours dans le mois.
. Les fonctions "isStart", "isEnd" et "isBetween" sont utilisées pour afficher sur le calendrier les dates concernées par l'intervalle de filtre.
. La fonction "isStart" est utilisée pour le début de l'intervalle.
. La fonction "isEnd" est utilisée pour la fin de l'intervalle.
. La fonction "isBetween" est utilisée pour les dates entre le début et la fin de l'intervalle.
. Les fonctions ci-dessous sont utiles pour le range - elles sont utilisées pour le clic simple et le double-clic (le double-clic pour le début de l'intervalle et un clic pour la fin).    
. La fonction attribue addStartDate(day , month) une date à la borne inférieure de l'intervalle du range.
. la ligne suivante ne marchera pas si month = October. (Un bug de moment js)
.   var instant = moment(`${year}-${day}-${month}`, "YYYY DO MMMM").format('YYYY-MM-DD')
. La fonction attribue addEndDate(day , month) une date à la borne superieur de l'interval du range 

            UTILISATION : DOUBLE CLICK pour la date de debut un ONEClick pour la date de fin
*/


function getDecal(month)
{
   var decal = [];
   var jour =  moment(`${month}-${year.value}`,'MMMM YYYY').startOf('month').format('ddd');
   var month_befor =  moment(`${month}-${year.value}`,'MMMM YYYY').subtract(1,'month').daysInMonth();
    for(var i = 0 ; i < decalMap[jour] ; i++)
    {
        decal.push(month_befor - i)
    }
    return decal.reverse();
}


function getDaysInMonth(month)
{
    return moment(month,'LL').daysInMonth();
}


function isStart(day , month)
{
    var instant = moment(`${year.value}-${day}-${month}`, "YYYY DO MMMM").format('YYYY-MM-DD')
   
    return  instant === form.range_start
}

function isEnd(day , month)
{
    var instant = moment(`${year.value}-${day}-${month}`, "YYYY DO MMMM").format('YYYY-MM-DD')
    return  instant === form.range_end
}



function isBetween(day , month)
{
    var instant = moment(`${year.value}-${day}-${month}`, "YYYY DO MMMM").format('YYYY-MM-DD')
    return moment(instant).isBetween(form.range_start, form.range_end , undefined ,[])
}

function isToday(day , month)
{
    var instant = moment(`${year.value}-${day}-${month}`, "YYYY DO MMMM").format('YYYY-MM-DD')
   
    return today === instant
}



function addStartDate(day , month){

    var instant = moment(`${year.value}-${day}-${month}`, "YYYY DO MMMM").format('YYYY-MM-DD')
   
    form.range_start = instant
}

function addEndDate(day , month){

    var instant = moment(`${year.value}-${day}-${month}`, "YYYY DO MMMM").format('YYYY-MM-DD')
    form.range_end = instant
}



function submit(){

    var arrayRange = [ form.range_start , form.range_end ] 
    router.get(route('evenement.scope'), arrayRange )
 
}

function decrement()
{
 
    if(currMonth.value === 1)
    {
        currMonth.value = 12
    }else{
        currMonth.value --
    }
    console.log(currMonth.value)
}


function increment()
{
    if(currMonth.value === 12)
    {
        currMonth.value = 1
    }else{
        currMonth.value++
    }
    console.log(currMonth.value)
}

</script>

<template>
    <div>
       <div class="grid grid-cols-1">
       
       </div>
        <div class="grid grid-cols-1">   
            <div class="mx-auto">
            <button @click="year++">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                </svg>
            </button>
            <p cl>{{ year }}</p>
            <button @click="year--">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </button>
           
            </div>
           
            <div  v-for="month in months" :key="month" class="mx-auto">
                
                <div class="text-red-700 text-center dark:bg-gray-800 px-auto px-2 py-10 w-96 rounded-md" v-if="currMonth === parseInt(moment().month(`${month}`).format('M'))"> 
                    <button @click="decrement()" class="pr-12"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>

                    </button> 

                    <span >{{ month }}</span>

                    <button @click="increment()" class="pl-12"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>

                    </button>

                    <div class="grid grid-cols-7  text-white">
                        <div v-for="day in days" :key="day">
                            {{ day }}
                        </div>
                    </div>
                    <div class="grid grid-cols-7  text-white">
                        <div v-for="dy in getDecal(month)" :key="dy">
                            <a href="" class="text-red-200">{{ dy}}</a>
                        </div>
                        <div v-for="dy in getDaysInMonth(month)"  :key="dy">
                            <a href="#" v-on:click="addEndDate(dy,month)" v-on:dblclick="addStartDate(dy, month)"
                                             :class="[isStart(dy,month) ? 'bg-green-700 rounded-xl px-1' :
                                             isEnd(dy,month) ? 'bg-yellow-200 rounded-xl px-1' :
                                            isBetween(dy,month) ?'bg-yellow-700 rounded-xl px-1' :
                                            isToday(dy,month)? 'bg-blue-500 rounded-xl px-1' :'']"  >{{ dy }}</a>
                        </div>
                       
                    </div>
                
                    
                    
                </div>
            </div>
            <div class="mx-auto pt-5">
                <form @submit.prevent="submit">
                    <div class="px-5">
                        <label for="start_date">De</label>
                        <input type="date" class="rounded-md mx-2" v-model="form.range_start" name="range_start" id="start_date">
                        <label for=""> à </label>
                        <input type="date" class="rounded-md mx-2"  v-model="form.range_end" name="range_end" id="">
                            Aujourd'hui {{ today }}
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 text-sm mx-4 mt-3 inline-block rounded hover:bg-red-700">Filtrer</button>
                        <p class="text-gray-400 text-center pt-2">DOUBLE CLICK pour la date de debut un ONE CLICK pour la date de fin</p>
                    </div>
                </form>
            </div>
            
    </div>
        
        
    </div>
</template>

<style scope>
    .rangepicker
    {
        box-sizing: border-box;
    }
    .rangepicker_month
    {
        width: 25%;
    }
</style>