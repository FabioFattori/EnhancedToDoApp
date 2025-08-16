import { ActualTheme, AvailableThemes } from '@/types/Themes';
import { defineStore } from 'pinia';

const useThemeStore = defineStore('theme', {
    state: () => {
        return {
            currentTheme: 'system' as AvailableThemes,
            actualTheme: 'dark' as ActualTheme,
        };
    },

    actions: {
        changeTheme(theme: AvailableThemes) {
            this.currentTheme = theme;

            switch (theme) {
                case 'light':
                case 'dark':
                    this.actualTheme = theme;
                    break;
                case 'system':
                    const darkThemeMq = window.matchMedia('(prefers-color-scheme: dark)');
                    if (darkThemeMq.matches) {
                        this.actualTheme = 'dark';
                    } else {
                        this.actualTheme = 'light';
                    }
                    break;
            }
        },
    },
});

export default useThemeStore;
