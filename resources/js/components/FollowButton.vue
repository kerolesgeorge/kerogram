<template>
    <div>
        <button :class="[status ? 'btn-secondary' : 'btn-primary', 'ml-3 mb-2 pl-3 pr-3 btn']" @click="followUser" v-text="btnFollows"></button>
    </div>
</template>

<script>
export default {
    props: ['userId', 'follows'],

    data() {
        return {
            status: this.follows,
        }
    },

    methods: {
        followUser() {
            axios.post(`/follow/${this.userId}`).then(response => {
                //alert(response.data);

                //change the status to the opposite of current status
                this.status = !this.status;
            }).catch(err => {
                if (err.response.status == 401) {
                    window.location = '/login';
                }
            });
        }
    },

    computed: {
        btnFollows() {
            return (this.status) ? 'Unfollow' : 'Follow';
        }
    }
}
</script>
