function addCart(id,count){
    $.ajax({
        url:'/kurs.dot/cart.php?function=addCart',
        data:{
            'id':id,
            'count':count
    
    },success:function(data){
        if(data=='success'){
            location.reload();
        }else{
            alert(data);
        }
    }
    });
}