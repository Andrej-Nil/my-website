@extends('panel.layouts.app')

@section('title', 'Panel')

@section('content')
{{--    <ul class="sortable-list">--}}
{{--        <li class="sortable-item" draggable="false">Элемент 1 🚀</li>--}}
{{--        <li class="sortable-item" draggable="false">Элемент 2 🥑</li>--}}
{{--        <li class="sortable-item" draggable="false">Элемент 3 ⚡</li>--}}
{{--        <li class="sortable-item" draggable="false">Элемент 4 👾</li>--}}
{{--    </ul>--}}
@endsection
{{--getItemList = () => {--}}
{{--return [...this.$sortableBlock.querySelectorAll('[data-sortable-item]:not(.dragging)')];--}}
{{--}--}}

{{--getNextItem = (e) => {--}}
{{--const $itemList = this.getItemList();--}}
{{--return $itemList.find($item => {--}}
{{--const box = $item.getBoundingClientRect();--}}
{{--// Сортировка сработает, когда центр перемещаемого объекта пересечет центр соседа--}}
{{--return e.clientY <= box.top + box.height / 2;--}}
{{--});--}}
{{--}--}}

{{--pastDraggingItem = ($nextItem) => {--}}
{{--if (!$nextItem) {--}}
{{--this.$sortableBlock.insertBefore(this.$draggingEl, $nextItem);--}}
{{--} else {--}}
{{--this.$sortableBlock.appendChild(this.$draggingEl);--}}
{{--}--}}

{{--}--}}

{{--changeDraggingItemPosition = (e) => {--}}
{{--const $nextItem = this.getNextItem(e);--}}
{{--this.pastDraggingItem($nextItem);--}}
{{--}--}}
{{--move = (e) => {--}}
{{--if (!this.$draggingEl) return;--}}
{{--this.changeDraggingItemPosition(e);--}}
{{--{{---}}
{{--    pointermoveHandler = (e) => {--}}
{{--        if(e.target.closest('[data-sortable-item]')){--}}
{{--            this.move(e);--}}
{{--        }--}}
{{--    }--}}

{{---}--}}
