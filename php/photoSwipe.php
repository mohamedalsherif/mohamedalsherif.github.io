<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <!-- Background of PhotoSwipe.
         It's a separate element, as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>
    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">
        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
        <!-- don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <!--  Controls are self-explanatory. Order can be changed. -->

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <div class="pswp__counter"></div>
                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>
            <div id="divInImageOpenPhotoSwipe">

                <div class="artwork_details_wrapper">


                    <div id="artwork_description_container" class="detail_view_module">
                        <div id="artwork_description" class="description">

                        </div>
                    </div>


                    <div id="artwork_description_2" class="hidden">
                        <div class="detail_view_module">
                        </div>


                    </div>


                    <script type="text/javascript">
                        var addthis_config = {
                            data_track_addressbar: false,
                            services_exclude: 'print, gmail, stumbleupon, more, google',
                            ui_click: true, data_ga_tracker: 'UA-51296592-9',
                            data_ga_property: 'UA-51296592-9',
                            data_ga_social: true,
                            ui_use_css: true
                        };

                    </script>


                    <!--<div class="link share_link"><a href="#"> Share</a></div>-->


                </div>


            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>
