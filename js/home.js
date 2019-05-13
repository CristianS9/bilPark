$(document).ready(function(){
    $(".abrir-login").click(function(){
        vex.dialog.open({
            message: 'Login',
            input: [
                '<input name="log-usuario" type="text" placeholder="Usuario" required />',
                '<input name="log-contrasena" type="password" placeholder="Contraseña" required />'
            ].join(''),
            buttons: [
                $.extend({}, vex.dialog.buttons.YES, { text: 'Login' }),
                $.extend({}, vex.dialog.buttons.NO, { text: 'Cancelar' }),
                $.extend({}, vex.dialog.buttons.YES,{text:"Registrar"})
            ],
            callback: function (data) {
                if (!data) {
                    console.log('Cancelled')
                } else {
                    console.log('Username', data.username, 'Password', data.password)
                }
            }
        })
    });
});