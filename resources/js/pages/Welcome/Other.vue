<script setup lang="ts">
import useThemeStore from "@/States/useThemeStore";

const theme = useThemeStore()

</script>

<template>
  <h1>OTHER PAGE</h1>

  <h1>Current Theme {{ theme.currentTheme }}, and the actual theme {{ theme.actualTheme }}</h1>
  <button @click="theme.changeTheme('light')" class=" border-2 border-amber-600">Light</button>
  <button @click="theme.changeTheme('dark')" class=" border-2 border-amber-600">Dark</button>
  <button @click="theme.changeTheme('system')" class=" border-2 border-amber-600">System</button>
</template>

<style scoped></style>
