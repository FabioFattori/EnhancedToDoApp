<script setup lang="ts">
const props = defineProps({
  label: String,
  route: String
})


function onClick() : void {
  route(props.route)
}
</script>

<template>
    <li>
        <a @click="onClick" class="group relative flex justify-center rounded-sm px-2 py-1.5 text-gray-500 hover:bg-foreground-500 hover:text-text-primary cursor-pointer">
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
