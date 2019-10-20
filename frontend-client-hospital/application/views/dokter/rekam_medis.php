<?php $this->load->view("dokter/navbar") ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Form Rekam Medis</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Pasien Rujukan Si Helti</h3>
                            </div>
                            <hr>
                            
                            <form action="" method="post" novalidate="novalidate">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Nama Pasien</label>
                                    
                                    <select  id="cc-pament" name="namat"  class="form-control">
                                    <?php foreach ($value as $data) { ?>
                                            <option value="<?=$data["id"]?>"><?=$data["nama"]?></option>
                                    <?php } ?>
                                    </select> 
                                    
                                </div>
                                <div class="form-group">
                                    <label for="cc-number" class="control-label mb-1">Hasil Diagnosa</label>
                                    <textarea id="cc-number" name="hasil_diagnosa" type="tel" class="form-control cc-number identified visa" cols="30" rows="10"></textarea>
                                    <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Submit</span>
                                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                                    </button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("dokter/footer") ?>