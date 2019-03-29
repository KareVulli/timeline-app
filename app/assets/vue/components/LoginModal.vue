<template>
    <b-modal ref="login-modal" @ok="onSubmit" @hide="onHide" title="Log in" ok-title="Log in...">
        <b-form>
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
            }
        },
        methods: {
            onSubmit(evt) {
                evt.preventDefault();
                alert(JSON.stringify(this.form));
            },
            onHide(evt) {
                this.$emit('hide');
            }
        }
    }
</script>