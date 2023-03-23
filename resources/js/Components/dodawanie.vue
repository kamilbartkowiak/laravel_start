<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3';

defineProps(['client']);

    const form = useForm({
    name: '',
    email: '',
    job:'',
});
</script>
<template>
    <div class="dodawanie">
        <form @submit.prevent="form.post(route('clients.store'), { onSuccess: () => form.reset() })">
                <input type="text" v-model="form.name" placeholder="imie nazwisko"><br>
                <input type="text" v-model="form.email" placeholder="email"><br>
                <input type="text" v-model="form.job" placeholder="job"><br>

                <PrimaryButton class="mt-4">Dodaj</PrimaryButton><br>
            </form>
            
    </div>
</template>
<script>

export default{
    name: 'dodawanie',
};
</script>