<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { admin } from '@/routes/admin';
import { index, create, edit, destroy } from '@/routes/admin/blog';
import type { BreadcrumbItem, Post } from '@/types';
import Button from '@/components/ui/button/Button.vue';
import { Link } from '@inertiajs/vue3'
import { router } from '@inertiajs/core' // or from '@inertiajs/vue3' / '@inertiajs/react'



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
            <div class="flex flex-row justify-center">
                <Button
                    class="bg-blue-600 hover:bg-blue-700 text-white mx-1 my-1"
                    @click="router.visit(create())"
                >Add New</Button>
            </div>
            <div class="flex flex-row justify-center">
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Published Date</th>
                            <th>Controls</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="post in posts" :key="post.id">
                            <td>{{ post.title }}</td>
                            <td>{{ post.slug }}</td>
                            <td>{{ post.published_at }}</td>
                            <td>
                                <Button
                                    class="bg-blue-600 hover:bg-blue-700 text-white mx-1 my-1"
                                    @click="router.visit(edit(post.id))"
                                >Edit</Button>
                                <Button
                                    class="bg-red-600 hover:bg-red-700 text-white mx-1 ml-0"
                                    @click="router.delete(destroy(post.id))"
                                >Delete</Button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>

<style lang="css" scoped>
table, th, td {
  border: 1px solid black;
}
</style>