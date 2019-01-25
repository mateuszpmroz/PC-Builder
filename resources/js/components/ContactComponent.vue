<template>
    <section id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">KONTAKT</h2>
                    <h3 class="section-subheading text-muted">Jeśli masz jakiekolwiek wątpliwości lub pytania..Napisz do
                        nas!</h3>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="col-lg-12">
                        <form id="contactForm" name="sentMessage" novalidate="novalidate">
                            <div class="form-group">
                                <input class="form-control" id="email" type="email" placeholder="Twój email *" required="required" data-validation-required-message="Proszę podać swój adres email">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="message" placeholder="Twoja wiadomość *"
                                          required="required"
                                          data-validation-required-message="Proszę napisać wiadomość"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase"
                                        type="submit">Wyślij
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
