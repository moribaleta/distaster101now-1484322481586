function translateData(text,id){
    var data_return = text;
    $.post('translator.php',{text: text},function(data){
        console.log(data);

        //data = JSON.parse(data);
        //console.log(data);
        if(data.indexOf('null')!==-1){
           data = data.substr(0,data.length-4);
        }
        document.getElementById(id).innerHTML = data;
        /*data_content.innerHTML = data[0]+"</br>"+data[1]+"</br>"+data[2];
        data_content.innerHTML += "<br><a href='forecast.php'>view forecast</a>";
        document.getElementById('data_content').appendChild(data_content);
        //document.getElementById('forecast_data').src = 'forecast.php';*/
    });

    /*$.ajax({
        type: "POST",
        async:false, // ** CHANGED **
        url: "translator.php",
        data:{text:text},
        success: function (msg) {
            console.log(msg);
            document.getElementById(id).textContent = JSON.parse(msg);
        }
        , error: function () {
            chyba("chyba v požadavku", "df");
        }
    });*/
    return data_return;
}
