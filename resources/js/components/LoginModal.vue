 <template>
            <div>
                <b-button @click="showModal">
                    Zarejestruj się już teraz!
                </b-button>
                <b-modal ref="myModalRef" hide-footer>
                    <div class="d-block text-center">
                        <h3>Zarejestruj się</h3>
                        <b-form @reset="onReset" v-if="show">
                            <b-form-group id="exampleInputGroup1"
                                          label="Email address:"
                                          label-for="exampleInput1"
                                          description="We'll never share your email with anyone else.">
                                <b-form-input id="exampleInput1"
                                              type="email"
                                              v-model="form.email"
                                              required
                                              placeholder="Enter email">
                                </b-form-input>
                            </b-form-group>
                            <b-form-group id="exampleInputGroup2"
                                          label="Your Name:"
                                          label-for="exampleInput2">
                                <b-form-input id="exampleInput2"
                                              type="text"
                                              v-model="form.name"
                                              required
                                              placeholder="Enter name">
                                </b-form-input>
                            </b-form-group>
                            <b-form-group id="exampleInputGroup3"
                                          label="Food:"
                                          label-for="exampleInput3">
                                <b-form-select id="exampleInput3"
                                               :options="foods"
                                               required
                                               v-model="form.food">
                                </b-form-select>
                            </b-form-group>
                            <b-form-group id="exampleGroup4">
                                <b-form-checkbox-group v-model="form.checked" id="exampleChecks">
                                    <b-form-checkbox value="me">Check me out</b-form-checkbox>
                                    <b-form-checkbox value="that">Check that out</b-form-checkbox>
                                </b-form-checkbox-group>
                            </b-form-group>
                            <b-button type="submit" variant="primary">Submit</b-button>
                            <b-button type="reset" variant="danger">Reset</b-button>
                        </b-form>
                    </div>
                    <b-btn class="mt-3" variant="outline-danger" block @click="hideModal">Close Me</b-btn>
                </b-modal>
            </div>
 </template>

 <script>
            export default {
                methods: {
                    showModal () {
                        this.$refs.myModalRef.show()
                    },
                    hideModal () {
                        this.$refs.myModalRef.hide()
                    },
                        onReset (evt) {
                        evt.preventDefault();
                        /* Reset our form values */
                        this.form.email = '';
                        this.form.name = '';
                        this.form.checked = [];
                        /* Trick to reset/clear native browser form validation state */
                        this.show = false;
                        this.$nextTick(() => { this.show = true });
                    }
                }
            }
 </script>
