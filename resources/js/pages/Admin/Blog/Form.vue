<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
import { store, update } from '@/routes/admin/blog';
import type { Post } from '@/types';
import { ref, onMounted } from 'vue';
import { Label } from '@/components/ui/label';
import { Input } from '@/components/ui/input';
import InputError from '@/components/InputError.vue';

const props = defineProps<{
    post?: Post
}>();

const title = ref('Create Post');

const slugify = (evt: Event) => {
    alert(evt);
}

onMounted(() => {
    title.value = props.post == null ? 'Create Post' : 'Update Post';
});

</script>

<template>
    <Head title="Create/Edit Post" />
    <Form
        v-bind="store.form()"
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
                    placeholder="Some Awesome Post"
                    :value="post.title"
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
                    :value="post.slug"
                />
                <InputError :message="errors.slug" />
            </div>
        </div>
    </Form>
</template>