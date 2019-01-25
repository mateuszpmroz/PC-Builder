<template>
    <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Rejestracja</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-2 input-group">
                        <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user prefix grey-text"></i>
                                </span>
                        </div>
                        <input type="text" id="orangeForm-name" class="form-control validate">
                    </div>
                    <div class="md-form mb-2 input-group">
                        <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope prefix grey-text"></i>
                                </span>
                        </div>
                        <input type="email" id="orangeForm-email" class="form-control validate">
                    </div>

                    <div class="md-form mb-2 input-group">
                        <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-lock prefix grey-text"></i>
                                </span>
                        </div>
                        <input type="password" id="orangeForm-pass" class="form-control validate">
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-deep-orange">Wyślij</button>
                </div>
            </div>
        </div>
    </div>
</template>
