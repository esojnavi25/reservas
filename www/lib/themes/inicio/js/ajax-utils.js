var ajax = {};

ajax.getFileSync = function (url) {
    var content;

    $.ajax({
        url: url,
        type: 'GET',
        success: function (data){
            content = data;
        },
        async: false
    });

    return content;
};

ajax.get = function (url, success, error) {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: success,
        error: error
    });
};

ajax.post = function (url, data, success, error) {
    $.ajax({
        url: url,
        type: 'POST',
        contentType: 'application/json',
        dataType: 'json',
        data: JSON.stringify(data),
        success: success,
        error: error
    });
};

ajax.put = function (url, data, success, error) {
    $.ajax({
        url: url,
        type: 'PUT',
        contentType: 'application/json',
        dataType: 'json',
        data: JSON.stringify(data),
        success: success,
        error: error
    });
};

ajax.delete = function (url, success, error) {
    $.ajax({
        url: url,
        type: 'DELETE',
        dataType: 'json',
        success: success,
        error: error
    });
};
