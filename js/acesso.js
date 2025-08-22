setInterval ((function acesso(){
    var data = new Date();
    var dias = data.getDay();
    var mes = data.getMonth();
    var ano = data.getFullYear();
    var text = document.getElementById("data");
    var meses = new Array('Janeiro', 'Fevereiro', 'Marco', 'Abril', 'Maio', 'Junho', 'Julho',
        'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
    var diaSemana = new Array('Domingo', 'Segunda-Feira', 'Terca-Feira', 'Quarta-Feira',
        'Quinta-Feira', 'Sexta-Feira', 'Sabado');
    var hoje = data.getDate();
    var hora = data.getHours();
    var min = data.getMinutes();
    var sec = data.getSeconds();
    var strHora = hora + ' : ' + min + ' : ' + sec;
    var strData = diaSemana[dias] + ', ' + hoje + ' de ' + meses[mes] + ' de ' + ano + ', ' + strHora;
    //document.writeln(strData); 
    text.innerHTML = strData;
}), 1000);