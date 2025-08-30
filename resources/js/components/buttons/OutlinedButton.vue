<script setup lang="ts">
defineProps({
  label: String
});
</script>

<template>
  <button class="border-1 border-foreground text-text-primary text-md bg-background rounded-lg cursor-pointer p-2 px-6 hover:bg-background-700">
    {{label}}
  </button>
</template>

<style scoped></style>
