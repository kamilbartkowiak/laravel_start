<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import { Head } from '@inertiajs/vue3';

import edycja from '@/Components/edycja.vue';
import dodawanie from '@/Components/dodawanie.vue';

 

</script>
 
<template>
    <Head title="Clients" />
 
    <AuthenticatedLayout>
        <div class="itema-align mx-auto p-4 sm:p-6 lg:p-8">
            <div class="akcja">
            <dodawanie />
            </div>
            <div class="table">
                <table>
            <tr id="kolumna">
                <td id="kolumna">id</td>
                <td id="kolumna">imie i nazwisko</td>
                <td id="kolumna">email</td>
                <td id="kolumna">praca</td>
                <td  id="kolumna"></td>
                <td id="kolumna" ></td>
                
            </tr>
         
            <edycja 
            v-for="client in $page.props.clients"
            :key = "client.id"
            :client="client" 
            />
        
            </table>
    </div>
        </div>
    </AuthenticatedLayout>
    
</template>
<script>    
    export default{
        methods:{
            updateClient() {
                form.put(route('client.update'), { onSuccess: () => form.reset() })
            }
        }
    }

</script>
<style>
    td{
        border: 1px solid black;
        padding: 10px;

    }
    #kolumna{
        border: 0;
    }
    .akcja{
        float: left;
        padding: 100px;
    }
    .tabela{
        float: right;
    }
    input{
        align-items: center;
        padding: 8px;
        margin: 10PX;
        margin-left: 15px;
    }
    
    
</style>