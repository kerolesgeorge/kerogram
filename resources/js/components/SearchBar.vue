<template>
    <div class="search-wrapper">
        <input type="text" name="search" id="search" placeholder="Search" autocomplete="off"
            v-model="keyword"
            v-on:keyup="search"
        >

        <!-- :class="['search-result', result ? 'enabled' : 'disabled']" -->
        <div class="search-result" v-if="users.length > 0">
            <ul v-for="user in users" :key="user.id">
                <li>
                    <a :href="'/profile/' +  user.id">
                        <div class="d-flex align-items-center pl-2">
                            <div class="search-image">
                                <img :src="user.image" alt="" class="w-100 rounded-circle">
                            </div>
                            <div class="ml-3 search-data">
                                <div>{{ user.username }}</div>
                                <span>{{ user.name }}</span>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    props: [],

    data() {
        return {
            keyword: '',
            users: [],

        }
    },

    methods: {
        search() {
            if (this.keyword.length > 2) {
                axios.post('/search/', {'keyword': this.keyword}).then(response => {
                    this.users = response.data;
                });
            } else {
                this.users = [];
            }

            //this.result = this.input.length > 2 ? this.input : '';
        }
    },

    computed: {

    },
}
</script>

<style lang="scss" scoped>
    .search-wrapper {
        position: absolute;
        left: 50%;
        top: 26px;
        margin-left: -100px;

        input[type="text"] {
            width: 200px;
            border: 1px solid #e0e0e0;
            border-radius: 2px;
            background-color: #f9f9f9;
            padding: 2px 0 2px 6px;
            outline: none;
        }

        .search-result {
            position: absolute;
            top: 45px;
            left: -20px;
            border: 1px solid #e0e0e0;
            background-color: #fff;
            box-shadow: 0 3px 6px rgba(0,0,0,0.25);
            width: 240px;
            text-align: left;
            z-index: 1;

            ul {
                margin: 0!important;
                padding: 0;
                z-index: 3;

                li {
                    list-style: none;
                    cursor: pointer;

                    a {
                        color: #1b1e21;
                        display: block;
                        font-weight: bold;
                        z-index: 999;

                        .d-flex {
                            padding: 0.5rem;

                            .search-data {
                                div {
                                    margin-bottom: -6px;
                                }
                            }
                        }

                        span {
                            font-size: 0.8rem;
                            font-weight: 300;
                            color: #999;
                        }

                    } &:hover {
                        background-color: #f9f9f9;
                        text-decoration: none;
                    }
                }
            } &::after, &::before {
                bottom: 100%;
                left: 50%;
                border: solid transparent;
                content: " ";
                height: 0;
                width: 0;
                position: absolute;
                pointer-events: none;
            } &::after {
                border-color: rgba(255, 255, 255, 0);
                border-bottom-color: #fff;
                border-width: 10px;
                margin-left: -10px;
            } &::before {
                border-color: rgba(224, 224, 224, 0);
                border-bottom-color: #e0e0e0;
                border-width: 11px;
                margin-left: -11px;
            }
        }

        img {
            max-width: 32px;
        }
    }
</style>
