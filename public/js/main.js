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
        this.$inputList = this.$form.querySelectorAll('[data-input]')
        this.$inputErrorList = this.$form.querySelectorAll('[data-control-errors]')

    }

    createErrors = ($item, errorList) => {
        let errorText = '';
        errorList.forEach((error) => {
            errorText += `<p>${error}</p>`
        })
        $item.innerHTML = errorText;
    }

    showErrors = () => {
        Object.keys(this.errors).forEach((key) => {
           this.$inputErrorList.forEach(($item) => {
               if(key === $item.dataset.controlErrors){
                   this.createErrors($item, this.errors[key]);
               }
           })
        })
    }

    send = async () => {
        const formData = new FormData(this.$form);
        const response = await this.service.getFormData(formData);
        if(response.success){
            return {
                success: true,
                message: response.data.message
            }
        }else{
            this.errors = response.errors
            // this.showErrors(response.errors);
            return {
                error: true,
            }
        }
    }
    clearError = ($error) => {
        $error.innerHTML = '';
    }
    clearErrorList = () => {
        this.$inputErrorList.forEach(($item) => {
            this.clearError($item);
        })
    }
    clear = () => {
        this.$inputList.forEach(($input) => {
            $input.value = '';
        })

    }

    reset = () => {
        this.clear();
        this.clearErrorList();
    }

    show = () => {
        this.$form.classList.add('show');
    }

    hide = () => {
        this.$form.classList.remove('show');
    }
}

class MainTab{
    constructor() {
        this.$tabList = document.querySelectorAll('[data-main-frame-tab]');
        this.$linkList = document.querySelectorAll('[data-main-frame-tab-link]');
        this.init();
    }
    init = () => {
        this.listeners();
    }


    clickHandler = (e) => {

    }

    listeners = () => {

    }

}

class MainFrameMessage {
    constructor() {
        this.$message = document.querySelector('#mainFrameMessage');
        this.init()
    }

    init = () => {
        if(!this.$message) return;
        this.$inner = document.querySelector('[data-message-inner]');
    }

    show = () => {
        this.$message.classList.add('show');
    }

    hide = () => {
        this.$message.classList.remove('show');
    }

    set = (content) => {
        this.$inner.innerHTML = content;
    }

    clear = () => {
        this.$inner.innerHTML = '';
    }

}

class Light {
    constructor() {
        this.$light = document.querySelector('#mainFrameLight');
    }

    show = (isBlink) => {
        this.$light.classList.add('foreground');

        if(isBlink){
            this.$light.classList.add('blink');
        }
        this.$light.classList.add('show');
    }

    hide = () => {
        setTimeout(() => {
            this.$light.classList.remove('foreground');
            this.$light.classList.remove('blink');
        }, 700);
        this.$light.classList.remove('show');
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
        this.message = new MainFrameMessage();
        this.isShowForm = false;
        this.listeners();
    }

    showForm = () => {
        if( this.isShowForm) return
        this.isShowForm = true;
        light.show();
        setTimeout(() => {
            this.form.show()
            light.hide();
        }, 700);
    }

    hideForm = () => {
        this.isShowForm = false;
        light.show();
        setTimeout(() => {
            this.form.hide();
            light.hide();
        }, 700);
    }

    hideMessage = () => {
        light.show();
        setTimeout(() => {
            this.message.hide();
            this.message.clear();
            light.hide();
        }, 700);

    }

    sendHandler = async (e) => {
        light.show(true);
        e.preventDefault();
        const rez = await this.form.send();
        if(rez.success){
            setTimeout(() => {
                this.message.set(`<p>${rez.message}</p>`);
                this.message.show();
                this.form.reset();
                this.hideForm();
            }, 700);
        } else {
            setTimeout(() => {
                this.form.showErrors();
                light.hide();
            }, 700);
        }
    }

    submitHandler = (e) => {
        if(e.target.closest('#mainForm')){
            this.sendHandler(e);
        }
    }

    clickHandler = (e) => {
        if(e.target.closest('[data-main-form-btn]')){
            this.showForm();
        }

        if(e.target.closest('[data-main-form-close]')){
            this.hideForm();
        }

        if(e.target.closest('[data-main-frame-message-close]')){
            this.hideMessage();
        }
    }

    listeners = () => {
        document.addEventListener('click', this.clickHandler);
        this.$mainFrame.addEventListener('submit', this.submitHandler)
    }
}





const mainFrame = new MainFrame();
const light = new Light();

