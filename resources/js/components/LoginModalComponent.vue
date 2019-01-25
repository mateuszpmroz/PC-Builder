<template>
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" v-bind:action="login">
                    <input type="hidden" name="_token" v-model="csrf">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Logowanie</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="md-form mb-2 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope prefix grey-text"></i>
                                </span>
                            </div>
                            <input type="email" id="defaultForm-email" name="email" class="form-control validate">
                        </div>

                        <div class="md-form mb-2 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-lock prefix grey-text"></i>
                                </span>
                            </div>
                            <input type="password" id="defaultForm-pass" name="password" class="form-control validate">
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-default">Zaloguj się</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['csrf', 'login'],
    }
</script>