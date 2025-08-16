<script setup lang="ts">

import {useCounterStore} from "@/pages/Welcome/States/CounterState";
import useThemeStore from "@/States/useThemeStore";

const counter = useCounterStore()
const theme = useThemeStore()

const props = defineProps({
  exampleData: String,
})

</script>

<template>
    <h1>Welcome! {{ props?.exampleData }} </h1>
    <button @click="counter.increment()">Increment! {{ counter.count }}</button>
  <h1>Current Theme {{ theme.currentTheme }}, and the actual theme {{ theme.actualTheme }}</h1>
  <button @click="theme.changeTheme('light')" class=" border-2 border-amber-600">Light</button>
  <button @click="theme.changeTheme('dark')" class=" border-2 border-amber-600">Dark</button>
  <button @click="theme.changeTheme('system')" class=" border-2 border-amber-600">System</button>
</template>
