@extends('layouts.app')

@section('content')
        <div class='row'>

            <h3 class="h3__title">Welcome to the Yugen Farm Web Presence</h3>
            <p class="p__content--lead">
                As of April, 2020 we are still located in Oklahoma City, Ok trying to outlast the Covid-19 Pandemic.
                The original goal was the move to New Mexico to start our farming journey, but life and pandemics have
                a way of changing things.  As of today, we are under contract to sell our house.  We are also under
                contract to purchase a farm east of Oklahoma City.  While it is not New Mexico, it is land and we will
                be able to fulfill our dream of sustainable farming.  If all goes as planned (finally), we should be
                on our farm by the end of May, 2020.
            </p>
            <p class="p__content--lead">
                There’s me, Holly, and my husband Michael at the (future) farm, along with two dogs, Abigail and Onder,
                and our half feral cat, Castor.  We can be reached at <a class="lead-link" href="#">yugenfarm@gmail.com</a>.
                Michael built this site to document our journey, for ourselves and for others, as we move towards
                a self-sufficient way of life using sustainable principles. We hope to show that
                once established, the farm is enjoyable, cheap and kind to the planet.
            </p>
        </div>
        <div class='row bottom-margin-rem6 dark-bottom-border'>
            <div class='col-1-of-4'>

                <div class='image-card'>
                    <img src='{{url("images/holly1.jpg")}}' alt='' class='img-fluid'>
                    <div class='image-card__overlay'>
                        <div class='image-card__detail'>
                            <h4 class="h4__title">Holly</h4>
                            <span>Head Farmer and Lead Writer</span>
                        </div>
                    </div>
                </div>

            </div><!--/col-->
            <div class='col-1-of-4'>

                <div class='image-card'>
                    <img src='{{url("images/michael1.jpg")}}' alt='' class='img-fluid'>
                    <div class='image-card__overlay'>
                        <div class='image-card__detail'>
                            <h4>Michael</h4>
                            <span>Web Developer and Bee Keeper</span>
                        </div>
                    </div>
                </div>

            </div><!--/col-->
            <div class='col-1-of-4'>

                <div class='image-card'>
                    <img src='{{url("images/abbiandonder2.jpg")}}' alt='' class='img-fluid'>
                    <div class='image-card__overlay'>
                        <div class='image-card__detail'>
                            <h4>Abigail & Onder</h4>
                            <span>Security Detail</span>
                        </div>
                    </div>
                </div>

            </div><!--/col-->
            <div class='col-1-of-4'>

                <div class='image-card'>
                    <img src='{{url("images/castor.jpg")}}' alt='' class='img-fluid'>
                    <div class='image-card__overlay'>
                        <div class='image-card__detail'>
                            <h4>Castor</h4>
                            <span>The Bad Kitty</span>
                        </div>
                    </div>
                </div>

            </div><!--/col-->
        </div>
        <div class='row'>
            <div class="text-center bottom-margin-rem4">
                <img src="{{url("images/yugen.gif")}}" alt="Yugen">
            </div>
            <p class="p__content--lead text-center">
                <a class="lead-link" target="_blank" href="http://en.wikipedia.org/wiki/Japanese_aesthetics">
                    <strong>Wikipedia article on Japanese Aesthetics</strong>
                </a>
            </p>
            <p class="p__content--lead text-center">
                Yūgen (幽玄) is an important concept in traditional Japanese aesthetics. The exact translation of the word depends on the context. In the Chinese philosophical texts the term was taken from, yūgen meant “dim”, “deep” or “mysterious”. In the criticism of Japanese waka poetry, it was used to describe the subtle profundity of things that are only vaguely suggested by the poems.

                Yūgen is said to mean “a profound, mysterious sense of the beauty of the universe… and the sad beauty of human suffering”.

                Yūgen suggests that beyond what can be said but is not an allusion to another world. It is about this world, this experience.
            </p>
            <p class="p__content--lead text-center dark-bottom-border">
                (Ortolani, 325). Ortolani, Benito. The Japanese Theatre. Princeton University Press: Princeton, 1995
            </p>
        </div>

@endsection
