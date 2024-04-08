<?php get_header() ?>

<div class="container">
    <div id="twitch-embed"></div>
</div>

<script src="https://embed.twitch.tv/embed/v1.js"></script>

<script type="text/javascript">
    new Twitch.Embed("twitch-embed", {
        channel: "covitevecoovilros",
        autoplay: false,
    });
</script>

<?php get_footer() ?>
