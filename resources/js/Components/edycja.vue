<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Button from '@/Components/Button.vue';
import { useForm } from '@inertiajs/vue3';

defineProps(['client']);

const form = useForm({
    name: '',
    email: '',
    job:'',
});

</script>
<template>
    
        <Head title="Clients" />
        
        
        
            <tr>
                <td  >{{ client.id }}</td>
                <td v-if="!chce">{{ client.name }}</td>
                <td v-if="!chce">{{ client.email }}</td>
                <td v-if="!chce">{{ client.job }}</td>
                
                <td colspan="6">
                    <form @submit.prevent="form.put(route('clients.update', client.id) , { onSuccess: () => form.reset() })" > 
                            <input v-if="chce" type="text" v-model="form.name" placeholder="imie nazwisko">
                            <input v-if="chce" type="text" v-model="form.email" placeholder="email">
                            <input v-if="chce" type="text" v-model="form.job" placeholder="job">
                            <PrimaryButton v-if="chce" class="mt-4">zmień</PrimaryButton>
                            
                        
                    </form>
                        
                    <Button class="mt-4" v-if="!chce" @click="chce = true">edytuj</Button>
                </td>
                <td id="jeden">
                    <Button class="mt-4" v-if="chce" @click="chce = false">anuluj</Button>
                </td>
                <td id="dwa">
                    <form @submit.prevent="form.delete(route('clients.destroy', client.id) )"><PrimaryButton class="mt-4">delete</PrimaryButton></form>
                </td>
                
            </tr>
          
        
    
</template>
<script>
export default{
    data(){
        return{
            chce: false,
        }
    },
}
</script>
<style>
    #edycja{
        border: 0;
        padding: 0px;
    }
    #jeden{
        margin: 0px;
        padding: 0px;
    }
    #dwa{
        border-left: 0px;
    }
    
</style>
