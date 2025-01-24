'use strict'

class MainForm {
    constructor() {
        this.$form = this.$mainFrime.querySelector('#mainForm');

        this.init();
    }

    init = () => {
        if (!this.$form) return;
    }
}


class MainFrame {
    constructor() {
        this.$mainFrame = document.querySelector('#mainFrame');
        this.init();

    }

    init = () => {
        if (!this.$mainFrame) return;

        this.$form = this.$mainFrame.querySelector('#mainForm');
        this.mainFrameLight = this.$mainFrame.querySelector('#mainFrameLight');
        this.isShowForm = false;
        this.listeners();

    }

    showLight = () => {
        this.mainFrameLight.classList.add('foreground');
        this.mainFrameLight.classList.add('show');
    }

    hideLight = () => {
        setTimeout(() => {
            this.mainFrameLight.classList.remove('foreground');
        }, 700);
        this.mainFrameLight.classList.remove('show');
    }




    showForm = () => {
        if( this.isShowForm) return
        this.isShowForm = true;
        this.showLight();

        setTimeout(() => {
            this.$form.classList.add('show');
        }, 700);

        setTimeout(() => {
            this.hideLight();
        }, 700);

    }


    hideForm = () => {

        this.isShowForm = false;
        this.showLight();
        setTimeout(() => {
            this.$form.classList.remove('show');
        }, 700);

        setTimeout(() => {
            this.hideLight();
        }, 700);
    }


    clickHandler = (e) => {
        console.log(e);
        if(e.target.closest('[data-main-form-btn]')){
            this.showForm()
        }

        if(e.target.closest('[data-main-form-close]')){
            this.hideForm()
        }
    }


    listeners = () => {
        document.addEventListener('click', this.clickHandler)
    }

}

const mainFrame = new MainFrame();
