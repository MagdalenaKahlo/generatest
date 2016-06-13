$(document).ready(function(){
    
     function cerrar_sesion()
        {
            
            $.ajax({
                url: "../../controlador/Usuarios/log_out.php",
                type: "POST",
                success: function(resp){
                    $('#response-cerrar-sesion').html(resp)
                }        
            });
        } 
});