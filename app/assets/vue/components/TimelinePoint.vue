<template>
    <div class="timeline-point">
        <div class="point-header">
            <p>{{ title }}</p>
            <small>{{ time }}</small>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'timeline-point',
        props: ['title', 'time'],
    }
</script>