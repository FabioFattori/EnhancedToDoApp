<script setup lang="ts">
import IconInput from '@/components/inputs/IconInput.vue';
import ButtonIconInput from "@/components/inputs/ButtonIconInput.vue";
</script>

<template>
    <div class="flex h-full items-center justify-center py-10">
        <div class="flex size-100 flex-col items-center justify-start rounded-lg bg-foreground-500">
            <h1 class="py-9 text-text-primary">Login</h1>
            <form class="flex-col size-full px-10">
              <IconInput class="py-5" label="Email" type="email" id="Email">
                <i class="fa-solid fa-at"></i>
              </IconInput>
              <ButtonIconInput label="Password" type="password" id="Password">
                <i class="fa-solid fa-lock"></i>
              </ButtonIconInput>
            </form>
        </div>
    </div>
</template>

<style scoped></style>
