<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import PlaceholderPattern from '@/components/PlaceholderPattern.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import type { BreadcrumbItem } from '@/types';
import { index as blogIndex } from '@/routes/admin/blog';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Admin',
        href: dashboard(),
    },
];

defineProps<{
    post_count: number,
    tag_count: number,
}>();

</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div
            class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4"
        >
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <Link :href="blogIndex()">
                    <div
                        class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border p-3"
                    >
                        <h1 class="text-3xl text-center font-bold mb-3 w-full">Blog</h1>
                        <table class="w-full">
                            <tbody>
                                <tr class="border-b border-solid border-slate-300">
                                    <td class="w-[50%] px-3 text-right">Entry Count</td>
                                    <td class="w-[50%] px-3 text-center">{{ post_count }}</td>
                                </tr>
                                <tr>
                                    <td class="w-[50%] px-3 text-right">Tag Count</td>
                                    <td class="w-[50%] px-3 text-center">{{ tag_count }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </Link>
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border"
                >
                    <PlaceholderPattern />
                </div>
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border"
                >
                    <PlaceholderPattern />
                </div>
            </div>
            <div
                class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 md:min-h-min dark:border-sidebar-border"
            >
                <PlaceholderPattern />
            </div>
        </div>
    </AppLayout>
</template>
