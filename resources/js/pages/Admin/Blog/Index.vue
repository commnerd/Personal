<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { admin } from '@/routes';
import { index } from '@/routes/blog';
import type { BreadcrumbItem, Post } from '@/types';
import { isTemplateExpression } from 'typescript';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Admin',
        href: admin(),
    },
    {
        title: 'Blog',
        href: index(),
    }
];

defineProps({
    posts: Array<Post>,
});
</script>

<template>
    <Head title="Blog | Index" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
            <div class="flex flex-row">
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Published Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(post, _) in posts" :key="post.id">
                            <td>{{ post.title }}</td>
                            <td>{{ post.slug }}</td>
                            <td>{{ post.published_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>