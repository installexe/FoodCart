$('#auth_button').on('click',function(){
    let login = $('#login').val();
    let password = $('#password').val();
    $.ajax({
    url:'/kurs.dot/auth.php',
    data:{
    'password':password,
    'login':login
    },
    success:function(data){
    if(data=='success'){
    location = '/kurs.dot/index.php';
    }else{
    $('#error_input').text('Неверный логин или пароль!');
    }
    }
    })
    })