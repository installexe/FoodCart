function makeOrder(){
    $.ajax({
        url:'/kurs.dot/cart.php?function=makeOrder',
        data:{
            'name':$('#name').val(),
            'phone':$('#phone').val(),
            'adress':$('#adress').val()
        },
        success:function(data){
        if(data=='success'){
            location.reload();
        }else{
            alert(data);
        }
    }
    });
}