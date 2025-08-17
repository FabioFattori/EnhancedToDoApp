<script lang="ts">
import { changeThemeToDark, changeThemeToLight, changeThemeToSystem, getActiveTheme } from '@/helpers/ThemeHandling';
import { defineComponent, ref } from 'vue';

export default defineComponent({
    name: 'SwitchThemeButton',
    setup() {
        const currentTheme = ref(getActiveTheme());

        function setDark() {
            changeThemeToDark();
            currentTheme.value = 'dark';
        }

        function setLight() {
            changeThemeToLight();
            currentTheme.value = 'light';
        }

        function setSystem() {
            changeThemeToSystem();
            currentTheme.value = 'system';
        }

        return { currentTheme, setDark, setLight, setSystem };
    },
});
</script>

<template>
    <div class="flex h-9 w-27 items-center justify-center rounded-xl border-2 border-foreground p-1">
        <div
            class="flex h-9 w-full cursor-pointer items-center justify-center rounded-tl-xl rounded-bl-xl pr-1 pl-1.5 hover:bg-foreground-500"
            :class="{
                'bg-foreground-700': currentTheme === 'dark',
            }"
        >
            <i
                class="fa-solid fa-moon text-xl text-text-primary"
                :class="{
                    'scale-110': currentTheme === 'dark',
                    'text-foreground': currentTheme === 'dark',
                }"
                @click="setDark"
            ></i>
        </div>

        <div
            class="flex h-9 w-full cursor-pointer items-center justify-center border-r-2 border-l-2 border-foreground pr-1 pl-1 hover:bg-foreground-500"
            :class="{
                'bg-foreground-700': currentTheme === 'light',
            }"
        >
            <i
                class="fa-solid fa-sun text-xl text-text-primary"
                :class="{
                    'scale-110': currentTheme === 'light',
                    'text-foreground': currentTheme === 'light',
                }"
                @click="setLight"
            ></i>
        </div>
        <div
            class="flex h-9  w-full cursor-pointer items-center justify-center rounded-tr-xl rounded-br-xl pr-1 pl-1 hover:bg-foreground-500"
            :class="{
                'bg-foreground-700': currentTheme === 'system',
            }"
        >
            <i
                class="fa-solid fa-desktop text-xl text-text-primary"
                :class="{
                    'scale-110': currentTheme === 'system',
                    'text-foreground': currentTheme === 'system',
                }"
                @click="setSystem"
            ></i>
        </div>
    </div>
</template>
