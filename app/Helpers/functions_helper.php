<?php 
function msg($msg, $color='success'){
    if($color=='success'){
        $status = 'Ok';
    }else{
        $status = 'Erro';
    }
    return '
            <div class="alert alert-'.$color.' alert-dismissible fade show" role="alert">
                <strong>'.$status.'!</strong> '.$msg.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
            ';
}

function moedaReal($valor){
    return number_format($valor, 2, ',', ' ');
}

function moedaDolar($valor){
    $valor = floatval(str_replace(',','.',$valor));
    return number_format($valor, 2, '.', ' ');
}

?>