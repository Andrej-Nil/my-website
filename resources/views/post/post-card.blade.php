<div class="post-card">
    @if($post['photo']['url'])
        <img src="{{$post['photo']['url']}}" alt="" class="post-card__img">
    @endif
        <div class="post-card__content">
        <p class="post-card__title">{{$post['title']}}</p>
        <p class="post-card__text">{{$post['text']}}</p>
        <a href="{{route('post.show', $post['id'])}}" class="post-card__link">Перейти >></a>
    </div>
</div>
