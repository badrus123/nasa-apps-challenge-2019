<?php $this->load->view("dokter/navbar") ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                    <?php foreach ($value as $data) { ?>
                        <div class="card-header">Form Rujukan</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Pasien Rujukan Si Helti</h3>
                            </div>
                            <hr>
                            <form action="<?= base_url("Form/hasil_rs")?>" method="post" novalidate="novalidate">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Nama Pasien</label>
                                    <input id="cc-pament" name="id" type="number" class="form-control"  value="<?= $data["id"] ?>" hidden>
                                    <input id="cc-pament" name="nama" type="text" class="form-control"  value="<?= $data["nama"] ?>" disabled>
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Nama Dokter</label>
                                    <input id="cc-name" name="dokter" type="text" class="form-control cc-name valid" >
                                    <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                </div>
                                <div class="form-group">
                                    <label for="cc-number" class="control-label mb-1">Hasil Diagnosa</label>
                                    <textarea id="cc-number" name="hasil_diagnosa" type="tel" class="form-control cc-number identified visa" cols="30" rows="10"></textarea>
                                    <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cc-exp" class="control-label mb-1">Tanggal</label>
                                            <input id="cc-exp" name="tanggal" type="date" class="form-control cc-exp" >
                                            <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="x_card_code" class="control-label mb-1">Pembayaran</label>
                                        <div class="input-group">
                                            <input id="x_card_code" name="pembayaran" type="number" placeholder="Rp 0000 000" class="form-control cc-cvc" >
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Submit</span>
                                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                                    </button>
                                </div>
                            </form>
                    <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("dokter/footer") ?>