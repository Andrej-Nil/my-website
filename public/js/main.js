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

class Container {
    constructor(selector, ParentClass) {
        this.selector = selector;
        this.$elList = document.querySelectorAll(this.selector);
        this.ParentClass = ParentClass;
        this.list = [];
        this.init()
    }


    init = () => {
      if(!this.$elList.length) return;
        this.$elList.forEach(($el) => {
            this.set($el);
        })
    }

    set = ($el) => {
        this.list.push(new this.ParentClass($el));
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
        this.$inputErrorList = this.$form.querySelectorAll('[data-control-errors]');
        this.listeners()

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

    sendHandler = () => {
        //     sendHandler = async (e) => {
//
//         e.preventDefault();
//         const rez = await this.form.send();
//         if(rez.success){
//             setTimeout(() => {
//                 this.message.set(`<p>${rez.message}</p>`);
//                 this.message.show();
//                 this.form.reset();
//                 this.hideForm();
//             }, 700);
//         } else {
//             setTimeout(() => {
//                 this.form.showErrors();
//                 light.hide();
//             }, 700);
//         }
//     }
    }

    submitHandler = async (e) => {
        e.preventDefault();
        frameLight.show(true);

        const rez = await this.send();
        if(rez.success){
            setTimeout(() => {
                frameMessage.set(`<p>${rez.message}</p>`);
                frame.replaceTab('message');
                this.reset();
                frameLight.hide();
            }, 700);

        } else {
            this.createErrors()
        }

    }

    listeners = () => {
        this.$form.addEventListener('submit', this.submitHandler);
    }

}
//
// class MainTab{
//     constructor() {
//         this.$tabList = document.querySelectorAll('[data-main-frame-tab]');
//         this.$linkList = document.querySelectorAll('[data-main-frame-tab-link]');
//         this.init();
//     }
//     init = () => {
//         this.listeners();
//     }
//
//
//     clickHandler = (e) => {
//
//     }
//
//     listeners = () => {
//
//     }
//
// }

class MainFrameMessage {
    constructor() {
        this.$message = document.querySelector('#mainFrameMessage');
        this.init()
    }

    init = () => {
        if(!this.$message) return;
        this.$inner = document.querySelector('[data-message-inner]');
    }

    set = (content) => {
        this.$inner.innerHTML = content;
    }

    clear = () => {
        this.$inner.innerHTML = '';
    }

}

class FrameLight {
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
        }, 300);
        setTimeout(() => {
            this.$light.classList.remove('blink');
        }, 700);
        this.$light.classList.remove('show');
    }
}

// class MainFrame {
//     constructor() {
//         this.$mainFrame = document.querySelector('#mainFrame');
//         this.init();
//     }
//
//     init = () => {
//         if (!this.$mainFrame) return;
//         this.form = new MainForm();
//         this.message = new MainFrameMessage();
//         this.isShowForm = false;
//         this.listeners();
//     }
//
//     showForm = () => {
//         if( this.isShowForm) return
//         this.isShowForm = true;
//         light.show();
//         setTimeout(() => {
//             this.form.show()
//             light.hide();
//         }, 700);
//     }
//
//     hideForm = () => {
//         this.isShowForm = false;
//         light.show();
//         setTimeout(() => {
//             this.form.hide();
//             light.hide();
//         }, 700);
//     }
//
//     hideMessage = () => {
//         light.show();
//         setTimeout(() => {
//             this.message.hide();
//             this.message.clear();
//             light.hide();
//         }, 700);
//
//     }
//
//     sendHandler = async (e) => {
//         light.show(true);
//         e.preventDefault();
//         const rez = await this.form.send();
//         if(rez.success){
//             setTimeout(() => {
//                 this.message.set(`<p>${rez.message}</p>`);
//                 this.message.show();
//                 this.form.reset();
//                 this.hideForm();
//             }, 700);
//         } else {
//             setTimeout(() => {
//                 this.form.showErrors();
//                 light.hide();
//             }, 700);
//         }
//     }
//
//     submitHandler = (e) => {
//         if(e.target.closest('#mainForm')){
//             this.sendHandler(e);
//         }
//     }
//
//     clickHandler = (e) => {
//         if(e.target.closest('[data-main-form-btn]')){
//             this.showForm();
//         }
//
//         if(e.target.closest('[data-main-form-close]')){
//             this.hideForm();
//         }
//
//         if(e.target.closest('[data-main-frame-message-close]')){
//             this.hideMessage();
//         }
//     }
//
//     listeners = () => {
//         document.addEventListener('click', this.clickHandler);
//         this.$mainFrame.addEventListener('submit', this.submitHandler)
//     }
// }

