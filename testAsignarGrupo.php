<?php
/**
 * Created by PhpStorm.
 * User: Universidad
 * Date: 2/10/14
 * Time: 09:01 PM
 */


    require('Grupo.php');
    require_once('db.php');
    require('header.php');

    $grupo = new Grupo();

    if(isset($_REQUEST['maestro']))
    {
        $id = $_REQUEST['maestro'];
    }
    else
    {
        $id = 0;
    }

    if(isset($_REQUEST['accion']))
    {
        $accion = $_REQUEST['accion'];
    }
    else
    {
        $accion = 0;
    }

    if(isset($_REQUEST['grupo']))
    {
        $idg = $_REQUEST['grupo'];
    }
    else
    {
        $idg = 0;
    }

    switch($accion)
    {
        case 0:
            $grupo->seleccionaGrupo($id);
            break;
        case 1:
            $grupo->createMaestroMateria($id,$idg);
            $materia->seleccionaMaestro($id);
            break;
        case 2:
            $grupo->deleteMaestroMateria($id,$idg);
            $grupo->seleccionaMaestro($id);
            break;
    }
?>

<!--<script type="text/javascript">
    $(function (e) {
        $('#submit').click(function (e) {
            descripcion = $(this).val();
            e.preventDefault()
            $.post('ajax.php', $('#maestro').serialize(), function(data){$('#mensaje').html(data);});

        })
    })

</script>-->

<?php require('footer.php'); ?>