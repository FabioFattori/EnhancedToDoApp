<script setup lang="ts">
import NavigationDrawerItem from '@/components/drawers/DrawerItems/NavigationDrawerItem.vue';

defineProps({
    userName: String,
});
</script>

<template>
    <div class="flex h-screen flex-col justify-between border-e border-foreground bg-background">
        <div>
            <div class="inline-flex size-16 items-center justify-center">
                <span
                    class="grid size-10 place-content-center rounded-lg bg-foreground-700 text-xs text-text-primary"
                    v-if="userName && userName.length > 0"
                >
                    {{ userName }}
                </span>
                <span class="grid size-10 place-content-center rounded-lg bg-foreground-700 text-xs text-text-primary" v-else>
                    <i class="fa-solid fa-user-ninja text-xl"></i>
                </span>
            </div>

            <div class="border-t border-foreground">
                <div class="px-2">
                    <NavigationDrawerItem class="py-4" label="Home" route="home">
                        <i class="fa-solid fa-house"></i>
                    </NavigationDrawerItem>

                    <ul class="space-y-1 border-t border-foreground pt-4">
                        <NavigationDrawerItem label="Liste">
                            <i class="fa-solid fa-clipboard-list"></i>
                        </NavigationDrawerItem>
                        <NavigationDrawerItem label="Impostazioni" route="settings">
                            <i class="fa-solid fa-gear"></i>
                        </NavigationDrawerItem>
                    </ul>
                </div>
            </div>
        </div>

        <div class="sticky inset-x-0 bottom-0 border-t border-foreground bg-background p-2">
            <NavigationDrawerItem label="Logout">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </NavigationDrawerItem>
        </div>
    </div>
</template>

<style scoped></style>
