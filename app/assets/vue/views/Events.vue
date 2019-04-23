<template>
    <b-container>
        <div class="row col">
            <h1>Events</h1>
        </div>

        <div class="row">
            <div class="col">
                <b-alert v-if="pending.event" show>Loading...</b-alert>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <b-form @submit="onSubmit">
                    <b-form-group label="Title:" label-for="input-title">
                        <b-form-input id="input-title" v-model="title" required placeholder="Enter event title"></b-form-input>
                    </b-form-group>
                    <b-form-group label="Content:" label-for="input-content">
                        <b-form-input id="input-content" v-model="content" required placeholder="Enter event content"></b-form-input>
                    </b-form-group>
                    <b-form-group label="Time:" label-for="input-time">
                        <b-form-input id="input-time" v-model="time" type="datetime-local" required></b-form-input>
                    </b-form-group>
                    <b-button type="submit" variant="primary" :disabled="title.length === 0 || content.length === 0 || pending.event" >Add new event</b-button>
                </b-form>
            </div>
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
            <event v-bind:content="event.content" v-bind:title="event.title" v-bind:time="event.time"></event>
        </div>
    </b-container>
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
            onSubmit (evt) {
                evt.preventDefault();
                this.createEvent({data: {
                    title: this.title,
                    content: this.content,
                    time: this.time
                }});
            },
        },
    }
</script>