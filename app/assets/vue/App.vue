<template>
    <div>
        <b-navbar toggleable="lg" type="light" variant="light">
            <b-navbar-brand to="/home">Timeline</b-navbar-brand>
            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                    <b-nav-item to="/home">Home</b-nav-item>
                    <b-nav-item to="/events">Events</b-nav-item>
                </b-navbar-nav>
                <b-navbar-nav class="ml-auto">
                    <b-nav-item v-if="!isLoggedIn" @click="showLoginModal = !showLoginModal">Log in</b-nav-item>
                    <b-nav-item v-else @click="logout">Log out</b-nav-item>
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
        <div class="container">
            <router-view></router-view>
        </div>
        <login-modal v-bind:show="showLoginModal" @hide="hideLoginModal" ></login-modal>
    </div>
</template>

<script>
    import LoginModal from './components/LoginModal';
    import { mapGetters, mapMutations  } from 'vuex'

    export default {
        name: 'app',
        components: {
            LoginModal
        },
        computed: {
            ...mapGetters([
                'isLoggedIn',
            ])
        },
        data () {
            return {
                showLoginModal: false
            };
        },
        methods: {
            ...mapMutations([
                'logout'
            ]),
            hideLoginModal: function () {
                this.showLoginModal = false;
            }
        }
    }
</script>