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

        this.$mediaFileList = this.$form.querySelectorAll('[data-media-file]');

        this.mediaFilesContainer = [];

        this.initMediaFiles();

    }

    initMediaFiles = () => {
        this.$mediaFileList.forEach(($item) => {
            const exemplar = new MediaFile($item, this.api);
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


    dragstartHandler = (e) => {

        const $item = e.target.closest('[data-sortable-item]');
        const $wrapItem = e.target.closest('[data-sortable-list]');
        if($item && $wrapItem === this.$sortableBlock){
            this.startMove(e.target.closest('[data-sortable-item]'));
        }
    }


    startMove = ($el) => {
        this.$draggingEl = $el;
        this.setOpacity()
    }


    setOpacity = () => {
        this.$draggingEl.style.opacity = 0.2;
    }

    dragendHandler = (e) => {
        const $item = e.target.closest('[data-sortable-item]');
        const $wrapItem = e.target.closest('[data-sortable-list]');
        if($item && $wrapItem === this.$sortableBlock){
            this.endMove();
            this.updateSortHandler();
        }
    }

    endMove = () => {
        this.resetOpacity();
        this.resetDraggingEl();
    }


    resetOpacity = () => {
        this.$draggingEl.style.opacity = 1;
    }

    resetDraggingEl = () => {
        this.$draggingEl = null;
    }

    dragoverHandler = (e) => {
        this.out(e);
    }

    out = (e) => {
        e.preventDefault();
        const currentElement = e.target.closest('[data-sortable-item]');
        if((currentElement !== this.$draggingEl) && e.target.closest('[data-sortable-item]')){
            const nextElement = this.getNextElement(e.clientY, currentElement);
            this.$sortableBlock.insertBefore(this.$draggingEl, nextElement);
        }
    }

    getNextElement = (clientY, currentElement) => {
        const currentElementCoord = currentElement.getBoundingClientRect();
        const currentElementCenter = currentElementCoord.y + currentElementCoord.height / 2;
        return (clientY < currentElementCenter) ? currentElement : currentElement.nextElementSibling;
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


    clickHandler = (e) => {
        if(e.target.closest('[data-loader-close]')){
            this.hideLoader()
        }
    }
    listeners = () => {
        this.$sortableBlock.addEventListener('click', this.clickHandler)
        this.$sortableBlock.addEventListener('dragstart', this.dragstartHandler);
        this.$sortableBlock.addEventListener('dragend', this.dragendHandler);
        this.$sortableBlock.addEventListener('dragover', this.dragoverHandler);
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
    constructor($mediaFile, updatingEntityApi = false) {
        this.$mediaFile = $mediaFile;
        this.updatingEntityApi = updatingEntityApi;
        this.init();
    }

    init = () => {
        if (!this.$mediaFile) return;
        this.type = this.$mediaFile.dataset.mediaFile;
        this.inputName = this.$mediaFile.dataset.name;
        this.totalItem = +this.$mediaFile.dataset.total;
        this.$inputAdd = this.$mediaFile.querySelector('[data-media-add]');
        this.$messageError = this.$mediaFile.querySelector('[data-media-error]');

        this.extensionList = ['jpg', 'jpeg', 'png', 'mp4'];

        this.service = new MediaFileService(this.updatingEntityApi);

        this.$mediaList = this.$mediaFile.querySelector('[data-media-list]');

        this.currentCount = this.getMediaItemCount();

        this.render = new MediaFileRender(this.$mediaList, this.inputName);

        this.listeners();
    }

    createMediaItem = (media) => {

        if(media.type === 'video'){
            // this.render.video(item.link);
        } else {
            this.render.photo(media);
        }
        // if(this.countItem >= this.count) return;
        //
        // const extension = files[0].name.split('.').slice(-1)[0];
        // const url = URL.createObjectURL(files[0]);
        // if(extension === 'jpg' || extension === 'jpeg' || extension === 'png' ){
        //     // if(this.countPhoto === this.count) return;
        //     this.render.photo(url);
        //     this.countItem++;
        //     // this.countPhoto = this.countPhoto + 1;
        // } else if(extension === 'mp4'){
        //     // if(this.countVideo === this.count) return;
        //     this.render.mediaItem('video', files[0]);
        //     this.countVideo = this.countVideo + 1;
        // } else {
        //     return false;
        // }
        //
        // const newInputFile = this.$mediaList.querySelector('.new');
        // newInputFile.files = files;
        // newInputFile.classList.remove('new');
    }

    addMedia = async () => {
        const files = this.$inputAdd.files;
        this.hideMessageError();

        // const valide = this.checkExtension(files[0]);
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

    // filterFiles = (files) => {
    //     const dataTransfer = new DataTransfer();
    //     for(let i=0; i<files.length; i++) {
    //         const file = files[i];
    //
    //         if(this.checkExtension(file.name)){
    //             dataTransfer.items.add(
    //                 new File([file.slice(0, file.size, file.type)], file.name)
    //             );
    //         }
    //     }
    //     return dataTransfer.files;
    // }



    checkExtension = (name) => {
        const extension = name.split('.').slice(-1)[0];

        return this.extensionList.includes(extension);

            // if(extension === 'jpg' || extension === 'jpeg' || extension === 'png' ){
            //     // if(this.countPhoto === this.count) return;
            //     this.countItem++;
            //     // this.countPhoto = this.countPhoto + 1;
            // } else if(extension === 'mp4'){
            //     // if(this.countVideo === this.count) return;
            //     this.render.mediaItem('video', files[0]);
            //     this.countVideo = this.countVideo + 1;
            // } else {
            //     return false;
            // }
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
                await this.updatingEntity($mediaItem, this.updatingEntityApi);
            }

        } else {

            this.deleteMediaItemSpinner($mediaItem);

        }

        const $file = $mediaItem.querySelector('[data-media-file]')

        // if($file.name === 'videos[]'){
        //     this.countVideo = this.countVideo - 1;
        // }if($file.name === 'photos[]'){
        //     this.countPhoto = this.countPhoto - 1;
        // }
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

        const $links = this.$mediaList.querySelectorAll('[data-media-input]');

        if($links.length){
            const $list = this.$mediaList.querySelectorAll('[data-media-input]');
            $list.forEach(($item) => data.link.push($item.value));
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

// const mediaFileContainer = new Container('[data-media-file]', MediaFile, );

const manualListSorter = new ManualListSorter();

const mediaViewer = new MediaViewer();

const formEdit = new FormEdit();

