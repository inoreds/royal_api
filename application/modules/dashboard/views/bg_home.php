                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content" style="background-color:#BFBFBF;">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="fa fa-user-md"></i>
                                            <span class="caption-subject bold uppercase"> DATA PASIEN</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <?php echo form_open("dashboard"); ?>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <select class="bs-select form-control" name="dataTablePoli" id="dataTablePoli" data-live-search="true" data-size="8">
                                                        <option value='' disabled selected>Pilih Unit</option>
                                                        <option value='semua'>Semua Unit</option>
                                                        <?php 
                                                        foreach($dataTablePoli as $row)
                                                        { 
                                                            echo '<option value="'.$row->KODEUNIT.'">'.$row->KODEUNIT.' - '.$row->NAMAUNIT.'</option>';
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div  class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd">
                                                            <input name="tgl_ubah" id="tgl_ubah" type="text" class="form-control" readonly>
                                                            <span class="input-group-btn">
                                                                <button class="btn default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <button id="tampil_data" name="tampil_data" class="btn btn-primary mt-ladda-btn ladda-button" data-style="expand-right"> Refresh Data </button>
                                                    </div>
                                                </div>
                                                <?php echo form_close(); ?>                                                          
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="btn-group pull-right">
                                                            <a href="javascript:;" class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown"><i class="fa fa-print"></i> Print </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
                                            <thead class="btn-success">
                                                <tr>
                                                    <th> No Registrasi </th>
                                                    <th> Tanggal </th>
                                                    <th> Norm </th>
                                                    <th> NIK </th>
                                                    <th> Nama </th>
                                                    <th> Nama Unit </th>
                                                    <th> Customer </th>
                                                    <th> Aksi </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                      foreach($dataTable as $dt)
                                                      {
                                                        $tgl = $dt->TANGGAL;
                                                        $tgl1 = date('d-M-Y', strtotime($tgl));
                                                        ?>
                                                        <tr class="odd gradeX">
                                                            <td><?php echo $dt->NOREG; ?></td>
                                                            <td><?php echo $tgl1; ?></td>
                                                            <td><?php echo $dt->NORM; ?></td>
                                                            <td><?php echo $dt->NIK; ?></td>
                                                            <td><?php echo $dt->NAMA; ?></td>
                                                            <td><?php echo $dt->NAMAUNIT; ?></td>
                                                            <td><?php echo $dt->NMCUST; ?></td>
                                                            <td>
                                                                <a href="<?php echo base_url(); ?>emr/pasien/<?=$dt->NOREG;?>" class="btn red-sunglo btn-outline btn-circle btn-xs active"><i class="fa fa-edit"> Pilih</i>
                                                                </a>
                                                            </td>
                                                        </tr>   
                                                        <?php   
                                                      }
                                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->