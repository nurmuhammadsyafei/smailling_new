<!-- STAR TULIS PESAN MEMO -->
<form id="form-tulis-memo" class="tulis-pesan form-horizontal message-form col-xs-12" style="display:inline-block">
            <div>
                <div class="form-group surat-col" >
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-recipient"><b>Jenis Surat:</b></label>
                    <div class="col-sm-2">
                    <input type="text" class="form-control" readonly value="MEMO">
                    </div>
                </div>

                <div class="form-group surat-col" >
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-recipient"><b>Kepada :</b></label>
                    <div class="col-sm-2">
                        <select name="kepada" class="form-control" id="kepada">
                            <option value="">-</option>
                            <?php
                            $kelompok = $user['id_kelompok'];
                            $klp=$this->db->query("SELECT * FROM kelompok where id_kelompok !='$kelompok'")->result_array();
                            foreach($klp as $data){ ?>
                                <option value="<?= $data['id_kelompok'] ?>"><?= $data['nama_kelompok'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group surat-col" >
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-recipient"><b>Dari :</b></label>
                    <div class="col-sm-2">
                    <input type="text" class="form-control" readonly value="<?= $user['nama_divisi'] ?>">
                    </div>
                </div>

                <div class="form-group surat-col" >
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-recipient"><b>Perihal :</b></label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" value="<?= $this->mylib->nonotin($user['id_kelompok']) ?>">
                    </div>
                </div>

                <div class="hr hr-18 dotted"></div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-subject">Subject:</label>

                    <div class="col-sm-6 col-xs-12">
                        <div class="input-icon block col-xs-12 no-padding">
                            <input maxlength="100" type="text" class="col-xs-12" name="subject" id="form-field-subject" placeholder="Subject" />
                            <i class="ace-icon fa fa-comment-o"></i>
                        </div>
                    </div>
                </div>

                <div class="hr hr-18 dotted"></div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right">
                        <span class="inline space-24 hidden-480"></span>
                        Message:
                    </label>

                    <div class="col-sm-9">
                        <div class="wysiwyg-editor"></div>
                    </div>
                </div>

                <div class="hr hr-18 dotted"></div>

                <div class="form-group no-margin-bottom">
                    <label class="col-sm-3 control-label no-padding-right">Attachments:</label>

                    <div class="col-sm-9">
                        <div id="form-attachments">
                            <input type="file" name="attachment[]" />
                        </div>
                    </div>
                </div>

                <div class="align-right">
                    <button id="id-add-attachment" type="button" class="btn btn-sm btn-danger">
                        <i class="ace-icon fa fa-paperclip bigger-140"></i>
                        Add Attachment
                    </button>
                </div>

                <div class="space"></div>
            </div>
        </form>
<!-- END TULIS PESAN MEMO -->
