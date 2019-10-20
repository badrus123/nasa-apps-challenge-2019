<?php $this->load->view("dokter/navbar") ?>
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <h2 class="mb-2">Hasil Rujukan Aplikasi</h2>
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3 table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>tanggal</th>
                                                <th>nama</th>
                                                <th>email</th>
                                                <th>hasil diagnosa aplikasi</th>
                                                <th>pemrosesan</th>
                                                <th>status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($value as $data) { ?>
                                            <tr>
                                                <td><?= $data["tanggal"] ?></td>
                                                <td><?= $data["nama"] ?></td>
                                                <td><?= $data["email"] ?></td>
                                                <td><?= $data["hasil_diagnosa"] ?></td>
                                                <td class="<?= $data["status"] ?>"><?= $data["status"] ?></td>
                                                <td>
                                                    <a href="<?= site_url("Table/edit_data/".$data["id_rujukan"]) ?>" class="btn btn-danger"><i class="zmdi zmdi-close-circle"></i></a>
                                                    <a class="btn btn-success" href="<?= site_url("Table/edit_data1/".$data["id_rujukan"]) ?>"><i class="zmdi zmdi-assignment-check" ></i></a>
                                                </td>
                                                <td>
                                                    <a href="<?= site_url("Table/delete_data/".$data["id_rujukan"]) ?>" class="btn btn-danger">Delete</a>
                                                    <a class="btn btn-success" href="<?= site_url("Form/form1/".$data["id_rujukan"]) ?>">next</a>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>

                        <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Hasil Diagnosa Rumah Sakit</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>tanggal</th>
                                                <th>nama</th>
                                                <th class="text-right">email</th>
                                                <th class="text-right">hasil diagnosa</th>
                                                <th class="text-right">nama dokter</th>
                                                <th class="text-right">Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($nilai as $key ) { ?>
                                            <tr>
                                                <td><?= $key["date"] ?></td>
                                                <td><?= $key["nama"] ?></td>
                                                <td><?= $key["email"] ?></td>
                                                <td class="text-right"><?= $key["hasil_diagnosa"] ?></td>
                                                <td class="text-right"><?= $key["nama_dokter"] ?></td>
                                                <td class="text-right"><?= $key["harga"] ?></td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                    </div>
                </div>
            </div>

            </div>
        </div>


        			<!-- modal large -->
			<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="largeModalLabel">Large Modal</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								There are three species of zebras: the plains zebra, the mountain zebra and the Grévy's zebra. The plains zebra and the mountain
								zebra belong to the subgenus Hippotigris, but Grévy's zebra is the sole species of subgenus Dolichohippus. The latter
								resembles an ass, to which it is closely related, while the former two are more horse-like. All three belong to the
								genus Equus, along with other living equids.
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-primary">Confirm</button>
						</div>
					</div>
				</div>
			</div>
			<!-- end modal large -->
            <?php $this->load->view("dokter/footer") ?>