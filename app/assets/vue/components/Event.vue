<template>
    <div>
        <b-card v-bind:title="title" v-bind:sub-title="time" >
            <b-card-text>
                {{ content }}
            </b-card-text>
        </b-card>
    </div>
</template>

<script>
    export default {
        name: 'event',
        props: ['title', 'content', 'time'],
    }
</script>