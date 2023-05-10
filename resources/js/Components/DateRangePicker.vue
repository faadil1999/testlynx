<script setup>
import moment from 'moment'
import { router } from '@inertiajs/vue3'
import { reactive } from 'vue'
var ele = moment().format('L')

const year = moment().year();
const months = moment.months();

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

//cette fonction permet de trouver le decalage. Necessaire pour mettre la fin des dates precedentes dans le nouveau mois

function getDecal(month)
{
    var decal = [];
   var jour =  moment(month,'LL').startOf('month').format('ddd');
   var month_befor =  moment(month,'LL').subtract(1,'month').daysInMonth();
    for(var i = 0 ; i < decalMap[jour] ; i++)
    {
        decal.push(month_befor - i)
    }
    return decal.reverse();
}

// permet de prendre le nombre de jour dans le mois
function getDaysInMonth(month)
{
    return moment(month,'LL').daysInMonth();
}

//les fonctions isStart , isEnd et isBetween sont utilisees pour afficher sur le calendrier les dates concernees par l'interval de filtre
//isStart pour le debut de l'interval
function isStart(day , month)
{
    var instant = moment(`${year}-${day}-${month}`, "YYYY DO MMMM").format('YYYY-MM-DD')
   
    return  instant === form.range_start
}
//isEnd pour la fin de l'interval
function isEnd(day , month)
{
    var instant = moment(`${year}-${day}-${month}`, "YYYY DO MMMM").format('YYYY-MM-DD')
    return  instant === form.range_end
}

//isBetween pour les dates entre le debut et la fin de l'interval
function isBetween(day , month)
{
    var instant = moment(`${year}-${day}-${month}`, "YYYY DO MMMM").format('YYYY-MM-DD')
    return moment(instant).isBetween(form.range_start, form.range_end , undefined ,[])
}

//les fonctions ci dessous sont utiles pour le range - utile pour le click et le double click (double click pour le debut de linterval et un click pour la fin)
//borne inferieur de l'interval du range

function addStartDate(day , month){
    var instant = moment(`${year}-${day}-${month}`, "YYYY DO MMMM").format('YYYY-MM-DD')
   
    form.range_start = instant
}
//borne superieur de l'interval du range
function addEndDate(day , month){
    var instant = moment(`${year}-${day}-${month}`, "YYYY DO MMMM").format('YYYY-MM-DD')
    form.range_end = instant
}
//la ligne suivante ne marchera pas si month = October. (Un bug de moment js)
//  var instant = moment(`${year}-${day}-${month}`, "YYYY DO MMMM").format('YYYY-MM-DD')

function submit(){
   
   
    var arrayRange = [ form.range_start , form.range_end ] 
    router.get(route('evenement.scope'), arrayRange )
 
}

</script>

<template>
    <div>
        <h3>Calendrier {{ year }}</h3>
        <div class="grid grid-cols-4">    
            <div class="rangepicker_month" v-for="month in months" :key="month" >
                
                <div class="text-red-700 text-center bg-gray-400 px-auto w-60"> 
                    {{ month }} 
                    <div class="grid grid-cols-7  text-black">
                        <div v-for="day in days" :key="day">
                            {{ day }}
                        </div>
                    </div>
                    <div class="grid grid-cols-7  text-black">
                        <div v-for="dy in getDecal(month)" :key="dy">
                            <a href="" class="text-red-200">{{ dy}}</a>
                        </div>
                        <div v-for="dy in getDaysInMonth(month)"  :key="dy">
                            <a href="#" v-on:click="addEndDate(dy,month)" v-on:dblclick="addStartDate(dy, month)"
                                             :class="[isStart(dy,month) ? 'bg-green-700 rounded-xl px-1' :
                                             isEnd(dy,month) ? 'bg-yellow-200 rounded-xl px-1' :
                                            isBetween(dy,month) ?'bg-yellow-700 rounded-xl px-1' : '']"  >{{ dy }}</a>
                        </div>
                       
                    </div>
                    <!-- <div class="grid grid-cols-7  text-black">
                        <div v-for="dy in getDaysInMonth(month)" :key="dy">
                            <a href="">{{ dy }}</a>
                        </div>
                    </div> -->
                    
                    
                </div>
            </div>
        <form @submit.prevent="submit">
            <div class="px-5">
                <input type="date" v-model="form.range_start" name="range_start" id="">
                <input type="date" v-model="form.range_end" name="range_end" id="">
                {{ ele }}
            <button type="submit" class="bg-red-500 text-white px-2 py-1 text-sm mx-4 mt-3 inline-block rounded hover:bg-red-700">Filtrer</button>
            </div>
            
           
        </form>
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