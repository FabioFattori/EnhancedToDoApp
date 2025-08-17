<script setup lang="ts">
defineProps({
    id: String,
    label: String,
    type: String,
});
</script>

<template>
    <label for="{{id}}">
        <span class="text-sm font-medium text-text-primary"> {{ label }} </span>

        <div class="relative">
            <input
                type="{{type}}"
                id="{{id}}"
                class="mt-0.5 h-9 w-full rounded border-2 border-foreground bg-background p-3 pe-10 text-text-primary shadow-md sm:text-sm"
            />

            <span class="absolute inset-y-5 right-2 grid w-8 place-content-center bg-background-700 hover:bg-foreground-700">
                <button type="button" aria-label="Submit" class="rounded-full p-1 text-text-primary transition-colors">
                    <slot />
                </button>
            </span>
        </div>
    </label>
</template>

<style scoped></style>
