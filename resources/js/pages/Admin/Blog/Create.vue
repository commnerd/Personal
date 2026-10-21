<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { admin } from '@/routes/admin';
import { index, create } from '@/routes/admin/blog';
import type { BreadcrumbItem, Post } from '@/types';
import Form from './Form.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Admin',
        href: admin(),
    },
    {
        title: 'Blog',
        href: index(),
    },
    {
        title: 'Create',
        href: create(),
    }
];

</script>

<template>
    <Head title="Blog | Create" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
            <Form />
        </div>
    </AppLayout>
</template>