class Frame {
    constructor() {
        this.$frame = document.querySelector('#mainFrame');
        this.init()
    }

    init = () => {
        if(!this.$frame) return;
        this.$tabList = this.$frame.querySelectorAll('[data-frame-tab]');
        this.$nav = this.$frame.querySelector('[data-frame-nav]');
        this.currentTabName = null;
        this.listeners()
    }

    replaceTab = (tabName) => {
        this.$tabList.forEach(($tab) => {
            this.hideTab($tab);
            if($tab.dataset.frameTab === tabName){
                this.showTab($tab);
            }
        })
    }

    showTab = ($tab) => {
        $tab.classList.add('show');
    }

    hideTab = ($tab) => {
        $tab.classList.remove('show');
    }

    showNav = () => {
        this.$nav.classList.remove('hide');
    }

    hideNav = () => {
        this.$nav.classList.add('hide');
    }

    replaceTabHandler = ($link) => {
        const tabName = $link.dataset.frameTabLink;
        if (this.currentTabName === tabName) return;
        frameLight.show();
        setTimeout(() => {
            this.replaceTab(tabName);
            frameLight.hide();
            this.hideNav();
        }, 700);
    }

    closeTabbHandler = ($target) => {
        const $tab = $target.closest('[data-frame-tab]');
        if(!$tab) return;
        frameLight.show();
        setTimeout(() => {
            this.replaceTab('');
            frameLight.hide();
            this.showNav();
        }, 700);

    }

    clickHandler = (e) => {
        if(e.target.closest('[data-frame-tab-link]')){
            this.replaceTabHandler(e.target.closest('[data-frame-tab-link]'));
        }
        if(e.target.closest('[data-frame-tab-close]')){
            this.closeTabbHandler(e.target);
        }
    }

    listeners = () => {
        document.addEventListener('click', this.clickHandler);
    }
}

class Group {
    constructor($group) {
        this.$group = $group;
        this.init();
    }

    init = () => {
        if (!this.$group) return;
        this.$showBtn = this.$group.querySelector('[data-group-btn="show"]');
        this.$hideBtn = this.$group.querySelector('[data-group-btn="hide"]');
        this.listeners();
    }



    showGroupHidden = () => {
        this.$group.classList.remove('display-only-first');
        this.$showBtn.classList.add('hide');
        this.$hideBtn.classList.remove('hide');
    }

    hideGroupHidden = () => {
        this.$group.classList.add('display-only-first');
        this.$hideBtn.classList.add('hide');
        this.$showBtn.classList.remove('hide');
    }
    // clickHandler = (e) => {
    //     if(e.target.closest('[data-group-btn="show"]')){
    //
    //     }
    //
    //     if(e.target.closest('[data-group-btn="hide"]')){
    //
    //     }
    // }

    listeners = () => {
        this.$showBtn.addEventListener('click', this.showGroupHidden);
        this.$hideBtn.addEventListener('click', this.hideGroupHidden);

        // document.addEventListener('click', this.clickHandler);
    }
}

class HobbyPage {
    constructor() {
        this.$hobbyPage = document.querySelector('#hobbyPage');
        this.init();
    }

    init = () => {
        if(!this.$hobbyPage) return;
        this.activeTabIdx = 0
        this.$tabList = this.$hobbyPage.querySelectorAll('[data-hobby-tab]');
        this.$dotList = this.$hobbyPage.querySelectorAll('[data-hobby-dot]');
        this.showTab(this.$tabList[this.activeTabIdx]);
        this.changeDot(this.$dotList[this.activeTabIdx]);
        this.listeners();
    }

    changeDot = ($dot) => {
        // if()
        $dot.classList.add('active');
    }

    hideTab = ($tab) => {
        $tab.classList.remove('show');
        $tab.classList.add('move-down');
        setTimeout(() => {
            $tab.classList.add('hide');
            $tab.classList.remove('move-down');
        }, 1000)
        // $tab.classList.add('hide');
    }

