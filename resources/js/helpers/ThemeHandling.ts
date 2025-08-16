const themeNeedToBeSetToDark = (): boolean =>
    localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches);

function onThemeLoad(): void {
    document.documentElement.classList.toggle('dark', themeNeedToBeSetToDark());
}

function changeThemeToDark(): void {
    localStorage.theme = 'dark';
    document.documentElement.classList.add('dark');
}

function changeThemeToLight(): void {
    localStorage.theme = 'light';
    document.documentElement.classList.remove('dark');
}

function changeThemeToSystem() : void {
    localStorage.removeItem("theme");
    onThemeLoad();
}

function getActiveTheme() : 'light'|'dark'|"system" {
    if(localStorage.theme === undefined) {
        return 'system';
    }

    return localStorage.theme;
}

export { onThemeLoad, changeThemeToDark, changeThemeToSystem, changeThemeToLight, getActiveTheme };
