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
            return await response.json();
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
        this.init()
    }

    init = () => {
        if (!this.$uploadFile) return;
        this.$input = this.$uploadFile.querySelector('[data-upload-input]');
        this.$preview = this.$uploadFile.querySelector('[data-upload-preview]');
        this.api = this.$uploadFile.dataset.uploadApi;
        this.service = new UploadService(this.api);
        this.listeners();
    }

    uploadPhoto = async () => {
        const file = this.$input.files[0];

        const response = await this.service.fetchFileLink(file);
    }
    clickHandler = (e) => {
        console.log(e)
    }




    listeners = () => {
        this.$uploadFile.addEventListener('click', this.clickHandler);
        this.$input.addEventListener('change', this.uploadPhoto);
    }
}

const uploadContainer = new Container('[data-upload]', Upload);









