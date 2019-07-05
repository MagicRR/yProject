<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Jeux $jeux
 */

?>

<style type="text/css">
#file_browser-modal{
    z-index: 10011;
}
</style>

<div class="container">


    <br/>
    <br/>
    <br/>
    <br/>


    <form enctype="multipart/form-data" method="post" accept-charset="utf-8" action="/jeux/uploadFile">
        <input type="hidden" name="_csrfToken" autocomplete="off" value="<?php echo $csrf; ?>">

    <?php echo $this->Form->control('path', [
        'type' => 'file',
        'label' => false,
        'class' => 'form-control'
    ]);
    ?>
    <div class="input-group">
        <input type="text" name="path" placeholder="Empty" id="superID" class="form-control">
        <!-- <span class="input-group-btn"> -->
            <!-- <a href="/filemanager/dialog.php" class="btn btn-default iframe-btn">
                <i class="entypo-attach"></i>
            </a> -->
        <!-- </span> -->
    </div>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>

    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>


    <?= $this->Form->create($jeux, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Edit Jeux') ?></legend>
        <?php
            echo $this->Form->control('titre');
            echo $this->Form->control('description');
            echo $this->Form->control('categorie');
            echo $this->Form->control('date_de_sortie', ['empty' => true]);
            echo $this->Form->control('url_jaquette', [
                'type' => 'file',
                'label' => false,
                'class' => 'form-control'
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <br/>
    <br/>
    <br/>

    <div class="row">
        <div class="text-center">
            <?php echo "<img src='/upload/jeux/".$jeux['titre']."/".$jeux['url_jaquette']."'>"; ?>
        </div>
    </div>
</div>

<!-- Modal bas de page File Manager -->

<!-- <div id="file_browser-modal" class="modal fade" tabindex="-1" role="dialog">
	<div class="container">
  <div class="modal-admin" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Title</h4>
      </div>
      <div class="modal-body">
        <iframe style="height: 600px; width: 100%;"></iframe>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
</div> -->
<!-- Fin modal -->

<script>

CKEDITOR.replace( 'description', {
filebrowserBrowseUrl: '/filemanager/dialog.php'
});

CKEDITOR.on( 'dialogDefinition', function( ev )
{
    var editor = ev.editor;
    var dialogDefinition = ev.data.definition;

    // This function will be called when the user will pick a file in file manager
    var cleanUpFuncRef = CKEDITOR.tools.addFunction(function (a)
    {
        $('#file_browser-modal').modal('hide');
        CKEDITOR.tools.callFunction(1, a, "");
    });

    var tabCount = dialogDefinition.contents.length;
for (var i = 0; i < tabCount; i++) {
    var browseButton = dialogDefinition.contents[i].get('browse');

    if (browseButton !== null) {
            browseButton.onClick = function (dialog, i)
            {
                editor._.filebrowserSe = this;
				var idUrl = $('.cke_dialog_ui_input_text:input').first().attr('id');
				console.log(idUrl);
                var iframe = $('#file_browser-modal').find('iframe').attr({
					src:'/filemanager/dialog.php?type=0&field_id='+idUrl
                    // src:'/filemanager/dialog.php?type=0&field_id'+idUrl
                });
                $('#file_browser-modal').appendTo('body').modal('show');

            }
       }
   }
});

function responsive_filemanager_callback(field_id){
}

// $(".iframe-btn").fancybox({
// 	"width": 1200,
// 	"height": 1000,
// 	"type": "iframe",
// 	"autoScale": true,
// 	"minHeight": 280,
// 	beforeClose: function() {
//         // working
// 		alert("fermeture");
//         // var $iframe = $('.iframe-btn');
//         // alert($('input', $iframe.contents()).val());
//     },
// });
// , ['block' => true]);
</script>
