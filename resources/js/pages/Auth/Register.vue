<script setup lang="ts">
import ContainedButton from '@/components/buttons/ContainedButton.vue';
import OutlinedButton from '@/components/buttons/OutlinedButton.vue';
import IconInput from '@/components/inputs/IconInput.vue';
import PasswordInput from '@/components/inputs/PasswordInput.vue';
import getCsrfToken from '@/helpers/getCsrfToken';
import navigateTo from '@/helpers/navigateTo.js';

function onHasAccountClicked() {
    navigateTo('/login');
}
</script>

<template>
    <div class="flex h-screen items-center justify-center">
        <div class="flex h-115 w-110 flex-col items-center justify-start rounded-lg bg-foreground-500">
            <h1 class="pt-9 text-2xl text-text-primary">Crea un Account</h1>
            <form class="flex size-full flex-col justify-around gap-2 px-10" action="/attempt-register" method="POST">
                <input type="hidden" name="_token" :value="getCsrfToken()" />
                <div class="flex h-4/6 flex-col justify-evenly">
                    <IconInput label="Nome Utente" type="text" id="name">
                      <i class="fa-solid fa-user"></i>
                    </IconInput>
                    <IconInput label="Email" type="email" id="email">
                        <i class="fa-solid fa-at"></i>
                    </IconInput>
                    <PasswordInput label="Password" id="password" />
                    <PasswordInput label="Conferma Password" id="confirm_password" />
                </div>
                <div class="full-width flex items-center justify-center gap-8">
                    <OutlinedButton type="button" label="Ho già un account" @click.prevent="onHasAccountClicked" />
                    <ContainedButton label="Accedi" type="submit" />
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped></style>
