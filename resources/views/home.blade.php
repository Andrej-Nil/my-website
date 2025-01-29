@extends('layouts.home')

@section('title', 'Home page')

@section('content')
   <div class="main">

       <header class="main-header">
           <div class="main-nav">
               <a href="{{route('home')}}" class="main-nav-item">Главное</a>
               <a href="{{route('about')}}" class="main-nav-item">Обо мне</a>
               <a href="{{route('post.index')}}" class="main-nav-item">Блок</a>
               <a href="{{route('contact')}}" class="main-nav-item">Контакты</a>
               @if(!(\Illuminate\Support\Facades\Auth::check()))
               <a href="{{route('login')}}" class="main-nav-item">Вход</a>
               @else
               <a class="main-nav-item" href="{{route('panel')}}">Панель</a>
               <span  class="main-nav-item">{{auth()->user()->name}}</span>
               @endif
           </div>



           <div class="main-contacts">
               <a href="tel:+7 898 909 90 09" class="main-contact">+7 898 909 90 09</a>
               <a href="mailto:dskjjdfh" class="main-contact">test@test</a>
           </div>
       </header>

       <div class="main-content">
           <div class="signature">
               <div class="signature__inner">
                   <h1 class="signature__name">Testtest Testte</h1>
                   <p class="signature__profession">Test-test Testtesttst</p>
                   <button data-main-form-btn type="button" class="signature__btn btn">Название кнопки</button>
               </div>
           </div>

           <div id="mainFrame" class="main-frame">

               <div id="mainFrameLight"  class="main-frame-light">
                   <span class="main-frame-light__blink"></span>
               </div>


               <div class="main-frame__content scroll">

                   <div id="mainFrameMessage" class="main-frame-message">
                       <i data-main-frame-message-close class="main-close main-form-message__close"></i>
                       <div data-message-inner class="main-frame-message__inner">

                       </div>
                   </div>

                   <form id="mainForm" action="{{route('callback')}}" method="post" class="main-form">
                           @csrf
                       <div class="main-form__inner">
                           <i data-main-form-close class="main-close main-form__close"></i>
                           <p class="main-form__title">Обратная связь</p>
                           <div class="main-form__body">
                                <div  class="control">
                                    <label for="mainFormName" class="control__label">Ваше имя</label>
                                    <input data-input type="text" id="mainFormName" name="name" class="control__input input" placeholder="Ваше имя">
                                    <div data-control-errors="name" class="control__errors"></div>
                                </div>

                               <div class="control">
                                   <label for="mainFormPhone" class="control__label">Номер телефона</label>
                                   <input data-input type="text" id="mainFormPhone" name="phone" class="control__input input" placeholder="Номер телефона">
                                   <div data-control-errors="phone" class="control__errors"></div>
                               </div>

                               <div class="control">
                                   <label for="mainFormMail" class="control__label">Почта</label>
                                   <input data-input type="text" id="mainFormMail" name="email" class="control__input input" placeholder="Почта">
                                   <div data-control-errors="email" class="control__errors">

                                   </div>
                               </div>

                               <div class="control">
                                   <label for="mainFormMessage" class="control__label">Почта</label>
                                   <textarea data-input id="mainFormMessage" name="comment" class="control__input input" rows="2" placeholder="Коментарий"></textarea>
                                   <div data-control-errors="comment" class="control__errors"></div>
{{--                                   <input type="text" id="mainFormMail" class="control__input input" placeholder="Почта">--}}
                               </div>
                           </div>
                           <div class="main-form__bottom">
                               <button type="submit" class="main-form__submit btn">Отправить</button>
                           </div>
                       </div>
                   </form>


                 <div data-main-frame-tab="info" class="main-frame-tab show">
                     Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi consequatur eveniet praesentium repudiandae! Amet architecto consectetur cupiditate, dolor doloribus enim eos id ipsum laborum modi nesciunt omnis ratione. Consectetur, consequatur delectus doloribus ea enim id in iure laboriosam neque nisi non numquam perspiciatis provident quasi quisquam ratione sapiente sint soluta unde vitae. A dignissimos dolorum excepturi fugit itaque labore libero minima perferendis totam voluptatem. Architecto dolores eaque eligendi laudantium maiores nobis, officia omnis optio quam quis quisquam, repellat sed veniam? Aspernatur assumenda culpa cupiditate dolorem eum ex explicabo illum inventore ipsum maiores, maxime neque officia quibusdam quidem rerum sit tempora tempore temporibus. Alias amet architecto assumenda blanditiis cum cumque dicta dolore dolores earum enim et facere fugiat id inventore ipsum itaque, iusto molestiae obcaecati pariatur possimus praesentium quae quidem sit, voluptatibus voluptatum? Accusamus animi consectetur dolorum incidunt nostrum quibusdam sunt. Harum, perferendis, totam. Asperiores eaque explicabo ipsa praesentium sint. Ducimus qui recusandae velit. Corporis deserunt dignissimos ea harum ipsam libero maiores nulla soluta? Dolorum eius esse fuga ipsam laborum laudantium magni natus nulla officia, officiis quos repellat sequi, sit sunt voluptatum. A aliquam blanditiis corporis enim excepturi illo minima necessitatibus non obcaecati, officiis optio quasi, sequi, suscipit ullam veritatis vero voluptate. A ad, animi dolorem earum impedit maiores nam omnis perspiciatis possimus voluptatibus? A animi aperiam atque beatae blanditiis consequatur consequuntur, dolore ducimus exercitationem fuga fugiat impedit incidunt laboriosam laudantium nihil perspiciatis praesentium quia quo recusandae rerum sequi similique tenetur veritatis vitae voluptas voluptatem voluptatum. Aliquam aspernatur aut beatae consequuntur cumque dolorem doloremque enim et expedita fugit, illo ipsa itaque magnam maxime, nemo neque nobis obcaecati officiis quaerat quas, qui quis quod quos recusandae sequi sint vero voluptatum. Aliquid aut corporis eaque excepturi in incidunt itaque, iure laboriosam modi mollitia, nesciunt obcaecati praesentium quisquam repudiandae veritatis? Cum, earum excepturi laboriosam maiores nobis qui quidem quo rerum sint soluta! Ab autem blanditiis culpa dicta, dolore dolores eligendi enim error esse et laudantium minima modi nihil quae quis repellat, sapiente soluta, vero? Amet blanditiis dolore ducimus excepturi nulla officia placeat recusandae reiciendis voluptate. Ad aperiam architecto at atque autem beatae commodi dignissimos eaque eligendi enim eos error exercitationem, fuga hic, id magni molestiae neque nesciunt non nulla obcaecati officiis omnis pariatur praesentium quae quas quasi quibusdam quidem quis reiciendis repellat repellendus saepe sapiente sed sequi tenetur vitae! Ab commodi, dolorum eius nihil nostrum recusandae rem sed tempora. Consequuntur ducimus optio praesentium suscipit. Ad est laudantium necessitatibus optio provident repellendus sit veniam? Deleniti, itaque laboriosam magni maxime molestiae nam non pariatur perspiciatis quasi sequi! Ad animi asperiores assumenda aut corporis delectus deserunt dolore dolorem ea earum eius error esse est, eveniet expedita fugit id illo impedit, in incidunt, iure minima nemo nesciunt numquam obcaecati odio officia placeat praesentium quae quod recusandae repellendus sapiente sequi unde voluptas voluptate voluptatibus! Ad obcaecati, repellat. Ab architecto aspernatur at consectetur culpa cupiditate deleniti distinctio dolorum earum eum, eveniet expedita fuga impedit incidunt iste iure laborum libero nemo nisi nulla, numquam omnis perspiciatis possimus quam quasi quia quod ratione recusandae saepe sapiente, sequi soluta tempora temporibus unde voluptate voluptatem voluptatibus! Et reiciendis sapiente tempora voluptatum. Aliquid, animi at corporis cumque debitis doloremque eligendi fugiat fugit ipsa, molestias necessitatibus nemo neque nihil nisi nulla officia officiis omnis quae quaerat quo reprehenderit, saepe sint sit suscipit ut voluptas voluptatum. Itaque iusto nemo perspiciatis repudiandae sint, sit! At beatae consequatur cum neque quam quisquam repellat! Ab consectetur corporis culpa distinctio doloribus ducimus eaque earum error, est exercitationem expedita facilis fugit impedit in incidunt inventore iusto magni minima minus molestiae necessitatibus neque nesciunt nostrum porro praesentium qui quia quis quod rem sapiente sed soluta ullam voluptatum. Ab adipisci alias consequuntur corporis, debitis dolores doloribus earum explicabo harum id, illo incidunt inventore iusto libero magni minima, minus molestias nemo nesciunt nihil nisi nobis officiis optio perspiciatis ratione reiciendis rem reprehenderit repudiandae sapiente similique ut vel vitae voluptates? Adipisci itaque, labore magnam nisi placeat quo repellat sapiente soluta sunt suscipit veritatis vero. Dicta illum nulla officia optio quo ullam. Ab accusantium aperiam asperiores aspernatur consectetur consequatur, dignissimos distinctio dolore dolorem doloremque eligendi enim error ex, facilis fugit impedit incidunt ipsam ipsum itaque iure labore laboriosam nobis quas quibusdam quisquam, quo quod rem sapiente sint soluta suscipit ullam unde veritatis vitae voluptas voluptate voluptates. Adipisci distinctio eligendi est facere modi nobis officia omnis quidem sit voluptatum. Accusantium excepturi exercitationem harum laudantium magnam, officia quisquam repellat reprehenderit rerum vero? Beatae blanditiis, ipsam laborum maxime temporibus unde veniam. Aliquam amet aperiam atque beatae dicta dolor eaque earum est eveniet explicabo fugiat fugit harum illum in, ipsum itaque laudantium magni maxime molestias natus necessitatibus nesciunt nisi nostrum perferendis praesentium quae quam quibusdam quis quisquam ratione reprehenderit rerum similique totam vel velit vero voluptates? Ad, aut eaque harum iure neque repudiandae saepe sunt? Beatae cum dicta iste modi molestias porro ratione vel! Ad animi dicta dolore eligendi enim error fugiat illum impedit ipsa iste laborum, maxime minus molestias, nam nemo obcaecati optio recusandae repellendus rerum vel. Culpa eius, et excepturi exercitationem itaque laudantium quod repellat sed temporibus vero? Alias aliquam aut beatae, commodi consequuntur, eius esse expedita, neque pariatur quasi quos rem saepe similique. Accusantium ad animi, assumenda aut commodi, cupiditate earum explicabo mollitia nobis nostrum officia provident quia quibusdam quisquam, rerum ut voluptatibus? Doloribus facere illum inventore repudiandae. Amet aspernatur autem cumque dignissimos dolor doloremque dolores earum eius ex expedita, fugiat hic incidunt ipsa iure nam nesciunt nihil pariatur perferendis perspiciatis provident quae quia quibusdam quis quisquam rerum suscipit veritatis voluptas. Aliquid aspernatur assumenda atque, autem blanditiis consequatur corporis culpa cum deleniti ducimus, eaque ex fuga harum ipsam itaque iure magnam molestiae neque nesciunt nostrum pariatur possimus ratione rerum sapiente sint vel voluptates. Aliquam dolore eligendi est ex ipsum magni minima molestiae nihil omnis possimus praesentium, quaerat qui quis repellat rerum tenetur voluptate! Ab accusamus, aliquam commodi dolore doloremque doloribus facilis fugiat inventore labore nesciunt nobis non officia perspiciatis porro repellat repellendus reprehenderit, sunt tempore unde, vel. Aliquam debitis delectus dignissimos doloribus illo iste nostrum quisquam suscipit ullam.
                 </div>
                 <div data-main-frame-tab="works" class="main-frame-tab"></div>
                 <div data-main-frame-tab="contact" class="main-frame-tab"></div>

