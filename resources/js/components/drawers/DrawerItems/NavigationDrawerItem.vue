<script setup lang="ts">
import { onMounted, ref } from 'vue';
import {router} from "@inertiajs/vue3";

const props = defineProps({
    label: String,
    route: String,
});

const isActive = ref(false);

onMounted(() => {

  isActive.value = route().current(`${props.route}*`);
});

function onClick(): void {
  router.visit(route(props.route));
}
</script>

<template>
    <li>
        <a
            @click="onClick"
            class="group relative flex cursor-pointer justify-center rounded-sm px-2 py-1.5 text-gray-500 hover:bg-foreground-500 hover:text-text-primary"
            :class="{
              'bg-foreground-500' : isActive,
              'text-text-primary' : isActive
            }"
        >
            <div>
                <slot />
            </div>

            <span
                class="invisible absolute start-full top-1/2 ms-4 -translate-y-1/2 rounded-sm bg-foreground px-2 py-1.5 text-xs font-medium text-white group-hover:visible"
            >
                {{ props.label }}
            </span>
        </a>
    </li>
</template>

<style scoped></style>
