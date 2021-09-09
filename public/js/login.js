$('#c').on('click',function(){
    var user = $('#a').val();
    var pass = $('#b').val();

    var client = new $.RestClient();

    client.add('loja');

    console.log('passo')
    //debugger

    client.loja.read({a: user}).done(function(data, textStatus, xhrObject){
        console.log('entrou')
    }).fail(function(data, textStatus, xhrObject){
        console.log(data, textStatus, xhrObject)
        console.log('nao logo')
    })


    
    console.log('passo2')
})