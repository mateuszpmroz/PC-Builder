<template>
    <v-card>
        <v-container
            id="scroll-target"
            fluid
            grid-list-lg
            class="scroll-y"
            style="max-height: 600px"

        >
            <v-layout row wrap
                      v-scroll:#scroll-target="onScroll"
                      column
            >
                <v-flex xs12>
                    <v-card color="black" class="white--text">
                        <v-layout row>
                            <v-flex xs7>
                                <v-card-title primary-title>
                                    <div>
                                        <div v-for="title in games" class="headline"><a href="#" >{{ games.title }}</a></div>
                                    </div>
                                </v-card-title>
                            </v-flex>
                            <v-flex xs5>
                                <v-img
                                    v-for="image in games"
                                    :src="games.image"
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
</template>
<script>
    export default {
        data() {
            return {
            games: [
                {title: '', image: ''}
                ]
            }
        },

        methods: {
            onScroll (e) {
                this.offsetTop = e.target.scrollTop
            }
        }
    }
</script>
