<script setup lang="ts">
import type { HTMLAttributes } from 'vue';
import { QuillEditor } from '@vueup/vue-quill';
import { useVModel } from '@vueuse/core';
import { cn } from '@/lib/utils';
import '@vueup/vue-quill/dist/vue-quill.snow.css';

const props = defineProps<{
    defaultValue?: string;
    modelValue?: string;
    name?: string;
    id?: string;
    placeholder?: string;
    disabled?: boolean;
    class?: HTMLAttributes['class'];
}>();

const emits = defineEmits<{
    (e: 'update:modelValue', payload: string): void;
}>();

const modelValue = useVModel(props, 'modelValue', emits, {
    passive: true,
    defaultValue: props.defaultValue ?? '',
});

const toolbar = [
    ['bold', 'italic', 'underline'],
    [{ list: 'ordered' }, { list: 'bullet' }],
    ['link'],
];
</script>

<template>
    <div
        :id="id"
        data-slot="wysiwyg"
        :class="
            cn(
                'border-input bg-transparent dark:bg-input/30 w-full overflow-hidden rounded-md border shadow-xs',
                'focus-within:border-ring focus-within:ring-ring/50 focus-within:ring-[3px]',
                'aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive',
                disabled && 'pointer-events-none cursor-not-allowed opacity-50',
                props.class,
            )
        "
    >
        <QuillEditor
            v-model:content="modelValue"
            content-type="html"
            theme="snow"
            :toolbar="toolbar"
            :placeholder="placeholder"
            :enable="!disabled"
            class="min-h-32"
        />
        <input
            v-if="name"
            type="hidden"
            :name="name"
            :value="modelValue ?? ''"
        />
    </div>
</template>

<style scoped>
:deep(.ql-toolbar.ql-snow) {
    border: 0;
    border-bottom: 1px solid var(--border);
    font-family: inherit;
}

:deep(.ql-container.ql-snow) {
    border: 0;
    font-family: inherit;
    font-size: 0.875rem;
}

:deep(.ql-editor) {
    min-height: 8rem;
}

:deep(.ql-editor.ql-blank::before) {
    color: var(--muted-foreground);
    font-style: normal;
}
</style>
