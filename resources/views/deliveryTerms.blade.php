@extends('layout')

@section('main')
    {{-- delivery terms --}}
    <div class="delivery-terms">
        <div class="container">
            <div class="title-page">
                <h1>Условия доставки
                </h1>
                <p>Вся информация об условиях доставки</p>
            </div>
            <div class="delivery-terms_content">
                <ul>
                    <li class="list-item">
                        <div class="list-head">
                            <div class="numbering">1</div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex facere provident fugiat natus
                                aliquam ab similique ipsum autem quam dolorem.</p>
                        </div>
                    </li>
                    <li class="list-item">
                        <div class="list-head">
                            <div class="numbering">2</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda debitis doloribus at
                                tempora quidem quod hic maiores impedit enim explicabo.
                            </p>
                        </div>
                        <ul class="child-list">
                            <li>
                                <div class="numbering">1.5</div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, ex? Lorem ipsum
                                    dolor sit amet, consectetur adipisicing elit. Assumenda debitis doloribus at
                                    tempora quidem quod hic maiores impedit enim explicabo.
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda debitis
                                    doloribus at
                                    tempora quidem quod hic maiores impedit enim explicabo.</p>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    {{-- delivery terms-end --}}
@endsection
