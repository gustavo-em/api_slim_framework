alert('ss');


$('.c').on('click',function(){
    var client = new $.RestClient();
    client.add('loja');

    console.log('passo');
    //debugger

    client.loja.read({issa: 'ss'}).fail(function(data, textStatus, xhrObject){
        console.log(data, textStatus, xhrObject)
        console.log('e isso fml')
    }).done(function(data, textStatus, xhrObject){
        console.log(data, textStatus, xhrObject);
        console.log('e hoje');
    });
});