<?php 
/*****************************************/
// Template Title: Three Column Landing Page
// Plugin: Landing Pages - Inboundnow.com
/*****************************************/

/* Declare Template Key */
$key = lp_get_parent_directory(dirname(__FILE__)); // unique ID associated with this template
$path = LANDINGPAGES_URLPATH.'templates/'.$key.'/'; // path to template folder
$url = plugins_url();

/* Define Landing Pages's custom pre-load do_action('lp_init'); hook for 3rd party plugin integration */
do_action('lp_init');

/* Start WordPress Loop and Load $post data */
if (have_posts()) : while (have_posts()) : the_post();
    
/* Pre-load meta data into variables. These are defined in the templates config.php file */
$conversion_area = lp_get_value($post, $key, 'conversion_area' ); 
$left_content_bg_color = lp_get_value($post, $key, 'left-content-bg-color' ); 
$left_content_text_color = lp_get_value($post, $key, 'left-content-text-color' ); 
$left_content_area = lp_get_value($post, $key, 'left-content-area' ); 
$middle_content_bg_color = lp_get_value($post, $key, 'middle-content-bg-color' ); 
$middle_content_text_color = lp_get_value($post, $key, 'middle-content-text-color' ); 
$right_content_bg_color = lp_get_value($post, $key, 'right-content-bg-color' ); 
$right_content_text_color = lp_get_value($post, $key, 'right-content-text-color' ); 
$right_content_area = lp_get_value($post, $key, 'right-content-area' ); 
$content = lp_content_area(null,null,true);
  
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>
        <?php wp_title(); // Load Normal WordPress Page Title ?>
    </title>
    
    <link rel="stylesheet" href="<?php echo $path; ?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?php echo $path; ?>assets/css/style.css">
    <script src="<?php echo $path; ?>assets/js/modernizr-2.6.2.min.js"></script>
    
    <style type="text/css">
        #lp_container_form {text-align: center;}
        /* Inline Styling for Template Changes based off user input */
        <?php 
        if ($left_content_bg_color != "") {
            echo ".sidebar.left { background: #$left_content_bg_color;} "; // change sidebar color
        }
        if ($left_content_text_color != "") {
            echo ".sidebar.left { color: #$left_content_text_color;} "; // change sidebar color
        } 
        if ($right_content_bg_color != "") {
            echo ".sidebar.right { background: #$right_content_bg_color;} "; // change sidebar color
        }
        if ($right_content_text_color != "") {
            echo ".sidebar.right { color: #$right_content_text_color;} "; // change sidebar color
        } 
        if ($middle_content_bg_color != "") {
            echo ".main {background: #$middle_content_bg_color;}"; // change content background color
        }
        if ($middle_content_text_color != "") {
            echo ".main, .btn {color: #$middle_content_text_color;}"; // change content background color
        }  
        if ($content_text_color != "") {
            echo "#area, ul {color: #$content_text_color; opacity: .9;}"; // change content text color
        }
        if ($sidebar_text_color != "") {
            echo "#right {color: #$sidebar_text_color;} "; // change sidebar text color
        }
        if ($submit_button_color != "") {
            echo "input[type='submit'] {background: #$submit_button_color;} "; // change sidebar text color
        }
        ?>
    </style>
    <?php wp_head(); // Load Regular WP Head ?>
    <?php do_action('lp_head'); // Load Landing Page Specific Header Items ?>
</head>
<body <?php body_class(); ?>>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please
            <a href="http://browsehappy.com/">upgrade your browser</a>or
            <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a>to improve your experience.</p>
    <![endif]-->
   <div class="wrapper">
        <div class="main">
        
        <a href="#" class="btn left"><span class="entypo-left-open"></span>More</a> </a>
        <a href="#" class="btn right"><span class="entypo-right-open"></span>More</a> </a>
        
        <h2><?php the_title();?></h2>
        <?php the_content(); ?>
        <?php if ($conversion_area === "middle"){ lp_conversion_area(); } ?>                 
        </div>
        
        <div class="sidebar left">
            <?php echo do_shortcode( $left_content_area ); ?>  
            <?php if ($conversion_area === "left"){ lp_conversion_area(); } ?>     
        </div>
        
        <div class="sidebar right">
             <?php echo do_shortcode( $right_content_area ); ?>
             <?php if ($conversion_area === "right"){ lp_conversion_area(); } ?>
        </div>

    </div> <!-- end .wrapper -->
<?php break; endwhile; endif; // end WordPress Loop 
    do_action('lp_footer'); // load landing pages footer hook 
    wp_footer(); // load normal wordpress footer
?>
<script type="text/javascript">
    jQuery(function($){
       
   $('.btn.left').click(function(event){
        event.preventDefault();
        $('body').toggleClass('left');
    });

    $('.btn.right').click(function(event){
        event.preventDefault();
        $('body').toggleClass('right');
    });
       
}); 
</script>    
</body>
</html>