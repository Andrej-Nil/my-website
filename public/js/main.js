'use strict'

class Service {
    constructor() {
        this.POST = 'POST';
        this.GET = 'GET';
        this.PUT = 'PUT';
        this.PATCH = 'PATCH'
        this.DELETE = 'DELETE';
        this._token = this.getToken();
    }


    patch = async (api, data) => {
        if (data instanceof FormData) {
            data.append('_method', this.PATCH);
        } else {
            data._method = this.PATCH;
        }

        const response = await this.getData(api, this.POST, data);

        if (response.ok) {
            return await response.json()
        } else {
            return {error: 'Что то пошло не так! Поробуйте позже.'};
        }
    }

    post = async (api, data) => {
        const response = await this.getData(api, this.POST, data);
        if (response.ok) {
            return await response.json();
        } else {
            return await response.json();
        }
    }

    put = async (api, data) => {
        const response = await this.getData(api, this.PUT, data);
        if (response.ok) {
            return await response.json();
        } else {
            return await response.json();
        }
    }

    destroy = async (api, data) => {

        const response = await this.getData(api, this.POST, data);
        if (response.ok) {
            return await response.json()
        } else {
            return response.json()
        }
    }

    getData = (api, method, options) => {
        return fetch(api, {
            method: method,
            body: options.data,
            headers: options.headers
            // body: new URLSearchParams(body)
        });
    }
    createFormData = (data) => {
        const formData = new FormData();
        formData.append(`_token`, this._token);

        if(data){
            for (let key in data) {
                formData.append(`${key}`, data[key])
            }
        }
        return formData;
    }

    getToken = () => {
        return document.querySelector('[name="csrf-token"]').content;
    }
}


class MainFormService extends Service {
    constructor(api) {
        super();
        this.api = api;
    }
    getFormData = (data) => {
        return this.post(
            this.api,
            {
                data: data,
                headers: {
                    "X-CSRF-Token": this._token,
                    "accept": "application/json"
                }
            }
        )
    }
}

class MainForm {
    constructor() {
        this.$form = document.querySelector('#mainForm');
        this.init();
    }

    init = () => {
        if (!this.$form) return;
        this.api = this.$form.action;
        this.service = new MainFormService(this.api);

    }

    send = async () => {
        const formData = new FormData(this.$form);
        return await this.service.getFormData(formData);
    }

    show = () => {
        this.$form.classList.add('show');
    }

    hide = () => {
        this.$form.classList.remove('show');
    }
}

class MainFrame {
    constructor() {
        this.$mainFrame = document.querySelector('#mainFrame');
        this.init();
    }

    init = () => {
        if (!this.$mainFrame) return;
        this.form = new MainForm();
        this.light = new Light();
        this.isShowForm = false;
        this.listeners();
    }

    showForm = () => {
        if( this.isShowForm) return
        this.isShowForm = true;
        this.light.show();

        setTimeout(() => {
            this.form.show()
        }, 700);

        setTimeout(() => {
            this.light.hide();
        }, 700);

    }

    hideForm = () => {
        this.isShowForm = false;
        this.light.show();
        setTimeout(() => {
            this.form.hide();
        }, 700);

        setTimeout(() => {
            this.light.hide();
        }, 700);
    }

    clickHandler = (e) => {
        if(e.target.closest('[data-main-form-btn]')){
            this.showForm();
        }

        if(e.target.closest('[data-main-form-close]')){
            this.hideForm();
        }
    }

    sendHandler = async (e) => {
        e.preventDefault();
        const response = await this.form.send();

        console.log(response)
    }

    submitHandler = (e) => {
        if(e.target.closest('#mainForm')){
            this.sendHandler(e);
        }
    }

    listeners = () => {
        document.addEventListener('click', this.clickHandler);
        this.$mainFrame.addEventListener('submit', this.submitHandler)
    }
}

class Light {
    constructor() {
        this.$light = document.querySelector('#mainFrameLight');
    }

    show = () => {
        this.$light.classList.add('foreground');
        this.$light.classList.add('show');
    }

    hide = () => {
        setTimeout(() => {
            this.$light.classList.remove('foreground');
        }, 700);
        this.$light.classList.remove('show');
    }
}

const mainFrame = new MainFrame();

