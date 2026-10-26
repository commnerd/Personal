<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
import { store, update } from '@/routes/admin/blog';
import type { Post } from '@/types';
import { Label } from '@/components/ui/label';
import { Input } from '@/components/ui/input';
import { Button } from '@/components/ui/button';
import InputError from '@/components/InputError.vue';
import { Wysiwyg } from '@/components/ui/wysiwyg';
import { Tags } from '@/components/ui/tags';

const props = defineProps<{
    post?: Post
}>();

const slugify = (v) => {
    props.post.slug = v.toLowerCase().replace(/[^a-z0-9]+/g, "-").replace(/^-+|-+$/g, "");
};

</script>

<template>
    <Head title="Create/Edit Post" />
    <Form
        v-bind="post ? update.form(post.id) : store.form()"
        :reset-on-success="['post']"
        v-slot="{ errors, processing }"
        class="flex flex-col gap-6" >
        <div class="grid gap-6">
            <div class="grid gap-2">
                <Label for="title">Title</Label>
                <Input
                    id="title"
                    type="title"
                    name="title"
                    required
                    autofocus
                    :tabindex="1"
                    autocomplete="title"
                    placeholder="Title"
                    :model-value="post.title"
                    @update:modelValue="slugify"
                />
                <InputError :message="errors.title" />
            </div>
            <div class="grid gap-2">
                <Label for="slug">Slug</Label>
                <Input
                    id="slug"
                    type="slug"
                    name="slug"
                    required
                    autofocus
                    :tabindex="1"
                    autocomplete="slug"
                    placeholder="Slug"
                    :model-value="post.slug"
                />
                <InputError :message="errors.slug" />
            </div>
            <div class="grid gap-2">
                <Label for="tags">Tags</Label>
                <Tags
                    
                />
                <InputError :message="errors.tags" />
            </div>
            <div class="grid gap-2">
                <Label for="slug">Content</Label>
                <Wysiwyg
                    id="content"
                    type="content"
                    name="content"
                    required
                    autofocus
                    :tabindex="1"
                    autocomplete="content"
                    placeholder="Content"
                    :model-value="post.content"
                />
                <InputError :message="errors.slug" />
            </div>
            <div class="grid gap-2">
                <Button>Submit</Button>
            </div>
        </div>
    </Form>
</template>