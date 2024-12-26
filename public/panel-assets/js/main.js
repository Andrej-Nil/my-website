class Container{
    constructor(selector, DeclaredClass) {
        this.$elList = document.querySelectorAll(selector);
        this.exemplarList = [];
        this.DeclaredClass = DeclaredClass
        this.init();
    }

    init = () => {
        this.$elList.forEach($item => {
            const exemplar = new this.DeclaredClass($item);
            this.exemplarList.push(exemplar);
        })
    }

}


class Render {
    delete = ($element) => {
        if (!$element) {
            return;
        }
        $element.remove();
    }

    clear = ($element) => {
        if (!$element) {
            return;
        }
        $element.innerHTML = '';
    }

    getListHtml = (getHtmlFn, arr) => {
        let list = '';
        arr.forEach((item) => {

            list += getHtmlFn(item);
        })

        return list;
    }

    innerHtml = ($element, string) => {
        $element.innerHTML = string;
    }

    render = ($parent, getHtmlMarkup, argument = null, array = null, where = 'beforeend') => {

        let markupAsStr = '';
        if (!$parent) {
            return;
        }

        if (array) {
            array.forEach((item) => {
                markupAsStr = markupAsStr + getHtmlMarkup(item);
            })
        }
        if (argument) {
            markupAsStr = getHtmlMarkup(argument);
        }

        if (!array && !argument) {
            markupAsStr = getHtmlMarkup();
        }
        $parent.insertAdjacentHTML(where, markupAsStr);
    }
}

class Loader extends Render{

    getLoaderHtml = () => {
        return `
            <div class="spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
        `
    }
}


class Service{
    constructor() {
        this.POST = 'POST';
        this.GET = 'GET';
        this._token = this.getToken();
    }

    post = async (api, data) => {
        const response = await this.getData(api, this.POST, data);
        if (response.ok) {
            return await response.json();
        } else {
            return {'error': 'Произошла ошибка'};
        }
    }

    getData = (api, method, options) => {
        return fetch(api, {
            method: method,
            body: options.data,
            headers: options.headers
        });
    }
    getToken = () => {
        return document.querySelector('[name="csrf-token"]').content;
    }
}

class UploadRender extends Render{
    constructor($uploadFile) {
        super();
        this.$uploadFile = $uploadFile;
        this.$preview = this.$uploadFile.querySelector('[data-upload-preview]');
        this.loader = new Loader();
    }


    createPhoto = (photo) => {
        this.render(this.$preview, this.getPhotoHtml, photo);
    }

    createLoader = () => {
        this.render(this.$preview, this.getLoaderHtml);
    }

    destroyLoader = () => {
        const $loader = this.$uploadFile.querySelector('[data-upload-loader]');
        this.delete($loader);
    }



    clearPreview = () => {
        this.clear(this.$preview);
    }


    getPhotoHtml = (photo) => {
        return `
            <div data-upload-photo class="upload-file-photo">
                <input type="hidden" name="photo_id" value="${photo.id}">
                <img class="upload-file-photo__img" src="${photo.link}"/>
                <button type="button" class="btn btn--yellow upload-file-photo__btn upload-file-photo__btn--top">Просмотр</button>
                <button data-delete type="button"  class="btn btn--red upload-file-photo__btn upload-file-photo__btn--bottom">Удалить</button>
            </div>
        `
    }



    getLoaderHtml = () => {
        return `
            <div data-upload-loader class="upload-file__loader">
                ${this.loader.getLoaderHtml()}
            </div>
        `
    }
}

class UploadService extends Service{
    constructor(api) {
        super()
        this.api = api;
    }

    fetchFileLink = (file) => {
        const data = new FormData();
        data.append('file', file);
        return this.post(
            this.api,
            {
                data: data,
                headers: {
                    "X-CSRF-Token": this._token
                }
            }
        )
    }
}



class Upload {
    constructor($uploadFile) {
        this.$uploadFile = $uploadFile;
        this.validExtensions = ['jpg', 'jpeg', 'png', 'svg'];
        this.init()
    }

    init = () => {
        if (!this.$uploadFile) return;
        this.$input = this.$uploadFile.querySelector('[data-upload-input]');
        this.$preview = this.$uploadFile.querySelector('[data-upload-preview]');
        this.api = this.$uploadFile.dataset.uploadApi;
        this.service = new UploadService(this.api);
        this.render = new UploadRender(this.$uploadFile);
        this.listeners();
    }

    uploadPhoto = async () => {
        this.disableInput();
        this.render.clearPreview();
        this.render.createLoader();
        const file = this.$input.files[0];
        const response = await this.service.fetchFileLink(file);
        if(response.success){
            this.enableInput();
            this.$input.value = '';
            this.render.destroyLoader();
            this.render.createPhoto(response.data.photo);
        } else {
            console.log(response.error);
        }
    }
    clickHandler = (e) => {
        // console.log(e)
    }

    disableInput = () => {
        this.$input.disabled = true;
    }

    enableInput = () => {
        this.$input.disabled = false;

    }


    checkExtension = (file) => {
        const extension = file.name.split('.').pop().toLowerCase()
        if (this.validExtensions.indexOf(extension) <= -1) {
            return false;
        } else {
            return true;
        }

    }


    listeners = () => {
        this.$uploadFile.addEventListener('click', this.clickHandler);
        this.$input.addEventListener('input', this.uploadPhoto);
    }
}

const uploadContainer = new Container('[data-upload]', Upload);









