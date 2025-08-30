<script setup lang="ts">
defineProps({
  label: String
});
</script>

<template>
  <button class="border-1 border-foreground bg-foreground-700 hover:bg-foreground text-text-primary rounded-lg cursor-pointer p-2 px-6 ">
    {{label}}
  </button>
</template>

<style scoped></style>
