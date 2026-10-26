<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { admin } from '@/routes/admin';
import { index, update } from '@/routes/admin/blog';
import type { BreadcrumbItem, Post } from '@/types';
import Form from './Form.vue';
import { onMounted, ref, Ref } from 'vue';

const props = defineProps<{
    post?: Post
}>();

let breadcrumbs: Ref<BreadcrumbItem[]> = ref([]);

onMounted(() => {
    breadcrumbs.value = [
        {
            title: 'Admin',
            href: admin(),
        },
        {
            title: 'Blog',
            href: index(),
        },
        {
            title: `Edit '${props.post.title}'`,
            href: '',
        }
    ];
});

</script>

<template>
    <Head title="Blog | Edit" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
            <Form :post="post" />
        </div>
    </AppLayout>
</template>