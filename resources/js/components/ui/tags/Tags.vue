<template>
  <input type="hidden" :name="name" :value="tags.join(',')"/>
  <vue3-tags-input :tags="tags"
                   :placeholder="placeHolderText()"
                   @on-tags-changed="handleChangeTag"/>
</template>

<script setup>
  import Vue3TagsInput from 'vue3-tags-input';
  import { ref } from 'vue';

  const tags = ref([]);

  const handleChangeTag = (tagValues) => { tags.value = tagValues};

  const placeHolderText = () => tags.value.length <= 0 ? 'Tags...' : '';

  defineProps({
    name: {
        type: String
    },
    value: {
        type: Array,
        default: () => []
    }
  });
</script>