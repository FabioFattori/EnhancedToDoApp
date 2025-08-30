<script setup lang="ts">

defineProps({
  id: String,
  label: String,
  type: String
})
</script>

<template>
  <label :for="id" class="relative">
    <input
        :type="type"
        :id="id"
        placeholder=""
        class="peer mt-0.5 w-full rounded border-text-primary shadow-sm sm:text-sm"
    />

    <span
        class="absolute inset-y-0 start-3 -translate-y-5 bg-foreground-500 px-0.5 text-sm font-medium text-text-primary transition-transform peer-placeholder-shown:translate-y-0 peer-focus:-translate-y-5"
    >
      {{ label }}
    </span>
  </label>
</template>

<style scoped>
</style>
