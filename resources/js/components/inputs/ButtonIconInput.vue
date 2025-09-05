<script setup lang="ts">
defineProps({
    id: String,
    label: String,
    type: String,
});
</script>

<template>
    <label :for="id">
        <span class="text-sm font-medium text-text-primary"> {{ label }} </span>

        <div class="relative">
            <input
                :type="type"
                :id="id"
                :name="id"
                class="mt-0.5 h-9 w-full rounded border-2 border-foreground-700 bg-background p-3 pe-10 text-text-primary shadow-md sm:text-sm hover:border-foreground"
            />

            <span  class=" absolute inset-y-5 right-2 grid w-8 place-content-center bg-background-700 hover:bg-foreground-700">
                <button type="button" @click="$emit('on-icon-click')" class="hover:bg-background-700 size-8 cursor-pointer rounded-full p-1 text-text-primary transition-colors">
                  <slot />
                </button>
            </span>
        </div>
    </label>
</template>

<style scoped></style>
