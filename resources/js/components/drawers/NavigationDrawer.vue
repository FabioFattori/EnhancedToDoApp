<script setup lang="ts">
import NavigationDrawerItem from '@/components/drawers/DrawerItems/NavigationDrawerItem.vue';

</script>

<template>
    <div class="flex h-screen flex-col justify-between border-e border-foreground bg-background">
        <div>
            <div class="inline-flex w-16 h-16 items-center justify-center">
                <span class="grid size-10 place-content-center rounded-lg bg-foreground-700 text-xs text-text-primary"> L </span>
            </div>

            <div class="border-t border-foreground">
                <div class="px-2">
                  <NavigationDrawerItem class="py-4" label="Impostazioni">
                    <i class="fa-solid fa-gear"></i>
                  </NavigationDrawerItem>

                    <ul class="space-y-1 border-t border-foreground pt-4">
                      <NavigationDrawerItem label="Home">
                        <i class="fa-solid fa-house"></i>
                      </NavigationDrawerItem>
                      <NavigationDrawerItem label="Liste">
                        <i class="fa-solid fa-clipboard-list"></i>
                      </NavigationDrawerItem>
                    </ul>
                </div>
            </div>
        </div>

        <div class="sticky inset-x-0 bottom-0 bg-background p-2 border-t border-foreground">
            <NavigationDrawerItem label="Logout">
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </NavigationDrawerItem>
        </div>
    </div>
</template>

<style scoped></style>