{{--                   <div class="main-frame-nav">--}}
{{--                       <div class="main-frame-nav__list">--}}
{{--                       <div data-main-frame-tab-link="info" class="main-frame-link">--}}

{{--                           <span class="main-frame-link__icon"></span>--}}

{{--                           <p class="main-frame-link__title">Кратко<br/> обо мне</p>--}}

{{--                       </div>--}}

{{--                       <div data-main-frame-tab-link="works" class="main-frame-link">--}}
{{--                           <span class="main-frame-link__icon"></span>--}}

{{--                           <p class="main-frame-link__title">Пример<br/> работ</p>--}}
{{--                       </div>--}}

{{--                       <div data-main-frame-tab-link="contact" class="main-frame-link">--}}
{{--                           <span class="main-frame-link__icon"></span>--}}

{{--                           <p class="main-frame-link__title">Контакты</p>--}}
{{--                       </div>--}}
{{--                       </div>--}}
{{--                   </div>--}}

               </div>
           </div>

{{--           <div class="main-content__body">--}}



{{--           </div>--}}


       </div>


       <div class="main-footer">
           dnfbdhjfdfh

{{--           <div class="signature">--}}
{{--               <h1 class="signature-name">Кучеров Андрей</h1>--}}
{{--               <p class="signature-profession">front-end разработчик</p>--}}
{{--           </div>--}}
       </div>






   </div>
@endsection
