<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <router-link class="navbar-brand" to="/home">Timeline</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <router-link class="nav-item" tag="li" to="/home" active-class="active">
                        <a class="nav-link">Home</a>
                    </router-link>
                    <router-link class="nav-item" tag="li" to="/events" active-class="active">
                        <a class="nav-link">Events</a>
                    </router-link>
                </ul>
            </div>
        </nav>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'app',
    }
</script>