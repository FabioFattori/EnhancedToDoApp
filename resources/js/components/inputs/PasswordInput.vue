<script setup lang="ts">
import ButtonIconInput from '@/components/inputs/ButtonIconInput.vue';
import { ref } from 'vue';

defineProps({
    id: String,
    label: String,
});

const showInput = ref(false);
const inputType = ref<'password' | 'text'>('password');

function onClick() {
    showInput.value = !showInput.value;
    if (showInput.value) {
        inputType.value = 'text';
        return;
    }
    inputType.value = 'password';
}
</script>

<template>
    <ButtonIconInput :label="label" :type="inputType" :id="id" :name="id" @on-icon-click="onClick">
        <i class="fa-solid fa-lock-open" v-if="showInput"></i>
        <i class="fa-solid fa-lock" v-else></i>
    </ButtonIconInput>
</template>

<style scoped></style>
