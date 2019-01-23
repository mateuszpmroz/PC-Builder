<template>
    <div class="modal fade" id="customizeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">DOSTOSUJ POD GRĘ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <select class="mdb-select md-form colorful-select dropdown-primary" multiple searchable="Szukaj">
                        <option value="" disabled selected>Wybierz grę z listy</option>
                        <option value="1">Witcher 3</option>
                        <option value="2">CS GO</option>
                        <option value="3">Call Of Duty Black OPS 4</option>
                        <option value="4">Fortnite</option>
                        <option value="5">Prey</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                    <button type="button" class="btn btn-primary">Wybierz</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CustomizeModalComponent"
    }
</script>

<style scoped>

</style>
