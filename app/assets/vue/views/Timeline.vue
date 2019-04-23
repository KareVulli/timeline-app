<template>
    <div>
        <b-container fluid>
            <b-row>
                <b-col>
                    <h4>Timeline</h4>
                </b-col>
            </b-row>
            <b-row>
                <b-col>
                    <b-alert v-if="pending.events" show>Loading...</b-alert>
                    <b-alert v-else-if="error.events" show variant="danger">{{ error.events }}</b-alert>
                    <div v-else class="timeline-container" >
                        <div class="timeline">
                            <timeline-point v-for="event in events" v-bind:key="event.id" v-bind:title="event.title" v-bind:time="event.time"></timeline-point>
                        </div>
                    </div>
                </b-col>
            </b-row>
        </b-container>
    </div>
</template>

<script>
    import TimelinePoint from '../components/TimelinePoint';
    import { mapState, mapActions } from 'vuex'

    export default {
        name: 'timeline',
        components: {
            TimelinePoint
        },
        data () {
            return {
                currentYear: 2018,
                startYear: 2000,
                endYear: 2020
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
            ]),
        },
    }
</script>