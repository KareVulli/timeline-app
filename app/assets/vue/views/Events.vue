<template>
    <div>
        <div class="row col">
            <h1>Events</h1>
        </div>

        <div class="row col">
            <form>
                <div class="form-row">
                    <div class="col-12">
                        <input v-model="title" type="text" class="form-control">
                    </div>
                    <div class="col-12">
                        <input v-model="content" type="text" class="form-control">
                    </div>
                    <div class="col-12">
                        <input v-model="time" type="datetime-local" class="form-control">
                    </div>
                    <div class="col-12">
                        <button @click="createEvent()" :disabled="content.length === 0 || isLoading" type="button" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>

        <div v-if="pending.events" class="row col">
            <p>Loading...</p>
        </div>

        <div v-else-if="error.events" class="row col">
            <div class="alert alert-danger" role="alert">
                {{ error.events }}
            </div>
        </div>

       <!--  <div v-else-if="!hasEvents" class="row col">
            No events!
        </div> -->

        <div v-else v-for="event in events" class="row col" v-bind:key="event.id">
            <event v-bind:content="event.content"></event>
        </div>
    </div>
</template>

<script>
    import Event from '../components/Event';
    import { mapState, mapActions } from 'vuex'

    export default {
        name: 'events',
        components: {
            Event
        },
        data () {
            return {
                title: '',
                content: '',
                time: ''
            };
        },
        created () {
            this.getEvents();
        },
        computed: mapState({
            events: state => state.events,
            pending: state => state.pending,
            error: state => state.error,
        }),
        methods: {
            ...mapActions([
                "getEvents",
                "createEvent",
            ]),
            createEvent () {
                this.$store.dispatch('post/createEvent', this.$data.title, this.$data.content, this.$data.time)
                    .then(() => {
                        this.$data.title = '';
                        this.$data.content = '';  
                        this.$data.time = '';
                    });
            },
        },
    }
</script>