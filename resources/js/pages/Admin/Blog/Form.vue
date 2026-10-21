<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
import { store, update } from '@/routes/admin/blog';
import type { Post } from '@/types';
import { ref } from 'vue';

const props = defineProps<{
    post?: Post
}>();

const title = ref(props.post == null ? 'Create Post' : 'Update Post');
const action = props.post == null ? store : update;

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
                />
                <InputError :message="errors.title" />
            </div>
        </div>
    </Form>
</template>