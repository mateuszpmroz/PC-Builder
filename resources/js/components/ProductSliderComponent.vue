<template>
    <div>
        <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
                <div class="searchbar">
                    <input v-model="search" class="search_input" type="text" name="" placeholder="Szukaj...">
                    <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
                </div>
            </div>
        </div>
        <v-card>
            <v-container
                    id="scroll-target"
                    fluid
                    grid-list-lg
                    class="scroll-y"
                    style="max-height: 600px"

            >
                <v-layout row wrap
                >
                    <v-flex v-for="application in applicationResults" v-if="apps" v-bind:key="application.name" xs12>
                        <v-card color="#353b48" class="white--text">
                            <v-layout row>
                                <v-flex xs7>
                                    <v-card-title primary-title>
                                        <div>
                                            <div class="headline"><a style="color: yellow"
                                                                     :href="'pc-builder/' + application.id">{{
                                                application.name }}</a></div>
                                        </div>
                                    </v-card-title>
                                </v-flex>
                                <v-flex xs5>
                                    <v-img
                                            :src="application.image_url"
                                            height="125px"
                                            contain

                                    ></v-img>
                                </v-flex>
                            </v-layout>
                            <v-divider light></v-divider>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-card>
    </div>
</template>
<script>
    export default {
        props: ['applications'],
        data() {
            return {
                search: '',
                apps: Object.values(this.applications)
            }
        },

        computed: {
            applicationResults: function () {
                return this.apps.filter((application) => {
                    return application.name.toLowerCase()
                        .includes(this.search.toLowerCase());
                });
            }
        },

        methods: {
            onScroll(e) {
                this.offsetTop = e.target.scrollTop;
            }
        }
    }
</script>
<style scoped>
    .searchbar {
        margin-bottom: 2rem;
        margin-top: auto;
        height: 60px;
        background-color: #353b48;
        border-radius: 30px;
        padding: 10px;
    }

    .search_input {
        color: white;
        border: 0;
        outline: 0;
        background: none;
        width: 0;
        caret-color: transparent;
        line-height: 40px;
        transition: width 0.4s linear;
    }

    .searchbar:hover > .search_input {
        padding: 0 10px;
        width: 450px;
        caret-color: yellow;
        transition: width 0.4s linear;
    }

    .searchbar:hover > .search_icon {
        background: #353b48;
        color: yellow;
    }

    .search_icon {
        height: 40px;
        width: 40px;
        float: right;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        color: white;
    }

</style>
