<div id="Articles" class="contentbox">


    <div id="articlesDiv" class="centerPseudo">

        <?php
        $articlesCount = getArticlesCount();
        for ($i = 0; $i < $articlesCount; $i++) {
            echo givenArticlesIndexGetArticlesParagraph($i);
        }
        ?>

    </div>
</div>
