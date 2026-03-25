
<div class="list__pagination">
    <div class="pagination">
        @foreach($paginate['links'] as $link )
            @if($link['label'] === '&laquo; Previous')
                @if($link['url'])
                <a href="{{$link['url']}}" class="pagination-item"> < </a>
                @endif
            @elseif($link['label'] === 'Next &raquo;')
                @if($link['url'])
                <a href="{{$link['url']}}" class="pagination-item"> > </a>
                @endif
            @else
                <a href="{{$link['url']}}" class="pagination-item{{$link['active'] ? ' active' : ''}} ">{{$link['label']}}</a>
            @endif
        @endforeach
    </div>
</div>
