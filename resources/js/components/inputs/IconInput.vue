<script setup lang="ts">
defineProps({
    id: String,
    label: String,
    type: String,
});
</script>

<template>
    <div>
        <label for="{{ id }}">
            <span class="text-sm font-medium text-text-primary"> {{ label }} </span>
            <div class="relative">
                <input
                    type="{{ type }}"
                    id="{{ id }}"
                    class="mt-0.5 h-9 w-full bg-background rounded border-2 p-3 border-foreground pe-8 text-text-primary shadow-md sm:text-sm focus:border-text-primary"
                />

                <span class="absolute inset-y-5 right-2 grid w-8 place-content-center bg-background-700 text-text-primary">
                    <slot />
                </span>
            </div>
        </label>
    </div>
</template>

<style scoped></style>
