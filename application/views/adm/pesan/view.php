<div class="container">
<div class="page-header">
    <h1>
        Inbox
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Mailbox with some customizations as described in docs
        </small>
    </h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div class="row">
            <div class="col-xs-12">
                <div class="tabbable">
                    <ul id="inbox-tabs" class="inbox-tabs nav nav-tabs padding-16 tab-size-bigger tab-space-1">
                        <li class="li-new-mail pull-right">
                            <a data-toggle="tab" href="#write" data-target="write" class="btn-new-mail">
                                <span class="btn btn-purple no-border">
                                    <i class="ace-icon fa fa-envelope bigger-130"></i>
                                    <span class="bigger-110">Write Mail</span>
                                </span>
                            </a>
                        </li><!-- /.li-new-mail -->

                        <li class="active">
                            <a data-toggle="tab" href="#inbox" data-target="inbox">
                                <i class="blue ace-icon fa fa-inbox bigger-130"></i>
                                <span class="bigger-110">Inbox</span>
                            </a>
                        </li>

                        <!-- <li>
                            <a data-toggle="tab" href="#sent" data-target="sent">
                                <i class="orange ace-icon fa fa-location-arrow bigger-130"></i>
                                <span class="bigger-110">Sent</span>
                            </a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#draft" data-target="draft">
                                <i class="green ace-icon fa fa-pencil bigger-130"></i>
                                <span class="bigger-110">Draft</span>
                            </a>
                        </li> -->

                       
                    </ul>

                    <div class="tab-content no-border no-padding">
                        <div id="inbox" class="tab-pane in active">
                            <div class="message-container">
                                <div id="id-message-list-navbar" class="message-navbar clearfix">
                                    <div class="message-bar">
                                        <div class="message-infobar" id="id-message-infobar">
                                            <span class="blue bigger-150">Inbox</span>
                                            <span class="grey bigger-110">(<?= $unread['unread'] ?> pesan belum terbaca)</span>
                                        </div>
                                    </div>

                                    <div>

                                        <!-- <div class="nav-search minimized">
                                            <form class="form-search">
                                                <span class="input-icon">
                                                    <input type="text" autocomplete="off" class="input-small nav-search-input" placeholder="Search inbox ..." />
                                                    <i class="ace-icon fa fa-search nav-search-icon"></i>
                                                </span>
                                            </form>
                                        </div> -->
                                    </div>
                                </div>


                                <div class="message-list-container">
                                    <div class="message-list" id="message-list">

                                    <table id="table_pesan" class="table  table-stripped table-hover compact" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="width:20%">Inisiator</th>
                                            <th style="width:70%">Perihal</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                            <?php $no=1; foreach($pesan as $data){ ?>
                                                <tr>
                                                    <td>    
                                                        <a href=""><b style="color:#6c5ce7"><?= $data['nama']?></b></a>
                                                    </td>
                                                    <td><?= $data['perihal_surat']?></td>
                                                    <td><?= date('Y-m-d',strtotime($data['tgl_buat']))?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>



                                    </div>
                                </div>

                                <div class="message-footer clearfix">
                                    <div class="pull-left"> <?= $total['total'] ?> messages total </div>

                                    <div class="pull-right">
                                        <div class="inline middle"> page 1 of 16 </div>

                                        &nbsp; &nbsp;
                                        <ul class="pagination middle">
                                            <li class="disabled">
                                                <span>
                                                    <i class="ace-icon fa fa-step-backward middle"></i>
                                                </span>
                                            </li>

                                            <li class="disabled">
                                                <span>
                                                    <i class="ace-icon fa fa-caret-left bigger-140 middle"></i>
                                                </span>
                                            </li>

                                            <li>
                                                <span>
                                                    <input value="1" maxlength="3" type="text" />
                                                </span>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-caret-right bigger-140 middle"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-step-forward middle"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="hide message-footer message-footer-style2 clearfix">
                                    <div class="pull-left"> simpler footer </div>

                                    <div class="pull-right">
                                        <div class="inline middle"> message 1 of 151 </div>

                                        &nbsp; &nbsp;
                                        <ul class="pagination middle">
                                            <li class="disabled">
                                                <span>
                                                    <i class="ace-icon fa fa-angle-left bigger-150"></i>
                                                </span>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-angle-right bigger-150"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.tab-content -->
                </div><!-- /.tabbable -->
            </div><!-- /.col -->
        </div><!-- /.row -->

<!-- TULIS PESAN -->
        <!-- <form id="id-message-form" class="hide form-horizontal message-form col-xs-12">
            <div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-recipient">Recipient:</label>

                    <div class="col-sm-9">
                        <span class="input-icon">
                            <input type="email" name="recipient" id="form-field-recipient" data-value="alex@doe.com" value="alex@doe.com" placeholder="Recipient(s)" />
                            <i class="ace-icon fa fa-user"></i>
                        </span>
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
        </form> -->

       

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
</div>


<script>
$(document).ready(function() {

    $('#table_pesan').DataTable( {
        buttons: [
        {
            extend: 'searchPanes',
            config: {
                cascadePanes: true
            }
        }
    ],
    dom: 'Bfrtip',
        'scrollX': false,
        "paging":   false,
        'search': false,
        'ordering' : false,
        'language': {"url": "http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json"},
        "info":     false,
        "scrollY": 300
    } );
} );
</script>