function getDataFile(inputFile) {

    return new Promise(function (resolve, reject) {

        let fileReader = new FileReader();
        let file = inputFile.files[0];

        fileReader.readAsDataURL(file);

        fileReader.addEventListener('loadend', function (load) {
            resolve(load.target.result);
        });
    });
}

async function uploadFile(params) {
    let response = await request(URL_API + '/file-save', params, 'POST', getCookie('token'));

    if (response.result === 'fail') {
        toastSweet('Erro!', response.message, 'error');
    }

    return response;
}