<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Jeux[]|\Cake\Collection\CollectionInterface $jeux
 */
?>

<br/>
<br/>

<div class="container">

    <form action="/jeux" method="post">
        <input type="hidden" name="_csrfToken" value="<?php echo $csrf; ?>"/>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
            <?php
                echo $this->Form->control('titre', [
                    'class' => 'form-control',
                    'placeholder' => 'Titre du jeu',
                    'label' => false,
                    'required' => true
                ]);
            ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
            <?php
                echo $this->Form->control('categories', array(
                    'label' => false,
                    'class' => 'form-control',
                    'empty' => 'Choisissez',
                    'required' => true
                    ));

            ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">

                <div class="form-group">
                    <div class='input-group date' id='datetimepicker2'>
                        <input type='text' placeholder="Date" name="date_de_sortie" class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>

            <!-- <label for="start">Date de sortie : </label>
            <input type="date" id="start" name="date_de_sortie" value="<?php echo date('Y'); ?>" min="1900-01-01" max="<?php echo date('Y'); ?>"> -->

            <!-- <div class="form-group">
                <label class="col-sm-3 control-label">Date Picker (popup)</label>

                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="form-control datepicker" data-format="D, dd MM yyyy">

                        <div class="input-group-addon">
                            <a href="#"><i class="entypo-calendar"></i></a>
                        </div>
                    </div>
                </div>
            </div> -->

            <?php
                // echo $this->Form->control('date_de_sortie', [
                //     'label' => 'Date de sortie',
                //     'minYear' => '1900',
                //     'maxYear' => date('Y'),
                // ]);
            ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                <?= $this->Form->button('Ajouter', ['class' => 'btn']) ?>
            </div>
        </div>

    <?= $this->Form->end() ?>

    <br/>
    <br/>

    <table class="table table-bordered table-striped datatable dataTable no-footer" id="table-2" role="grid" aria-describedby="table-2_info">

        <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">TITRE</th>
          <th scope="col">CATEGORIE</th>
          <th scope="col">DATE DE SORTIE</th>
          <th scope="col">DISPONIBILITE</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // echo "
          // <td>
          //     <form action='jeux/modifierDispo/".$games['jeux']['id']."' method='post'>
          //         <input type='hidden' name='_csrfToken' value='".$csrf."'/>
          //         <button type='input' class='btn'>
          //             <i style='font-size: 24px; color: red;' class='entypo-cancel-squared'></i>
          //         </button>
          //     </form>
          // </td>";
            foreach($tousLesJeux as $games)
            {
                echo "<tr>";
                    echo "<td><a href='/jeux/edit/".$games['jeux']['id']."'> ".$games['jeux']['id']."</a></td>";
                    echo "<td>".$games['jeux']['titre']."</td>";
                    echo "<td>".$games['cj']['libelle']."</td>";
                    echo "<td>".$games['jeux']['date_de_sortie']."</td>";
                    if($games['jeux']['en_stock'] == 0)
                    {
                        echo "
                        <td>
                            <button type='input' class='btn boutonDispo' id=".$games['jeux']['id'].">
                                <i id='entypo".$games['jeux']['id']."' style='font-size: 24px; color: red;' class='entypo-cancel-squared'></i>
                            </button>
                        </td>";
                    }
                    else
                    {
                        echo "
                        <td>
                            <button type='input' class='btn boutonDispo' id=".$games['jeux']['id'].">
                                <i id='entypo".$games['jeux']['id']."' style='font-size: 24px; color: green;' class='entypo-check'></i>
                            </button>
                        </td>";
                    }
                    // echo " <a href='#' class='btn btn-default btn-sm btn-icon icon-left'>
                    //             <i class='entypo-pencil'></i>Edit
                    //           </a>
                    //           <a href='#' class='btn btn-danger btn-sm btn-icon icon-left'>
                    //             <i class='entypo-cancel'></i>Delete
                    //           </a>
                    //           <a href='#' class='btn btn-info btn-sm btn-icon icon-left'>
                    //             <i class='entypo-info'></i>Profile
                    //         </a>";
                echo "</tr>";
            }

          ?>
      </tbody>

    </table>

</container>

<script type="text/javascript">
    $(function () {

        $( ".boutonDispo" ).click(function() {

            var id = $(this).attr('id');
            var entypoId = $(this).children("i").attr("id");
            var entypoClass = $(this).children("i").attr('class');

            $.ajax({
                url: "/jeux/modifierDispo/"+id,
                dataType: 'json',
                headers :
                {
                    'X-CSRF-Token': '<?php echo $csrf ?>'
                },
			    type: "POST",
                success: function(rep) {
                    id = rep['id'];
                    var entypo = $('#entypo'+id).attr('class');
                    if($('#entypo'+id).attr('class') == 'entypo-check')
                    {
                        $('#entypo'+id).removeClass("entypo-check");
                        $('#entypo'+id).addClass("entypo-cancel-squared");
                        $('#entypo'+id).css("color", "red");
                    }
                    else
                    {
                        $('#entypo'+id).removeClass("entypo-cancel-squared");
                        $('#entypo'+id).addClass("entypo-check");
                        $('#entypo'+id).css("color", "green");
                    }
				}
            })
        });

        $('#datetimepicker2').datetimepicker({
            locale: 'fr'
        });

    });
</script>
