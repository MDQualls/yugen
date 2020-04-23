@extends('layouts.app')

@section('content')
        <div class='row'>

            <h3>Welcome to the Yugen Farm Blog</h3>
            <p>
                As of December 2019, we are located in beautiful Oklahoma City, Ok while we wait to move to New Mexico.
                There’s me, Holly, and my husband Michael at the (future) farm, along with two dogs, Abigail and Onder, and our half feral cat, Castor.
                We can be reached at <a href="#">yugenfarm@gmail.com</a>.
                Michael built this site to document our journey, for ourselves and for others, as we move towards an off-grid, self-sufficient way of life using permaculture principles. We hope to show that once established, the farm is enjoyable, cheap and kind to the planet.
            </p>

        </div>
        <div class='row'>
            <div class='col-1-of-4'>

                <div class='team-card'>
                    <img src='{{url("images/holly1.jpg")}}' alt='' class='img-fluid'>
                    <div class='team-overlay align-items-center'>
                        <div class='team-detail'>
                            <h4>Holly</h4>
                            <span>Head Farmer and Lead Writer</span>
                        </div>
                    </div>
                </div>

            </div><!--/col-->
            <div class='col-1-of-4'>

                <div class='team-card'>
                    <img src='{{url("images/michael1.jpg")}}' alt='' class='img-fluid'>
                    <div class='team-overlay align-items-center'>
                        <div class='team-detail'>
                            <h4>Michael</h4>
                            <span>Web Developer and Bee Keeper</span>
                        </div>
                    </div>
                </div>

            </div><!--/col-->
            <div class='col-1-of-4'>

                <div class='team-card'>
                    <img src='{{url("images/abbiandonder2.jpg")}}' alt='' class='img-fluid'>
                    <div class='team-overlay align-items-center'>
                        <div class='team-detail'>
                            <h4>Abigail & Onder</h4>
                            <span>Security Detail</span>
                        </div>
                    </div>
                </div>

            </div><!--/col-->
            <div class='col-1-of-4'>

                <div class='team-card'>
                    <img src='{{url("images/castor.jpg")}}' alt='' class='img-fluid'>
                    <div class='team-overlay align-items-center'>
                        <div class='team-detail'>
                            <h4>Castor</h4>
                            <span>The Bad Kitty</span>
                        </div>
                    </div>
                </div>

            </div><!--/col-->
        </div>
        <div class='row'>
            <div>
                <img src="{{url("images/yugen.gif")}}" alt="Yugen">
            </div>
            <p>
                <a target="_blank" href="http://en.wikipedia.org/wiki/Japanese_aesthetics">
                    <strong>Wikipedia article on Japanese Aesthetics</strong>
                </a>
            </p>
            <p>
                Yūgen (幽玄) is an important concept in traditional Japanese aesthetics. The exact translation of the word depends on the context. In the Chinese philosophical texts the term was taken from, yūgen meant “dim”, “deep” or “mysterious”. In the criticism of Japanese waka poetry, it was used to describe the subtle profundity of things that are only vaguely suggested by the poems.

                Yūgen is said to mean “a profound, mysterious sense of the beauty of the universe… and the sad beauty of human suffering”.

                Yūgen suggests that beyond what can be said but is not an allusion to another world. It is about this world, this experience.
            </p>
            <p>
                (Ortolani, 325). Ortolani, Benito. The Japanese Theatre. Princeton University Press: Princeton, 1995
            </p>
        </div>

@endsection
