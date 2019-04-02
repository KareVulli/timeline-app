<template>
    <b-modal ref="login-modal" @ok="onSubmit" @hide="onHide" v-bind:ok-disabled="pending.auth" title="Log in" ok-title="Log in...">
        <b-form>
            <p v-if="pending.auth">Loading...</p>

            <div v-else-if="error.auth" class="alert alert-danger" role="alert">
                {{ error.auth.response.data.message }}
            </div>

            <b-form-group label="Email:" label-for="input-email" >
                <b-form-input id="input-email" v-model="form.email" type="email" required placeholder="Enter email" ></b-form-input>
            </b-form-group>
            <b-form-group label="Password:" label-for="input-password" >
                <b-form-input id="input-password" v-model="form.password" type="password" required placeholder="Enter password" ></b-form-input>
            </b-form-group>
        </b-form>
    </b-modal>
</template>

<script>
    import { mapState, mapActions } from 'vuex'

    export default {
        name: 'login-modal',
        data() {
            return {
                form: {
                    email: '',
                    password: ''
                }
            }
        },
        props: [
            'show'
        ],
        watch: {
            show: function (newValue, oldValue) {
                if (newValue) {
                    this.$refs['login-modal'].show();
                }
            },
            token(newValue, oldValue) {
                if (newValue) {
                    this.onHide();
                }
            }
        },
        
        computed: mapState({
            token(state) {
                if (state.auth) {
                    return state.auth.token;
                } else {
                    return null;
                }
            },
            pending: state => state.pending,
            error: state => state.error,
        }),
        methods: {
            ...mapActions([
                "loginUser",
            ]),
            onSubmit(evt) {
                evt.preventDefault();
                this.loginUser({ data: { email: this.form.email, password: this.form.password } });
            },
            onHide(evt) {
                this.$emit('hide');
            }
        }
    }
</script>