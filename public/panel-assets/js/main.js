class Container{
    constructor(selector, DeclaredClass, parentSelector = null) {

        this.$elList = this.getElList(selector, parentSelector);
        this.exemplarList = [];
        this.DeclaredClass = DeclaredClass;
        this.init();

    }

    init = () => {
        this.$elList.forEach($item => {
            const exemplar = new this.DeclaredClass($item);
            this.exemplarList.push(exemplar);
        })
    }

    getElList = (selector, parentSelector) => {
        if(parentSelector){
            const $parent = document.querySelector(parentSelector);
            return $parent.querySelectorAll(selector);
        } else{
            return document.querySelectorAll(selector);
        }
    }

    //

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

class FormEdit{
    constructor() {
        this.$form = document.querySelector('#formEdit');
        this.init();
    }

    init = () => {

        if (!this.$form) return;

        this.api = this.$form.dataset.api;

        this.$mediaFileList = this.$form.querySelectorAll('[data-upload-media-file]');

        this.mediaFilesContainer = [];

        this.initMediaFiles();

    }

    initMediaFiles = () => {
        this.$mediaFileList.forEach(($item) => {
            const exemplar = new UploadMediaFile($item, this.api);
            this.mediaFilesContainer.push(exemplar);
        })
    }

}

class FormCreate {
    constructor() {
        this.$form = document.querySelector('#formCreate');
        this.init();
    }

    init = () => {

        if (!this.$form) return;

        this.$mediaFileList = this.$form.querySelectorAll('[data-media-file]');

        this.mediaFilesContainer = [];

        this.initMediaFiles();

    }

    initMediaFiles = () => {
        this.$mediaFileList.forEach(($item) => {
            const exemplar = new MediaFile($item, false);
            this.mediaFilesContainer.push(exemplar);
        })
    }
}

class ManualListSorterService extends Service{
    constructor(api) {
        super();
        this.api = api
    }


    updateSort = async (idList) => {
        const formData = new FormData();

        idList.forEach((id) => {
            formData.append('id_list[]', id);
        });
        return await this.post(this.api, {
            data: formData,
            headers: {
                "X-CSRF-Token": this._token
            }
        })
    }
}

class ManualListSorter{
    constructor() {
        this.$sortableBlock = document.querySelector('[data-sortable-list]');
        this.init();
    }

    init = () => {
        if(!this.$sortableBlock) return;
        this.$loader = this.$sortableBlock.querySelector('[data-sortable-loader]');
        this.service = new ManualListSorterService(this.$sortableBlock.dataset.api);
        this.$draggingEl = null;
        this.api = this.$sortableBlock.dataset.api;
        this.listeners();
    }


    dragging = (e) => {
        this.$draggingEl = e.target.closest('[data-sortable-item]');
        if(!this.$draggingEl) return;
        this.$draggingEl.classList.add('dragging');
        this.$sortableBlock.classList.add('select-block');
        this.$draggingEl.setPointerCapture(e.pointerId);
    }

    getNextSibling = (e) => {
       const $siblingList = [...this.$sortableBlock.querySelectorAll('[data-sortable-item]:not(.dragging)')];


       return $siblingList.find($sibling => {
            const box = $sibling.getBoundingClientRect();
            return e.clientY <= box.top + box.height / 2;
        });
    }
    pasteDraggingItem = (nextSibling) => {
        if (nextSibling) {
            this.$sortableBlock.insertBefore(this.$draggingEl, nextSibling);
        } else {
            this.$sortableBlock.appendChild(this.$draggingEl);
        }
    }

    moveDragging = (e) => {
        if (!this.$draggingEl) return;
        const nextSibling = this.getNextSibling(e);
        this.pasteDraggingItem(nextSibling);
    }

    updateSortHandler = async () => {
        this.showLoader();
        const result = await this.service.updateSort(this.getIdList());

        if(result.success){
            this.hideLoader();

        }else {
            this.showError();
            this.hideLoader();
        }

    }

    showLoader = () => {
        this.$loader.classList.add('show');
        this.hideError();
    }

    hideLoader = () => {
        this.$loader.classList.remove('show');
        this.hideError();
    }

    showError = () => {
        this.$loader.classList.add('error');

    }

    hideError = () => {
        this.$loader.classList.remove('error');
    }

    getIdList = () => {
        const $itemList = this.$sortableBlock.querySelectorAll('[data-sortable-item]');
        return Array.from($itemList).map(($item) => {
            return $item.dataset.sortableItem;
        })
    }

    pointerdownHandler = (e) => {
        if(e.target.closest('[data-sortable-drag]')){
            this.dragging(e);
        }
    }

    pointermoveHandler = (e) => {
        if(e.target.closest('[data-sortable-item]')){
            this.moveDragging(e);
        }

    }

    pointerupHandler = async (e) => {
        if (!this.$draggingEl) return;

        this.$draggingEl.releasePointerCapture(e.pointerId);

        this.$draggingEl.classList.remove('dragging');
        this.$sortableBlock.classList.remove('select-block');
        this.$draggingEl = null;
        await  this.updateSortHandler()

    }

    listeners = () => {
        this.$sortableBlock.addEventListener('pointerdown', this.pointerdownHandler)
        this.$sortableBlock.addEventListener('pointermove', this.pointermoveHandler)
        this.$sortableBlock.addEventListener('pointerup', this.pointerupHandler)
    }

}

class MediaFileService extends Service{
    constructor(updatingEntityApi) {
        super();
        this.updatingEntityApi = updatingEntityApi
        this.apiStore = '/media/api/store';
        this.apiDestroy = '/media/api/delete';
    }

    fetchUrl = async (file) => {
        const formData = new FormData();

        formData.append('media', file);
        // data.files.forEach((file) => {
        //     formData.append('media[]', data.files);
        // })
        // for(let i=0; i<data.files.length; i++) {

        // }

        // formData.append('count', data.count);
        // idList.forEach((id) => {
        //     formData.append('id_list[]', id);
        // });
        return await this.post(this.apiStore, {
            data: formData,
            headers: {
                "X-CSRF-Token": this._token
            }
        })
    }

    destroy = async (link) => {
        const formData = new FormData();
        formData.append('_method', 'DELETE');
        formData.append('link', link);
        // data.files.forEach((file) => {
        //     formData.append('media[]', data.files);
        // })
        // for(let i=0; i<data.files.length; i++) {

        // }

        // formData.append('count', data.count);
        // idList.forEach((id) => {
        //     formData.append('id_list[]', id);
        // });
        return await this.post(this.apiDestroy, {
            data: formData,
            headers: {
                // "Content-Type": "multipart/form-data",
                "X-CSRF-Token": this._token
            }
        })
    }

    updatingEntity = async (data) => {

        const formData = new FormData();
        if(data.link.length){
            data.link.forEach((link) => {
                formData.append(`${data.name}`, link);
            })
        } else {
            formData.append(`${data.name}`, '');
        }

        // formData.append('name', data.name);
        // formData.append('link', data.link);
        // formData.append(`${data.name}`, data.link);
        return await this.post(this.updatingEntityApi, {
            data: formData,

            headers: {
                // "Content-Type": "multipart/form-data",
                "X-CSRF-Token": this._token
            }
        })
    }
}

class MediaFileRender extends Render{
    constructor($list, inputName) {
        super();
        this.$list = $list;
        this.inputName = inputName;
    }



    photo = (dataFile) => {
        this.render(this.$list, this.getPhotoHtml, dataFile);
    }



    video = (file) => {

    }

    getPhotoHtml = (dataFile) => {

        return `
            <div data-media-item class="media-file-item">
                <input data-media-input type="file" name="${dataFile.name}" class="media-file-item__input new">
                <span data-media-delete class="media-file-item__btn top">Удалить</span>
                <img src="${dataFile.url}" alt="" class="media-file-item__content">
                <span data-look="${dataFile.url}" data-look-type="img" class="media-file-item__btn bottom">Просмотр</span>
            </div>
        `
    }


    clearList = () => {
        this.clear(this.$list);
    }



}

class UploadMediaFileRender extends Render{

    constructor($list, inputName) {
        super();
        this.$list = $list;
        this.inputName = inputName;
        this.loader = new Loader();
    }

    mediaItem = (type, file) => {
        let content = '';

        if(type === 'photo'){
            content = this.getPhotoContentHtml(file);
        }else if(type === 'video'){
            content = this.getVideoContentHtml(file);
        } else {
            return false
        }

        this.$list.insertAdjacentHTML('beforeend',
            `<div data-media-item class="media-file-item">${content}</div>`
        );
    }

    spinner = () => {
        this.render(this.$list, this.getSpinnerHtml);
    }

    mediaItemSpinner = ($item) => {
        this.render($item, this.getItemSpinnerHtml);
    }

    photo = (media) => {
        this.render(this.$list, this.getPhotoContentHtml, media);
    }

    getPhotoContentHtml = (media) => {
        return `
            <div data-media-item="${media.link}" class="media-file-item">
                <input data-media-input type="text" name="${this.inputName}" value="${media.link}" class="media-file-item__input new">
                <span data-media-delete class="media-file-item__btn top">Удалить</span>
                <img src="${media.url}" alt="" class="media-file-item__content">
                <span data-look="${media.url}" data-look-type="img" class="media-file-item__btn bottom">Просмотр</span>
            </div>
        `
    }

    getVideoContentHtml = (file) => {
        const url = URL.createObjectURL(file);
        return `
            <div data-media-item class="media-file-item">
                <input data-media-input type="file" name="${this.inputName}" class="media-file-item__input new">
                <span data-media-delete class="media-file-item__btn top">Удалить</span>
                <img src="img/icon/play.svg" alt="" class="media-file-item__play">
                <video class="media-file-item__content">
                    <source src="${url}" type="video/mp4" />
                </video>
                <span data-look="${url}" data-look-type="video" class="media-file-item__btn bottom">Просмотр</span>
            </div>
        `
    }

    getSpinnerHtml = () => {
        return `
            <div data-spinner class="media-file-item media-file-spinner">
                ${this.loader.getLoaderHtml()}
            </div>
        `
    }

    getItemSpinnerHtml = () => {
        return `
            <div data-media-item-spinner class="media-file-item__spinner">
               ${this.loader.getLoaderHtml()}
            </div>
        `
    }

    clearList = () => {
        this.clear(this.$list);
    }

    spinnerDestroy = () => {
        const $spinner = this.$list.querySelector('[data-spinner]');
        this.delete($spinner);
    }

    itemSpinnerDestroy = () => {
        const $spinner = this.$list.querySelector('[data-media-item-spinner]');
        this.delete($spinner);
    }

}

class MediaFile {
    constructor($file) {
        this.$file = $file;
        this.init();
    }

    init = () => {
        if(!this.$file) return;
        this.type = this.$file.dataset.mediaFile;
        this.format = this.$file.dataset.format;
        this.inputName = this.$file.dataset.name;
        this.totalItem = +this.$file.dataset.total;
        this.$inputAdd = this.$file.querySelector('[data-media-add]');

        this.$mediaList = this.$file.querySelector('[data-media-list]');
        this.$messageError = this.$file.querySelector('[data-media-error]');
        this.extensionList = this.getExtensionList();
        this.currentCount = this.getMediaItemCount();

        this.render = new MediaFileRender(this.$mediaList, this.inputName);

        this.listeners();
    }

    clearInputAdd = () => {
        this.$inputAdd.value = '';
    }

    addMedia = () => {

        this.hideMessageError();
        const file = this.$inputAdd.files[0];

        if(this.checkExtension(file.name)) {

           this.createItem(file);

        } else {
            this.showMessageError('Не правильнвый формат');
        }

        this.clearInputAdd();

    }


    showMessageError = (message = 'Произошла ошибка') => {

        this.$messageError.classList.add('show');

        this.$messageError.innerHTML = message;

    }

    hideMessageError = () => {

        this.$messageError.classList.remove('show');

        this.$messageError.innerHTML = '';

    }

    createItem = (file) => {
        const dataFile = this.getDataFile(file);
        if(this.type === 'multi'){
            if(this.currentCount >= this.totalItem) {
                this.showMessageError(`Лимит загрузки ${this.totalItem}`);
                return;
            }

            this.render.photo(dataFile);

        } else {

            this.render.clearList();
            this.render.photo(dataFile);

        }

        const newInputFile = this.$mediaList.querySelector('.new');
        this.currentCount = this.getMediaItemCount();
        if(newInputFile){
            newInputFile.files = dataFile.file;
            newInputFile.classList.remove('new');
        }


    }

    getDataFile = (file) => {
        const dataTransfer = new DataTransfer();

        dataTransfer.items.add(
            new File([file.slice(0, file.size, file.type)], file.name)
        )

        return {
            file: dataTransfer.files,
            url: URL.createObjectURL(dataTransfer.files[0]),
            name: this.inputName
        }
    }


    getExtensionList = () => {
        return this.format.split(',');
    }

    filterFiles = (files) => {
        const dataTransfer = new DataTransfer();
        for(let i=0; i<files.length; i++) {
            const file = files[i];

            if(this.checkExtension(file.name)){
                dataTransfer.items.add(
                    new File([file.slice(0, file.size, file.type)], file.name)
                );
            }
        }
        return dataTransfer.files;
    }

    deleteMediaItem = ($target) => {
        if(!$target) return;

        const $item = $target.closest('[data-media-item]');

        if(!$item) return;

        this.render.delete($item);
        this.currentCount = this.getMediaItemCount();

    }

    checkExtension = (name) => {

        const extension = name.split('.').slice(-1)[0];

        return this.extensionList.includes(extension);


    }

    getMediaItemCount = () => {

        return this.$mediaList.querySelectorAll('[data-media-item]').length;

    }

    clickHandler = (e) => {
        if(e.target.closest('[data-media-delete]')){
            this.deleteMediaItem(e.target);
        }
    }


    listeners = () => {
        this.$mediaList.addEventListener('click', this.clickHandler);
        this.$inputAdd.addEventListener('input', this.addMedia);
    }

}

class UploadMediaFile {

    constructor($mediaFile, updatingEntityApi = false) {
        this.$mediaFile = $mediaFile;
        this.updatingEntityApi = updatingEntityApi;
        this.init();
    }

    init = () => {

        if (!this.$mediaFile) return;

        this.type = this.$mediaFile.dataset.uploadMediaFile;

        this.inputName = this.$mediaFile.dataset.name;

        this.totalItem = +this.$mediaFile.dataset.total;

        this.$inputAdd = this.$mediaFile.querySelector('[data-media-add]');

        this.$messageError = this.$mediaFile.querySelector('[data-media-error]');

        this.extensionList = ['jpg', 'jpeg', 'png', 'mp4'];

        this.service = new MediaFileService(this.updatingEntityApi);

        this.$mediaList = this.$mediaFile.querySelector('[data-media-list]');

        this.currentCount = this.getMediaItemCount();

        this.render = new UploadMediaFileRender(this.$mediaList, this.inputName);

        this.listeners();

    }

    createMediaItem = (media) => {

        if(media.type === 'video'){
            // this.render.video(item.link);
        } else {
            this.render.photo(media);
        }

    }

    addMedia = async () => {
        const files = this.$inputAdd.files;
        this.hideMessageError();

        // const valid = this.checkExtension(files[0]);

        if(this.type === 'multi'){

            this.render.spinner();

        } else {

            this.render.clearList();

            this.render.spinner();

        }

        const response = await this.service.fetchUrl(files[0]);

        if(response.success){

            this.render.spinnerDestroy();

            this.clearInputAdd();

            this.createMediaItem(response.data.media);

            if(this.updatingEntityApi){

                await this.updatingEntity();

            }

        }else{

             this.createMediaItem(response.data.media);

             this.showMessageError();

        }

        this.toggleAddMedia();

    }

    toggleAddMedia = () => {

        this.currentCount = this.getCountItem();

        if(this.currentCount >= this.totalItem){

            this.$inputAdd.disabled = true;

            this.$mediaFile.classList.add('disabled');

        } else {

            this.$inputAdd.disabled = false;

            this.$mediaFile.classList.remove('disabled');

        }
    }

    clearInputAdd = () => {

        this.$inputAdd.value = '';

    }

    showMessageError = (message = 'Произошла ошибка') => {

        this.$messageError.classList.add('show');

        this.$messageError.innerHTML = message;

    }

    hideMessageError = () => {

        this.$messageError.classList.remove('show');

        this.$messageError.innerHTML = '';

    }


    checkExtension = (name) => {

        const extension = name.split('.').slice(-1)[0];

        return this.extensionList.includes(extension);
    }

    getMediaItemCount = () => {

        return this.$mediaList.querySelectorAll('[data-media-item]').length;

    }

    deleteMedia = async ($target) => {

        this.hideMessageError();

        const $mediaItem = $target.closest('[data-media-item]');

        const link = $mediaItem.dataset.mediaItem;

        this.createMediaItemSpinner($mediaItem);

        const response = await this.service.destroy(link);

        if(response.success){

            this.render.delete($mediaItem);

            if(this.updatingEntityApi){

                await this.updatingEntity();

            }

        } else {

            this.deleteMediaItemSpinner($mediaItem);

        }

        this.toggleAddMedia();

    }

    createMediaItemSpinner = ($mediaItem) => {

        $mediaItem.classList.add('to-wait');

        this.render.mediaItemSpinner($mediaItem);

    }

    updatingEntity = async () => {

        const data = {

            name: this.inputName,

            link: []

        }

        const $inputs = this.$mediaList.querySelectorAll('[data-media-input]');

        if($inputs.length){

            $inputs.forEach(($item) => data.link.push($item.value));

        }

        const response = await this.service.updatingEntity(data);

        if(response.success){

        } else {
            this.showMessageError(response.error);
        }
    }

    deleteMediaItemSpinner = ($mediaItem) => {

        $mediaItem.classList.remove('to-wait');

        this.render.itemSpinnerDestroy($mediaItem);

    }

    getCountItem = () => {
        return this.$mediaList.querySelectorAll('[data-media-item]').length;
    }

    clickHandler = (e) => {
        if(e.target.closest('[data-media-delete]')){
            this.deleteMedia(e.target);
        }
    }

    listeners = () => {
        this.$inputAdd.addEventListener('input', this.addMedia);
        this.$mediaList.addEventListener('click', this.clickHandler);
    }
}

class MediaWindowRender extends Render {
    constructor($contentWrap) {
        super();
        this.$contentWrap = $contentWrap;
    }


    img = (url) => {
        this.render(this.$contentWrap, this.getImgHtml, url);
    }


    video = () => {

    }

    getImgHtml = (url) => {
        return `
            <img class="media-window__content" alt="" src="${url}"/>
        `
    }

    getVideoHtml = () => {

    }
}

class MediaWindow{
    constructor() {
        this.$window = document.querySelector('#mediaWindow');
        this.init();
    }

    init = () => {
        if (!this.$window) return;
        this.$windowInner = this.$window.querySelector('#mediaWindowInner')

        this.render = new MediaWindowRender(this.$windowInner)
        this.listeners();
    }

    close = () => {
        this.$window.classList.remove('show');
        this.render.clear(this.$windowInner);
    }

    open = ($target) => {
        if (!$target) return;
        const typeContent = $target.dataset.lookType;
        const url = $target.dataset.look;
        if(typeContent === 'img'){
            this.render.img(url);
        } else if(typeContent === 'video'){
            this.render.video(url);
        } else {
            this.render.img(url);
        }
        this.$window.classList.add('show');
    }

    clickHandler = (e) => {
            if(e.target.closest('[data-close]')){
                this.close();
            }
    }

    listeners = () => {
        this.$window.addEventListener('click', this.clickHandler);
    }

}

class MediaViewer {
    constructor() {
        this.init();
    }

    init = () => {
        this.window = new MediaWindow();
        this.listeners();
    }

    clickHandler = (e) => {
        if(e.target.closest('[data-look]')){
            this.window.open(e.target.closest('[data-look]'))
        }
    }


    listeners = () => {
        document.addEventListener('click', this.clickHandler);
    }
}

class BlockingInput {
    constructor($blockingInput) {
        this.$blockingInput = $blockingInput;
        this.init();
    }

    init = () => {
        if (!this.$blockingInput) return;
        this.idLinkInput = this.$blockingInput.dataset.blockingInput;
        if(!this.idLinkInput) return;
        this.$linkInput = document.querySelector(`#${this.idLinkInput}`);

        this.value =  this.$linkInput.value;

        this.listeners();

    }

    changeHandler = () => {
        if(this.$linkInput.disabled){
            this.unBlockedLinkInput();
        } else {
            this.blockedLinkInput();
        }
    }

    blockedLinkInput = () => {
        this.$linkInput.disabled = true;
        this.value = this.$linkInput.value;
        this.$linkInput.value = '';
    }
    unBlockedLinkInput = () => {
        this.$linkInput.disabled = false;

        this.$linkInput.value = this.value;
    }

    listeners = () => {
        this.$blockingInput.addEventListener('click', this.changeHandler);
    }

}

class DisplaySwitcherService extends Service{
    constructor(id, api) {
        super();
        this.id = id;
        this.api = api;
    }


    updateDisplay = async () => {
        const formData = new FormData();
            formData.append('id', this.id);
        return await this.post(this.api, {
            data: formData,
            headers: {
                "X-CSRF-Token": this._token
            }
        })
    }
}

class DisplaySwitcher {
   constructor($btn) {
       this.$btn = $btn;
       this.init()
   }

    init = () => {
       if(!this.$btn) return;
       this.id = this.$btn.dataset.displaySwitcher;
       this.api = this.$btn.dataset.api;
       this.service = new DisplaySwitcherService(this.id, this.api);
       this.loading = false;
       this.listeners();
    }

    switching = async () => {
        if(this.loading) return;
        this.loading = true;
        const result = await this.service.updateDisplay();
        if(result.success){
            this.toggle(result.data.isDisplay)
            this.loading = false;
        } else {

        }
    }

    toggle = (isDisplay) => {
        if(isDisplay){
            this.show();
        }else{
            this.hide();
        }
    }

    show = () => {
        this.$btn.classList.add('active');
    }

    hide = () => {
        this.$btn.classList.remove('active');
    }



    // clickHandler = () => {
    //    console.log('ksdhfhshdgf');
    // }

    listeners = () => {
        this.$btn.addEventListener('click', this.switching)
    };

}

class SortingSelect{
    constructor($sortingSelect) {
        this.$sortingSelect = $sortingSelect;
        this.init();

        this.listeners();

    }
    init = () => {
        if(!this.$sortingSelect) return;
        this.$btn = this.$sortingSelect.querySelector('[data-sorting-btn]');
        this.$list = this.$sortingSelect.querySelector('[data-sorting-list]');

    }
    toggle = () => {
        this.$list.classList.toggle('show');
    }

    listeners = () => {
        this.$btn.addEventListener('click', this.toggle)
    };

}

class Sidebar{
    constructor() {

        this.$sidebar = document.querySelector('#sidebar');
        this.init();
    }

    init = () => {
        if(!this.$sidebar) return;
        this.listeners();
    }

    open = () => {
        this.$sidebar.classList.add('open');
    }

    close = () => {
        this.$sidebar.classList.remove('open');
    }

    clickHandler = (e) => {
        if(e.target.closest('[data-sidebar-open]')){
            this.open();
        }

        if(e.target.closest('[data-sidebar-close]')){
            this.close();
        }
    }

    listeners = () => {
        document.addEventListener('click', this.clickHandler);
    };
}

const mediaFileContainer = new Container('[data-media-file]', MediaFile);

const sortingSelectContainer = new Container('[data-sorting]', SortingSelect);

const displaySwitcherContainer = new Container('[data-display-switcher]', DisplaySwitcher);

const blockingInputContainer = new Container('[data-blocking-input]', BlockingInput);

const manualListSorter = new ManualListSorter();

const mediaViewer = new MediaViewer();

const formEdit = new FormEdit();

const sidebar = new Sidebar();

//
// const list = document.querySelector('.sortable-list');
// let draggingItem = null;
//
// // 1. Захват элемента (клик или касание)
// list.addEventListener('pointerdown', (e) => {
//     const item = e.target.closest('.sortable-item');
//     if (!item) return;
//
//     draggingItem = item;
//     draggingItem.classList.add('dragging');
//
//     // Перенаправляем все события указателя на этот элемент (актуально для тача)
//     draggingItem.setPointerCapture(e.pointerId);
// });
//
// // 2. Движение пальца / мыши
// list.addEventListener('pointermove', (e) => {
//     if (!draggingItem) return;
//
//     // Находим элемент, над которым сейчас находится палец/курсор
//     const siblings = [...list.querySelectorAll('.sortable-item:not(.dragging)')];
//
//     // Ищем элемент, перед которым нужно вставить текущий
//     const nextSibling = siblings.find(sibling => {
//         const box = sibling.getBoundingClientRect();
//         // Сортировка сработает, когда центр перемещаемого объекта пересечет центр соседа
//         return e.clientY <= box.top + box.height / 2;
//     });
//
//     // Вставляем элемент на новое место
//     if (nextSibling) {
//         list.insertBefore(draggingItem, nextSibling);
//     } else {
//         list.appendChild(draggingItem);
//     }
// });
//
// // 3. Отпускание элемента
// list.addEventListener('pointerup', (e) => {
//     if (!draggingItem) return;
//
//     // Освобождаем захват указателя
//     draggingItem.releasePointerCapture(e.pointerId);
//
//     draggingItem.classList.remove('dragging');
//     draggingItem = null;
// });
//
// // На случай, если жест прервался (например, вылетел входящий звонок)
// list.addEventListener('pointercancel', (e) => {
//     if (!draggingItem) return;
//     draggingItem.classList.remove('dragging');
//     draggingItem = null;
// });
