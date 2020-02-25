<?php

// Sessão
session_start();
if(isset($_SESSION['mensagem'])): 
    
?>

<script>
    // Mensagem
    window.onload = function() {
        Materialize.toast('<?php echo $_SESSION['mensagem']; ?>', 4000);
    }
</script>

<?php    
endif;
session_unset();
?>