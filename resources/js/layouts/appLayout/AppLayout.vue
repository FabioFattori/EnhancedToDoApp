<script setup lang="ts">
import SwitchThemeButton from '@/components/buttons/SwitchThemeButton.vue';
import NavigationDrawer from '@/components/drawers/NavigationDrawer.vue';
import useIsMobile from '@/helpers/useIsMobile';
import { ref, watch } from 'vue';

const { isMobile } = useIsMobile();
const isDrawerOpen = ref(true);
const showDrawerButton = ref(false);

watch(
    isMobile,
    (m) => {
        isDrawerOpen.value = m;
        showDrawerButton.value = m;
    },
    { immediate: true },
);

function toggleDrawer() {
    isDrawerOpen.value = !isDrawerOpen.value;
}
</script>

<template>
    <div class="flex w-full">
        <NavigationDrawer v-if="!isDrawerOpen" />
        <div class="w-full flex-col">
            <nav class="flex h-16 w-full items-center justify-between bg-background pr-6 pl-6" :class="{ 'justify-end': !isMobile }">
                <div class="h-auto w-20" v-if="showDrawerButton" @click="toggleDrawer">
                    <i class="fa-solid fa-bars cursor-pointer text-xl text-text-primary"></i>
                </div>
                <SwitchThemeButton />
            </nav>
            <main class="flex items-start justify-between p-4 border-t-1 border-foreground">
                <slot />
            </main>
        </div>
    </div>
</template>

<style scoped></style>
