<template>
    <div class="card w-100 mt-2">
        <div class="card-body">
            {{ content }}
        </div>
    </div>
</template>

<script>
    export default {
        name: 'event',
        props: ['content'],
    }
</script>