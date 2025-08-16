import { ref, onMounted, onBeforeUnmount } from 'vue';

export default function useIsMobile(breakpoint = 640) {
    const isMobile = ref(false);

    const update = () => {
        if (typeof window !== 'undefined') {
            isMobile.value = window.innerWidth <= breakpoint;
        }
    };

    onMounted(() => {
        update();
        window.addEventListener('resize', update);
    });

    onBeforeUnmount(() => {
        window.removeEventListener('resize', update);
    });

    return { isMobile };
}
