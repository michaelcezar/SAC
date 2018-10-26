function dataTablesLengthSelect(order){
    if (order === 'desc'){
        var retorno = [
            [-1,100,50,30,10,5],
            ['Todos',100,50,30,10,5]
        ];
    } else {
        var retorno = [
            [5,10,30,50,100,-1],
            [5,10,30,50,100,'Todos']
        ];
    }
    return retorno;
}

function dataTablesLanguage(language){
    switch(language) {
    case 'pt-br':
        var retorno = {'url': '/js/datatables/language/Portuguese-Brasil.json'};
        break;
    }
    return retorno;
}