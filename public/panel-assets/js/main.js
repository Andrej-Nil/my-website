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
        this.name = $uploadFile.dataset.name;
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
            <div data-upload-photo="${photo.id}" class="upload-file-photo">
                <input type="hidden" name="${this.name}" value="${photo.id}">
                <img class="upload-file-photo__img" src="${photo.url}" alt=""/>
                <button type="button" class="btn btn--yellow upload-file-photo__btn upload-file-photo__btn--top">Просмотр</button>
                <button data-delete-photo type="button"  class="btn btn--red upload-file-photo__btn upload-file-photo__btn--bottom">Удалить</button>
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
        this.type = this.$uploadFile.dataset.upload;
        this.$input = this.$uploadFile.querySelector('[data-upload-input]');
        this.api = this.$uploadFile.dataset.uploadApi;
        this.service = new UploadService(this.api);
        this.render = new UploadRender(this.$uploadFile);
        this.listeners();

    }

    uploadPhoto = async () => {
        this.disableInput();

        if(this.type !== 'multi'){
            this.render.clearPreview();
        }
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


    deletePhoto = ($target) => {
       this.$input.value = '';
       this.render.delete($target.closest('[data-upload-photo]'));
    }
    clickHandler = (e) => {

        if(e.target.closest('[data-delete-photo]')){
            console.log('  console.log')
            this.deletePhoto(e.target);
        }
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




// class Mover{
//     constructor() {
//         this.$wrapper = null;
//         this.$draggingEl = null;
//     }
//
//
//     startMove = ($el) => {
//         this.$draggingEl = $el;
//         this.setOpacity()
//     }
//
//     setOpacity = () => {
//         this.$draggingEl.style.opacity = 0.2;
//     }
//
//     endMove = () => {
//         this.resetOpacity();
//         this.resetDraggingEl();
//     }
//
//     out = (e) => {
//         e.preventDefault();
//         const currentElement = e.target.closest('[data-mover-item]');
//         if((currentElement !== this.$draggingEl) && e.target.closest('[data-mover-item]')){
//             const nextElement = this.getNextElement(e.clientY, currentElement);
//             this.$wrapper.insertBefore(this.$draggingEl, nextElement);
//         }
//     }
//
//     resetOpacity = () => {
//         this.$draggingEl.style.opacity = 1;
//     }
//
//     resetDraggingEl = () => {
//         this.$draggingEl = null;
//     }
//
//     getNextElement = (clientY, currentElement) => {
//         const currentElementCoord = currentElement.getBoundingClientRect();
//         const currentElementCenter = currentElementCoord.y + currentElementCoord.height / 2;
//         return (clientY < currentElementCenter) ? currentElement : currentElement.nextElementSibling;
//     }
// }


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

const uploadContainer = new Container('[data-upload]', Upload);

const manualListSorter = new ManualListSorter();












