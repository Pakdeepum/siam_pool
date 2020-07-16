@extends('layouts.app-element')
@section('content')
    <div class="container" style="margin-bottom: 50px; margin-top: 50px;">
        <div class="row">
            <div class="col-sm-12">
                <h3>{{ trans('faq.faq') }}</h3>
                <div class="tab-contentasd">
                    <div >
                        <div class="accordion">
                            <div class="card borderbtmgrey">
                                <div class="card-header" id="infraOne">
                                    <a class="faqtxttaga" href="#collapseOne" data-toggle="collapse"
                                       data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <p class="mb-0">
                                            {{ trans('faq.faq1') }}
                                        </p>
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse" aria-labelledby="infraOne"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        {{ trans('faq.aws1') }}
                                    </div>
                                </div>
                            </div><!-- close card-->
                            <div class="card borderbtmgrey">
                                <div class="card-header" id="infraTwo">
                                    <a  class="faqtxttaga" href="#collapseTwo" class="collapsed" data-toggle="collapse"
                                       data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <p class="mb-0"> {{ trans('faq.faq2') }}</p>
                                    </a>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="infraTwo"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        {{ trans('faq.aws2') }}
                                    </div>
                                </div>
                            </div><!-- card-->
                            <div class="card borderbtmgrey">
                                <div class="card-header" id="infraThree">
                                    <a  class="faqtxttaga" href="#collapseThree" class="collapsed" data-toggle="collapse"
                                       data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <p class="mb-0">{{ trans('faq.faq3') }}</p>
                                    </a>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="infraThree"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        {{ trans('faq.aws3') }}
                                    </div>
                                </div>
                            </div><!-- card-->
                            <div class="card borderbtmgrey">
                                <div class="card-header" id="infraFoure">
                                    <a  class="faqtxttaga"  href="#collapseFour" class="collapsed" data-toggle="collapse"
                                       data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                        <p class="mb-0">
                                            {{ trans('faq.faq4') }}
                                        </p>
                                    </a>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="infraFoure"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                            {{ trans('faq.aws4') }}
                                        
                                    </div>
                                </div><!-- card-->
                            </div><!-- accordion-->
                            <div class="card borderbtmgrey">
                                <div class="card-header" id="infraFive">
                                    <a  class="faqtxttaga"  href="#collapseFive" class="collapsed" data-toggle="collapse"
                                        data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        <p class="mb-0">
                                                {{ trans('faq.faq5') }}
                                        </p>
                                    </a>
                                </div>
                                <div id="collapseFive" class="collapse" aria-labelledby="infraFive"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                            {{ trans('faq.aws5') }}
                                    </div>
                                </div><!-- card-->
                            </div><!-- accordion-->
                            <div class="card borderbtmgrey">
                                <div class="card-header" id="infraSix">
                                    <a  class="faqtxttaga"  href="#collapseSix" class="collapsed" data-toggle="collapse"
                                        data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        <p class="mb-0">
                                                {{ trans('faq.faq6') }}
                                        </p>
                                    </a>
                                </div>
                                <div id="collapseSix" class="collapse" aria-labelledby="infraSix"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                            {{ trans('faq.aws6') }}
                                        
                                    </div>
                                </div><!-- card-->
                            </div><!-- accordion-->
                            <div class="card borderbtmgrey">
                                <div class="card-header" id="infraSeven">
                                    <a  class="faqtxttaga"  href="#collapseSeven" class="collapsed" data-toggle="collapse"
                                        data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                        <p class="mb-0">
                                                {{ trans('faq.faq7') }}
                                        </p>
                                    </a>
                                </div>
                                <div id="collapseSeven" class="collapse" aria-labelledby="infraSeven"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                            {{ trans('faq.aws7') }}
                                    </div>
                                </div><!-- card-->
                            </div><!-- accordion-->
                            <div class="card borderbtmgrey">
                                <div class="card-header" id="infraEigth">
                                    <a  class="faqtxttaga"  href="#collapseEigth" class="collapsed" data-toggle="collapse"
                                        data-target="#collapseEigth" aria-expanded="false" aria-controls="collapseEigth">
                                        <p class="mb-0">
                                                {{ trans('faq.faq8') }}
                                        </p>
                                    </a>
                                </div>
                                <div id="collapseEigth" class="collapse" aria-labelledby="infraEigth"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                            {{ trans('faq.aws8') }}
                                    </div>
                                </div><!-- card-->
                            </div><!-- accordion-->
                            <div class="card borderbtmgrey">
                                <div class="card-header" id="infraNine">
                                    <a  class="faqtxttaga"  href="#collapseNine" class="collapsed" data-toggle="collapse"
                                        data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                        <p class="mb-0">
                                                {{ trans('faq.faq9') }}
                                        </p>
                                    </a>
                                </div>
                                <div id="collapseNine" class="collapse" aria-labelledby="infraNine"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                            {{ trans('faq.aws9') }}
                                    </div>
                                </div><!-- card-->
                            </div><!-- accordion-->
                            <div class="card borderbtmgrey">
                                <div class="card-header" id="infraTen">
                                    <a  class="faqtxttaga"  href="#collapseTen" class="collapsed" data-toggle="collapse"
                                        data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                        <p class="mb-0">
                                                {{ trans('faq.faq10') }}
                                        </p>
                                    </a>
                                </div>
                                <div id="collapseTen" class="collapse" aria-labelledby="infraTen"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                            {{ trans('faq.aws10') }}
                                    </div>
                                </div><!-- card-->
                            </div><!-- accordion-->
                            <div class="card borderbtmgrey">
                                <div class="card-header" id="infraEleven">
                                    <a  class="faqtxttaga"  href="#collapseThree" class="collapsed" data-toggle="collapse"
                                        data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                        <p class="mb-0">
                                                {{ trans('faq.faq11') }}
                                        </p>
                                    </a>
                                </div>
                                <div id="collapseEleven" class="collapse" aria-labelledby="infraEleven"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                            {{ trans('faq.aws11') }}
                                    </div>
                                </div><!-- card-->
                            </div><!-- accordion-->
                            <div class="card borderbtmgrey">
                                <div class="card-header" id="infraTwelve">
                                    <a  class="faqtxttaga"  href="#collapseTwelve" class="collapsed" data-toggle="collapse"
                                        data-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                                        <p class="mb-0">
                                                {{ trans('faq.faq12') }}
                                        </p>
                                    </a>
                                </div>
                                <div id="collapseTwelve" class="collapse" aria-labelledby="infraTwelve"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                            {{ trans('faq.aws12') }}
                                    </div>
                                </div><!-- card-->
                            </div><!-- accordion-->
                            <div class="card borderbtmgrey">
                                <div class="card-header" id="infraThirteen">
                                    <a  class="faqtxttaga"  href="#collapseThree" class="collapsed" data-toggle="collapse"
                                        data-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
                                        <p class="mb-0">
                                                {{ trans('faq.faq13') }}
                                        </p>
                                    </a>
                                </div>
                                <div id="collapseThirteen" class="collapse" aria-labelledby="infraThirteen"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                            {{ trans('faq.aws13') }}
                                        <br>
                                        <b>{{ trans('faq.aws13_1') }}</b>
                                        <ul><br>
                                            <li>{{ trans('faq.aws13_2') }}</li>
                                            <li>{{ trans('faq.aws13_3') }}</li>
                                            <li>{{ trans('faq.aws13_4') }}</li>
                                            <li>{{ trans('faq.aws13_5') }}</li>
                                            <li>{{ trans('faq.aws13_6') }}</li>
                                        </ul>
                                    </div>
                                </div><!-- card-->
                            </div><!-- accordion-->
                            <div class="card borderbtmgrey">
                                <div class="card-header" id="infraFourteen">
                                    <a  class="faqtxttaga"  href="#collapseFourteen" class="collapsed" data-toggle="collapse"
                                        data-target="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen">
                                        <p class="mb-0">
                                                {{ trans('faq.faq14') }}
                                        </p>
                                    </a>
                                </div>
                                <div id="collapseFourteen" class="collapse" aria-labelledby="infraFourteen"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                            {{ trans('faq.aws14') }}
                                    </div>
                                </div><!-- card-->
                            </div><!-- accordion-->
                            <div class="card borderbtmgrey">
                                <div class="card-header" id="infraFifteen">
                                    <a  class="faqtxttaga"  href="#collapseFifteen" class="collapsed" data-toggle="collapse"
                                        data-target="#collapseFifteen" aria-expanded="false" aria-controls="collapseFifteen">
                                        <p class="mb-0">
                                                {{ trans('faq.faq15') }}
                                        </p>
                                    </a>
                                </div>
                                <div id="collapseFifteen" class="collapse" aria-labelledby="infraFifteen"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                            {{ trans('faq.aws15') }}
                                    </div>
                                </div><!-- card-->
                            </div><!-- accordion-->
                            <div class="card borderbtmgrey">
                                <div class="card-header" id="infraSixteen">
                                    <a  class="faqtxttaga"  href="#collapseSixteen" class="collapsed" data-toggle="collapse"
                                        data-target="#collapseSixteen" aria-expanded="false" aria-controls="collapseSixteen">
                                        <p class="mb-0">
                                                {{ trans('faq.faq16') }}
                                           
                                        </p>
                                    </a>
                                </div>
                                <div id="collapseSixteen" class="collapse" aria-labelledby="infraSixteen"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                            {{ trans('faq.aws16') }}
                                       
                                    </div>
                                </div><!-- card-->
                            </div><!-- accordion-->
                            <div class="card borderbtmgrey">
                                <div class="card-header" id="infraSeventeen">
                                    <a  class="faqtxttaga"  href="#collapseSeventeen" class="collapsed" data-toggle="collapse"
                                        data-target="#collapseSeventeen" aria-expanded="false" aria-controls="collapseSeventeen">
                                        <p class="mb-0">
                                                {{ trans('faq.faq17') }}
                                           
                                        </p>
                                    </a>
                                </div>
                                <div id="collapseSeventeen" class="collapse" aria-labelledby="infraSeventeen"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                            {{ trans('faq.aws17') }}
                                       
                                    </div>
                                </div><!-- card-->
                            </div><!-- accordion-->
                            <div class="card borderbtmgrey">
                                <div class="card-header" id="infraEightteen">
                                    <a  class="faqtxttaga"  href="#collapseEightteen" class="collapsed" data-toggle="collapse"
                                        data-target="#collapseEightteen" aria-expanded="false" aria-controls="collapseEightteen">
                                        <p class="mb-0">
                                                {{ trans('faq.faq18') }}
                                           
                                        </p>
                                    </a>
                                </div>
                                <div id="collapseEightteen" class="collapse" aria-labelledby="infraEightteen"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                            {{ trans('faq.aws18') }}
                                       
                                    </div>
                                </div><!-- card-->
                            </div><!-- accordion-->
                        </div><!-- tab 1-->
                    </div><!-- tab content-->
                </div>
            </div>
        </div>
    </div>
        <script src="{{asset('js/dealer/dealer.js')}}"></script>
@endsection
