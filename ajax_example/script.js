// XMLHttpRequest - объект для AJAX запросов
var xhr = new XMLHttpRequest();
function process() {
    if(xhr.readyState === 0 || xhr.readyState === 4) {
        var name = document.querySelector('#usertext').value;
        // создание AJAX(асинхронный) запроса
        xhr.open("GET", "handler.php?name="+name, true);
        xhr.send(null); // для метода GET шлется null
        // обработка полученного ответа от сервера
        xhr.onreadystatechange = function () {
            // если данные полностью пришли и сервер вернул статус 200, то заносим данные в div
            if(xhr.readyState === 4 && xhr.status === 200) {
                var text = xhr.responseText; // получаем текст
                document.querySelector('#result').innerHTML = text;
            }
        }
    }
}