    showTab = ($tab) => {
        if(!$tab) return;
        $tab.classList.add('move-up');
        $tab.classList.remove('hide');
        setTimeout(() => {
            $tab.classList.remove('move-up');
            $tab.classList.add('show');
        }, 1000)
    }

    changeTab = ($dot) => {
        const newActiveTabIdx = $dot.dataset.hobbyDot;
        if(+newActiveTabIdx === this.activeTabIdx) return;
        this.hideTab(this.$tabList[this.activeTabIdx]);
        this.activeTabIdx = newActiveTabIdx;

        setTimeout(() => {
            this.showTab(this.$tabList[this.activeTabIdx]);
        }, 1000)

    }

    clickHandler = (e) => {
            if(e.target.closest('[data-hobby-dot]')){
                this.changeTab(e.target.closest('[data-hobby-dot]'));
            }
    }

    listeners = () => {
        this.$hobbyPage.addEventListener('click', this.clickHandler);
    }
}

class GalleryModal {
    constructor() {
        this.$modal = document.querySelector('#galleryModal');
        this.init();
    }

    init = () => {
        if(!this.$modal) return;
        this.$contentWrap = this.$modal.querySelector('[data-content]');
        this.arrowList = this.$modal.querySelectorAll('[data-gallery-modal]');
        this.IMG = 'img';
        this.listeners();
    }

    setContent = ($photo) => {
        const type = $photo.dataset.galleryItem;
        const url = $photo.dataset.url;
        if(type === this.IMG){
            this.createImg(url);
        }
    }

    createImg = (url) => {
        this.$contentWrap.innerHTML = `<img src="${url}" alt="" class="gallery-modal__content"/>`;
    }

    open = (isShowArrows) => {

        this.toggleArrows(isShowArrows);
        this.$modal.classList.add('open');
    }

    close = () => {
        this.$modal.classList.remove('open');
    }

    toggleArrows = (isShowArrows) => {
        if(isShowArrows){
            this.showArrows();
        } else {
            this.hideArrows();
        }
    }

    showArrows = () => {
        this.arrowList.forEach(($arrow) => {
            $arrow.classList.remove('hide');
        });
    }

    hideArrows = () => {
        this.arrowList.forEach(($arrow) => {
            $arrow.classList.add('hide');
        });
    }


    clickHandler = (e) => {
        if(e.target.closest('[data-close]')){
            this.close();
        }
    }

    listeners = () => {
        this.$modal.addEventListener('click', this.clickHandler);
    }
}

class Gallery {
    constructor($gallery) {
        this.$gallery = $gallery;

        this.init();
    }

    init = () => {
        if (!this.$gallery) return;
        this.$photoList = this.$gallery.querySelectorAll('[data-gallery-item]');
        this.isShowArrows = this.$photoList.length > 1;
        this.index = null;
        this.listeners();
    }

    setPhotoInModal = ($photo) => {
        this.$photoList.forEach(($item, key) => {
            if($item === $photo){
                this.index = key;
                galleryModal.setContent($photo);
            }
        })
    }

    showPhoto = ($photo) => {
        this.setPhotoInModal($photo);
        setTimeout(() => {
            galleryModal.open(this.isShowArrows);
        }, 40)
    }

    nextPhoto = () => {
        this.index += 1;
        if(this.index >  (this.$photoList.length - 1)){
            this.index = 0;
        }
        galleryModal.setContent(this.$photoList[this.index]);
    }

    prevPhoto = () => {
        this.index -= 1;

        if(this.index <  0){
            this.index = this.$photoList.length - 1;
        }
        galleryModal.setContent(this.$photoList[this.index]);
    }

    clickHandler = (e) => {
        if(e.target.closest('[data-gallery-item]')){
            this.showPhoto(e.target.closest('[data-gallery-item]'));
        }

        if(e.target.closest('[data-gallery-modal="prev"]')){
            this.prevPhoto();
        }

        if(e.target.closest('[data-gallery-modal="next"]')){
            this.nextPhoto();
        }
    }

    listeners = () => {
        document.addEventListener('click', this.clickHandler);
    }
}

const frame = new Frame();

const frameForm = new MainForm();

const frameMessage = new MainFrameMessage();

const frameLight = new FrameLight();

const galleryModal = new GalleryModal();

const galleryContainer = new Container('[data-gallery]', Gallery);

const groupContainer = new Container('[data-group]', Group);

const hobbyPage = new HobbyPage();

