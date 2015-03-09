<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
		<footer></footer>

        <!-- jQuery/-->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
            <script>if (!window.jQuery) { document.write('<script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/jquery-1.11.2.min.js"><\/script>'); }
        </script>

        <!-- javascript files go here /-->
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/scripts.min.js"></script>



        <?php wp_footer(); ?>

    </body>
</html>